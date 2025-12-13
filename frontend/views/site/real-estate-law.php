<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Real Estate Law';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- breadcumb area -->
      <div class="breadcumb-area">
         <div class="container">
            <div class="row">
               <div class="col-md-12 txtc  text-center ccase">
                  <div class="brpt">
                     <h2>Real Estate Law</h2>
                  </div>
                  <div class="breadcumb-inner">
                     <ul>
                        <li>You here! <i class="icofont-thin-right"></i> </li>
                        <li><a href="<?= Url::to(['/site/index']) ?>" rel="v:url" property="v:title">Home</a></li>
                        <li><i class="icofont-thin-right"></i></li>
                        <li><span class="current">Real Estate Law</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End breadcumb area -->  
      <!-- real state area -->
      <div class="em_real_state_area">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-6">
                  <!-- real state 3d  -->
                  <div class="witr_feature_3d witr_feature_con_3d witr_feature_flip_left ">
                     <div class="witr_single_feature_3d all_feature_color text-center">
                        <!-- fontent -->
                        <div class="witr_feature_front_3d">
                           <div class="witr_feature_position">
                              <div class="witr_feature_content_3d">
                                 <div class="witr_feature_icon_3d">
                                    <i class="fas fa-microphone-alt"></i>
                                 </div>
                                 <h3><a href="#">Do you need any help?</a></h3>
                                 <p>+4754485475<br>demo@example.com </p>
                              </div>
                              <div class="witr_feature_btn_3d">
                                 <a href="#">Read More</a>
                              </div>
                           </div>
                        </div>
                        <!-- bekend -->
                        <div class="witr_feature_back_3d">
                           <div class="witr_feature_position">
                              <div class="witr_feature_content_3d">
                                 <div class="witr_feature_icon_3d">
                                    <i class="fas fa-book-medical"></i>
                                 </div>
                                 <h3><a href="#">Borack Tower, Australia</a></h3>
                                 <p>Motizil, 8665 </p>
                              </div>
                              <div class="witr_feature_btn_3d">
                                 <a href="#">See More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- department List -->
                  <div class="departmentList all_list_color">
                     <h3>OUR SERVICE </h3>
                     <ul>
                        <li><span><i class="fas fa-angle-double-right"></i> List Title One </span></li>
                        <li><span><i class="fas fa-angle-double-right"></i> List Title One </span></li>
                        <li><span><i class="fas fa-angle-double-right"></i> List Title One </span></li>
                     </ul>
                  </div>
               </div>
               <!-- right image -->
               <div class="col-lg-8 col-md-6">
                  <div class="single_image_area">
                     <div class="single_image  ">
                        <img src="<?= Url::to('@web/assets/images/realstate-img.') ?>"alt="image"/>
                     </div>
                  </div>
                  <div class="witr_text_widget">
                     <div class="witr_text_widget_inner">
                        <h1>Real Estate Law</h1>
                        <h2>We Are Top Lawyers With 25 Years </h2>
                        <div class="about-content">
                           <span>
                           <i class="fas fa-check"></i>
                           24/7 Support &amp; Maintenance<br>
                           </span>
                        </div>
                        <div class="about-content">
                           <span>
                           <i class="fas fa-check"></i>							
                           IT Solution<br>
                           </span>	
                        </div>
                        <div class="about-content">
                           <span>
                           <i class="fas fa-check"></i>
                           Market Trades &amp; Stock<br>
                           </span>
                        </div>
                        <div class="about-content">
                           <span>
                           <i class="fas fa-check"></i>
                           Product Design<br>
                           </span>
                        </div>
                        <div class="about-content">
                           <span>
                           <i class="fas fa-check"></i>					
                           Managed IT Services<br>
                           </span>
                        </div>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin&nbsp;</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- em real state area -->
      <div class="em_realstate_video_area">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="witr_play_vi witr_all_color_v">
                     <div  class="witr_videobg_image">
                        <img src="<?= Url::to('@web/assets/images/sit2.') ?>"alt="image"/>
                        <div class="play-overlay ">
                           <a class="video-popup video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="#">
                           <i class="fas fa-play"></i>							
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="lorw_faq_area family_low_area">
         <div class="container">
            <div class="row">
               <!-- left faq area -->
               <div class="col-lg-8 col-md-8">
                  <div class="accordion_area">
                     <div class="faq-part">
                        <div id="accordion2">
                           <div class="card card-2 active show">
                              <div class="card-header witr_ac_card">
                                 <a href="#" class="card-link witr_ac_style collapsed" data-toggle="collapse" data-target="#collapse_e514ff7">
                                 <i class="fas fa-dot-circle"></i>					
                                 Proven expertise and industry leading service quality
                                 </a>
                              </div>
                              <div id="collapse_e514ff7"  class="active show collapse"  data-parent="#accordion2" style="">
                                 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat&nbsp;</p>
                              </div>
                           </div>
                           <!-- card -->	
                           <div class="card card-2">
                              <div class="card-header witr_ac_card">
                                 <a href="#" class="card-link witr_ac_style" data-toggle="collapse" data-target="#collapse_5265e2a" aria-expanded="true">
                                 <i class="fas fa-dot-circle"></i>					
                                 Compliance with the latest regulatory requirements</a>
                              </div>
                              <div id="collapse_5265e2a" class="collapse" data-parent="#accordion2">
                                 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat&nbsp;</p>
                              </div>
                           </div>
                           <div class="card card-2">
                              <div class="card-header witr_ac_card">
                                 <a href="#" class="card-link witr_ac_style" data-toggle="collapse" data-target="#collapse_ef588e8" aria-expanded="true">
                                 <i class="fas fa-dot-circle"></i>					
                                 Minimized downtime and reduced operating costs</a>
                              </div>
                              <div id="collapse_ef588e8" class="collapse    " data-parent="#accordion2">
                                 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat&nbsp;</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="carousel_imagess_area">
                     <div class=" slick-initialized slick-slider">
                        <div class=" imagess_id1 slick-list">
                           <!-- single image -->
                           <div class="col-lg-12">
                              <a href="#"><img src="<?= Url::to('@web/assets/images/p1.') ?>"alt="image"/></a>
                           </div>
                           <!-- single image -->
                           <div class="col-lg-12">
                              <a href="#"><img src="<?= Url::to('@web/assets/images/p2.') ?>"alt="image"/></a>
                           </div>
                           <!-- single image -->
                           <div class="col-lg-12">
                              <a href="#"><img src="<?= Url::to('@web/assets/images/p3.') ?>"alt="image"/></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>