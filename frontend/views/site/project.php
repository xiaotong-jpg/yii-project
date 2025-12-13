<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Project';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- breadcumb area -->
      <div class="breadcumb-area">
         <div class="container">
            <div class="row">
               <div class="col-md-12 txtc  text-center ccase">
                  <div class="brpt">
                     <h2>Project</h2>
                  </div>
                  <div class="breadcumb-inner">
                     <ul>
                        <li>You here! <i class="icofont-thin-right"></i> </li>
                        <li><a href="<?= Url::to(['/site/index']) ?>" rel="v:url" property="v:title">Home</a></li>
                        <li><i class="icofont-thin-right"></i></li>
                        <li><span class="current">Project</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End breadcumb area -->  
      <!-- portfolio area -->
      <div class="lorw_portfolio_area project_area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="witr_section_title">
                     <div class="witr_section_title_inner text-center">
                        <h2>Lawyers</h2>
                        <h3>Our Skilled   Working</h3>
                     </div>
                  </div>
                  <div class="portfolio_nav  wittr_pfilter_menu   portfolio_list_area ">
                     <ul id="filter" class="filter_menu ">
                        <li class="current_menu_item" data-filter="*">All Work</li>
                        <li data-filter=".business_law">Business Law</li>
                        <li data-filter=".family_law">Family Law</li>
                        <li data-filter=".finalcial_low">Finalcial Low</li>
                        <li data-filter=".technology_low">Technology Low</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row portfolio_active pstyle2">
               <!-- 01 single portfolio -->
               <div class="col-lg-6 col-md-6 grid-item  technology_low business_law family_law">
                  <div class="single_protfolio">
                     <div class="prot_thumb">
                        <img src="<?= Url::to('@web/assets/images/p1.') ?>"alt="image" />
                        <div class="prot_content">
                           <div class="prot_content_inner">
                              <div class="picon"> 
                                 <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="<?= Url::to('@web/assets/images/p1.') ?>"><i class="icofont-image"></i></a>
                              </div>
                              <h3><a href="#">Domestic Violence</a></h3>
                              <p> <span class="category-item-p"> Business Law </span> <span class="category-item-p"> Family Law </span></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 02 single portfolio -->
               <div class="col-lg-6 col-md-6 grid-item  business_law finalcial_low">
                  <div class="single_protfolio">
                     <div class="prot_thumb">
                        <img src="<?= Url::to('@web/assets/images/p2.') ?>"alt="image" />
                        <div class="prot_content">
                           <div class="prot_content_inner">
                              <div class="picon"> 
                                 <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="<?= Url::to('@web/assets/images/p2.') ?>"><i class="icofont-image"></i></a>
                              </div>
                              <h3><a href="#">Labour Law</a></h3>
                              <p> <span class="category-item-p">Business Law </span> <span class="category-item-p"> Finalcial Low</span></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 03 single portfolio -->
               <div class="col-lg-6 col-md-6 grid-item family_law finalcial_low technology_low">
                  <div class="single_protfolio">
                     <div class="prot_thumb">
                        <img src="<?= Url::to('@web/assets/images/p3.') ?>"alt="image" />
                        <div class="prot_content">
                           <div class="prot_content_inner">
                              <div class="picon"> 
                                 <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="<?= Url::to('@web/assets/images/p3.') ?>"><i class="icofont-image"></i></a>
                              </div>
                              <h3><a href="#">Common Law</a></h3>
                              <p> <span class="category-item-p">Family Law </span> <span class="category-item-p"> Finalcial Low </span></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 04 single portfolio -->
               <div class="col-lg-6 col-md-6 grid-item business_law finalcial_low">
                  <div class="single_protfolio">
                     <div class="prot_thumb">
                        <img src="<?= Url::to('@web/assets/images/p4.') ?>"alt="image" />
                        <div class="prot_content">
                           <div class="prot_content_inner">
                              <div class="picon"> 
                                 <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="<?= Url::to('@web/assets/images/p4.') ?>"><i class="icofont-image"></i></a>
                              </div>
                              <h3><a href="#">Tax Law</a></h3>
                              <p> <span class="category-item-p">Business Law </span> <span class="category-item-p">Finalcial Low</span></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="paginations">
                     <ul class="page-numbers text-center">
                        <li><span class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="#">2</a></li>
                        <li><a class="page-numbers" href="#">3</a></li>
                        <li><a class="next page-numbers" href="#"><i class="icofont-arrow-right"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>