
<?php
include 'header.php';
include '../controller/blog.php';
$bloga=new blogA();
if (isset($_GET["search"])&&!empty($_GET["search"])){

$listeblog=$bloga->searchblog($_GET["search"]); 

?>



<main class="main">
        	<div class="page-header text-center" style="background-image: url('../../assets/assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Blog Grid With Sidebar<span>Blog</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Grid With Sidebar</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                            <div class="entry-container max-col-2" data-layout="fitRows">
                            <?php
				            foreach($listeblog as $article){
			            ?>

                                <div class="entry-item col-sm-6">
                                    <article class="entry entry-grid">
                                        <figure class="entry-media">
                                            <a href="article.php?id=<?php echo $article['id']; ?>">
                                                <img src="../../assets/imgblog/<?php echo $article['img']; ?>" alt="image desc">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <span class="entry-author">
                                                    by <a href="#">John Doe</a>
                                                </span>
                                                <span class="meta-separator">|</span>
                                                <a href="#"><?php echo $article['date']; ?></a>
                                                <span class="meta-separator">|</span>
                                                <a href="#">2 Comments</a>
                                            </div><!-- End .entry-meta -->

                                            <h2 class="entry-title">
                                                <a href="article.php?id=<?php echo $article['id']; ?>"><?php echo $article['titre']; ?></a>
                                            </h2><!-- End .entry-title -->

                                            <div class="entry-cats">
                                                in <a href="#">Lifestyle</a>,
                                            </div><!-- End .entry-cats -->

                                            <div class="entry-content">
                                                <a href="article.php?id=<?php echo $article['id']; ?>" class="read-more">Continue Reading</a>
                                            </div><!-- End .entry-content -->
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->
                                </div><!-- End .entry-item -->
                                <?php
				                }
			                ?>
                                       
  

                             
                            </div><!-- End .entry-container -->

                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                            <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                        </a>
                                    </li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item">
                                        <a class="page-link page-link-next" href="#" aria-label="Next">
                                            Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                		</div><!-- End .col-lg-9 -->

                		<aside class="col-lg-3">
                			<div class="sidebar">
                				<div class="widget widget-search">
                                    <h3 class="widget-title">Search</h3><!-- End .widget-title -->

                                    <form action="searchblog.php">
                                        <label for="ws" class="sr-only">Search in blog</label>
                                        <input type="search" class="form-control" name="search" id="ws" placeholder="Search in blog" required>
                                        <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
                                    </form>
                				</div><!-- End .widget -->

                                <div class="widget widget-cats">
                                    <h3 class="widget-title">Categories</h3><!-- End .widget-title -->

                                    <ul>
                                        <li><a href="#">Lifestyle<span>3</span></a></li>
                                        <li><a href="#">Shopping<span>3</span></a></li>
                                        <li><a href="#">Fashion<span>1</span></a></li>
                                        <li><a href="#">Travel<span>3</span></a></li>
                                        <li><a href="#">Hobbies<span>2</span></a></li>
                                    </ul>
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

                                    <ul class="posts-list">
                                        <li>
                                            <figure>
                                                <a href="#">
                                                    <img src="../../assets/assets/images/blog/sidebar/post-1.jpg" alt="post">
                                                </a>
                                            </figure>

                                            <div>
                                                <span>Nov 22, 2018</span>
                                                <h4><a href="#">Aliquam tincidunt mauris eurisus.</a></h4>
                                            </div>
                                        </li>
                                        <li>
                                            <figure>
                                                <a href="#">
                                                    <img src="../../assets/assets/images/blog/sidebar/post-2.jpg" alt="post">
                                                </a>
                                            </figure>

                                            <div>
                                                <span>Nov 19, 2018</span>
                                                <h4><a href="#">Cras ornare tristique elit.</a></h4>
                                            </div>
                                        </li>
                                        <li>
                                            <figure>
                                                <a href="#">
                                                    <img src="../../assets/assets/images/blog/sidebar/post-3.jpg" alt="post">
                                                </a>
                                            </figure>

                                            <div>
                                                <span>Nov 12, 2018</span>
                                                <h4><a href="#">Vivamus vestibulum ntulla nec ante.</a></h4>
                                            </div>
                                        </li>
                                        <li>
                                            <figure>
                                                <a href="#">
                                                    <img src="../../assets/assets/images/blog/sidebar/post-4.jpg" alt="post">
                                                </a>
                                            </figure>

                                            <div>
                                                <span>Nov 25, 2018</span>
                                                <h4><a href="#">Donec quis dui at dolor  tempor interdum.</a></h4>
                                            </div>
                                        </li>
                                    </ul><!-- End .posts-list -->
                                </div><!-- End .widget -->

                                <div class="widget widget-banner-sidebar">
                                    <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->
                                    
                                    <div class="banner-sidebar banner-overlay">
                                        <a href="#">
                                            <img src="../../assets/assets/images/blog/sidebar/banner.jpg" alt="banner">
                                        </a>
                                    </div><!-- End .banner-ad -->
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title">Browse Tags</h3><!-- End .widget-title -->

                                    <div class="tagcloud">
                                        <a href="#">fashion</a>
                                        <a href="#">style</a>
                                        <a href="#">women</a>
                                        <a href="#">photography</a>
                                        <a href="#">travel</a>
                                        <a href="#">shopping</a>
                                        <a href="#">hobbies</a>
                                    </div><!-- End .tagcloud -->
                                </div><!-- End .widget -->

                                <div class="widget widget-text">
                                    <h3 class="widget-title">About Blog</h3><!-- End .widget-title -->

                                    <div class="widget-text-content">
                                        <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, pulvinar nunc sapien ornare nisl.</p>
                                    </div><!-- End .widget-text-content -->
                                </div><!-- End .widget -->
                			</div><!-- End .sidebar -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->


<?php
}else{
    echo '<script>window.location.replace("blog.php");</script>';
 
 }
include 'footer.php';
?>