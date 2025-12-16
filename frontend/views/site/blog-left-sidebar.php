<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Blog Left Sidebar';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- breadcumb area -->
      <div class="breadcumb-area">
         <div class="container">
            <div class="row">
               <div class="col-md-12 txtc  text-center ccase">
                  <div class="brpt">
                     <h2>Blog Left Sidebar</h2>
                  </div>
                  <div class="breadcumb-inner">
                     <ul>
                        <li>You here!-</li>
                        <li><a href="#" rel="v:url" property="v:title">Home-</a></li>
                        <li><span class="current">Blog Left Sidebar</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End breadcumb area -->
      <!-- blog-left-side widget -->
      <div class="witr-blog-side-area blog_sidebar">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-5  col-sm-12 col-xs-12 sidebar-right content-widget pdsl">
                  <div class="blog-left-side widget">
                     <div class="widget widget_search">
                        <div class="defaultsearch">
                           <form action="mail.php" method="post" id="contact-form">
                              <input type="text" name="search" placeholder="Search" title="Search for:">
                              <button type="submit" class="icons">
                              <i class="fa fa-search"></i>
                              </button>
                           </form>
                        </div>
                     </div>
                     <div class="widget widget_archive">
                        <h2 class="widget-title">Archives</h2>
                        <ul>
                           <li><a href="#">April 2022</a></li>
                        </ul>
                     </div>
                     <div class="widget widget_recent_data">
                        <div class="single-widget-item">
                           <h2 class="widget-title">Recent Posts</h2>
                           <div class="recent-post-item">
                              <div class="recent-post-image">
                                 <a href="#"><img src="<?= Url::to('@web/images/blogs1.jpg') ?>"alt="image" /></a>
                              </div>
                              <div class="recent-post-text">
                                 <h4><a href="#">The will you know success when it shows</a></h4>
                                 <span class="rcomment">April 6, 2022</span>
                              </div>
                           </div>
                           <div class="recent-post-item">
                              <div class="recent-post-image">
                                 <a href="#"><img src="<?= Url::to('@web/images/blogs2.jpg') ?>"alt="image" /></a>
                              </div>
                              <div class="recent-post-text">
                                 <h4><a href="#">How will you know success when it shows</a></h4>
                                 <span class="rcomment">April 6, 2022</span>
                              </div>
                           </div>
                           <div class="recent-post-item">
                              <div class="recent-post-image">
                                 <a href="#"><img src="<?= Url::to('@web/images/blogs3.jpg') ?>"alt="image" /></a>
                              </div>
                              <div class="recent-post-text">
                                 <h4><a href="#">It is a long established fact a reader will be</a></h4>
                                 <span class="rcomment">April 6, 2022</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="widget widget_categories">
                        <h2 class="widget-title">Categories</h2>
                        <ul>
                           <li><a href="#">Attorna</a></li>
                           <li><a href="#">BUSINESS LAW</a></li>
                           <li><a href="#">Judge</a></li>
                           <li><a href="#">Law</a></li>
                           <li><a href="#">Legislation</a></li>
                        </ul>
                     </div>
                     <div class="widget widget_meta">
                        <h2 class="widget-title">Meta</h2>
                        <ul>
                           <li><a href="#">Log in</a></li>
                           <li><a href="#">Entries feed</a></li>
                           <li><a href="#">Comments feed</a></li>
                           <li><a href="#">HTML.org</a></li>
                        </ul>
                     </div>
                     <div class="widget widget_calendar">
                        <h2 class="widget-title">Calendar</h2>
                        <div id="calendar_wrap" class="calendar_wrap">
                           <table id="wp-calendar" class="wp-calendar-table">
                              <caption>August 2022</caption>
                              <thead>
                                 <tr>
                                    <th scope="col" title="Monday">M</th>
                                    <th scope="col" title="Tuesday">T</th>
                                    <th scope="col" title="Wednesday">W</th>
                                    <th scope="col" title="Thursday">T</th>
                                    <th scope="col" title="Friday">F</th>
                                    <th scope="col" title="Saturday">S</th>
                                    <th scope="col" title="Sunday">S</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td colspan="6" class="pad">&nbsp;</td>
                                    <td>1</td>
                                 </tr>
                                 <tr>
                                    <td>2</td>
                                    <td>3</td>
                                    <td id="today">4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                 </tr>
                                 <tr>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15</td>
                                 </tr>
                                 <tr>
                                    <td>16</td>
                                    <td>17</td>
                                    <td >18</td>
                                    <td>19</td>
                                    <td>20</td>
                                    <td>21</td>
                                    <td>22</td>
                                 </tr>
                                 <tr>
                                    <td>23</td>
                                    <td>24</td>
                                    <td>25</td>
                                    <td>26</td>
                                    <td>27</td>
                                    <td>28</td>
                                    <td>29</td>
                                 </tr>
                                 <tr>
                                    <td>30</td>
                                    <td class="pad" colspan="6">&nbsp;</td>
                                 </tr>
                              </tbody>
                           </table>
                           <nav class="wp-calendar-nav">
                              <span class="wp-calendar-nav-prev">
                              <a href="#"><i class="icofont-double-left"></i> September</a>
                              </span>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                  <div class="row">
                     <!-- ARCHIVE QUERY 1 -->
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="lorw-single-blog lorw-lt">
                           <!-- BLOG THUMB -->
                           <div class="lorw-blog-thumb">
                              <a href="<?= Url::to(['/site/single-blog']) ?>">
                              <img  src="<?= Url::to('@web/images/blogs1.jpg') ?>"alt="image">
                              </a>
                           </div>
                           <div class="em-blog-content-area">
                              <div class="lorw-blog-meta post_blog">
                                 <h2><a href="<?= Url::to(['/site/single-blog']) ?>">The will you know success when it shows</a></h2>
                                 <div class="lorw-blog-meta">
                                    <div class="lorw-blog-meta-left">			
                                       <span><i class="fas fa-calendar-alt"></i>04 January , 2022</span>
                                       <a href="#"><i class="fas fa-comment"></i>0 Comments</a>						
                                    </div>
                                 </div>
                              </div>
                              <!-- BLOG TITLE AND CONTENT -->
                              <div class="blog-inner">
                                 <div class="blog-content">
                                    <p>Our offices are located on the trad, unced. photo booth stumptown to banksy, elit small batch freegan�?How to Attain Process Automation Satisfaction. Naturally, the appeal of Robot for its market potential cannot </p>
                                 </div>
                              </div>
                              <div class="witr_btn_sinner">	
                                 <a href="#" class="witr_btn">Read More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- ARCHIVE QUERY 2-->
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="lorw-blog-meta post_blog">
                           <h2><a href="<?= Url::to(['/site/single-blog']) ?>">7 Secrets About Nonprofit That For The Past 50 Years.</a></h2>
                           <div class="lorw-blog-meta">
                              <div class="lorw-blog-meta-left">			
                                 <span><i class="fas fa-calendar-alt"></i>24 January , 2022</span>
                                 <a href="#"><i class="fas fa-comment"></i>0 Comments</a>						
                              </div>
                           </div>
                        </div>
                        <div class="lorw-single-blog lorw-lt">
                           <!-- BLOG THUMB -->
                           <div class="video-open-inline">
                              <iframe class="elementor-video-iframe" allowfullscreen="" title="youtube Video Player" src="#" sandbox=""></iframe>	
                           </div>
                           <div class="em-blog-content-area">
                              <!-- BLOG TITLE AND CONTENT -->
                              <div class="blog-inner">
                                 <div class="blog-content">
                                    <p>Our offices are located on the trad, unced. photo booth stumptown to banksy, elit small batch freegan.. How to Attain Process Automation Satisfaction. Naturally, the appeal of Robot for its market potential cannot </p>
                                 </div>
                              </div>
                              <div class="witr_btn_sinner">	
                                 <a href="#" class="witr_btn">Read More</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="lorw-blog-meta post_blog">
                           <h2><a href="<?= Url::to(['/site/single-blog']) ?>">Netflix’s “Orange Is the New Black�?Brings</a></h2>
                           <div class="lorw-blog-meta">
                              <div class="lorw-blog-meta-left">			
                                 <span><i class="fas fa-calendar-alt"></i>04 January , 2022</span>
                                 <a href="#"><i class="fas fa-comment"></i>0 Comments</a>						
                              </div>
                           </div>
                        </div>
                        <div class="lorw-single-blog lorw-lt">
                           <!-- BLOG THUMB -->
                           <div class="wp-block-group__inner-container">
                              <blockquote class="wp-block-quote has-text-align-center is-style-large">
                                 <p>“Do you see over yonder, friend Sancho, thirty or forty hulking giants? I intend to do battle with them and slay them.�?/p>
                                 <cite>�?Don Quixote</cite>
                              </blockquote>
                           </div>
                        </div>
                     </div>
                     <!-- ARCHIVE QUERY 3-->
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="lorw-blog-meta post_blog">
                           <h2><a href="<?= Url::to(['/site/single-blog']) ?>">How will you know success when it shows</a></h2>
                           <div class="lorw-blog-meta">
                              <div class="lorw-blog-meta-left">			
                                 <span><i class="fas fa-calendar-alt"></i>04 January , 2022</span>
                                 <a href="#"><i class="fas fa-comment"></i>0 Comments</a>						
                              </div>
                           </div>
                        </div>
                        <div class="imagess_area wittr_car_top_left pds">
                           <div class="witr_car_overlay blog_sidebar_image_act">
                              <div class="witr_slick_columns" >
                                 <div class="slide_items">
                                    <img src="<?= Url::to('@web/images/blogs1.jpg') ?>"alt="image">
                                 </div>
                              </div>
                              <div class="witr_slick_columns" >
                                 <div class="slide_items">
                                    <img src="<?= Url::to('@web/images/blogs2.jpg') ?>"alt="image">
                                 </div>
                              </div>
                              <div class="witr_slick_columns" >
                                 <div class="slide_items">
                                    <img src="<?= Url::to('@web/images/blogs3.jpg') ?>"alt="image">
                                 </div>
                              </div>
                              <div class="witr_slick_columns" >
                                 <div class="slide_items">
                                    <img src="<?= Url::to('@web/images/blogs4.jpg') ?>"alt="image">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="em-blog-content-area">
                           <div class="blog-inner">
                              <div class="blog-content">
                                 <p>Our offices are located on the trad, unced. photo booth stumptown to banksy, elit small batch freegan.. How to Attain Process Automation Satisfaction. Naturally, the appeal of Robot for its market potential cannot </p>
                              </div>
                           </div>
                           <div class="witr_btn_sinner">	
                              <a href="#" class="witr_btn">Read More</a>
                           </div>
                        </div>
                     </div>
                     <!--  END SINGLE BLOG -->
                  </div>
               </div>
            </div>
         </div>
      </div>