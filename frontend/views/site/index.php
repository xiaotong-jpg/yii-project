<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Home';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="witr_swiper_area">
         <div class="swiper-container swiper_active">
            <div class="swiper-wrapper">
               <!-- 1 single slider -->
               <div class="swiper-slide d1 t1 m1 witr_swiper_height" style="background-image: url(<?= Url::to('@web/images/slider1.jpg') ?>);">
                  <div class="witr_sw_text_area text-left">
                     <div class="witr_swiper_content ">
                        <h2>The Case Defense Lawyers</h2>
                        <p>Law is commonly Understood as a SystemA wonderful serenity has taken 
                           of rules that are Created
                        </p>
                        <div class="slider_btn">
                           <div class="witr_btn_style">
                              <div class="witr_btn_sinner">
                                 <a class="witr_btn" href="#">Contact Now</a>
                                 <a class="witr_btn active recpwit" href="#"> About US </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 2 single slider -->
               <div class="swiper-slide d1 t1 m1 witr_swiper_height" style="background-image: url(<?= Url::to('@web/images/slider1.jpg') ?>);">
                  <div class="witr_sw_text_area text-left">
                     <div class="witr_swiper_content ">
                        <h2>The Case Defense Lawyers</h2>
                        <p>Law is commonly Understood as a SystemA wonderful serenity has taken 
                           of rules that are Created
                        </p>
                        <div class="slider_btn">
                           <div class="witr_btn_style">
                              <div class="witr_btn_sinner">
                                 <a class="witr_btn" href="#">Contact Now</a>
                                 <a class="witr_btn active recpwit" href="#"> About US </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end slider area -->
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
                                    <a href="<?= $link ?>" style="color: #fff; border-color: rgba(255,255,255,0.6);">Read More <span class="icofont-double-right"></span></a>
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
      <!-- about area  -->
      <div class="lorw_about_area">
         <div class="container ">
            <div class="row">
               <div class="col-lg-6 col-md-6">
                  <div class="about_content_inner">
                     <div class="witr_section_title">
                        <div class="witr_section_title_inner text-left">
                           <h2>MORE ABOUT US</h2>
                           <h3>Do You Need The Top Lawyers From Us?</h3>
                           <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. available, what if any plea bargains may be offered to you. I enjoy with my whole heart. available, what if any plea bargains may be offered to you.
                           </p>
                        </div>
                     </div>
                     <div class="about_service_inner">
                        <div class="em-service2 sleft all_color_service">
                           <div class="em_service_content ">
                              <div class="em_single_service_text">
                                 <div class="text_box witr_s_flex">
                                    <div class="service_top_text all_icon_color">
                                       <div class="em-service-icon"> <i class="fas fa-check-circle"></i></div>
                                    </div>
                                    <div class="em-service-inner">
                                       <div class="em-service-title">
                                          <h3><a href="#">Market &amp;Lawyers </a></h3>
                                       </div>
                                       <div class="em-service-desc">
                                          <p>If you are looking for a thy and 
                                             reputable company to
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="em-service2 sleft all_color_service">
                           <div class="em_service_content ">
                              <div class="em_single_service_text">
                                 <div class="text_box witr_s_flex">
                                    <div class="service_top_text all_icon_color">
                                       <div class="em-service-icon"> <i class="fas fa-check-circle"></i></div>
                                    </div>
                                    <div class="em-service-inner">
                                       <div class="em-service-title">
                                          <h3><a href="#">Market &amp;Lawyers </a></h3>
                                       </div>
                                       <div class="em-service-desc">
                                          <p>If you are looking for a thy and 
                                             reputable company to
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="about_bottom_content">
                        <p>We created ready has taken possession of my entire soul, like these real state, corporate risk practices.mornings of spring.</p>
                     </div>
                     <div class="about_bottom_img_btn">
                        <div class="em-service2 sleft all_color_service">
                           <div class="em_service_content ">
                              <div class="em_single_service_text">
                                 <div class="text_box witr_s_flex">
                                    <div class="service_top_text all_icon_color">
                                       <div class="em-service-icon"> 
                                          <img src="<?= Url::to('@web/images/t1.png') ?>"alt="image" />
                                       </div>
                                    </div>
                                    <div class="em-service-inner">
                                       <div class="em-service-title">
                                          <h3>Shilpa Sheek</h3>
                                       </div>
                                       <div class="em-service-desc">
                                          <p> Co- Officer</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="witr_button_area">
                           <div class="witr_btn_style mr">
                              <div class="witr_btn_sinner"><a href="#" class="witr_btn">More About </a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6">
                  <div class="lorw_about_image_inner">
                     <div class="single_image_area">
                        <div class="single_image single_line_option  ">
                           <img src="<?= Url::to('@web/images/about-thumb1.jpg') ?>" alt="image" />
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- feature area -->
      <div class="lorw_feature_area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="witr_section_title">
                     <div class="witr_section_title_inner text-center">
                        <h2>MORE SERVICE US</h2>
                        <h3>We Fight For Justice Not Win</h3>
                        <h1>Case Anyhow</h1>
                     </div>
                  </div>
               </div>
               <!-- 1 single feature -->
               <div class="col-lg-3 col-md-6">
                  <div class="service-item all_color_service text-left">
                     <div class="service_top_image"> 
                        <img src="<?= Url::to('@web/images/f1.png') ?>" alt="image" />
                     </div>
                     <div class="text_box all_icon_color">
                        <h3><a href="#">Tax Law</a></h3>
                        <p>Exercitation photo booth 
                           stump town to banksy, 
                           elit small
                        </p>
                     </div>
                  </div>
               </div>
               <!-- 2 single feature -->
               <div class="col-lg-3 col-md-6">
                  <div class="service-item all_color_service text-left">
                     <div class="service_top_image"> 
                        <img src="<?= Url::to('@web/images/f2.png') ?>" alt="image" />
                     </div>
                     <div class="text_box all_icon_color">
                        <h3><a href="#">Carousel Of lorw</a></h3>
                        <p>Exercitation photo booth 
                           stump town to banksy, 
                           elit small
                        </p>
                     </div>
                  </div>
               </div>
               <!-- 3 single feature -->
               <div class="col-lg-3 col-md-6">
                  <div class="service-item all_color_service text-left">
                     <div class="service_top_image"> 
                        <img src="<?= Url::to('@web/images/f3.png') ?>" alt="image" />
                     </div>
                     <div class="text_box all_icon_color">
                        <h3><a href="#">Family lorw</a></h3>
                        <p>Exercitation photo booth 
                           stump town to banksy, 
                           elit small
                        </p>
                     </div>
                  </div>
               </div>
               <!-- 4 single feature -->
               <div class="col-lg-3 col-md-6">
                  <div class="service-item all_color_service text-left">
                     <div class="service_top_image"> 
                        <img src="<?= Url::to('@web/images/f4.png') ?>" alt="image" />
                     </div>
                     <div class="text_box all_icon_color">
                        <h3><a href="#">Real Estate Law</a></h3>
                        <p>Exercitation photo booth 
                           stump town to banksy, 
                           elit small
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- lorw brand area -->
      <div class="lorw_brand_area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="carousel_imagess_area">
                     <div class="brand_active">
                        <!-- single brand -->
                        <div class="col-lg-12">
                           <div class="slide_items  ">
                              <a href="#"><img src="<?= Url::to('@web/images/br1.png') ?>" alt="image"></a>
                           </div>
                        </div>
                        <!-- 02 single brand -->
                        <div class="col-lg-12">
                           <div class="slide_items  ">
                              <a href="#"><img src="<?= Url::to('@web/images/br2.png') ?>" alt="image"></a>
                           </div>
                        </div>
                        <!-- 03 single brand -->
                        <div class="col-lg-12">
                           <div class="slide_items  ">
                              <a href="#"><img src="<?= Url::to('@web/images/br3.png') ?>" alt="image"></a>
                           </div>
                        </div>
                        <!-- 04 single brand -->
                        <div class="col-lg-12">
                           <div class="slide_items  ">
                              <a href="#"><img src="<?= Url::to('@web/images/br4.png') ?>" alt="image"></a>
                           </div>
                        </div>
                        <!-- 05 single brand -->
                        <div class="col-lg-12">
                           <div class="slide_items  ">
                              <a href="#"><img src="<?= Url::to('@web/images/br2.png') ?>" alt="image"></a>
                           </div>
                        </div>
                        <!-- 06 single brand -->
                        <div class="col-lg-12">
                           <div class="slide_items  ">
                              <a href="#"><img src="<?= Url::to('@web/images/br3.png') ?>" alt="image"></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- lorw choose area -->
      <div class="lorw_choose_area">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6">
                  <div class="choose_img_inner">
                     <div class="single_image_area">
                        <div class="single_image"> 
                           <img src="<?= Url::to('@web/images/skill-thumb1.png') ?>" alt="image" />
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6">
                  <div class="choose_content_inner">
                     <div class="witr_section_title">
                        <div class="witr_section_title_inner text-left">
                           <h2>MORE CHOOSE US</h2>
                           <h3>Do You Need The Top 
                              Lawyers <span> From Us? </span>
                           </h3>
                           <p>A wonderful serenity has taken possession of my entire soul, like these sweet 
                              mornings of spring which I enjoy with my whole heart. available, what if any plea 
                              bargains may be offered to you. I enjoy with my whole heart. available, what if any 
                              plea bargains may be offered to you.
                           </p>
                        </div>
                     </div>
                     <div class="departmentList all_list_color">
                        <ul>
                           <li><span><i class="fas fa-check-circle"></i>I am alone, and feel the charm of existence in this spot</span></li>
                           <li><span> <i class="fas fa-check-circle"></i>Which I enjoy with my whole hear am alone and feel.</span></li>
                           <li><span><i class="fas fa-check-circle"></i>Grow organically the holistic world view. am alone and feel.</span></li>
                        </ul>
                     </div>
                     <div class="em-service2 sleft all_color_service">
                        <div class="em_service_content ">
                           <div class="em_single_service_text  ">
                              <div class="text_box witr_s_flex">
                                 <div class="service_top_text all_icon_color">
                                    <div class="em-service-icon"> <i class="flaticon flaticon-phone-call"></i></div>
                                 </div>
                                 <div class="em-service-inner">
                                    <div class="em-service-title">
                                       <h3><a href="#">Get Call Us</a></h3>
                                    </div>
                                    <div class="em-service-desc">
                                       <p>(+099) 235 462 325</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- counter area css -->
      <div class="lorw_counter_area">
         <div class="container">
            <div class="row">
               <!-- 1 single counter -->
               <div class="col-lg-3 col-md-6">
                  <div class="witr_counter_single all_counter_color">
                     <div class="witr_counter_icon">
                        <i class="icofont icofont-ui-love"></i>
                     </div>
                     <div class="witr_counter_number_inn">
                        <h3 class="counter">963</h3>
                        <h4>Wining Case</h4>
                     </div>
                  </div>
               </div>
               <!-- 2 single counter -->
               <div class="col-lg-3 col-md-6">
                  <div class="witr_counter_single all_counter_color">
                     <div class="witr_counter_icon">
                        <i class="icofont icofont-business-man"></i>
                     </div>
                     <div class="witr_counter_number_inn">
                        <h3 class="counter">796</h3>
                        <h4>Total Attorneys</h4>
                     </div>
                  </div>
               </div>
               <!-- 3 single counter -->
               <div class="col-lg-3 col-md-6">
                  <div class="witr_counter_single all_counter_color">
                     <div class="witr_counter_icon">
                        <i class="icofont icofont-rocket-alt-2"></i>
                     </div>
                     <div class="witr_counter_number_inn">
                        <h3 class="counter">563</h3>
                        <h4>Cases Dismissed</h4>
                     </div>
                  </div>
               </div>
               <!-- 4 single counter -->
               <div class="col-lg-3 col-md-6">
                  <div class="witr_counter_single all_counter_color">
                     <div class="witr_counter_icon">
                        <i class="icofont icofont-world"></i>
                     </div>
                     <div class="witr_counter_number_inn">
                        <h3 class="counter">499</h3>
                        <h4>World in Office</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- lorw tab area -->
      <div class="lorw_tab_area">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <div class="witr_section_title">
                     <div class="witr_section_title_inner text-left">
                        <h2>MORE SERVICE US</h2>
                        <h3>We Fight For Justice Not Win</h3>
                        <h1>Case Anyhow</h1>
                     </div>
                  </div>
               </div>
               <div class="col-lg-8 witr_all_pd0">
                  <div class="witr_adv_tab_area witr_taba_style1 tab_all_colora">
                     <ul class="nav nav-tabs">
                        <li class="nav-item"> 
                           <a class="nav-link epo-2537d93" data-toggle="tab" href="#tx_tab_02f85021"> 
                           <span class="witr_tab_icona"> <i class="flaticon flaticon-school-1"></i> </span> 
                           <strong>Business</strong> </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link epo-f50521a active" data-toggle="tab" href="#tx_tab_02f85022"> 
                           <span class="witr_tab_icona"> <i class="flaticon flaticon-book"></i> </span> 
                           <strong>Education</strong> 
                           </a>
                        </li>
                        <li class="nav-item"> 
                           <a class="nav-link epo-19b0799" data-toggle="tab" href="#tx_tab_02f85023"> 
                           <span class="witr_tab_icona"> <i class="flaticon flaticon-fingerprint"></i> </span> <strong>Technology</strong> 
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link epo-31b269b  " data-toggle="tab" href="#tx_tab_02f85024"> <span class="witr_tab_icona"> <i class="flaticon flaticon-money-2"></i> </span> <strong>Finalcial </strong> </a>
                        </li>
                        <li class="nav-item"> 
                           <a class="nav-link epo-5364aef  " data-toggle="tab" href="#tx_tab_02f85025"> <span class="witr_tab_icona"> <i class="flaticon flaticon-idea-1"></i> </span> <strong>Criminal</strong> </a>
                        </li>
                     </ul>
                  </div>
                  <!-- tab content -->
                  <div class="witr_adv_tab_area witr_taba_style1 tab_all_colora">
                     <div class="tab-content">
                        <!-- tab content 01 -->
                        <div class="tab-pane fade epo-6487410" id="tx_tab_02f85021">
                           <div class="row">
                              <div class="col-lg-6 col-md-6">
                                 <div class="single_image_area tab_content_one">
                                    <div class="single_image single_line_option  ">
                                       <img src="<?= Url::to('@web/images/tab-thumb.png') ?>" alt="image" />
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                 <div class="tab_content_inner">
                                    <div class="witr_text_widget">
                                       <div class="witr_text_widget_inner">
                                          <h2>Business Law ?</h2>
                                          <p></p>
                                          <p>It is a long established fact that a reader will be distracted by he readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal them distribution of letters, as opposed.</p>
                                          <p></p>
                                          <div class="witr_widget_list">
                                             <ul>
                                                <li><span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text"> I am alone, and feel the charm of existence in this spot</span></li>
                                                <li><span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text">Which I enjoy with my whole hear am alone and feel.</span></li>
                                                <li><span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text">Grow organically the holistic world view. am alone and feel.</span></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="witr_button_area">
                                       <div class="witr_btn_style mr">
                                          <div class="witr_btn_sinner"> <a href="#" class="witr_btn">See More Destails </a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- tab content 02 -->
                        <div class="tab-pane fade epo-6487410 active show" id="tx_tab_02f85022">
                           <div class="row">
                              <div class="col-lg-6 col-md-6">
                                 <div class="tab_content_inner">
                                    <div class="witr_text_widget">
                                       <div class="witr_text_widget_inner">
                                          <h2>Education Law ?</h2>
                                          <p></p>
                                          <p>It is a long established fact that a reader will be distracted by he readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal them distribution of letters, as opposed.</p>
                                          <p></p>
                                          <div class="witr_widget_list">
                                             <ul>
                                                <li><span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span><span class="witr_list_text"> I am alone, and feel the charm of existence in this spot</span></li>
                                                <li> <span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text">Which I enjoy with my whole hear am alone and feel.</span></li>
                                                <li> <span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text">Grow organically the holistic world view. am alone and feel.</span></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="witr_button_area">
                                       <div class="witr_btn_style mr">
                                          <div class="witr_btn_sinner"><a href="#" class="witr_btn">See More Destails </a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                 <div class="single_image_area">
                                    <div class="single_image single_line_option  ">
                                       <img src="<?= Url::to('@web/images/tab-thumb.png') ?>" alt="image" />
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- tab content 03 -->
                        <div class="tab-pane fade epo-6487410" id="tx_tab_02f85023">
                           <div class="row">
                              <div class="col-lg-6 col-md-6">
                                 <div class="tab_content_inner">
                                    <div class="witr_text_widget">
                                       <div class="witr_text_widget_inner">
                                          <h2>Technology Law ?</h2>
                                          <p></p>
                                          <p>It is a long established fact that a reader will be distracted by he readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal them distribution of letters, as opposed.</p>
                                          <p></p>
                                          <div class="witr_widget_list">
                                             <ul>
                                                <li> <span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text"> I am alone, and feel the charm of existence in this spot</span></li>
                                                <li> <span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text">Which I enjoy with my whole hear am alone and feel.</span></li>
                                                <li> <span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text">Grow organically the holistic world view. am alone and feel.</span></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="witr_button_area">
                                       <div class="witr_btn_style mr">
                                          <div class="witr_btn_sinner"> <a href="#" class="witr_btn">See More Destails </a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                 <div class="tab_witr_video tab_content3_video">
                                    <div class="video-part">
                                       <div class="video-overlay witr_all_color_v">
                                          <div class="video-item   witr_none_before   text-center"> <a class="tx_svd_icon video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="#"> <i class="icofont-ui-play"></i> </a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- tab content 04 -->
                        <div class="tab-pane fade epo-6487410" id="tx_tab_02f85024">
                           <div class="row">
                              <div class="col-lg-6 col-md-6">
                                 <div class="tab_content_inner">
                                    <div class="witr_text_widget">
                                       <div class="witr_text_widget_inner">
                                          <h2>Finalcial Law ?</h2>
                                          <p></p>
                                          <p>It is a long established fact that a reader will be distracted by he readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal them distribution of letters, as opposed.</p>
                                          <p></p>
                                          <div class="witr_widget_list">
                                             <ul>
                                                <li> <span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text"> I am alone, and feel the charm of existence in this spot</span></li>
                                                <li> <span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text">Which I enjoy with my whole hear am alone and feel.</span></li>
                                                <li> <span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text">Grow organically the holistic world view. am alone and feel.</span></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="witr_button_area">
                                       <div class="witr_btn_style mr">
                                          <div class="witr_btn_sinner"> <a href="#" class="witr_btn">See More Destails </a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                 <div class="single_image_area">
                                    <div class="single_image single_line_option  ">
                                       <img src="<?= Url::to('@web/images/tab-thumb.png') ?>" alt="image" />
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- tab content 05 -->
                        <div class="tab-pane fade epo-6487410" id="tx_tab_02f85025">
                           <div class="row">
                              <div class="col-lg-6 col-md-6">
                                 <div class="single_image_area tab_content_one">
                                    <div class="single_image single_line_option  ">
                                       <img src="<?= Url::to('@web/images/tab-thumb.png') ?>" alt="image" />
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                 <div class="tab_content_inner">
                                    <div class="witr_text_widget">
                                       <div class="witr_text_widget_inner">
                                          <h2>Criminal Law ?</h2>
                                          <p></p>
                                          <p>It is a long established fact that a reader will be distracted by he readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal them distribution of letters, as opposed.</p>
                                          <p></p>
                                          <div class="witr_widget_list">
                                             <ul>
                                                <li> <span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text"> I am alone, and feel the charm of existence in this spot</span></li>
                                                <li> <span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text">Which I enjoy with my whole hear am alone and feel.</span></li>
                                                <li> <span class="witr_list_icon"><i class="icofont icofont-rounded-right"></i></span> <span class="witr_list_text">Grow organically the holistic world view. am alone and feel.</span></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="witr_button_area">
                                       <div class="witr_btn_style mr">
                                          <div class="witr_btn_sinner"> <a href="#" class="witr_btn">See More Destails </a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="tab_witr_video">
                     <div class="video-part">
                        <div class="video-overlay witr_all_color_v">
                           <div class="video-item   witr_none_before   text-center"> <a class="tx_svd_icon video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="#"> <i class="icofont-ui-play"></i> </a></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- volunteers slider area -->
      <?php /* @var $volunteers common\models\Volunteers[] */ ?>
      <?php if (!empty($volunteers)): ?>
      <style>
         .vol-section{margin:50px 0;}
         .vol-header{text-align:center;margin-bottom:24px;}
         .vol-header h2{margin:0;font-size:28px;}
         .vol-header h3{margin:6px 0 0;font-size:18px;color:#a57a2f;letter-spacing:1px;}
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
            <div class="vol-header">
               <h3>Volunteers</h3>
               <h2>志愿者风采</h2>
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



      <!-- 缅怀先烈 -->
      <?php
      // 引入必要的资源
      $this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
      $this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');
      $this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);

      // 获取第一位英雄作为默认大图显示（防止报错）
      $firstHero = !empty($heroes) ? $heroes[0] : null;
      ?>

      <!-- HTML 结构 -->
      <div class="lorw_hero_area">
         <div class="container">
            <!-- 标题 -->
            <div class="row">
                  <div class="col-lg-12">
                     <div class="war-section-title">
                        <h2>历史人物</h2>
                        <h3>铭记历史 · 缅怀先烈</h3>
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
                        <button class="hero-prev"><i class="icofont-simple-left"></i></button>
                        <button class="hero-next"><i class="icofont-simple-right"></i></button>
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

      <div class="war-map-section">
         <div class="container">
            <!-- 标题 -->
            <div class="row">
                  <div class="col-lg-12">
                     <div class="war-section-title">
                        <h2>重访抗战地标</h2>
                        <h3>铭记历史 · 缅怀先烈</h3>
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
                           <i class="icofont-arrow-left"></i> <!-- 如果没有图标库，可以用 < -->
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
                           <i class="icofont-arrow-right"></i> <!-- 如果没有图标库，可以用 > -->
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













      <!-- museums area (case studies replaced) -->
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
      <!-- lorw blog area -->
      <div class="lorw_blog_area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="witr_section_title">
                     <div class="witr_section_title_inner text-center">
                        <h2>Blog Post</h2>
                        <h3>Recent Case Studies</h3>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="witr_blog_area11">
                     <div class="blog_active">
                        <!-- 1 single blog -->
                        <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12">
                           <div class="busi_singleBlog all_blog_color">
                              <div class="witr_sb_thumb">
                                 <a href="#">
                                 <img src="<?= Url::to('@web/images/blogs1.jpg') ?>" alt="image"> 
                                 </a>
                                 <div class="witr_post_meta9"></div>
                              </div>
                              <div class="witr_blog_con bs5">
                                 <h2><a href="<?= Url::to(['/site/single-blog']) ?>">How will you know success when it shows</a></h2>
                                 <p>Exercitation photo booth stumptown to banksy, elit small batch freegan�?How to Attain Process Automation</p>
                              </div>
                              <div class="em-blog-content-area_adn">
                                 <div class="learn_more_adn">
                                    <a class="learn_btn adnbtn2" href="#">Read More</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- 2 single blog -->
                        <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12">
                           <div class="busi_singleBlog all_blog_color">
                              <div class="witr_sb_thumb">
                                 <a href="#">
                                 <img src="<?= Url::to('@web/images/blogs2.jpg') ?>" alt="image"> 
                                 </a>
                                 <div class="witr_post_meta9"></div>
                              </div>
                              <div class="witr_blog_con bs5">
                                 <h2><a href="<?= Url::to(['/site/single-blog']) ?>">Industrial Branch Of Engineering.</a></h2>
                                 <p>Exercitation photo booth stumptown to banksy, elit small batch freegan�?How to Attain Process Automation</p>
                              </div>
                              <div class="em-blog-content-area_adn">
                                 <div class="learn_more_adn">
                                    <a class="learn_btn adnbtn2" href="#">Read More</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- 3 single blog -->
                        <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12">
                           <div class="busi_singleBlog all_blog_color">
                              <div class="witr_sb_thumb">
                                 <a href="#">
                                 <img src="<?= Url::to('@web/images/blogs3.jpg') ?>" alt="image"> 
                                 </a>
                                 <div class="witr_post_meta9"></div>
                              </div>
                              <div class="witr_blog_con bs5">
                                 <h2><a href="<?= Url::to(['/site/single-blog']) ?>">It is a long established fact a reader will be</a></h2>
                                 <p>Exercitation photo booth stumptown to banksy, elit small batch freegan�?How to Attain Process Automation</p>
                              </div>
                              <div class="em-blog-content-area_adn">
                                 <div class="learn_more_adn">
                                    <a class="learn_btn adnbtn2" href="#">Read More</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- 4 single blog -->
                        <div class="witr_all_mb_30 col-md-12 col-xs-12 col-sm-12">
                           <div class="busi_singleBlog all_blog_color">
                              <div class="witr_sb_thumb">
                                 <a href="#">
                                 <img src="<?= Url::to('@web/images/blogs4.jpg') ?>" alt="image"> 
                                 </a>
                                 <div class="witr_post_meta9"></div>
                              </div>
                              <div class="witr_blog_con bs5">
                                 <h2><a href="<?= Url::to(['/site/single-blog']) ?>">Carousel Of Colors In Cinq This Terre Beach.</a></h2>
                                 <p>Exercitation photo booth stumptown to banksy, elit small batch freegan�?How to Attain Process Automation</p>
                              </div>
                              <div class="em-blog-content-area_adn">
                                 <div class="learn_more_adn">
                                    <a class="learn_btn adnbtn2" href="#">Read More</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
    </div>
