<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- breadcumb area -->
      <div class="breadcumb-area">
         <div class="container">
            <div class="row">
               <div class="col-md-12 txtc  text-center ccase">
                  <div class="brpt">
                     <h2>Contact</h2>
                  </div>
                  <div class="breadcumb-inner">
                     <ul>
                        <li>You here! <i class="icofont-thin-right"></i> </li>
                        <li><a href="<?= Url::to(['/site/index']) ?>" rel="v:url" property="v:title">Home</a></li>
                        <li><i class="icofont-thin-right"></i></li>
                        <li><span class="current">Contact</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End breadcumb area -->  
      <!-- contact map area -->
      <div class="lorw_google_map_area contact_page_map_area">
         <div class="container-fluid witr_all_pd0">
            <div class="row">
               <div class="col-lg-12">
                  <div class="map_area">
                     <iframe src="https://www.amap.com/" sandbox="" title="London Eye, London, United Kingdom" aria-label="London Eye, London, United Kingdom"></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact area css -->
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