<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Blog';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- breadcumb area -->
      <div class="breadcumb-area">
         <div class="container">
            <div class="row">
               <div class="col-md-12 txtc  text-center ccase">
                  <div class="brpt">
                     <h2>Blog</h2>
                  </div>
                  <div class="breadcumb-inner">
                     <ul>
                        <li>You here! <i class="icofont-thin-right"></i> </li>
                        <li><a href="<?= Url::to(['/site/index']) ?>" rel="v:url" property="v:title">Home</a></li>
                        <li><i class="icofont-thin-right"></i></li>
                        <li><span class="current">Blog</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End breadcumb area -->  
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
                                 <img src="<?= Url::to('@web/assets/images/blogs1.jpg') ?>"alt="image"> 
                                 </a>
                                 <div class="witr_post_meta9"></div>
                              </div>
                              <div class="witr_blog_con bs5">
                                 <h2><a href="<?= Url::to(['/site/single-blog']) ?>">How will you know success when it shows</a></h2>
                                 <p>Exercitation photo booth stumptown to banksy, elit small batch freeganâ€?How to Attain Process Automation</p>
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
                                 <img src="<?= Url::to('@web/assets/images/blogs2.jpg') ?>"alt="image"> 
                                 </a>
                                 <div class="witr_post_meta9"></div>
                              </div>
                              <div class="witr_blog_con bs5">
                                 <h2><a href="<?= Url::to(['/site/single-blog']) ?>">Industrial Branch Of Engineering.</a></h2>
                                 <p>Exercitation photo booth stumptown to banksy, elit small batch freeganâ€?How to Attain Process Automation</p>
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
                                 <img src="<?= Url::to('@web/assets/images/blogs3.jpg') ?>"alt="image"> 
                                 </a>
                                 <div class="witr_post_meta9"></div>
                              </div>
                              <div class="witr_blog_con bs5">
                                 <h2><a href="<?= Url::to(['/site/single-blog']) ?>">It is a long established fact a reader will be</a></h2>
                                 <p>Exercitation photo booth stumptown to banksy, elit small batch freeganâ€?How to Attain Process Automation</p>
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
                                 <img src="<?= Url::to('@web/assets/images/blogs4.jpg') ?>"alt="image"> 
                                 </a>
                                 <div class="witr_post_meta9"></div>
                              </div>
                              <div class="witr_blog_con bs5">
                                 <h2><a href="<?= Url::to(['/site/single-blog']) ?>">Carousel Of Colors In Cinq This Terre Beach.</a></h2>
                                 <p>Exercitation photo booth stumptown to banksy, elit small batch freeganâ€?How to Attain Process Automation</p>
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
      </div>