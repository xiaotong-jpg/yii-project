<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Four Column Gutter';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- breadcumb area -->
      <div class="breadcumb-area">
         <div class="container">
            <div class="row">
               <div class="col-md-12 txtc  text-center ccase">
                  <div class="brpt">
                     <h2>Four-Column Gutter</h2>
                  </div>
                  <div class="breadcumb-inner">
                     <ul>
                        <li>You here! <i class="icofont-thin-right"></i> </li>
                        <li><a href="<?= Url::to(['/site/index']) ?>" rel="v:url" property="v:title">Home</a></li>
                        <li><i class="icofont-thin-right"></i></li>
                        <li><span class="current">Four-Column Gutter</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End breadcumb area -->  
      <!-- portfolio area -->
      <div class="lorw_portfolio_area project_area port_2coloumn port_gutter_area">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <div class="witr_section_title">
                     <div class="witr_section_title_inner text-center">
                        <h2>Lawyers</h2>
                        <h3>Our Four Column Gutter</h3>
                        <h1>Gallery</h1>
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
               <div class="col-lg-3 col-md-6 witr_all_pd0 grid-item business_law family_law">
                  <div class="single_protfolio">
                     <div class="prot_thumb">
                        <img src="<?= Url::to('@web/images/p1.') ?>"alt="image" />
                        <div class="prot_content">
                           <div class="prot_content_inner">
                              <div class="picon">
                                 <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="<?= Url::to('@web/images/p1.') ?>"><i class="icofont-image"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pprotfolio4 positi_3">
                        <div class="porttitle_inner4">
                           <h3><a href="#">Domestic Violence</a></h3>
                           <p>
                              <span class="category-item-p"> Business Law </span> 
                              <span class="category-item-p"> Family Law </span>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 02 single portfolio -->
               <div class="col-lg-3 witr_all_pd0 col-md-6 grid-item business_law finalcial_low">
                  <div class="single_protfolio">
                     <div class="prot_thumb">
                        <img src="<?= Url::to('@web/images/p2.') ?>"alt="image" />
                        <div class="prot_content">
                           <div class="prot_content_inner">
                              <div class="picon">
                                 <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="<?= Url::to('@web/images/p2.') ?>"><i class="icofont-image"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pprotfolio4 positi_3">
                        <div class="porttitle_inner4">
                           <h3><a href="#">Labour Law</a></h3>
                           <p>
                              <span class="category-item-p">Business Law </span> 
                              <span class="category-item-p">Finalcial Low</span>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 03 single portfolio -->
               <div class="col-lg-3 col-md-6 witr_all_pd0 grid-item family_law finalcial_low">
                  <div class="single_protfolio">
                     <div class="prot_thumb">
                        <img src="<?= Url::to('@web/images/p3.') ?>"alt="image" />
                        <div class="prot_content">
                           <div class="prot_content_inner">
                              <div class="picon">
                                 <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="<?= Url::to('@web/images/p3.') ?>"><i class="icofont-image"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pprotfolio4 positi_3">
                        <div class="porttitle_inner4">
                           <h3><a href="#">Common Law</a></h3>
                           <p>
                              <span class="category-item-p">Family Law</span> 
                              <span class="category-item-p">Finalcial Low</span>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 04 single portfolio -->
               <div class="col-lg-3 col-md-6 witr_all_pd0 grid-item business_law finalcial_low">
                  <div class="single_protfolio">
                     <div class="prot_thumb">
                        <img src="<?= Url::to('@web/images/p4.') ?>"alt="image" />
                        <div class="prot_content">
                           <div class="prot_content_inner">
                              <div class="picon">
                                 <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="<?= Url::to('@web/images/p4.') ?>"><i class="icofont-image"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pprotfolio4 positi_3">
                        <div class="porttitle_inner4">
                           <h3><a href="#">Tax Law</a></h3>
                           <p>
                              <span class="category-item-p">Business Law </span> 
                              <span class="category-item-p">Finalcial Low</span>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 05 single portfolio -->
               <div class="col-lg-3 col-md-6 witr_all_pd0 grid-item family_law technology_low">
                  <div class="single_protfolio">
                     <div class="prot_thumb">
                        <img src="<?= Url::to('@web/images/p5.') ?>"alt="image" />
                        <div class="prot_content">
                           <div class="prot_content_inner">
                              <div class="picon">
                                 <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="<?= Url::to('@web/images/p5.') ?>"><i class="icofont-image"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pprotfolio4 positi_3">
                        <div class="porttitle_inner4">
                           <h3><a href="#">Family Low</a></h3>
                           <p>
                              <span class="category-item-p">Family Law</span> 
                              <span class="category-item-p">Technology Low</span>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 06 single portfolio -->
               <div class="col-lg-3 col-md-6 witr_all_pd0 grid-item family_law technology_low">
                  <div class="single_protfolio">
                     <div class="prot_thumb">
                        <img src="<?= Url::to('@web/images/p6.') ?>"alt="image" />
                        <div class="prot_content">
                           <div class="prot_content_inner">
                              <div class="picon">
                                 <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="<?= Url::to('@web/images/p6.') ?>"><i class="icofont-image"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pprotfolio4 positi_3">
                        <div class="porttitle_inner4">
                           <h3><a href="#">Real Estate Law</a></h3>
                           <p>
                              <span class="category-item-p">Family Law</span> 
                              <span class="category-item-p">Technology Low</span>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 07 single portfolio -->
               <div class="col-lg-3 col-md-6 witr_all_pd0 grid-item finalcial_low">
                  <div class="single_protfolio">
                     <div class="prot_thumb">
                        <img src="<?= Url::to('@web/images/p7.jpg') ?>"alt="image" />
                        <div class="prot_content">
                           <div class="prot_content_inner">
                              <div class="picon">
                                 <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="<?= Url::to('@web/images/p7.jpg') ?>"><i class="icofont-image"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pprotfolio4 positi_3">
                        <div class="porttitle_inner4">
                           <h3><a href="#">Health Law</a></h3>
                           <p>
                              <span class="category-item-p">Family Law </span> 
                              <span class="category-item-p">Finalcial Low</span>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 08 single portfolio -->
               <div class="col-lg-3 col-md-6 witr_all_pd0 grid-item family_law technology_low">
                  <div class="single_protfolio">
                     <div class="prot_thumb">
                        <img src="<?= Url::to('@web/images/p8.jpg') ?>"alt="image" />
                        <div class="prot_content">
                           <div class="prot_content_inner">
                              <div class="picon">
                                 <a class="portfolio-icon venobox vbox-item" data-gall="myGallery" href="<?= Url::to('@web/images/p8.jpg') ?>"><i class="icofont-image"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pprotfolio4 positi_3">
                        <div class="porttitle_inner4">
                           <h3><a href="#">Banking Law</a></h3>
                           <p>
                              <span class="category-item-p">Family Law</span> 
                              <span class="category-item-p">Technology Low</span>
                           </p>
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