</div><!-- contact area css -->
      <div class="lorw_contact_area">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6 witr_all_pd0">
                  <div class="contact_left_inner">
                     <h2>Frequently Asked</h2>
                     <!-- service item 1 -->
                     <div class="em-service2 sright all_color_service">
                        <div class="em_service_content ">
                           <div class="em_single_service_text">
                              <div class="text_box witr_s_flex">
                                 <div class="service_top_text">
                                    <div class="em-service-icon all_icon_color"> 
                                       <i class="icofont icofont-facebook-messenger"></i>
                                    </div>
                                 </div>
                                 <div class="em-service-inner">
                                    <div class="em-service-desc">
                                       <p> I am alone, and feel the charm of existence in this spot</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- service item 2 -->
                     <div class="em-service2 sright all_color_service">
                        <div class="em_service_content ">
                           <div class="em_single_service_text">
                              <div class="text_box witr_s_flex">
                                 <div class="service_top_text">
                                    <div class="em-service-icon all_icon_color"> 
                                       <i class="icofont icofont-read-book-alt"></i>
                                    </div>
                                 </div>
                                 <div class="em-service-inner">
                                    <div class="em-service-desc">
                                       <p> I am alone, and feel the charm of existence in this spot</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- service item 3 -->
                     <div class="em-service2 sright all_color_service">
                        <div class="em_service_content ">
                           <div class="em_single_service_text">
                              <div class="text_box witr_s_flex">
                                 <div class="service_top_text">
                                    <div class="em-service-icon all_icon_color"> 
                                       <i class="icofont icofont-money"></i>
                                    </div>
                                 </div>
                                 <div class="em-service-inner">
                                    <div class="em-service-desc">
                                       <p>I am alone, and feel the charm of existence in this spot</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- service item 4 -->
                     <div class="em-service2 sright all_color_service">
                        <div class="em_service_content ">
                           <div class="em_single_service_text">
                              <div class="text_box witr_s_flex">
                                 <div class="service_top_text">
                                    <div class="em-service-icon all_icon_color"> 
                                       <i class="icofont icofont-price"></i>
                                    </div>
                                 </div>
                                 <div class="em-service-inner">
                                    <div class="em-service-desc">
                                       <p>I am alone, and feel the charm of existence in this spot</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 witr_all_pd0">
                  <div class="contact_inner">
                     <div class="apartment_area">
                        <div class="apartment_text">
                           <h1>Contact Us</h1>
                           <h2>Get In Touch</h2>
                        </div>
                        <div class="witr_apartment_form">
                           <form action="mail.php" method="post" id="contact-form">
                              <div class="row">
                                 <div class="col-lg-6 col-md-12">
                                    <div class="twr_form_box">
                                       <input type="text" name="name" placeholder="Name*">
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-12">
                                    <div class="twr_form_box">
                                       <input type="email" name="email" placeholder="Email*">
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-12">
                                    <div class="twr_form_box">
                                       <input type="number" name="number" placeholder="Phone*">
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-12">
                                    <div class="twr_form_box">
                                       <input type="text" name="subject" placeholder="Subject*">
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-md-12">
                                    <div class="twr_form_box ">
                                       <textarea name="comment" placeholder="Comments/Message"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Now</button>
                                 </div>
                                 <div class="col-lg-12 text-center">
                                    <p class="form-messege"></p>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
      </div>
      
