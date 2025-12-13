<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Pricing';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- breadcumb area -->
      <div class="breadcumb-area">
         <div class="container">
            <div class="row">
               <div class="col-md-12 txtc  text-center ccase">
                  <div class="brpt">
                     <h2>Pricing</h2>
                  </div>
                  <div class="breadcumb-inner">
                     <ul>
                        <li>You here! <i class="icofont-thin-right"></i> </li>
                        <li><a href="<?= Url::to(['/site/index']) ?>" rel="v:url" property="v:title">Home</a></li>
                        <li><i class="icofont-thin-right"></i></li>
                        <li><span class="current">Pricing</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End breadcumb area -->  
      <!-- pricing plan area -->
      <div class="lorw_pricing_plan_area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="witr_section_title">
                     <div class="witr_section_title_inner text-center">
                        <h2>Pricing Plan</h2>
                        <h3>Our Pricing Plan</h3>
                     </div>
                  </div>
               </div>
               <!-- 1 single pricing -->
               <div class="col-lg-4 col-md-6">
                  <div class="pricing_area all_pricing_color pricing_style_2 top_border ">
                     <div class="pricing-part ">
                        <div class=" newsssss">
                           <div class="witr_pricing_icon"> <i class="fas fa-parachute-box"></i></div>
                           <h4>Weekly</h4>
                           <h5><span>$</span>31.99 <span> </span></h5>
                           <div class="witri_texti_list">
                              <ul>
                                 <li> <i class="fas fa-angle-double-right"></i>List Title One</li>
                                 <li> <i class="fas fa-angle-double-right"></i>List Title Two</li>
                                 <li> <i class="fas fa-angle-double-right"></i>List Title Three</li>
                              </ul>
                           </div>
                        </div>
                        <div class="witr_btnp_color"> <a class="btn" href="#">Booking Now</a></div>
                     </div>
                  </div>
               </div>
               <!-- 2 single pricing -->
               <div class="col-lg-4 col-md-6">
                  <div class="pricing_area all_pricing_color pricing_style_2  ">
                     <div class="pricing-part ">
                        <div class=" newsssss">
                           <div class="witr_pricing_icon"> <i class="fas fa-comment-dollar"></i></div>
                           <strong>Popular </strong>
                           <h4>Monthly</h4>
                           <h5><span>$</span>50.99 <span> </span></h5>
                           <div class="witri_texti_list">
                              <ul>
                                 <li> <i class="fas fa-angle-double-right"></i>List Title One</li>
                                 <li> <i class="fas fa-angle-double-right"></i>List Title Two</li>
                                 <li> <i class="fas fa-angle-double-right"></i>List Title Three</li>
                              </ul>
                           </div>
                        </div>
                        <div class="witr_btnp_color"> <a class="btn" href="#">Booking Now</a></div>
                     </div>
                  </div>
               </div>
               <!-- 3 single pricing -->
               <div class="col-lg-4 col-md-6">
                  <div class="pricing_area all_pricing_color pricing_style_2  ">
                     <div class="pricing-part ">
                        <div class=" newsssss">
                           <div class="witr_pricing_icon"><i class="fas fa-comment-medical"></i></div>
                           <h4>Yearly</h4>
                           <h5><span>$</span>99.99 <span> </span></h5>
                           <div class="witri_texti_list">
                              <ul>
                                 <li> <i class="fas fa-angle-double-right"></i>List Title One</li>
                                 <li> <i class="fas fa-angle-double-right"></i>List Title Two</li>
                                 <li> <i class="fas fa-angle-double-right"></i>List Title Three</li>
                              </ul>
                           </div>
                        </div>
                        <div class="witr_btnp_color"> <a class="btn" href="#">Booking Now</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- pricing plan area2 -->
      <div class="lorw_pricing_plan_area pricing_area2">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="witr_section_title">
                     <div class="witr_section_title_inner text-center">
                        <h2>Pricing Plan</h2>
                        <h3>Our Pricing Plan</h3>
                     </div>
                  </div>
               </div>
               <!-- 1 single pricing -->
               <div class="col-lg-4 col-md-6">
                  <div class="pricing_area all_pricing_color pricing_style_4 ">
                     <div class="pricing-part">
                        <div class="witr_pricing_icon"><i class="fas fa-parachute-box"></i></div>
                        <h4>Weekly</h4>
                        <div class="witr_p_middle">
                           <div class="witr_p_middle_inner">
                              <h5><span>$</span>31.99 <span> </span></h5>
                           </div>
                        </div>
                        <div class="witri_texti_list">
                           <ul>
                              <li><i class="fas fa-angle-double-right"></i>List Title One</li>
                              <li><i class="fas fa-angle-double-right"></i>List Title One</li>
                              <li><i class="fas fa-angle-double-right"></i>List Title One</li>
                           </ul>
                        </div>
                        <div class="witr_btnp_color"><a class="btn" href="#">Booking Now</a></div>
                     </div>
                  </div>
               </div>
               <!-- 2 single pricing -->
               <div class="col-lg-4 col-md-6">
                  <div class="pricing_area all_pricing_color pricing_style_4 ">
                     <div class="pricing-part     ">
                        <div class="witr_pricing_icon"><i class="fas fa-comment-dollar"></i></div>
                        <strong>Popular </strong>
                        <h4>Monthly</h4>
                        <div class="witr_p_middle">
                           <div class="witr_p_middle_inner">
                              <h5><span>$</span>50.99 <span> </span></h5>
                           </div>
                        </div>
                        <div class="witri_texti_list">
                           <ul>
                              <li><i class="fas fa-angle-double-right"></i>List Title One</li>
                              <li><i class="fas fa-angle-double-right"></i>List Title One</li>
                              <li><i class="fas fa-angle-double-right"></i>List Title One</li>
                           </ul>
                        </div>
                        <div class="witr_btnp_color"><a class="btn" href="#">Booking Now</a></div>
                     </div>
                  </div>
               </div>
               <!-- 3 single pricing -->
               <div class="col-lg-4 col-md-6">
                  <div class="pricing_area all_pricing_color pricing_style_4 ">
                     <div class="pricing-part     ">
                        <div class="witr_pricing_icon"><i class="fas fa-comment-medical"></i></div>
                        <h4>Yearly</h4>
                        <div class="witr_p_middle">
                           <div class="witr_p_middle_inner">
                              <h5><span>$</span>99.99 <span> </span></h5>
                           </div>
                        </div>
                        <div class="witri_texti_list">
                           <ul>
                              <li><i class="fas fa-angle-double-right"></i>List Title One</li>
                              <li><i class="fas fa-angle-double-right"></i>List Title One</li>
                              <li><i class="fas fa-angle-double-right"></i>List Title One</li>
                           </ul>
                        </div>
                        <div class="witr_btnp_color"> <a class="btn" href="#">Booking Now</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>