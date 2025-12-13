<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Google Map';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- breadcumb area -->
      <div class="breadcumb-area">
         <div class="container">
            <div class="row">
               <div class="col-md-12 txtc  text-center ccase">
                  <div class="brpt">
                     <h2>Google Map</h2>
                  </div>
                  <div class="breadcumb-inner">
                     <ul>
                        <li>You here! <i class="icofont-thin-right"></i> </li>
                        <li><a href="<?= Url::to(['/site/index']) ?>" rel="v:url" property="v:title">Home</a></li>
                        <li><i class="icofont-thin-right"></i></li>
                        <li><span class="current">Google Map</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End breadcumb area -->  
      <!-- contact map area -->
      <div class="lorw_google_map_area">
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