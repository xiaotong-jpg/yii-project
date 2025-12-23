<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Home';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="witr_swiper_area" id="home">
         <div class="swiper-container swiper_active">
            <div class="swiper-wrapper">
               <!-- 1 single slider -->
               <div class="swiper-slide d1 t1 m1 witr_swiper_height" style="background-image: url(<?= Url::to('@web/images/80.jpg') ?>);">
               </div>
               <!-- 2 single slider -->
               <div class="swiper-slide d1 t1 m1 witr_swiper_height" style="background-image: url(<?= Url::to('@web/images/阅兵2.jpg') ?>);">
               </div>
               <!-- 3 single slider -->
               <div class="swiper-slide d1 t1 m1 witr_swiper_height" style="background-image: url(<?= Url::to('@web/images/阅兵3.jpg') ?>);">
               </div>
               <!-- 4 single slider -->
               <div class="swiper-slide d1 t1 m1 witr_swiper_height" style="background-image: url(<?= Url::to('@web/images/阅兵5.jpg') ?>);">
               </div>
            </div>
         </div>
      </div>
      <!-- end slider area -->

      <?php
      // JS: 点击计数器图标，发送敬礼请求到后端并更新计数
      // 放到轮播区外，避免删掉轮播文案/按钮时把逻辑一起删没了。
      $tributeUrl = Url::to(['site/tribute']);
      $csrf = Yii::$app->request->getCsrfToken();
      ?>
      <style>
        /* 默认未选中颜色 */
        .witr_counter_single .witr_counter_icon i,
        .witr_counter_single .witr_counter_number_inn .counter {
           color: #a6906c !important;
        }
        /* 高亮已敬礼的计数器：图标与数字变色 */
        .witr_counter_single.tribute-active .witr_counter_icon i,
        .witr_counter_single.tribute-active .witr_counter_number_inn .counter {
           color: #E6C35C !important;
        }
        .witr_counter_single .witr_counter_icon i { transition: color .24s ease; }
        .witr_counter_single .witr_counter_number_inn .counter { transition: color .24s ease; }
      </style>
      <script>
      document.addEventListener('DOMContentLoaded', function(){
         var icons = document.querySelectorAll('.witr_counter_icon i[data-tribute-type]');
         if (!icons || !icons.length) return;
         var url = '<?= $tributeUrl ?>';
         var csrf = '<?= $csrf ?>';
         icons.forEach(function(icon){
            icon.style.cursor = 'pointer';
            icon.addEventListener('click', function(e){
               e.preventDefault();
               var el = this;
               if (el._busy) return;
               el._busy = true;
               var type = parseInt(el.getAttribute('data-tribute-type'), 10);
               console.log('[tribute] click type=', type);
               var parent = el.closest('.witr_counter_single');
               fetch(url, {
                  method: 'POST',
                  headers: {
                     'Content-Type': 'application/x-www-form-urlencoded',
                     'X-CSRF-Token': csrf
                  },
                  body: '_csrf=' + encodeURIComponent(csrf) + '&type=' + encodeURIComponent(type)
               }).then(function(r){ return r.json(); }).then(function(json){
                  console.log('[tribute] response=', json);
                  if (json && json.status === 'success') {
                     if (parent) {
                        var cnt = parent.querySelector('.counter');
                        if (cnt) cnt.textContent = json.count;
                        // 根据后端 action 切换高亮状态
                        if (json.action === 'added') {
                           parent.classList.add('tribute-active');
                        } else if (json.action === 'deleted') {
                           parent.classList.remove('tribute-active');
                        }
                     }
                  } else {
                     var msg = (json && json.message) ? json.message : '操作失败';
                     alert(msg);
                  }
               }).catch(function(){
                  alert('网络错误，请稍后重试');
               }).finally(function(){
                  setTimeout(function(){ el._busy = false; }, 800);
               });
            });
         });
      });
      </script>
      <!-- feature area  -->
      <div class="lorw_service_area">
         <div class="container">
            <div class="row service_inner">
               <?php
               /* @var $hotArticles common\models\Article[] */
               $cardImages = [
                   220 => 'https://www.news.cn/photo/20250904/ca7cfeb13a304cdc89d73ca3d57b9853/20250904ca7cfeb13a304cdc89d73ca3d57b9853_202509043876f991b3ad44ee9722fa233d5f4a62.jpg',
                   222 => 'https://www.news.cn/photo/20250903/01bd5fbb96e14e3a861d1843c078cce8/VsGqt7VUa7e6eMnL.jpg',
                   223 => 'https://www.news.cn/politics/leaders/20250903/c13ca6bee464410695e47b0fb1e96b8a/20250903c13ca6bee464410695e47b0fb1e96b8a_202509030cc3469416904ba89646c8ecec8d86a0.jpg',
               ];
               ?>
               <?php if (!empty($hotArticles)): ?>
                  <?php foreach ($hotArticles as $article): ?>
                     <?php
                     $link = !empty($article->source_url)
                         ? $article->source_url
                         : \yii\helpers\Url::to(['site/article', 'id' => $article->id]);
                     ?>
                     <div class="col-lg-4 col-md-6">
                        <div class="em-service all_color_service text-center" style="background-image: url('<?= isset($cardImages[$article->id]) ? $cardImages[$article->id] : '' ?>'); background-size: cover; background-position: center; position: relative; min-height: 420px;">
                           <div class="em_service_content" style="position: absolute; inset: 0; display: flex; flex-direction: column; justify-content: flex-end; padding: 32px; background: linear-gradient(180deg, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0.65) 100%); color: #fff;">
                              <div class="em_single_service_text ">
                                 <div class="em-service-title">
                                    <h3>
                                       <a href="<?= $link ?>" style="color: #fff;">
                                          <?= \yii\helpers\Html::encode($article->title) ?>
                                       </a>
                                    </h3>
                                 </div>
                                 <div class="em-service-inner">
                                    <div class="em-service-desc">
                                       <p style="color: #fff;"><?= \yii\helpers\Html::encode(mb_substr(strip_tags((string)$article->content), 0, 80)) ?>...</p>
                                    </div>
                                 </div>
                                 <div class="service-btn">
                                 <a href="<?= $link ?>" style="...">Read More</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>
               <?php endif; ?>
            </div>
         </div>
      </div>

      <!-- news showcase area -->
      <?php
      /* @var $featuredArticles common\models\Article[] */
      ?>
      <?php if (!empty($featuredArticles)): ?>
      <style>
         .nh-showcase{margin-top:40px;margin-bottom:40px;}
         .nh-slide{display:none;position:relative;overflow:hidden;border-radius:6px;}
         .nh-slide.active{display:block;}
         .nh-slide img{width:100%;height:420px;object-fit:cover;display:block;}
         .nh-caption{position:absolute;left:0;right:0;bottom:0;padding:16px 20px;background:linear-gradient(180deg,rgba(0,0,0,0.2) 0%,rgba(0,0,0,0.78) 100%);color:#fff;}
         .nh-caption h4{margin:0;font-size:20px;line-height:1.4;text-shadow:0 1px 3px rgba(0,0,0,0.6);color:#fff!important;}
         .nh-caption a{color:#fff!important;text-decoration:none;}
         .nh-list{list-style:none;padding:0;margin:0;}
         .nh-item{padding:12px 14px;border-bottom:1px solid #e5e5e5;cursor:pointer;}
         .nh-item:last-child{border-bottom:none;}
         .nh-item a{color:#333;display:block;text-decoration:none;}
         .nh-item.active{background:#f5f5f5;font-weight:600;}
      </style>
      <div class="nh-showcase">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <div class="nh-carousel">
                     <?php foreach ($featuredArticles as $idx => $article): ?>
                        <?php
                        $link = !empty($article->source_url)
                            ? $article->source_url
                            : \yii\helpers\Url::to(['site/article', 'id' => $article->id]);
                        $cover = $article->cover_image;
                        $imgUrl = '';
                        if (!empty($cover)) {
                            $imgUrl = preg_match('/^https?:/i', $cover)
                                ? $cover
                                : \yii\helpers\Url::to('@web/images/' . $cover);
                        }
                        ?>
                        <div class="nh-slide <?= $idx === 0 ? 'active' : '' ?>" data-key="<?= $article->id ?>">
                           <a href="<?= $link ?>">
                              <?php if ($imgUrl): ?>
                                 <img src="<?= $imgUrl ?>" alt="<?= \yii\helpers\Html::encode($article->title) ?>">
                              <?php endif; ?>
                              <div class="nh-caption">
                                 <h4><?= \yii\helpers\Html::encode($article->title) ?></h4>
                              </div>
                           </a>
                        </div>
                     <?php endforeach; ?>
                  </div>
               </div>
               <div class="col-lg-4">
                  <ul class="nh-list">
                     <?php foreach ($featuredArticles as $idx => $article): ?>
                        <?php
                        $link = !empty($article->source_url)
                            ? $article->source_url
                            : \yii\helpers\Url::to(['site/article', 'id' => $article->id]);
                        ?>
                        <li class="nh-item <?= $idx === 0 ? 'active' : '' ?>" data-key="<?= $article->id ?>">
                           <a href="<?= $link ?>"><?= \yii\helpers\Html::encode($article->title) ?></a>
                        </li>
                     <?php endforeach; ?>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <script>
         (function() {
            const slides = Array.from(document.querySelectorAll('.nh-slide'));
            const items = Array.from(document.querySelectorAll('.nh-item'));
            if (!slides.length) return;
            let idx = 0;
            let timer;

            function show(i) {
               idx = i;
               slides.forEach((s, k) => s.classList.toggle('active', k === idx));
               items.forEach((it, k) => it.classList.toggle('active', k === idx));
            }
            function next() {
               const n = (idx + 1) % slides.length;
               show(n);
            }
            function restart() {
               clearInterval(timer);
               timer = setInterval(next, 5000);
            }

            items.forEach((it, i) => {
               it.addEventListener('mouseenter', () => { show(i); restart(); });
               it.addEventListener('click', () => { show(i); restart(); });
            });
            slides.forEach((s, i) => {
               s.addEventListener('mouseenter', () => { show(i); restart(); });
            });

            show(0);
            restart();
         })();
      </script>
      <?php endif; ?>
      
    
      <!-- volunteers slider area -->
      <div id="volunteers">
      <?php if (!empty($volunteers)): ?>
      <style>
         .vol-section{margin:50px 0;}
         .vol-header{text-align:center;margin-bottom:24px;}
         .vol-header h2{margin:0;font-size:28px;}
         .vol-header h3{margin:6px 0 0;font-size:18px;color:#8B1A1A;letter-spacing:1px;}
         .vol-wrap{position:relative;}
         .vol-window{overflow:hidden;}
         .vol-track{display:flex;gap:24px;transition:transform .35s ease;}
         .vol-card{flex:0 0 300px;max-width:300px;border:1px solid #eee;border-radius:6px;overflow:hidden;box-shadow:0 8px 18px rgba(0,0,0,0.06);background:#fff;}
         .vol-card img{width:100%;height:220px;object-fit:cover;display:block;}
         .vol-card .vol-body{padding:14px 16px;}
         .vol-card .vol-title{font-size:18px;font-weight:700;color:#0b1a3f;margin:0 0 8px;line-height:1.35;}
         .vol-card .vol-summary{font-size:14px;color:#555;margin:0 0 10px;min-height:40px;}
         .vol-card .vol-meta{font-size:12px;color:#999;}
         .vol-nav{position:absolute;top:40%;transform:translateY(-50%);width:40px;height:40px;border-radius:50%;border:1px solid #d0d0d0;background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 4px 10px rgba(0,0,0,0.12);}
         .vol-nav:disabled{opacity:0.4;cursor:not-allowed;}
         .vol-prev{left:-10px;}
         .vol-next{right:-10px;}
      </style>
      <div class="vol-section">
         <div class="container">
            <div class="witr_section_title_inner text-center">
               <h2>Volunteers</h2>
               <h3>志愿者风采</h3>
            </div>
            <div class="vol-wrap">
               <button class="vol-nav vol-prev" type="button" aria-label="prev">‹</button>
               <div class="vol-window">
                  <div class="vol-track">
                     <?php foreach ($volunteers as $vol): ?>
                        <?php
                        $link = !empty($vol->detail_url) ? $vol->detail_url : '#';
                        $photo = $vol->photo_url;
                        $imgUrl = '';
                        if (!empty($photo)) {
                            $imgUrl = preg_match('/^https?:/i', $photo)
                                ? $photo
                                : Url::to('@web/images/' . $photo);
                        }
                        ?>
                        <a class="vol-card" href="<?= $link ?>" target="_blank">
                           <?php if ($imgUrl): ?>
                              <img src="<?= $imgUrl ?>" alt="<?= Html::encode($vol->title) ?>">
                           <?php endif; ?>
                           <div class="vol-body">
                              <div class="vol-title"><?= Html::encode($vol->title) ?></div>
                              <?php if (!empty($vol->summary)): ?>
                                 <p class="vol-summary"><?= Html::encode(mb_substr(strip_tags((string)$vol->summary), 0, 60)) ?>...</p>
                              <?php endif; ?>
                              <div class="vol-meta"><?= Html::encode($vol->publish_date) ?></div>
                           </div>
                        </a>
                     <?php endforeach; ?>
                  </div>
               </div>
               <button class="vol-nav vol-next" type="button" aria-label="next">›</button>
            </div>
         </div>
      </div>
      <script>
         (function(){
            const track = document.querySelector('.vol-track');
            const windowEl = document.querySelector('.vol-window');
            const prev = document.querySelector('.vol-prev');
            const next = document.querySelector('.vol-next');
            if(!track || !windowEl) return;
            const cards = Array.from(track.children);
            if(!cards.length) return;
            const gap = 24;
            const cardWidth = cards[0].getBoundingClientRect().width;
            let offset = 0;
            function update(dir){
               const max = Math.max(0, track.scrollWidth - windowEl.clientWidth);
               offset = Math.min(max, Math.max(0, offset + dir * (cardWidth + gap)));
               track.style.transform = 'translateX(' + (-offset) + 'px)';
               prev.disabled = offset <= 0;
               next.disabled = offset >= max - 1;
            }
            prev && prev.addEventListener('click', () => update(-1));
            next && next.addEventListener('click', () => update(1));
            update(0);
         })();
      </script>
      <?php endif; ?>
      
      <!-- museums area (case studies replaced) -->
      <div id="museums">
      <?php /* @var $museums common\models\Museums[] */ ?>
      <?php if (!empty($museums)): ?>
      <div class="lorw_portfolio_area pstyle2 pstyle_1 port_area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="witr_section_title">
                     <div class="witr_section_title_inner text-center">
                        <h2>MUSEUMS</h2>
                        <h3>纪念馆巡礼</h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="pstyle2 pstyle4">
                     <div class="prot_wrap row portfolio_active">
                        <?php foreach ($museums as $museum): ?>
                           <?php
                           $link = !empty($museum->website_url) ? $museum->website_url : '#';
                           $photo = $museum->photos;
                           $imgUrl = '';
                           if (!empty($photo)) {
                               $imgUrl = preg_match('/^https?:/i', $photo)
                                   ? $photo
                                   : Url::to('@web/images/' . $photo);
                           }
                           ?>
                           <div class="grid-item col-lg-4 col-md-6 col-xs-12 col-sm-12 witr_all_mb_30">
                              <div class="single_protfolio">
                                 <div class="prot_thumb">
                                    <?php if ($imgUrl): ?>
                                       <a href="<?= $link ?>" target="_blank">
                                          <img src="<?= $imgUrl ?>" alt="<?= Html::encode($museum->name) ?>" />
                                       </a>
                                    <?php endif; ?>
                                 </div>
                                 <div class="pprotfolio4">
                                    <div class="porttitle_inner4">
                                       <h3>
                                          <a href="<?= $link ?>" target="_blank">
                                             <?= Html::encode($museum->name) ?>
                                          </a>
                                       </h3>
                                       <p>
                                          <?php if (!empty($museum->address)): ?>
                                             <span class="category-item-p"><?= Html::encode($museum->address) ?></span>
                                          <?php endif; ?>
                                          <?php if (!empty($museum->opening_hours)): ?>
                                             <span class="category-item-p"><?= Html::encode($museum->opening_hours) ?></span>
                                          <?php endif; ?>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php endif; ?>
      <!-- 缅怀先烈 -->
      <?php
      // 引入必要的资源
      $this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
      $this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');
      $this->registerCssFile('@web/css/icofont.min.css'); 
      $this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);

      // 获取第一位英雄作为默认大图显示（防止报错）
      $firstHero = !empty($heroes) ? $heroes[0] : null;
      ?>

      <!-- HTML 结构 -->
      <div class="lorw_hero_area" id="figures">
         <div class="container">
            <!-- 标题 -->
            <div class="row">
                  <div class="col-lg-12">
                     <div class="witr_section_title_inner text-center">
                        <h2>HEROES</h2>
                        <h3>缅怀先烈</h3>
                     </div>
                  </div>
            </div>
            <div class="row align-items-center">
                  
                  <!-- 左侧：大图展示区域 -->
                  <div class="col-lg-5">
                     <div class="hero-big-display">
                        <?php if ($firstHero): ?>
                              <div class="big-img-wrapper">
                                 <!-- ID用于JS定位 -->
                                 <img id="big-display-img" src="<?= Url::to('@web/images/' . $firstHero->avatar) ?>"  alt="<?= $firstHero->name ?>">
                              </div>
                              <div class="big-caption">
                                 <!-- 组合显示：名字 (生卒年) -->
                                 <h3 id="big-display-title" style="color: white;">
                                    <?= $firstHero->name ?> <small>(<?= $firstHero->life_span ?>)</small>
                                 </h3>
                                 <!-- 新增：大图下方显示家乡 -->
                                 <p id="big-display-desc" style="color: #ddd; font-size: 14px; margin-top: 5px;">
                                    家乡：<?= $firstHero->hometown ?>
                                 </p>
                              </div>
                        <?php else: ?>
                              <p style="color:white; padding:20px;">暂无数据</p>
                        <?php endif; ?>
                     </div>
                  </div>

                  <!-- 右侧：横向滚动列表 -->
                  <div class="col-lg-7">
                     <div class="hero-carousel-wrapper">
                        <div class="hero_carousel_active">
                              
                              <?php foreach ($heroes as $hero): ?>
                                 <!-- 循环输出数据库内容 -->
                                 <!-- data属性存数据，供JS点击/滑动时调用 -->
                                 <div class="hero_item" 
                                       data-img="<?= Url::to('@web/images/' . $hero->avatar) ?>" 
                                       data-name="<?= $hero->name ?>"
                                       data-life="<?= $hero->life_span ?>"
                                       data-hometown="<?= $hero->hometown ?>"
                                       data-bio="<?= $hero->biography ?>">
                                    
                                    <div class="hero_inner">
                                          <div class="hero_thumb">
                                             <!-- 显示头像 -->
                                             <img src="<?= Url::to('@web/images/' . $hero->avatar) ?>" 
                                             alt="<?= $hero->name ?>">
                                          </div>
                                          <div class="hero_text">
                                             <!-- 显示名字和简介 -->
                                             <p><strong><?= $hero->name ?></strong></p>
                                             <p style="font-size: 12px; opacity: 0.8;">
                                                <?= mb_substr($hero->biography, 0, 30) ?>...
                                             </p>
                                          </div>
                                    </div>
                                 </div>
                              <?php endforeach; ?>

                        </div>
                        
                        <!-- 自定义箭头按钮 -->
                        <!-- <button class="hero-prev"><i class="icofont-simple-left"></i></button>
                        <button class="hero-next"><i class="icofont-simple-right"></i></button> -->
                        <button class="hero-prev">&#10094;</button> <!-- 左箭头符号 -->
                        <button class="hero-next">&#10095;</button> <!-- 右箭头符号 -->
                     </div>
                  </div>

            </div>
         </div>
      </div>

      <!-- CSS 样式 (复古风 + 布局) -->
      <style>
         .lorw_hero_area { padding: 60px 0; background: #fff; }
         
         /* 左侧大图 */
         .hero-big-display {
            position: relative;
            background-color: #5d4037; /* 深棕色相框 */
            padding: 10px;
            border-radius: 4px;
            box-shadow: 5px 5px 15px rgba(0,0,0,0.3);
            height: 500px;
            display: flex;
            flex-direction: column;
         }
         .big-img-wrapper {
            flex-grow: 1;
            overflow: hidden;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
         }
         .big-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* 关键：保持比例填满 */
         }
         .big-caption {
            margin-top: 10px;
            color: #fff;
            border-top: 1px solid rgba(255,255,255,0.2);
            padding-top: 10px;
         }

         /* 右侧轮播 */
         .hero-carousel-wrapper {
            position: relative;
            background: #f4f4f4;
            padding: 30px 40px;
            border-radius: 4px;
         }
         .hero_item { padding: 0 10px; outline: none; cursor: pointer; }
         .hero_inner {
            position: relative;
            height: 350px;
            background: #333;
            overflow: hidden;
            border: 4px solid #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
         }
         .hero_thumb { height: 100%; }
         .hero_thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: sepia(0.4); /* 复古滤镜 */
            transition: 0.3s;
         }
         .hero_text {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            padding: 10px;
            color: #fff;
         }
         .hero_text p { margin: 0; line-height: 1.4; color: #fff; }
         
         /* 选中状态高亮 */
         .hero_item.slick-current .hero_thumb img { filter: none; }
         .hero_item.slick-current .hero_inner { border-color: #8d6e63; }

         /* 按钮样式 */
         .hero-prev, .hero-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 30px;
            height: 50px;
            background: #8d6e63;
            color: white;
            border: none;
            cursor: pointer;
            z-index: 10;
         }
         .hero-prev { left: 5px; }
         .hero-next { right: 5px; }
         .hero-prev:hover, .hero-next:hover { background: #5d4037; }
      </style>

      <!-- JS 逻辑 -->
      <?php $this->registerJs(<<<'JS'
         $(document).ready(function(){
            
            var slider = $('.hero_carousel_active');

            // 初始化 Slick
            slider.slick({
                  slidesToShow: 3,
                  slidesToScroll: 1,
                  arrows: false,
                  infinite: true, 
                  responsive: [
                     { breakpoint: 992, settings: { slidesToShow: 2 } },
                     { breakpoint: 768, settings: { slidesToShow: 1 } }
                  ]
            });

            // 绑定按钮
            $('.hero-prev').click(function(){ slider.slick('slickPrev'); });
            $('.hero-next').click(function(){ slider.slick('slickNext'); });

            // 核心逻辑：数据联动
            function updateBigDisplay(element) {
                  var img = element.data('img');
                  var name = element.data('name');
                  var life = element.data('life');
                  var hometown = element.data('hometown');
                  
                  // 切换图片效果
                  $('#big-display-img').fadeOut(200, function() {
                     $(this).attr('src', img).fadeIn(200);
                  });
                  
                  // 更新文字
                  $('#big-display-title').html(name + ' <small>(' + life + ')</small>');
                  $('#big-display-desc').text('家乡：' + hometown);
            }

            // 1. 滑动时联动
            slider.on('afterChange', function(event, slick, currentSlide){
                  // 加上单引号后，这里的 slick.$slides 就不会被 PHP 误读了
                  var currentEl = $(slick.$slides[currentSlide]);
                  
                  if(currentEl.length > 0) {
                     updateBigDisplay(currentEl);
                  }
            });

            // 2. 点击时联动
            $(document).on('click', '.hero_item', function(){
                  updateBigDisplay($(this));
                  var index = $(this).data('slick-index');
            });

         });
      JS
      ); ?>
      <!-- end 缅怀先烈 -->
      <!-- 抗战地标展示 -->
      <?php

      /* @var $locations app\models\WarMapLocation[] */
      ?>

      <!-- 自定义样式：模仿图2的红色抗战主题 -->
      <style>
         /* =========================================
            1. 全局容器与字体设置
            ========================================= */
         .war-map-section {
            background: #f9f9f9;
            padding: 80px 0;
            font-family: "Microsoft YaHei", "Heiti SC", sans-serif;
         }

         /* =========================================
            2. 顶部大标题样式
            ========================================= */
         .war-section-title {
            text-align: center;
            margin-bottom: 50px;
         }
         .war-section-title h2 {
            color: #d93025; /* 红色主调 */
            font-weight: 800;
            font-size: 36px;
            text-transform: uppercase;
            margin-bottom: 10px;
         }
         .war-section-title h3 {
            font-size: 20px;
            color: #555;
            font-weight: 400;
         }

         /* =========================================
            3. 内容展示卡片 (固定高度模式)
            ========================================= */
         .war-content-box {
            background: #fff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
            /* 关键：设置固定高度，确保布局整齐 */
            height: 500px; 
         }

         /* --- 左侧图片区域 --- */
         .war-img-col {
            background: #000;
            height: 100%; /* 撑满父级高度 */
            position: relative;
            overflow: hidden;
         }
         
         .war-img-col img {
            width: 100%;
            height: 100%;
            /* 关键：自动裁剪填满，不变形 */
            object-fit: cover; 
            object-position: center;
            transition: transform 0.8s;
         }
         
         /* 鼠标悬停时图片缓慢放大效果 */
         .war-img-col:hover img {
            transform: scale(1.05);
         }

         /* --- 右侧文字区域 --- */
         .war-text-col {
            background: linear-gradient(135deg, #ff9068 0%, #ff4b1f 100%); /* 橙红渐变 */
            color: #fff;
            padding: 50px 40px;
            height: 100%; /* 撑满父级高度 */
            display: flex;
            flex-direction: column;
            justify_content: center;
            /* 防止文字过多溢出，允许内部滚动 */
            overflow-y: auto; 
         }

         .war-text-col h2 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #fff;
         }
         
         .war-text-col h4 {
            font-size: 18px;
            background: rgba(255,255,255,0.2);
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            margin-bottom: 25px;
         }

         .war-text-col p {
            font-size: 16px;
            line-height: 1.8;
            opacity: 0.95;
            text-align: justify;
         }

         /* 文字区域滚动条美化 */
         .war-text-col::-webkit-scrollbar {
            width: 6px;
         }
         .war-text-col::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 3px;
         }

         /* =========================================
            4. 底部导航条 (带左右箭头的横向滚动)
            ========================================= */
         
         /* 外层包裹器：包含 左箭头 + 列表 + 右箭头 */
         .war-nav-wrapper {
            display: flex;
            align-items: center; /* 垂直居中 */
            margin-top: 40px;
            position: relative;
            background: #f0f0f0; /* 轨道背景色 */
            border-radius: 4px;
            padding: 8px; /* 内边距 */
         }

         /* 中间的滚动列表 */
         .war-nav-tabs {
            border-bottom: none;
            margin: 0;
            
            display: flex;
            flex-wrap: nowrap;     /* 绝不换行 */
            overflow-x: auto;      /* 允许横向滚动 */
            scroll-behavior: smooth; /* 平滑滚动 */
            
            flex-grow: 1;          /* 占据中间所有空间 */
            
            /* 隐藏滚动条 */
            -ms-overflow-style: none;  /* IE/Edge */
            scrollbar-width: none;     /* Firefox */
         }
         
         /* 隐藏 Chrome/Safari 的滚动条 */
         .war-nav-tabs::-webkit-scrollbar {
            display: none;
         }
         
         .war-nav-tabs .nav-item {
            flex: 0 0 auto; /* 防止被挤压 */
            margin: 0 5px;
         }

         /* 每一个地标按钮样式 */
         .war-nav-tabs .nav-link {
            border: none;
            background: #fff;
            color: #555;
            border-radius: 0;
            padding: 12px 25px 12px 15px; /* 右侧留空给箭头尖端 */
            position: relative;
            font-weight: bold;
            white-space: nowrap; /* 文字不换行 */
            
            /* 箭头形状 */
            clip-path: polygon(0% 0%, 90% 0%, 100% 50%, 90% 100%, 0% 100%);
            transition: all 0.3s;
         }
         
         /* 选中和悬停状态 */
         .war-nav-tabs .nav-link.active, 
         .war-nav-tabs .nav-link:hover {
            background: #d93025;
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
         }

         /* 左右控制按钮样式 */
         .war-scroll-btn {
            background: #333;
            color: #fff;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: background 0.3s, transform 0.2s;
            flex-shrink: 0; /* 防止按钮变形 */
         }

         .war-scroll-btn:hover {
            background: #d93025;
            transform: scale(1.1);
         }
         
         .war-scroll-btn i {
            font-size: 18px;
         }
         
         /* 按钮间距 */
         .left-btn { margin-right: 10px; }
         .right-btn { margin-left: 10px; }

      </style>

      <div class="war-map-section" id="landmarks">
         <div class="container">
            <!-- 标题 -->
            <div class="row">
                  <div class="col-lg-12">
                     <div class="witr_section_title_inner text-center">
                        <h2>LANDMARKS</h2>
                        <h3>抗战地标展示</h3>
                     </div>
                  </div>
            </div>

            <!-- 内容区域 (Tab Content) -->
            <div class="row justify-content-center">
                  <div class="col-lg-12">
                     <div class="tab-content" id="warMapTabContent">
                        <?php foreach ($locations as $index => $location): ?>
                              <?php 
                                 // 默认第一项显示为 active
                                 $isActive = ($index === 0) ? 'show active' : ''; 
                                 // 假设图片路径为 images/locations/ID.jpg，如果没有则显示默认图
                                 $imgUrl = Url::to('@web/images/loc_' . $location->id . '.jpg');
                                 // 这里可以加一个判断文件是否存在的逻辑，或者前端onerror处理
                              ?>
                              <div class="tab-pane fade <?= $isActive ?>" id="loc-<?= $location->id ?>" role="tabpanel">
                                 <div class="war-content-box row no-gutters">
                                    <!-- 左侧图片 -->
                                    <div class="col-md-7 war-img-col">
                                          <!-- 使用 onerror 防止图片缺失导致裂图 -->
                                          <img src="<?= $imgUrl ?>" alt="<?= Html::encode($location->name) ?>" onerror="this.src='<?= Url::to('@web/images/default-war.jpg') ?>'">
                                    </div>
                                    <!-- 右侧文字 -->
                                    <div class="col-md-5 war-text-col">
                                          <h2><?= Html::encode($location->name) ?></h2>
                                          <h4>战役：<?= Html::encode($location->battle_name) ?></h4>
                                          <p><?= Html::encode($location->intro) ?></p>
                                          
                                          <div style="margin-top: 20px; font-size: 14px; opacity: 0.8;">
                                             <i class="icofont-location-pin"></i> 
                                             经度: <?= $location->longitude ?> | 纬度: <?= $location->latitude ?>
                                          </div>
                                    </div>
                                 </div>
                              </div>
                        <?php endforeach; ?>
                     </div>
                  </div>
            </div>

            <!-- 底部导航 (Nav Tabs) -->
            <!-- 底部导航 (带左右箭头) -->
            <div class="row">
               <div class="col-12">
                  <!-- 新增的外层包裹器，用于放置箭头和列表 -->
                  <div class="war-nav-wrapper">
                        
                        <!-- 左侧箭头按钮 -->
                        <button class="war-scroll-btn left-btn" onclick="scrollWarTabs('left')">
                           &#10094;
                        </button>

                        <!-- 列表容器 -->
                        <ul class="nav nav-tabs war-nav-tabs" id="warMapTabList" role="tablist">
                           <?php foreach ($locations as $index => $location): ?>
                              <?php $isActive = ($index === 0) ? 'active' : ''; ?>
                              <li class="nav-item">
                                    <a class="nav-link <?= $isActive ?>" 
                                       id="tab-<?= $location->id ?>" 
                                       data-toggle="tab" 
                                       href="#loc-<?= $location->id ?>" 
                                       role="tab" 
                                       aria-controls="loc-<?= $location->id ?>" 
                                       aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
                                       <?= Html::encode($location->name) ?>
                                    </a>
                              </li>
                           <?php endforeach; ?>
                        </ul>

                        <!-- 右侧箭头按钮 -->
                        <button class="war-scroll-btn right-btn" onclick="scrollWarTabs('right')">
                           &#10095;
                        </button>
                        
                  </div>
               </div>
            </div>
            
         </div>
      </div>

      <script>
         function scrollWarTabs(direction) {
            // 获取列表元素
            var container = document.getElementById('warMapTabList');
            
            // 设定每次滚动的距离 (像素)
            var scrollAmount = 200; 
            
            if (direction === 'left') {
                  container.scrollLeft -= scrollAmount;
            } else {
                  container.scrollLeft += scrollAmount;
            }
         }
      </script>
      <!-- end 抗战地标展示 -->

      <!-- 抗战大事记（横向时间轴） -->
      <div id="events">
      <?php /* @var $timelineEvents common\models\HistoryTimeline[] */ ?>
      <?php if (!empty($timelineEvents)): ?>
      <?php
         $timelineFallbackImg = Url::to('@web/images/918.jpg');

         /**
          * 根据日期（月-日）映射到本地图片文件名
          */
         $dateToImageMap = [
            '07-07' => '77.jpg',      // 七七事变
            '03-16' => '316.jpeg',    // 台儿庄战役
            '08-13' => '813.jpeg',    // 淞沪会战
            '08-15' => '815.jpg',     // 日本投降
            '08-20' => '820.jpg',     // 百团大战
            '09-02' => '902.jpg',     // 正式签署投降书
            '09-09' => '909.jpg',     // 中国战区受降
            '12-13' => '1213.jpg',    // 南京大屠杀
         ];

         /**
          * Build an image URL from DB value:
          * - supports external URLs (http/https)
          * - supports local relative paths/filenames (relative to frontend/web/images)
          * If empty/invalid -> fallback.
          */
         $toLocalImageUrl = function($val) use ($timelineFallbackImg) {
            $val = trim((string)$val);
            if ($val === '') return $timelineFallbackImg;
            if (preg_match('/^https?:\/\//i', $val)) return $val;
            // encode each path segment (supports "a/b.jpg" while keeping "/")
            $segments = array_map('rawurlencode', array_filter(explode('/', str_replace('\\', '/', $val)), 'strlen'));
            $safe = implode('/', $segments);
            if ($safe === '') return $timelineFallbackImg;
            return Url::to('@web/images/' . $safe);
         };

         $timelineData = [];
         foreach ($timelineEvents as $e) {
            $y = (int)($e->event_year ?? 0);
            $md = trim((string)($e->event_month_day ?? ''));
            $dateLabel = $y ? ($md ? ($y . '-' . $md) : (string)$y) : ($md ?: '');

            // DB migration compatibility:
            // - new schema: summary (small card) + content (big panel)
            // - old schema: description (use as summary, and content falls back to summary)
            $summary = (string)($e->getAttribute('summary') ?? '');
            if ($summary === '') $summary = (string)($e->getAttribute('description') ?? '');
            $content = (string)($e->getAttribute('content') ?? '');
            if ($content === '') $content = $summary;

            // 根据日期优先使用本地图片映射
            $imageUrl = $timelineFallbackImg;
            if (!empty($md) && isset($dateToImageMap[$md])) {
               // 如果日期在映射表中，使用对应的本地图片
               $imageUrl = Url::to('@web/images/' . $dateToImageMap[$md]);
            } else {
               // 否则使用数据库中的图片字段（可能是外链或本地文件名）
               $imageUrl = $toLocalImageUrl($e->image);
            }

            $timelineData[] = [
               'id' => (int)$e->id,
               'year' => $y,
               'monthDay' => $md,
               'date' => $dateLabel,
               'title' => (string)($e->title ?? ''),
               'summary' => $summary,
               'content' => $content,
               'imageUrl' => $imageUrl,
            ];
         }
      ?>

      <style>
         .timeline-section{
            background: #f9f9f9;
            padding: 70px 0 80px;
            font-family: "Microsoft YaHei", "Heiti SC", sans-serif;
         }
         .timeline-wrap{
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 12px 36px rgba(0,0,0,.08);
            overflow: hidden;
            border: 1px solid rgba(217,48,37,.08);
         }

         /* Top rail (timeline) */
         .timeline-rail{
            display:flex;
            align-items:center;
            gap: 12px;
            padding: 18px 18px 14px;
            background: linear-gradient(135deg, rgba(217,48,37,.08) 0%, rgba(255,75,31,.06) 100%);
            border-bottom: 1px solid rgba(0,0,0,.06);
            position: relative; /* anchor for hover popover */
         }
         .timeline-arrow{
            width: 40px;
            height: 40px;
            border-radius: 999px;
            border: 1px solid rgba(0,0,0,.08);
            background:#fff;
            color:#333;
            cursor:pointer;
            flex: 0 0 auto;
            display:flex;
            align-items:center;
            justify-content:center;
            transition: transform .15s ease, background .2s ease, border-color .2s ease;
            user-select:none;
         }
         .timeline-arrow:hover{
            transform: scale(1.06);
            border-color: rgba(217,48,37,.35);
            color: #d93025;
         }
         .timeline-arrow:active{ transform: scale(.98); }

         /* Scroller: looks like a real timeline (a single horizontal line + dots) */
         .timeline-scroller{
            flex: 1 1 auto;
            position: relative;
            display:flex;
            gap: 22px;
            overflow-x:auto;
            padding: 8px 8px 18px;
            scroll-behavior: smooth;
            -ms-overflow-style: none;
            scrollbar-width: none;
            scroll-snap-type: x mandatory;
            /* draw the timeline line as a background so it never scrolls away */
            background-image: linear-gradient(90deg, rgba(217,48,37,.22) 0%, rgba(217,48,37,.10) 45%, rgba(217,48,37,.18) 100%);
            background-repeat: no-repeat;
            background-size: calc(100% - 20px) 4px;
            background-position: 10px 30px;
         }
         .timeline-scroller::-webkit-scrollbar{ display:none; }
         .timeline-scroller::before{ content:""; }

         .timeline-node{
            flex: 0 0 auto;
            scroll-snap-align: center;
            width: 180px;
            cursor:pointer;
            position:relative;
            padding-top: 8px; /* space above content */
            transition: transform .18s ease;
         }
         .timeline-node:hover{ transform: translateY(-2px); }

         /* the dot sits on the line */
         .timeline-dot{
            position:absolute;
            left: 18px;
            top: 22px;
            width: 18px;
            height: 18px;
            border-radius: 999px;
            background: #fff;
            border: 3px solid rgba(217,48,37,.35);
            box-shadow: 0 6px 16px rgba(0,0,0,.12);
            transition: transform .18s ease, border-color .18s ease, box-shadow .18s ease;
            z-index: 2;
         }
         .timeline-node.is-active .timeline-dot{
            border-color: rgba(217,48,37,.95);
            box-shadow: 0 10px 22px rgba(217,48,37,.22);
            transform: scale(1.12);
         }
         .timeline-node::after{
            content:"";
            position:absolute;
            left: 26px;
            top: 31px;
            width: 2px;
            height: 14px;
            background: rgba(217,48,37,.25);
            border-radius: 99px;
         }
         .timeline-node.is-active::after{ background: rgba(217,48,37,.65); }

         .timeline-meta{
            padding-left: 46px;
            padding-top: 34px; /* push below the line */
         }
         .timeline-year{
            font-weight: 900;
            color: #d93025;
            font-size: 18px;
            line-height: 1.1;
            height: 22px;
         }
         .timeline-date{
            font-size: 12px;
            color:#666;
            margin-top: 2px;
         }
         .timeline-title{
            margin-top: 8px;
            font-size: 14px;
            font-weight: 800;
            color:#222;
            line-height: 1.35;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 38px;
            background: rgba(255,255,255,.86);
            border: 1px solid rgba(0,0,0,.06);
            border-radius: 10px;
            padding: 10px 10px;
            transition: border-color .18s ease, box-shadow .18s ease, background .18s ease;
         }
         .timeline-node:hover .timeline-title{
            border-color: rgba(217,48,37,.25);
            box-shadow: 0 10px 22px rgba(0,0,0,.08);
         }
         .timeline-node.is-active .timeline-title{
            background: rgba(217,48,37,.06);
            border-color: rgba(217,48,37,.35);
            box-shadow: 0 12px 26px rgba(217,48,37,.12);
         }

         /* Hover popover (image + 2-line summary), prefer above the node */
         .timeline-pop{
            position:absolute;
            top: 0;
            left: 0;
            width: 340px;
            max-width: min(360px, calc(100vw - 40px));
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,.10);
            box-shadow: 0 18px 50px rgba(0,0,0,.18);
            background: rgba(255,255,255,.98);
            z-index: 30;
            pointer-events: none;

            opacity: 0;
            visibility: hidden;
            transform: translateY(8px) scale(.985);
            transition: opacity .18s ease, transform .18s ease, visibility 0s linear .18s;
            will-change: transform, opacity;

            /* arrow anchor position */
            --arrow-x: 50%;
         }
         .timeline-pop.is-open{
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
            transition: opacity .18s ease, transform .18s ease;
         }
         .timeline-pop::after{
            content:"";
            position:absolute;
            left: var(--arrow-x);
            bottom: -10px;
            width: 18px;
            height: 18px;
            background: rgba(255,255,255,.98);
            border-right: 1px solid rgba(0,0,0,.10);
            border-bottom: 1px solid rgba(0,0,0,.10);
            transform: translateX(-50%) rotate(45deg);
         }
         .timeline-pop.is-below::after{
            top: -10px;
            bottom: auto;
            border-right: none;
            border-bottom: none;
            border-left: 1px solid rgba(0,0,0,.10);
            border-top: 1px solid rgba(0,0,0,.10);
         }
         .timeline-pop-inner{
            display: grid;
            grid-template-columns: 120px 1fr;
            min-height: 96px;
         }
         .timeline-pop-media{
            position: relative;
            overflow: hidden;
            background: #111;
         }
         .timeline-pop-media .bg{
            position:absolute; inset:0;
            background-size: cover;
            background-position:center;
            filter: blur(12px);
            transform: scale(1.2);
            opacity: .95;
         }
         .timeline-pop-media .shade{
            position:absolute; inset:0;
            background: linear-gradient(180deg, rgba(0,0,0,.35) 0%, rgba(0,0,0,.70) 100%);
         }
         .timeline-pop-media img{
            position:absolute; inset:0;
            width:100%; height:100%;
            object-fit: contain;
            padding: 10px;
            z-index: 2;
            filter: drop-shadow(0 10px 18px rgba(0,0,0,.35));
         }
         .timeline-pop-body{
            padding: 12px 12px 12px 12px;
         }
         .timeline-pop-date{
            font-weight: 800;
            font-size: 12px;
            color: #d93025;
            letter-spacing: .3px;
         }
         .timeline-pop-title{
            margin-top: 4px;
            font-size: 14px;
            font-weight: 900;
            color: #1d1d1d;
            line-height: 1.25;
         }
         .timeline-pop-desc{
            margin-top: 6px;
            font-size: 13px;
            line-height: 1.55;
            color: #444;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 40px;
         }

         /* Detail card (Scheme C) */
         .timeline-detail{
            display:grid;
            grid-template-columns: 420px 1fr;
            gap: 0;
            align-items: stretch;
            min-height: 320px;
         }
         @media (max-width: 991px){
            .timeline-detail{ grid-template-columns: 1fr; }
         }
         .timeline-media{
            position: relative;
            overflow: hidden;
            min-height: 320px;
            background: #111;
         }
         .timeline-media .bg{
            position:absolute; inset:0;
            background-size: cover;
            background-position:center;
            filter: blur(18px);
            transform: scale(1.15);
            opacity: .9;
         }
         .timeline-media .shade{
            position:absolute; inset:0;
            background: linear-gradient(180deg, rgba(0,0,0,.35) 0%, rgba(0,0,0,.65) 100%);
            transition: background .25s ease;
         }
         .timeline-wrap:hover .timeline-media .shade{
            background: linear-gradient(180deg, rgba(0,0,0,.5) 0%, rgba(0,0,0,.78) 100%);
         }
         .timeline-media img{
            position:absolute; inset:0;
            width:100%; height:100%;
            object-fit: contain;
            padding: 22px;
            z-index: 2;
            filter: drop-shadow(0 18px 30px rgba(0,0,0,.35));
         }

         .timeline-text{
            padding: 28px 28px 26px;
            background: #fff;
         }
         .timeline-text .kicker{
            display:inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(217,48,37,.08);
            color:#d93025;
            font-weight: 700;
            font-size: 13px;
         }
         .timeline-text h3{
            margin: 12px 0 10px;
            font-size: 28px;
            font-weight: 900;
            color:#1d1d1d;
         }
         .timeline-text p{
            margin: 0;
            font-size: 16px;
            line-height: 1.85;
            color:#333;
            text-align: justify;
         }
      </style>

      <div class="timeline-section">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="witr_section_title_inner text-center">
                     <h2>HISTORY</h2>
                     <h3>抗战大事记</h3>
                  </div>
               </div>
            </div>

            <div class="row justify-content-center">
               <div class="col-lg-12">
                  <div class="timeline-wrap" id="historyTimeline" data-fallback="<?= Html::encode($timelineFallbackImg) ?>">
                     <div class="timeline-rail">
                        <button type="button" class="timeline-arrow" data-dir="left" aria-label="上一条">&#10094;</button>
                        <div class="timeline-scroller" id="historyTimelineScroller" aria-label="抗战大事记时间轴"></div>
                        <button type="button" class="timeline-arrow" data-dir="right" aria-label="下一条">&#10095;</button>

                        <!-- hover popover (prefer above; auto flip to below) -->
                        <div class="timeline-pop" id="historyTimelinePop" aria-hidden="true">
                           <div class="timeline-pop-inner">
                              <div class="timeline-pop-media">
                                 <div class="bg" id="historyTimelinePopBg"></div>
                                 <div class="shade"></div>
                                 <img id="historyTimelinePopImg" src="<?= Html::encode($timelineFallbackImg) ?>" alt="事件预览" loading="lazy" decoding="async" referrerpolicy="no-referrer">
                              </div>
                              <div class="timeline-pop-body">
                                 <div class="timeline-pop-date" id="historyTimelinePopDate">—</div>
                                 <div class="timeline-pop-title" id="historyTimelinePopTitle">—</div>
                                 <div class="timeline-pop-desc" id="historyTimelinePopDesc">—</div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="timeline-detail">
                        <div class="timeline-media">
                           <div class="bg" id="historyTimelineBg"></div>
                           <div class="shade"></div>
                           <img id="historyTimelineImg" src="<?= Html::encode($timelineFallbackImg) ?>" alt="抗战大事记" loading="lazy" decoding="async" referrerpolicy="no-referrer">
                        </div>
                        <div class="timeline-text">
                           <span class="kicker" id="historyTimelineDate">—</span>
                           <h3 id="historyTimelineTitle">—</h3>
                           <p id="historyTimelineDesc">—</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script>
      (function(){
         var data = <?= json_encode($timelineData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?> || [];
         if (!data.length) return;

         var root = document.getElementById('historyTimeline');
         var rail = root ? root.querySelector('.timeline-rail') : null;
         var scroller = document.getElementById('historyTimelineScroller');
         var elBg = document.getElementById('historyTimelineBg');
         var elImg = document.getElementById('historyTimelineImg');
         var elDate = document.getElementById('historyTimelineDate');
         var elTitle = document.getElementById('historyTimelineTitle');
         var elDesc = document.getElementById('historyTimelineDesc');

         var pop = document.getElementById('historyTimelinePop');
         var popBg = document.getElementById('historyTimelinePopBg');
         var popImg = document.getElementById('historyTimelinePopImg');
         var popDate = document.getElementById('historyTimelinePopDate');
         var popTitle = document.getElementById('historyTimelinePopTitle');
         var popDesc = document.getElementById('historyTimelinePopDesc');

         var fallback = root ? root.getAttribute('data-fallback') : '';
         var currentIndex = 0;
         var showTimer = null;
         var hideTimer = null;
         var lastHoverIndex = null;

         function safeUrl(u){
            if (!u || typeof u !== 'string') return fallback;
            u = u.trim();
            // allow http/https external urls and same-origin absolute/relative paths
            if (/^https?:\/\//i.test(u)) return u;
            if (u.startsWith('/')) return u;
            // block other schemes (e.g. javascript:) by falling back
            return fallback;
         }

         function setImage(url){
            var u = safeUrl(url) || fallback;
            if (elImg) {
               elImg.onerror = function(){
                  elImg.onerror = null;
                  elImg.src = fallback;
                  if (elBg) elBg.style.backgroundImage = "url('" + fallback + "')";
               };
               elImg.src = u;
            }
            if (elBg) elBg.style.backgroundImage = "url('" + (u || fallback) + "')";
         }

         function setActive(idx, fromClick){
            if (idx < 0) idx = 0;
            if (idx > data.length - 1) idx = data.length - 1;
            currentIndex = idx;
            var item = data[idx] || {};

            if (elDate) elDate.textContent = item.date || '—';
            if (elTitle) elTitle.textContent = item.title || '—';
            if (elDesc) elDesc.textContent = item.content || item.summary || '—';
            setImage(item.imageUrl);

            // active class
            var nodes = scroller ? scroller.querySelectorAll('.timeline-node') : [];
            nodes.forEach(function(n){ n.classList.remove('is-active'); });
            var active = scroller ? scroller.querySelector('.timeline-node[data-index="' + idx + '"]') : null;
            if (active) active.classList.add('is-active');

            // center the active node
            if (active && scroller && (fromClick !== false)) {
               try { active.scrollIntoView({behavior: 'smooth', inline: 'center', block: 'nearest'}); } catch(e) {}
            }
         }

         function clamp(n, min, max){
            return Math.max(min, Math.min(max, n));
         }

         function hidePop(immediate){
            if (!pop) return;
            clearTimeout(showTimer);
            clearTimeout(hideTimer);
            var doHide = function(){
               pop.classList.remove('is-open');
               pop.setAttribute('aria-hidden', 'true');
            };
            if (immediate) doHide();
            else hideTimer = setTimeout(doHide, 120);
         }

         function showPop(idx, anchorEl){
            if (!pop || !rail || !anchorEl) return;
            clearTimeout(hideTimer);
            clearTimeout(showTimer);
            showTimer = setTimeout(function(){
               var item = data[idx] || {};
               lastHoverIndex = idx;

               if (popDate) popDate.textContent = item.date || '—';
               if (popTitle) popTitle.textContent = item.title || '—';
               if (popDesc) popDesc.textContent = item.summary || item.content || '—';

               var imgUrl = safeUrl(item.imageUrl) || fallback;
               if (popImg) {
                  popImg.onerror = function(){
                     popImg.onerror = null;
                     popImg.src = fallback;
                     if (popBg) popBg.style.backgroundImage = "url('" + fallback + "')";
                  };
                  popImg.src = imgUrl;
               }
               if (popBg) popBg.style.backgroundImage = "url('" + imgUrl + "')";

               // measure + position (prefer above, auto flip)
               pop.classList.remove('is-below');
               pop.style.left = '0px';
               pop.style.top = '0px';
               pop.style.setProperty('--arrow-x', '50%');
               pop.classList.add('is-open');
               pop.setAttribute('aria-hidden', 'false');

               // Wait a frame to ensure dimensions are correct
               requestAnimationFrame(function(){
                  var railRect = rail.getBoundingClientRect();
                  var nodeRect = anchorEl.getBoundingClientRect();
                  var popRect = pop.getBoundingClientRect();

                  var anchorX = (nodeRect.left + nodeRect.width / 2) - railRect.left;
                  var left = anchorX - popRect.width / 2;
                  left = clamp(left, 8, railRect.width - popRect.width - 8);

                  var aboveTop = (nodeRect.top - railRect.top) - popRect.height - 12;
                  var top = aboveTop;
                  var isBelow = false;
                  if (top < 6) {
                     top = (nodeRect.bottom - railRect.top) + 12;
                     isBelow = true;
                  }

                  pop.style.left = left + 'px';
                  pop.style.top = top + 'px';
                  pop.classList.toggle('is-below', isBelow);

                  var arrowX = anchorX - left;
                  arrowX = clamp(arrowX, 18, popRect.width - 18);
                  pop.style.setProperty('--arrow-x', arrowX + 'px');
               });
            }, 150);
         }

         function render(){
            if (!scroller) return;
            scroller.innerHTML = '';
            var lastYear = null;
            data.forEach(function(item, idx){
               var year = item.year || null;
               var showYear = (year && year !== lastYear);
               if (showYear) lastYear = year;

               var node = document.createElement('div');
               node.className = 'timeline-node';
               node.setAttribute('role', 'button');
               node.setAttribute('tabindex', '0');
               node.setAttribute('data-index', String(idx));
               node.innerHTML =
                  '<span class="timeline-dot"></span>' +
                  '<div class="timeline-meta">' +
                    (showYear ? ('<div class="timeline-year">' + (year || '') + '</div>') : '<div class="timeline-year" style="opacity:0">0</div>') +
                    '<div class="timeline-date">' + (item.date || '') + '</div>' +
                    '<div class="timeline-title">' + (item.title || '') + '</div>' +
                  '</div>';

               node.addEventListener('click', function(){ setActive(idx, true); });
               node.addEventListener('keydown', function(e){
                  if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); setActive(idx, true); }
               });

               node.addEventListener('mouseenter', function(){ showPop(idx, node); });
               node.addEventListener('mouseleave', function(){ hidePop(false); });
               node.addEventListener('focus', function(){ showPop(idx, node); });
               node.addEventListener('blur', function(){ hidePop(false); });

               scroller.appendChild(node);
            });
         }

         function bindArrows(){
            if (!root) return;
            root.querySelectorAll('.timeline-arrow').forEach(function(btn){
               btn.addEventListener('click', function(){
                  var dir = btn.getAttribute('data-dir');
                  if (dir === 'left') setActive(currentIndex - 1, true);
                  else setActive(currentIndex + 1, true);
               });
            });
         }

         function bindKeyboard(){
            // left/right keys
            document.addEventListener('keydown', function(e){
               if (!root) return;
               // don't hijack when typing in inputs
               var tag = (e.target && e.target.tagName) ? e.target.tagName.toLowerCase() : '';
               if (tag === 'input' || tag === 'textarea') return;
               if (e.key === 'ArrowLeft') setActive(currentIndex - 1, true);
               if (e.key === 'ArrowRight') setActive(currentIndex + 1, true);
            });
         }

         function bindPopDismiss(){
            if (!scroller) return;
            // hide on scroll/resize to avoid mis-position
            scroller.addEventListener('scroll', function(){ hidePop(true); }, {passive: true});
            window.addEventListener('resize', function(){ hidePop(true); }, {passive: true});
            // hide when leaving the rail area
            if (rail) {
               rail.addEventListener('mouseleave', function(){ hidePop(false); });
            }
         }

         render();
         bindArrows();
         bindKeyboard();
         bindPopDismiss();
         // default: first item (1931-09-18)
         setActive(0, false);
      })();
      </script>
      <?php endif; ?>
      <!-- end 抗战大事记 -->

      <!-- lorw blog area (改为四列海报展示，悬浮显示简介蒙版) -->
      <div class="lorw_blog_area" id="memories">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="witr_section_title">
                     <div class="witr_section_title_inner text-center">
                        <h2>MOVIES</h2>
                        <h3>烽火记忆</h3>
                     </div>
                  </div>
               </div>
            </div>

            <style>
               /* 使用原模板类，增强蒙版与简介显示（仅悬浮显示） */
               .lorw_blog_area .witr_sb_thumb:before { background: rgba(0,0,0,0.75); }
               .witr_sb_thumb { border-radius:6px; overflow:hidden; }
               .witr_sb_thumb img { width:100%; height:420px; object-fit:cover; }
               @media (max-width:991px){ .witr_sb_thumb img{height:320px;} }
               @media (max-width:575px){ .witr_sb_thumb img{height:240px;} }
               .witr_sb_thumb .film-summary{
                  position:absolute; left:0; right:0; top:0; bottom:0;
                  padding:16px 16px 40px; color:#fff; z-index:3; opacity:0; transition:opacity .25s;
                  overflow-y:auto; -webkit-overflow-scrolling: touch; touch-action: pan-y;
                  line-height:1.6; font-size:14px; white-space:normal; word-break:break-word; overflow-wrap:anywhere;
               }
               .witr_sb_thumb .film-summary.has-more::after{
                  position:absolute; left:0; right:0; bottom:8px; text-align:center;
                  font-size:12px; opacity:.85; color:#fff; pointer-events:none;
               }
               .busi_singleBlog:hover .witr_sb_thumb .film-summary{ opacity:1; }
               .busi_singleBlog:hover .witr_blog_con h2 a{ color:#8B1A1A; }
            </style>

            <div class="row">
               <div class="col-lg-12">
                  <div class="witr_blog_area11">
                     <div class="film-carousel blog_active">
                        <?php if (!empty($movies) && is_array($movies)): ?>
                           <?php foreach ($movies as $movie): ?>
                              <?php
                                 $poster = isset($movie->poster) ? $movie->poster : 'default-poster.jpg';
                                 $imgUrl = preg_match('/^https?:/i', $poster) ? $poster : Url::to('@web/images/' . $poster);
                                 $summary = isset($movie->summary) ? $movie->summary : '';
                                 $link = isset($movie->url) ? $movie->url : Url::to(['/site/movie', 'id' => $movie->id ?? '']);
                              ?>
                              <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12">
                                 <div class="busi_singleBlog all_blog_color">
                                    <div class="witr_sb_thumb">
                                       <a href="<?= $link ?>">
                                          <img src="<?= $imgUrl ?>" alt="<?= Html::encode($movie->title ?? 'Poster') ?>">
                                       </a>
                                       <div class="film-summary"><?= nl2br(Html::encode((string)$summary)) ?></div>
                                       <div class="witr_post_meta9"></div>
                                    </div>
                                    <div class="witr_blog_con bs5">
                                       <h2><a href="<?= $link ?>"><?= Html::encode($movie->title ?? 'Untitled') ?></a></h2>
                                    </div>
                                 </div>
                              </div>
                           <?php endforeach; ?>
                        <?php else: ?>
                           <!-- fallback: 使用原模板的静态示例结构 -->
                           <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12">
                              <div class="busi_singleBlog all_blog_color">
                                 <div class="witr_sb_thumb">
                                    <a href="#"><img src="<?= Url::to('@web/images/blogs1.jpg') ?>" alt="image"></a>
                                    <div class="film-summary">Exercitation photo booth stumptown to banksy, elit small batch freegan — How to Attain Process Automation</div>
                                    <div class="witr_post_meta9"></div>
                                 </div>
                                 <div class="witr_blog_con bs5"><h2><a href="#">How will you know success when it shows</a></h2></div>
                              </div>
                           </div>
                           <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12">
                              <div class="busi_singleBlog all_blog_color">
                                 <div class="witr_sb_thumb">
                                    <a href="#"><img src="<?= Url::to('@web/images/blogs2.jpg') ?>" alt="image"></a>
                                    <div class="film-summary">Exercitation photo booth stumptown to banksy, elit small batch freegan — How to Attain Process Automation</div>
                                    <div class="witr_post_meta9"></div>
                                 </div>
                                 <div class="witr_blog_con bs5"><h2><a href="#">Industrial Branch Of Engineering.</a></h2></div>
                              </div>
                           </div>
                           <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12">
                              <div class="busi_singleBlog all_blog_color">
                                 <div class="witr_sb_thumb">
                                    <a href="#"><img src="<?= Url::to('@web/images/blogs3.jpg') ?>" alt="image"></a>
                                    <div class="film-summary">Exercitation photo booth stumptown to banksy, elit small batch freegan — How to Attain Process Automation</div>
                                    <div class="witr_post_meta9"></div>
                                 </div>
                                 <div class="witr_blog_con bs5"><h2><a href="#">It is a long established fact a reader will be</a></h2></div>
                              </div>
                           </div>
                           <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12">
                              <div class="busi_singleBlog all_blog_color">
                                 <div class="witr_sb_thumb">
                                    <a href="#"><img src="<?= Url::to('@web/images/blogs4.jpg') ?>" alt="image"></a>
                                    <div class="film-summary">Exercitation photo booth stumptown to banksy, elit small batch freegan — How to Attain Process Automation</div>
                                    <div class="witr_post_meta9"></div>
                                 </div>
                                 <div class="witr_blog_con bs5"><h2><a href="#">Carousel Of Colors In Cinq This Terre Beach.</a></h2></div>
                              </div>
                           </div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
            <?php $this->registerJs(<<<'JS'
               jQuery(window).on('load', function(){
                  var $c = jQuery('.film-carousel');
                  if(!$c.length) return;
                  if($c.hasClass('slick-initialized')){ try{ $c.slick('unslick'); }catch(e){}
                  }
                  $c.slick({
                     infinite:true,
                     autoplay:true,
                     autoplaySpeed:3000,
                     speed:1000,
                     slidesToShow:4,
                     slidesToScroll:1,
                     arrows:true,
                     dots:false,
                     responsive:[
                        { breakpoint:1200, settings:{slidesToShow:3} },
                        { breakpoint:992, settings:{slidesToShow:2} },
                        { breakpoint:767, settings:{slidesToShow:1} }
                     ]
                  });
                  function updateFilmSummaryHints(){
                     jQuery('.film-carousel .film-summary').each(function(){
                        var el = this;
                        var hasMore = el.scrollHeight > el.clientHeight + 2;
                        el.classList.toggle('has-more', hasMore);
                     });
                  }
                  updateFilmSummaryHints();
                  $c.on('setPosition afterChange', updateFilmSummaryHints);
                  jQuery(window).on('resize', updateFilmSummaryHints);
               });
            JS
            ); ?>
         </div>
      </div>
      <!-- counter area css -->
      <style>
         /* restore counter icons to gold */
         .witr_counter_single .witr_counter_icon i { color: #a6906c !important; }
      </style>
      <div class="lorw_counter_area">
         <div class="container">
            <div class="row justify-content-center">
               <!-- 1 single counter -->
               <div class="col-lg-3 col-md-6">
                  <div class="witr_counter_single all_counter_color <?= (!empty($userTributes[1]) ? 'tribute-active' : '') ?>">
                     <div class="witr_counter_icon">
                        <i class="icofont icofont-flora-flower" data-tribute-type="1"></i>
                     </div>
                     <div class="witr_counter_number_inn">
                           <h3 class="counter"><?= (int)($tributeCounts[1] ?? 0) ?></h3>
                           <h4>献花致敬</h4>
                     </div>
                  </div>
               </div>
               <!-- 2 single counter -->
               <div class="col-lg-3 col-md-6">
                  <div class="witr_counter_single all_counter_color <?= (!empty($userTributes[2]) ? 'tribute-active' : '') ?>">
                     <div class="witr_counter_icon">
                        <i class="icofont icofont-flame-torch" data-tribute-type="2"></i>
                     </div>
                     <div class="witr_counter_number_inn">
                           <h3 class="counter"><?= (int)($tributeCounts[2] ?? 0) ?></h3>
                           <h4>燃烛追思</h4>
                     </div>
                  </div>
               </div>
               <!-- 3 single counter -->
               <div class="col-lg-3 col-md-6">
                  <div class="witr_counter_single all_counter_color <?= (!empty($userTributes[3]) ? 'tribute-active' : '') ?>">
                     <div class="witr_counter_icon">
                        <i class="icofont icofont-glass" data-tribute-type="3"></i>
                     </div>
                     <div class="witr_counter_number_inn">
                           <h3 class="counter"><?= (int)($tributeCounts[3] ?? 0) ?></h3>
                           <h4>敬献清酌</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div><!-- contact area css -->
<style>
#submit-btn:hover { background-color: #a6906c !important; }
</style>
      <div class="lorw_contact_area" id="memorial">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6 witr_all_pd0">
                  <div class="contact_left_inner">
                     <h2>缅怀与传承</h2>
                     <!-- 纪念留言循环滚动区域 -->
                     <div class="memorial-scroll-container" style="height: 400px; overflow: hidden; position: relative;">
                        <div class="memorial-scroll-content" id="memorialScroll">
                           <?php if (!empty($messageBoard)): ?>
                              <?php foreach ($messageBoard as $msg): ?>
                                 <!-- 保持原有模板样式结构 -->
                                 <div class="em-service2 sright all_color_service memorial-item">
                                    <div class="em_service_content">
                                       <div class="em_single_service_text">
                                          <div class="text_box witr_s_flex">
                                             <div class="em-service-inner" style="flex: 1; padding-right: 15px;">
                                                <div class="em-service-desc">
                                                   <p><?= Html::encode(mb_strimwidth($msg['content'] ?? '', 0, 200, '...')) ?></p>
                                                </div>
                                             </div>
                                             <div class="service_top_text" style="flex: 0 0 auto; min-width: 80px; text-align: right;">
                                                <div class="memorial-name" style="color: #8d6e63; font-weight: bold; font-size: 14px;">
                                                   <?= Html::encode($msg['username'] ?? '匿名') ?>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              <?php endforeach; ?>
                              <!-- 复制一遍用于无缝循环 -->
                              <?php foreach ($messageBoard as $msg): ?>
                                 <div class="em-service2 sright all_color_service memorial-item">
                                    <div class="em_service_content">
                                       <div class="em_single_service_text">
                                          <div class="text_box witr_s_flex">
                                             <div class="em-service-inner" style="flex: 1; padding-right: 15px;">
                                                <div class="em-service-desc">
                                                   <p><?= Html::encode(mb_strimwidth($msg['content'] ?? '', 0, 200, '...')) ?></p>
                                                </div>
                                             </div>
                                             <div class="service_top_text" style="flex: 0 0 auto; min-width: 80px; text-align: right;">
                                                <div class="memorial-name" style="color: #8d6e63; font-weight: bold; font-size: 14px;">
                                                   <?= Html::encode($msg['username'] ?? '匿名') ?>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              <?php endforeach; ?>
                           <?php else: ?>
                              <div class="em-service2 sright all_color_service">
                                 <div class="em_service_content">
                                    <div class="em_single_service_text">
                                       <div class="text_box witr_s_flex">
                                          <div class="em-service-inner">
                                             <div class="em-service-desc">
                                                <p>暂无纪念留言</p>
                                             </div>
                                          </div>
                                          <div class="service_top_text">
                                             <div class="memorial-name" style="color: #8d6e63; font-weight: bold;">—</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           <?php endif; ?>
                        </div>
                     </div>

                     <!-- 滚动控制JS -->
                     <?php $this->registerJs(<<<'JS'
                        (function(){
                           var container = document.querySelector('.memorial-scroll-container');
                           var content = document.getElementById('memorialScroll');
                           if (!container || !content) return;
                           
                           var items = content.querySelectorAll('.memorial-item');
                           if (items.length === 0) return;
                           
                           var totalHeight = 0;
                           for (var i = 0; i < items.length / 2; i++) {
                              totalHeight += items[i].offsetHeight;
                           }
                           
                           var currentPos = 0;
                           var speed = 30; // 滚动速度(px/秒)
                           
                           function scroll() {
                              currentPos += speed / 60; // 60fps
                              if (currentPos >= totalHeight) {
                                 currentPos = 0;
                              }
                              content.style.transform = 'translateY(-' + currentPos + 'px)';
                           }
                           
                           var scrollTimer = setInterval(scroll, 1000/60);
                           
                           // 鼠标悬停暂停
                           container.addEventListener('mouseenter', function(){
                              clearInterval(scrollTimer);
                           });
                           
                           container.addEventListener('mouseleave', function(){
                              scrollTimer = setInterval(scroll, 1000/60);
                           });
                        })();
                     JS
                     ); ?>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 witr_all_pd0">
                  <div class="contact_inner">
                     <div class="apartment_area">
                        <div class="apartment_text">
                           <h1>Share Your Memory</h1>
                           <h2>岁月留声</h2>
                        </div>
                        <div class="witr_apartment_form">
                           <form action="<?= Url::to(['/site/submit-message']) ?>" method="post" id="contact-form">
                              <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">
                              <div class="row">
                                 <div class="col-lg-12 col-md-12">
                                    <div class="wr_form_box">
                                       <input type="text" name="name" placeholder="你的名字" maxlength="50" required>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-md-12">
                                    <div class="twr_form_box ">
                                       <textarea name="comment" placeholder="评论/留言" maxlength="500" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="submit-btn">提交</button>
                                 </div>
                                 <div class="col-lg-12 text-center">
                                    <p class="form-messege"></p>
                                 </div>
                              </div>
                           </form>
                        </div>
                        
                        <!-- 表单提交处理JavaScript -->
                        <?php $this->registerJs(<<<'JS'
                           $(document).ready(function(){
                              $('#contact-form').off('submit').on('submit', function(e){
                                 e.preventDefault();
                                 
                                 var $form = $(this);
                                 var $submitBtn = $('#submit-btn');
                                 var $message = $('.form-messege');
                                 
                                 // 禁用提交按钮，防止重复提交
                                 $submitBtn.prop('disabled', true).text('提交中...');
                                 $message.removeClass('text-success text-danger').text('');
                                 
                                 $.ajax({
                                    url: $form.attr('action'),
                                    type: 'POST',
                                    data: $form.serialize(),
                                    dataType: 'json',
                                    beforeSend: function(xhr){
                                       // 优先从表单隐藏域读取 CSRF token，兼容可能缺少 meta 标签的情况
                                       var csrfParam = '<?= Yii::$app->request->csrfParam ?>';
                                       var token = $form.find('input[name="' + csrfParam + '"]').val();
                                       if (!token) token = $('meta[name="csrf-token"]').attr('content');
                                       if (token) xhr.setRequestHeader('X-CSRF-Token', token);
                                    },
                                    success: function(response) {
                                       if (response.status === 'success') {
                                          // 显示成功弹窗（不刷新页面）
                                          $('#success-message').text(response.message);
                                          $('#successModal').css({'display': 'flex', 'align-items': 'center', 'justify-content': 'center'}).addClass('show');
                                          if ($('.modal-backdrop').length === 0) {
                                             $('<div class="modal-backdrop fade show" style="z-index: 9998;"></div>').appendTo('body');
                                          }
                                          $('body').addClass('modal-open').css('overflow', 'hidden');

                                          // 清空表单
                                          $form[0].reset();
                                       } else {
                                          $message.addClass('text-danger').text(response.message || '提交失败，请稍后重试');
                                       }
                                    },
                                    error: function() {
                                       $message.addClass('text-danger').text('网络错误，请稍后重试');
                                    },
                                    complete: function() {
                                       // 恢复提交按钮
                                       $submitBtn.prop('disabled', false).text('提交');
                                    }
                                 });
                              });
                              
                              // 不自动刷新页面：关闭弹窗仅隐藏并移除 backdrop
                              $(document).on('click', '#successConfirmBtn, #modalCloseBtn', function(e){
                                 e.preventDefault();
                                 e.stopPropagation();
                                 $('#successModal').css('display', 'none').removeClass('show');
                                 $('.modal-backdrop').remove();
                                 $('body').removeClass('modal-open').css('overflow', '');
                              });
                           });
                        JS
                        ); ?>
                     </div>
                  </div>
               </div>
            </div>
        </div>
      </div>
      
      <!-- 成功弹窗模态框 (美化版 - 庄重风格) - 移至body级别 -->
      <style>
         #successModal { z-index: 9999 !important; }
         #successModal .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
         }
         #successModal .modal-header {
            background: linear-gradient(135deg, #8d6e63 0%, #6d4c41 100%);
            border: none;
            padding: 28px 24px;
            text-align: center;
         }
         #successModal .modal-title {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: white;
            margin: 0;
         }
         #successModal .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #4caf50 0%, #388e3c 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 45px;
            color: white;
            margin: 0 auto 25px;
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.35);
            animation: scaleIn 0.4s ease;
         }
         @keyframes scaleIn {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
         }
         #successModal .modal-body {
            padding: 50px 30px 40px;
            background: linear-gradient(180deg, #fafafa 0%, #f5f5f5 100%);
            text-align: center;
         }
         #successModal #success-message {
            font-size: 17px;
            color: #2c2c2c;
            line-height: 1.7;
            font-weight: 500;
            margin: 0;
         }
         #successModal .modal-footer {
            border: none;
            padding: 20px 30px 30px;
            background: linear-gradient(180deg, #f5f5f5 0%, #fafafa 100%);
            justify-content: center;
         }
         #successModal #successConfirmBtn {
            background: linear-gradient(135deg, #8d6e63 0%, #6d4c41 100%);
            border: none;
            padding: 14px 50px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            box-shadow: 0 6px 16px rgba(93, 64, 55, 0.3);
            color: white;
         }
         #successModal #successConfirmBtn:hover {
            background: linear-gradient(135deg, #6d4c41 0%, #4e342e 100%);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(93, 64, 55, 0.4);
         }
         #successModal #successConfirmBtn:active {
            transform: translateY(-1px);
         }
      </style>
      <div class="modal fade" id="successModal" tabindex="-1" role="dialog" style="display: none;">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(135deg, #ff9068 0%, #8B1E1E 100%); border: none;">
                  <h4 class="modal-title" style="color: white; font-weight: bold;">✓ 提交成功</h4>
                  <button type="button" id="modalCloseBtn" class="close" data-dismiss="modal" style="color: white; opacity: 0.8;">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body text-center" style="padding: 30px;">
                  <div style="font-size: 48px; color: #8B1E1E; margin-bottom: 15px;">✓</div>
                  <p id="success-message" style="font-size: 16px; color: #8B1E1E; margin: 0;">留言提交成功，感谢您的分享！</p>
               </div>
               <div class="modal-footer" style="border: none; justify-content: center;">
                  <button type="button" id="successConfirmBtn" class="btn btn-primary" data-dismiss="modal" style="background: linear-gradient(135deg, #ff9068 0%, #8B1E1E 100%); border: none; padding: 8px 30px;">确定</button>
               </div>
            </div>
         </div>
      </div>
      