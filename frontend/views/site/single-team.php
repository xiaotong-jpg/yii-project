<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Single Team';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- breadcumb area -->
      <div class="breadcumb-area">
         <div class="container">
            <div class="row">
               <div class="col-md-12 txtc  text-center ccase">
                  <div class="brpt">
                     <h2>Single Team</h2>
                  </div>
                  <div class="breadcumb-inner">
                     <ul>
                        <li>You here! <i class="icofont-thin-right"></i> </li>
                        <li><a href="<?= Url::to(['/site/index']) ?>" rel="v:url" property="v:title">Home</a></li>
                        <li><i class="icofont-thin-right"></i></li>
                        <li><span class="current">Single Team</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End breadcumb area -->  
      <!-- single team info area -->
      <div class="single_team_info_area">
         <div class="container">
            <div class="row single_team_info_inner">
               <!-- single team left img -->
               <div class="col-lg-6">
                  <div class="single_team_left_image">
                     <div class="single_image_area">
                        <div class="single_image single_line_option  ">
                           <img src="<?= Url::to('@web/assets/images/about-thumb1.') ?>"alt="image" />
                        </div>
                     </div>
                  </div>
               </div>
               <!-- single team right content -->
               <div class="col-lg-6">
                  <div class="single_team_right_inner">
                     <div class="wirt_s2_s8 medi_singleService wirt_s2_s5 wirt_s2_s6 all_service2_color ">
                        <div class="wirt_s2_s5i">
                           <h3>Francis Bindle  </h3>
                           <h2>24/7 Support</h2>
                           <p>We help businesses elevate their through custom service software development product design. </p>
                        </div>
                     </div>
                     <p><strong>Job Title:</strong>&nbsp; &nbsp;Business Management</p>
                     <p><strong>Experience:</strong>&nbsp; &nbsp;4 Years</p>
                     <p><strong>Email:</strong>&nbsp; &nbsp;info@gmail.com</p>
                     <p><strong>Fax:</strong>&nbsp; &nbsp;66 56 1599 34</p>
                     <p><strong>Telephone:</strong>&nbsp; &nbsp;+990 987 545 897</p>
                     <div class="social-icons-wrapper">
                        <span class="grid-item">
                        <a href="#" class="icon social-icon social-icon-facebook repeater-item-b63d366" target="_blank">
                        <i class="fab fa-facebook"></i></a>
                        </span>
                        <span class="grid-item">
                        <a href="#" class="icon social-icon social-icon-twitter repeater-item-769550f" target="_blank">
                        <i class="fab fa-twitter"></i></a>
                        </span>
                        <span class="grid-item">
                        <a href="#" class="icon social-icon social-icon-youtube repeater-item-253649c" target="_blank">
                        <i class="fab fa-youtube"></i></a>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- skill area -->
      <div class="em_skill_area">
         <div class="container">
            <div class="row">
               <!-- progress bar -->
               <div class="col-lg-8">
                  <div class="skill_inner">
                     <div class="witr_section_title">
                        <div class="witr_section_title_inner text-left">
                           <h2>Skill</h2>
                           <h3>Job Experience</h3>
                        </div>
                     </div>
                     <!-- single item -->
                     <div class="witr_single_progress all_color_bar">
                        <div class="witr_title2"><span class="witr_label">Business Law (2017)</span></div>
                        <div class="progress witr_progress-style2 witr_progress-style13">
                           <div class="progress-bar wow fadeInLeft animated" data-wow-duration="1.5s" data-wow-delay="0.2s" style="width: 75%;"> <span class="witr_percent">75%</span></div>
                        </div>
                     </div>
                     <!-- single item -->
                     <div class="witr_single_progress all_color_bar">
                        <div class="witr_title2"> <span class="witr_label">Criminal Law (2018)</span></div>
                        <div class="progress witr_progress-style2 witr_progress-style13">
                           <div class="progress-bar wow fadeInLeft animated" data-wow-duration="1.5s" data-wow-delay="0.2s" style="width: 85%;"> <span class="witr_percent">85%</span></div>
                        </div>
                     </div>
                     <!-- single item -->
                     <div class="witr_single_progress all_color_bar">
                        <div class="witr_title2"> <span class="witr_label">Finnancial Law (2019) </span></div>
                        <div class="progress witr_progress-style2 witr_progress-style13">
                           <div class="progress-bar wow fadeInLeft animated" data-wow-duration="1.5s" data-wow-delay="0.2s" style="width: 70%;"> <span class="witr_percent">70%</span></div>
                        </div>
                     </div>
                     <!-- single item -->
                     <div class="witr_single_progress all_color_bar">
                        <div class="witr_title2"><span class="witr_label">Investment Law (2020) </span></div>
                        <div class="progress witr_progress-style2 witr_progress-style13">
                           <div class="progress-bar wow fadeInLeft animated" data-wow-duration="1.5s" data-wow-delay="0.2s" style="width: 78%;"> <span class="witr_percent">78%</span></div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- skill right image -->
               <div class="col-lg-4">
                  <div class="skill_img_inner">
                     <div class="single_image_area">
                        <div class="single_image single_line_option">
                           <img src="<?= Url::to('@web/assets/images/about-thumb1.') ?>"alt="image" />
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>