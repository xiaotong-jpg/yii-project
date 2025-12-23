<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * Controller that lists and serves personal/group download files from the project data folder.
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DownloadController extends Controller
{
    /**
     * Show personal assignment downloads
     */
    public function actionPersonal()
    {
        // Project root (two levels up from backend/controllers)
        $projectRoot = dirname(dirname(__DIR__));
        $dir = $projectRoot . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'personal';

        $files = [];
        if (is_dir($dir)) {
            $entries = scandir($dir);
            foreach ($entries as $e) {
                if ($e === '.' || $e === '..') continue;
                $full = $dir . DIRECTORY_SEPARATOR . $e;
                if (!is_file($full)) continue;
                // basic skip for hidden files
                if (strpos($e, '.') === 0) continue;
                $label = pathinfo($e, PATHINFO_FILENAME);
                // make label more readable
                $label = str_replace(['_', '-'], ' ', $label);
                $label = mb_convert_encoding($label, 'UTF-8', 'auto');
                $files[] = ['label' => $label, 'file' => $e];
            }
        }

        return $this->render('personal', ['files' => $files]);
    }

    /**
     * Show group assignment downloads
     */
    public function actionGroup()
    {
        // Build explicit expected filenames for the team
        $projectRoot = dirname(dirname(__DIR__));
        $dir = $projectRoot . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'group';

        $teamTag = '不做DDL战神组';
        $members = '2312747_2312358_2311089_2313936';

        $items = [
            ['label' => '需求文档', 'ext' => 'pdf'],
            ['label' => '设计文档', 'ext' => 'pdf'],
            ['label' => '实现文档', 'ext' => 'pdf'],
            ['label' => '用户手册', 'ext' => 'pdf'],
            ['label' => '部署文档', 'ext' => 'pdf'],
            ['label' => '项目展示PPT', 'ext' => 'pptx'],
            ['label' => '源码', 'ext' => 'zip'],
            // 数据库文件 will map to project-level install.sql
            ['label' => '数据库文件', 'ext' => 'sql', 'special' => 'install.sql'],
        ];

        $files = [];
        foreach ($items as $it) {
            $filename = '';
            $exists = false;
            $sourceType = 'group';

            if (!empty($it['special']) && $it['special'] === 'install.sql') {
                // database file lives at project root data/install.sql
                $filename = 'install.sql';
                $full = $projectRoot . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $filename;
                $exists = is_file($full);
                $sourceType = 'group';
            } else {
                $namePart = $it['label'];
                $ext = $it['ext'];
                $filename = $teamTag . '_' . $namePart . '(' . $members . ').' . $ext;
                $full = $dir . DIRECTORY_SEPARATOR . $filename;
                $exists = is_file($full);

                // fallback: if not found under data/group, check data/team
                if (!$exists) {
                    $teamDir = $projectRoot . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'team';
                    $teamPath = $teamDir . DIRECTORY_SEPARATOR . $filename;
                    if (is_file($teamPath)) {
                        $exists = true;
                        $sourceType = 'team';
                        $full = $teamPath;
                    }
                }
            }

            $files[] = ['label' => $it['label'], 'file' => $filename, 'exists' => $exists, 'type' => $sourceType];
        }

        // Also include any MP4 files present in data/team that aren't covered by the explicit list
        $teamDir = $projectRoot . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'team';
        if (is_dir($teamDir)) {
            $entries = scandir($teamDir);
            $existingFiles = array_column($files, 'file');
            foreach ($entries as $e) {
                if ($e === '.' || $e === '..') continue;
                $full = $teamDir . DIRECTORY_SEPARATOR . $e;
                if (!is_file($full)) continue;
                if (strpos($e, '.') === 0) continue; // skip hidden
                $ext = strtolower(pathinfo($e, PATHINFO_EXTENSION));
                if ($ext !== 'mp4') continue;
                if (in_array($e, $existingFiles)) continue;
                // For team screen recordings, show a user-friendly label
                $label = '录屏讲解';
                $files[] = ['label' => $label, 'file' => $e, 'exists' => true, 'type' => 'team'];
            }
        }

        return $this->render('group', ['files' => $files]);
    }

    /**
     * Show team folder downloads (arbitrary documents placed in data/team)
     */
    public function actionTeam()
    {
        $projectRoot = dirname(dirname(__DIR__));
        $dir = $projectRoot . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'team';

        $files = [];
        if (is_dir($dir)) {
            $entries = scandir($dir);
            foreach ($entries as $e) {
                if ($e === '.' || $e === '..') continue;
                $full = $dir . DIRECTORY_SEPARATOR . $e;
                if (!is_file($full)) continue;
                if (strpos($e, '.') === 0) continue; // skip hidden
                $label = pathinfo($e, PATHINFO_FILENAME);
                $label = str_replace(['_', '-'], ' ', $label);
                $label = mb_convert_encoding($label, 'UTF-8', 'auto');
                $files[] = ['label' => $label, 'file' => $e, 'exists' => true];
            }
        }

        return $this->render('team', ['files' => $files]);
    }

    /**
     * Serve a file download from backend/web/uploads/{type}/{file}
     * @param string $type 'group' or 'personal'
     * @param string $file filename (validated)
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionFile($type, $file)
    {
        $type = (string)$type;
        $file = (string)$file;
        if (!in_array($type, ['group', 'personal', 'team'])) {
            throw new NotFoundHttpException('Invalid file type.');
        }

        // Basic security: disallow path traversal
        if (strpos($file, '..') !== false || strpos($file, '/') !== false || strpos($file, '\\') !== false) {
            throw new NotFoundHttpException('Invalid file name.');
        }

        // serve from project data folder, with special case for project-level install.sql
        $projectRoot = dirname(dirname(__DIR__));
        // special-case: serve install.sql from projectRoot/data/install.sql
        if ($file === 'install.sql') {
            $path = $projectRoot . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'install.sql';
            if (!is_file($path)) throw new NotFoundHttpException('File not found.');
            return Yii::$app->response->sendFile($path, $file);
        }

        $base = $projectRoot . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR;
        $path = $base . $file;

        if (!is_file($path)) {
            throw new NotFoundHttpException('File not found.');
        }

        return Yii::$app->response->sendFile($path, $file);
    }
}
