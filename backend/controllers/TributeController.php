<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * Controller handling tribute records, message-board statistics and related views.
 */

namespace backend\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use Yii;
use backend\models\TributeRecord;

class TributeController extends Controller
{
    public function actionIndex()
    {
        $statusFilter = Yii::$app->request->get('status');
        $where = '';
        $params = [];
        if ($statusFilter !== null && $statusFilter !== '') {
            $where = 'WHERE is_approved = :status';
            $params[':status'] = (int)$statusFilter;
        }

        // 从数据库读取留言板（message_board）表的数据 — 包含 username/content 字段
        $sql = "SELECT id, username, content, is_approved, created_at FROM message_board $where ORDER BY created_at DESC";
        $rows = Yii::$app->db->createCommand($sql, $params)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels' => $rows,
            'pagination' => ['pageSize' => 20],
            'sort' => ['attributes' => ['username', 'created_at', 'is_approved']],
        ]);

        // 统计总留言数量
        $totalMessages = Yii::$app->db->createCommand('SELECT COUNT(*) FROM message_board')->queryScalar();

        // 统计未审核留言数量
        $unapprovedMessages = Yii::$app->db->createCommand('SELECT COUNT(*) FROM message_board WHERE is_approved = 0')->queryScalar();

        // interaction/statistics: aggregate tribute_record counts by type using model table
        $typeRows = (new \yii\db\Query())
            ->select(['type', 'COUNT(*) AS cnt'])
            ->from(TributeRecord::tableName())
            ->groupBy('type')
            ->all();
        $typeCounts = [];
        foreach ($typeRows as $r) { $typeCounts[(int)$r['type']] = (int)$r['cnt']; }

        // message counts last 30 days
        $days = 30;
        $labels = [];
        for ($i = $days - 1; $i >= 0; $i--) { $labels[] = date('Y-m-d', strtotime("-{$i} days")); }
        $since = strtotime('-' . ($days - 1) . ' days');
        $sql = "SELECT FROM_UNIXTIME(created_at, '%Y-%m-%d') AS d, COUNT(*) AS cnt FROM message_board WHERE created_at >= :since GROUP BY d";
        $rows2 = Yii::$app->db->createCommand($sql, [':since' => $since])->queryAll();
        $msgCounts = [];
        foreach ($rows2 as $r) { $msgCounts[$r['d']] = (int)$r['cnt']; }
        $series = [];
        foreach ($labels as $d) { $series[] = isset($msgCounts[$d]) ? $msgCounts[$d] : 0; }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'typeCounts' => $typeCounts,
            'labels' => $labels,
            'series' => $series,
            'totalMessages' => $totalMessages,
            'unapprovedMessages' => $unapprovedMessages,
        ]);
    }

    // Delete a message
    public function actionDelete($id)
    {
        Yii::$app->db->createCommand()->delete('message_board', ['id' => $id])->execute();
        return $this->redirect(['index']);
    }

    public function actionInteraction()
    {
        // 电子互动表 tribute_record: id, type, ip_address, created_at
        $queryRows = TributeRecord::find()->select(['id', 'type', 'ip_address', 'created_at'])->orderBy(['created_at' => SORT_DESC]);
        $rows = $queryRows->asArray()->all();

        // counts by type for chart (using Query)
        $counts = (new \yii\db\Query())
            ->select(['type', 'COUNT(*) AS cnt'])
            ->from(TributeRecord::tableName())
            ->groupBy('type')
            ->all();
        $typeCounts = [];
        foreach ($counts as $r) {
            $typeCounts[(int)$r['type']] = (int)$r['cnt'];
        }

        // build last-12-months series for tribute_record per type (monthly aggregation)
        $months = 12;
        $labels = [];
        // labels like YYYY-MM for the past 11 months up to current
        for ($i = $months - 1; $i >= 0; $i--) {
            $labels[] = date('Y-m', strtotime("-{$i} months"));
        }
        // since = first day of the earliest month
        $since = strtotime(date('Y-m-01', strtotime('-' . ($months - 1) . ' months')));

        // Query counts grouped by month and type
        $sql = "SELECT DATE_FORMAT(FROM_UNIXTIME(created_at), '%Y-%m') AS m, type, COUNT(*) AS cnt FROM " . TributeRecord::tableName() . " WHERE created_at >= :since GROUP BY m, type";
        $rows2 = Yii::$app->db->createCommand($sql, [':since' => $since])->queryAll();
        $typeData = [];
        foreach ($rows2 as $r) {
            $type = (int)$r['type'];
            $m = $r['m'];
            $typeData[$type][$m] = (int)$r['cnt'];
        }

        // Build series arrays aligned to $labels for known types (1..3)
        $series = [];
        for ($t = 1; $t <= 3; $t++) {
            $arr = [];
            foreach ($labels as $m) { $arr[] = isset($typeData[$t][$m]) ? $typeData[$t][$m] : 0; }
            $series['type' . $t] = $arr;
        }

        // interaction list not displayed (we only show charts), but keep a provider if needed
        $dataProvider = new ActiveDataProvider([
            'query' => $queryRows,
            'pagination' => ['pageSize' => 20],
            'sort' => ['attributes' => ['id', 'type', 'created_at']],
        ]);

        return $this->render('interaction', [
            'dataProvider' => $dataProvider,
            'typeCounts' => $typeCounts,
            'labels' => $labels,
            'series' => $series,
        ]);
    }

    public function actionToggleApprove($id)
    {
        $db = Yii::$app->db;
        $row = $db->createCommand('SELECT is_approved FROM message_board WHERE id = :id', [':id' => $id])->queryOne();
        if ($row !== false) {
            $new = $row['is_approved'] ? 0 : 1;
            $db->createCommand()->update('message_board', ['is_approved' => $new], ['id' => $id])->execute();
        }
        return $this->redirect(['index']);
    }

    public function actionStats($days = 30)
    {
        $days = (int)$days;
        if ($days <= 0) $days = 30;

        $db = Yii::$app->db;
        // generate date labels (last $days days)
        $labels = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $labels[] = date('Y-m-d', strtotime("-{$i} days"));
        }

        // message_board counts per day
        $sql = "SELECT FROM_UNIXTIME(created_at, '%Y-%m-%d') AS d, COUNT(*) AS cnt FROM message_board WHERE created_at >= :since GROUP BY d";
        $since = strtotime('-' . ($days - 1) . ' days');
        $rows = $db->createCommand($sql, [':since' => $since])->queryAll();
        $msgCounts = [];
        foreach ($rows as $r) { $msgCounts[$r['d']] = (int)$r['cnt']; }

        // tribute_record counts per day per type
        $sql2 = "SELECT FROM_UNIXTIME(created_at, '%Y-%m-%d') AS d, type, COUNT(*) AS cnt FROM tribute_record WHERE created_at >= :since GROUP BY d, type";
        $rows2 = $db->createCommand($sql2, [':since' => $since])->queryAll();
        $typeData = [];
        foreach ($rows2 as $r) { $typeData[$r['type']][$r['d']] = (int)$r['cnt']; }

        // build series aligned to labels
        $series = [];
        // message series
        $msgSeries = [];
        foreach ($labels as $d) { $msgSeries[] = isset($msgCounts[$d]) ? $msgCounts[$d] : 0; }
        $series['message'] = $msgSeries;

        // known types 1..3
        for ($t = 1; $t <= 3; $t++) {
            $arr = [];
            foreach ($labels as $d) { $arr[] = isset($typeData[$t][$d]) ? $typeData[$t][$d] : 0; }
            $series['type' . $t] = $arr;
        }

        return $this->render('stats', [
            'labels' => $labels,
            'series' => $series,
            'days' => $days,
        ]);
    }

    /**
     * Word cloud: aggregate message_board content and return frequency data.
     * Requires Python + jieba installed on the server. Falls back with an error message.
     */
    public function actionWordCloud()
    {
        $db = Yii::$app->db;
        $rows = $db->createCommand('SELECT content FROM message_board WHERE content IS NOT NULL')->queryColumn();
        $text = implode("\n", $rows);

        // if no content found, return helpful message
        if (empty($rows)) {
            $result = ['error' => '未检索到任何留言内容（message_board 表为空或未导入）。请确认数据库已包含留言数据。', 'freq' => []];
            if (Yii::$app->request->isAjax) {
                return $this->renderPartial('wordcloud', ['result' => $result]);
            }
            return $this->render('wordcloud', ['result' => $result]);
        }

        // write to temp file
        $tmp = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'wordcloud_input_' . uniqid() . '.txt';
        file_put_contents($tmp, $text);

        // find project tools script
        // compute project root (advanced/) from backend/controllers
        $root = dirname(__DIR__, 2);
        $script = $root . DIRECTORY_SEPARATOR . 'tools' . DIRECTORY_SEPARATOR . 'jieba_wordfreq.py';

        $result = ['error' => null, 'freq' => []];
        if (!is_file($script)) {
            $result['error'] = 'jieba helper script not found: ' . $script;
            @unlink($tmp);
            return $this->render('wordcloud', ['result' => $result]);
        }

        // try python
        $pyCmds = ['python', 'python3'];
        $out = null; $ret = 1; $json = '';
        foreach ($pyCmds as $py) {
            $cmd = escapeshellcmd($py) . ' ' . escapeshellarg($script) . ' ' . escapeshellarg($tmp);
            exec($cmd . ' 2>&1', $output, $ret);
            $json = implode("\n", $output);
            if ($ret === 0) break;
            // continue to next
        }

        @unlink($tmp);

        if ($ret !== 0) {
            $result['error'] = "Failed to run Python jieba script. Ensure Python and jieba are installed.\nOutput:\n" . $json;
            if (Yii::$app->request->isAjax) {
                return $this->renderPartial('wordcloud', ['result' => $result]);
            }
            return $this->render('wordcloud', ['result' => $result]);
        }

        // try decode; if blob contains extra logs, extract JSON substring
        $freq = json_decode($json, true);
        if (!is_array($freq)) {
            $start = strpos($json, '{');
            $end = strrpos($json, '}');
            if ($start !== false && $end !== false && $end > $start) {
                $substr = substr($json, $start, $end - $start + 1);
                $freq = json_decode($substr, true);
            }
        }

        if (!is_array($freq)) {
            $result['error'] = 'Invalid JSON from jieba script';
            $result['debug'] = $json;
            if (Yii::$app->request->isAjax) {
                return $this->renderPartial('wordcloud', ['result' => $result]);
            }
            return $this->render('wordcloud', ['result' => $result]);
        }

        $result['freq'] = $freq;
        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('wordcloud', ['result' => $result]);
        }
        return $this->render('wordcloud', ['result' => $result]);
    }
}
