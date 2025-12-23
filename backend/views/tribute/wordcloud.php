<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * This view displays the message-board word cloud and related debug info.
 */
use yii\helpers\Html;

$this->title = '留言词云';
?>
<div class="card bg-gradient-info">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
        </div>
    </div>
    <div class="card-body p-0" style="position:relative;">
        <?php if (!empty($result['error'])): ?>
            <div class="alert alert-warning" role="alert"><?= nl2br(Html::encode($result['error'])) ?></div>
            <?php if (!empty($result['debug'])): ?>
                <pre style="max-height:200px;overflow:auto;margin-top:.5rem;"><?= Html::encode($result['debug']) ?></pre>
            <?php endif; ?>
            <p>安装说明：在服务器上安装 Python3 并运行 <code>pip install jieba</code>，然后重新打开本页。</p>
        <?php else: ?>
            <div class="p-3">
                <div style="position:relative;">
                    <div id="wordcloud" class="wordcloud-container" style="width:100%;height:440px;border-radius:6px;background:transparent;overflow:hidden;position:relative;">
                        <div class="wordcloud-mask" aria-hidden="true"></div>
                    </div>
                </div>
                <pre id="wordcloud-debug" style="display:none;white-space:pre-wrap;background:#f8f9fa;border:1px dashed #ddd;padding:.5rem;margin-top:.5rem;max-height:200px;overflow:auto"></pre>
            </div>
    <style>
        /* Decorative mask over the wordcloud: subtle vignette + soft spotlight center */
        .wordcloud-container { position: relative; }
        .wordcloud-mask { position:absolute; inset:0; pointer-events:none; border-radius:6px; z-index:60;
            /* stronger visible vignette + soft center light */
            background: radial-gradient(circle at 50% 45%, rgba(255,255,255,0.04) 0%, rgba(255,255,255,0.02) 15%, rgba(0,0,0,0.06) 40%, rgba(0,0,0,0.14) 75%, rgba(0,0,0,0.28) 100%);
            box-shadow: inset 0 30px 60px rgba(255,255,255,0.02), inset 0 -20px 40px rgba(0,0,0,0.06);
        }
        /* make sure canvas sits under the mask */
        .wordcloud-container canvas { position: absolute; left:0; top:0; width:100% !important; height:100% !important; z-index:20; }
    </style>
            <script src="https://cdn.jsdelivr.net/npm/wordcloud@1.1.2/src/wordcloud2.min.js"></script>
            <script>
                (function(){
                    const freq = <?= json_encode($result['freq'] ?: []) ?>; // {word:count}
                    const list = Object.keys(freq).map(k=>[k, freq[k]]);
                    // reduce to top 200
                    const top = list.slice(0,200);
                    function initCloud(){
                        const el = document.getElementById('wordcloud');
                        if (!(el instanceof Element)) {
                            console.warn('wordcloud: container missing or not an Element', el);
                            return;
                        }
                        if (!top.length) { el.innerText = '没有词可显示'; return; }
                        if (typeof WordCloud === 'undefined') {
                            // WordCloud lib not loaded yet
                            el.innerText = '词云库未加载';
                            return;
                        }
                        // ensure element has layout and fill card body
                        const width = el.offsetWidth || el.clientWidth || 600;
                        const height = el.offsetHeight || el.clientHeight || 300;
                        // remove only existing canvas elements so we keep the decorative mask
                        const existingCanvases = el.querySelectorAll('canvas');
                        existingCanvases.forEach(c => c.remove());
                        // ensure decorative mask present (init may have removed it earlier)
                        if (!el.querySelector('.wordcloud-mask')) {
                            const mask = document.createElement('div');
                            mask.className = 'wordcloud-mask';
                            el.appendChild(mask);
                        }
                        WordCloud(el, {
                            list: top,
                            // slightly smaller grid for slightly smaller words
                            gridSize: Math.max(7, Math.round(Math.min(width, height) / 14)),
                            // slightly reduce weight so words are a bit smaller
                            weightFactor: function (size) { return Math.pow(size, 0.85) * Math.min(width, height) / 140; },
                            fontFamily: 'Microsoft YaHei, Arial',
                            color: 'random-dark',
                            // transparent background
                            backgroundColor: 'transparent',
                            origin: [Math.floor(width/2), Math.floor(height/2)],
                            shuffle: true
                        });
                        // post-init: ensure mask sits above the generated canvas
                        const maskEl = el.querySelector('.wordcloud-mask');
                        if (maskEl) {
                            maskEl.style.zIndex = 9999;
                            maskEl.style.pointerEvents = 'none';
                        }
                    }

                    // debug info
                    try {
                        console.log('wordcloud: items=', top.length);
                        console.log('wordcloud: freq sample=', top.slice(0,10));
                        const _el = document.getElementById('wordcloud');
                        console.log('wordcloud: el exists=', !!_el);
                        console.log('wordcloud: el offsetWidth=', _el ? _el.offsetWidth : null, 'offsetHeight=', _el ? _el.offsetHeight : null);
                        console.log('wordcloud: WordCloud defined=', typeof WordCloud);
                        const dbg = document.getElementById('wordcloud-debug');
                        if (dbg) dbg.style.display = 'block';
                        if (dbg) dbg.textContent = 'items=' + top.length + '\n' + JSON.stringify(top.slice(0,30), null, 2);
                    } catch(e) { console.warn('wordcloud debug error', e); }
                    // wait a tick so that container gets its size when inserted via AJAX
                    setTimeout(initCloud, 60);
                })();
            </script>
        <?php endif; ?>
    </div>
</div>
