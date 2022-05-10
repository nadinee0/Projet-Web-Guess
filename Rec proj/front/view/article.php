<?php
include 'header.php';
include '../controller/blog.php';
include '../controller/commentaire.php';

$bloga=new blogA();
$listeblog=$bloga->afficherblog(); 
if (isset($_GET["id"])){
    $blogC = new blogA();
    $commentaireA = new commentaireA();
    $blog = $blogC->recupererblog($_GET['id']);
    $popular = $blogC->popularblog();
    $commentaires = $commentaireA->recuperercomment($_GET['id']);
    $commentaire = $commentaires['comment'];
    $count =  $commentaires['count'];   
    $id= $_GET['id'];
    $bloga->updatevisit($_GET['id']);

if (!$blog){
    echo '<script>window.location.replace("blog.php");</script>';
}


$comment = null;

// create an instance of the controller
if (
    isset($_POST["id_blog"]) &&
    isset($_POST["commentaire"]) &&		
    isset($_POST["email"]) &&
    isset($_POST["nom"])  
) {
    if (
        !empty($_POST["id_blog"]) && 
        !empty($_POST['commentaire']) &&
        !empty($_POST["email"]) && 
        !empty($_POST["nom"]) 
    ) {           
        $comment = new commentaire(
            null,
            $_POST['id_blog'],
            $_POST['commentaire'], 
            null,
            $_POST['nom'],
            $_POST['email']
        );
        $commentaireA->ajoutercommentaire($comment);

        echo '<script>window.location.replace("article.php?id='.$id.'");</script>';    }
    else
        $error = "Missing information";
}  
?>
        <main class="main">
        	<div class="page-header text-center" style="background-image: url('../../assets/assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title"><?php echo $blog['titre']; ?><span><?php echo $blog['categorie']; ?></span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $blog['titre']; ?></li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                            <article class="entry single-entry">
                                <figure class="entry-media">
                                    <img src="../../assets/imgblog/<?php echo $blog['img']; ?>" alt="image desc">
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <span class="entry-author">
                                            by <a href="#">John Doe</a>
                                        </span>
                                        <span class="meta-separator">|</span>
                                        <a href="#"><?php echo $blog['date']; ?></a>
                                        <span class="meta-separator">|</span>
                                        <a href="#"><?php echo $count['count']; ?> Commentaires</a>
                                        <div class="likediv" style="flex: 50%;text-align: right;">
                                        <i 
      		                            class="fa fa-thumbs-o-up like-btn"
      	                                 data-id="<?php echo $blog['id'] ?>" style="font-size: 17px;"></i>
                                    	<span class="likes"><?php echo $blog['jaime']; ?></span>                                        
                                        </div>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                    <?php echo $blog['titre']; ?>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        in <a href="#"><?php echo $blog['categorie']; ?></a>
                                    </div><!-- End .entry-cats -->

                                    <div class="entry-content editor-content">
                                        <p><?php echo $blog['contenu']; ?></p>


                                       

                                    
                                     </div><!-- End .entry-content -->

                                    <div class="entry-footer row no-gutters flex-column flex-md-row">
                                        <div class="col-md">
                                            <div class="entry-tags">
                                                <span>Tags:</span> <a href="#">photography</a> <a href="#">style</a>
                                            </div><!-- End .entry-tags -->
                                        </div><!-- End .col -->

                                        <div class="col-md-auto mt-2 mt-md-0">
                                            <div class="social-icons social-icons-color">
                                                <span class="social-label">Share this post:</span>
                                                <a href="
                                                https://www.shareaholic.com/api/share/?v=1&apitype=1&apikey=d898a67647423cf7c16a9f58af9a3120&service=facebook&title=<?php echo $blog['titre']; ?>&notes=<?php echo $blog['contenu']; ?>&link=https://google.tn/&source=Shareaholic
                                                " class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="
                                                https://www.shareaholic.com/api/share/?v=1&apitype=1&apikey=d898a67647423cf7c16a9f58af9a3120&service=twitter&title=<?php echo $blog['titre']; ?>&notes=<?php echo $blog['contenu']; ?>&link=https://google.tn/&source=Shareaholic
                                                " class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="
                                                https://www.shareaholic.com/api/share/?v=1&apitype=1&apikey=d898a67647423cf7c16a9f58af9a3120&service=pinterest&title=<?php echo $blog['titre']; ?>&notes=<?php echo $blog['contenu']; ?>&link=https://google.tn/&source=Shareaholic
                                                " class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                                <a href="
                                                https://www.shareaholic.com/api/share/?v=1&apitype=1&apikey=d898a67647423cf7c16a9f58af9a3120&service=linkedin&title=<?php echo $blog['titre']; ?>&notes=<?php echo $blog['contenu']; ?>&link=https://google.tn/&source=Shareaholic
                                                " class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .entry-footer row no-gutters -->
                                </div><!-- End .entry-body -->

                                <div class="entry-author-details">
                                    <figure class="author-media">
                                        <a href="#">
                                            <img src="../../assets/assets/images/blog/single/author.jpg" alt="User name">
                                        </a>
                                    </figure><!-- End .author-media -->

                                    <div class="author-body">
                                        <div class="author-header row no-gutters flex-column flex-md-row">
                                            <div class="col">
                                                <h4><a href="#">John Doe</a></h4>
                                            </div><!-- End .col -->
                                            <div class="col-auto mt-1 mt-md-0">
                                                <a href="#" class="author-link">View all posts by John Doe <i class="icon-long-arrow-right"></i></a>
                                            </div><!-- End .col -->
                                        </div><!-- End .row -->

                                        <div class="author-content">
                                            <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. </p>
                                        </div><!-- End .author-content -->
                                    </div><!-- End .author-body -->
                                </div><!-- End .entry-author-details-->
                            </article><!-- End .entry -->

                            <nav class="pager-nav" aria-label="Page navigation">
                                <a class="pager-link pager-link-prev" href="#" aria-label="Previous" tabindex="-1">
                                    Previous Post
                                    <span class="pager-link-title">Cras iaculis ultricies nulla</span>
                                </a>

                                <a class="pager-link pager-link-next" href="#" aria-label="Next" tabindex="-1">
                                    Next Post
                                    <span class="pager-link-title">Praesent placerat risus</span>
                                </a>
                            </nav><!-- End .pager-nav -->

                            <div class="related-posts">
                                <h3 class="title">Related Posts</h3><!-- End .title -->

                                <div class="owl-carousel owl-simple" data-toggle="owl" 
                                    data-owl-options='{
                                        "nav": false, 
                                        "dots": true,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":1
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            }
                                        }
                                    }'>
                                    <article class="entry entry-grid">
                                        <figure class="entry-media">
                                            <a href="single.html">
                                                <img src="../../assets/assets/images/blog/grid/3cols/post-1.jpg" alt="image desc">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <a href="#">Nov 22, 2018</a>
                                                <span class="meta-separator">|</span>
                                                <a href="#">2 Comments</a>
                                            </div><!-- End .entry-meta -->

                                            <h2 class="entry-title">
                                                <a href="single.html">Cras ornare tristique elit.</a>
                                            </h2><!-- End .entry-title -->

                                            <div class="entry-cats">
                                                in <a href="#">Lifestyle</a>,
                                                <a href="#">Shopping</a>
                                            </div><!-- End .entry-cats -->
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->

                                    <article class="entry entry-grid">
                                        <figure class="entry-media">
                                            <a href="single.html">
                                                <img src="../../assets/assets/images/blog/grid/3cols/post-2.jpg" alt="image desc">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <a href="#">Nov 21, 2018</a>
                                                <span class="meta-separator">|</span>
                                                <a href="#">0 Comments</a>
                                            </div><!-- End .entry-meta -->

                                            <h2 class="entry-title">
                                                <a href="single.html">Vivamus ntulla necante.</a>
                                            </h2><!-- End .entry-title -->

                                            <div class="entry-cats">
                                                in <a href="#">Lifestyle</a>
                                            </div><!-- End .entry-cats -->
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->

                                    <article class="entry entry-grid">
                                        <figure class="entry-media">
                                            <a href="single.html">
                                                <img src="../../assets/assets/images/blog/grid/3cols/post-3.jpg" alt="image desc">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <a href="#">Nov 18, 2018</a>
                                                <span class="meta-separator">|</span>
                                                <a href="#">3 Comments</a>
                                            </div><!-- End .entry-meta -->

                                            <h2 class="entry-title">
                                                <a href="single.html">Utaliquam sollicitudin leo.</a>
                                            </h2><!-- End .entry-title -->

                                            <div class="entry-cats">
                                                in <a href="#">Fashion</a>,
                                                <a href="#">Lifestyle</a>
                                            </div><!-- End .entry-cats -->
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->

                                    <article class="entry entry-grid">
                                        <figure class="entry-media">
                                            <a href="single.html">
                                                <img src="../../assets/assets/images/blog/grid/3cols/post-4.jpg" alt="image desc">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <a href="#">Nov 15, 2018</a>
                                                <span class="meta-separator">|</span>
                                                <a href="#">4 Comments</a>
                                            </div><!-- End .entry-meta -->

                                            <h2 class="entry-title">
                                                <a href="single.html">Fusce pellentesque suscipit.</a>
                                            </h2><!-- End .entry-title -->

                                            <div class="entry-cats">
                                                in <a href="#">Travel</a>
                                            </div><!-- End .entry-cats -->
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->
                                </div><!-- End .owl-carousel -->
                            </div><!-- End .related-posts -->

                            <div class="comments">
                                <h3 class="title"><?php echo $count['count']; ?> Commentaires</h3><!-- End .title -->

                                <ul>
                                <?php  
                                if ($count['count'] > 0){
                                foreach($commentaire as $comm){
                                ?>
                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a href="#">
                                                    <img src="../../assets/assets/images/blog/comments/3.jpg" alt="User name">
                                                </a>
                                            </figure>

                                            <div class="comment-body">
                                                <a href="#" class="comment-reply">Reply</a>
                                                <div class="comment-user">
                                                    <h4><a href="#"><?php echo $comm['nom']; ?></a></h4>
                                                    <span class="comment-date"><?php echo $comm['date']; ?></span>
                                                </div><!-- End .comment-user -->

                                                <div class="comment-content">
                                                    <p><?php echo $comm['commentaire']; ?></p>
                                                </div><!-- End .comment-content -->
                                            </div><!-- End .comment-body -->
                                        </div><!-- End .comment -->
                                    </li>
                                <?php
                                }}
                                ?>
                                </ul>
                            </div><!-- End .comments -->
                            <div class="reply">
                                <div class="heading">
                                    <h3 class="title">Leave A Reply</h3><!-- End .title -->
                                    <p class="title-desc">Your email address will not be published. Required fields are marked *</p>
                                </div><!-- End .heading -->

                                <form name="comment" action="" method="post" onsubmit="return ajoutercomment()">
                                    <label for="reply-message" class="sr-only">Comment</label>
                                    <textarea name="commentaire" id="reply-message" cols="30" rows="4" class="form-control" required placeholder="Comment *"></textarea>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="reply-name" class="sr-only">Name</label>
                                            <input type="text" class="form-control" id="reply-name" name="nom" required placeholder="Name *">
                                        </div><!-- End .col-md-6 -->

                                        <div class="col-md-6">
                                            <label for="reply-email" class="sr-only">Email</label>
                                            <input type="email" class="form-control" id="reply-email" name="email" required placeholder="Email *">
                                        </div><!-- End .col-md-6 -->
                                    </div><!-- End .row -->
                                    <input type="text" style="display:none;" id="reply-name" name="id_blog" value="<?php echo $blog['id']; ?>">

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>POST COMMENT</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- End .reply -->
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
                                        <?php foreach ($popular as $pop){ ?>
                                        <li>
                                            <figure>
                                                <a href="article.php?id=<?php echo $pop['id']; ?>">
                                                    <img src="../../assets/imgblog/<?php echo $pop['img']; ?>" alt="post">
                                                </a>
                                            </figure>

                                            <div>
                                                <span><?php echo $pop['date']; ?></span>
                                                <h4><a href="#"><?php echo $pop['titre']; ?></a></h4>
                                            </div>
                                        </li>
                                        
                                        <? } ?>
                                        
                                    </ul><!-- End .posts-list -->
                                </div><!-- End .widget -->

                                <div class="widget widget-banner-sidebar">
                                    <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->
                                    
                                    <div class="banner-sidebar">
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
                			</div><!-- End .sidebar sidebar-shop -->
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
<script>
$(document).ready(function(){

// if the user clicks on the like button ...
$('.like-btn').on('click', function(){
  var post_id = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
  	action = 'like';
  } 
  $.ajax({
  	url: 'like.php',
  	type: 'post',
  	data: {
  		'action': action,
  		'post_id': post_id
  	},
  	success: function(data){
  		res = JSON.parse(data);
  		if (action == "like") {
  			$clicked_btn.removeClass('fa-thumbs-o-up');
  			$clicked_btn.addClass('fa-thumbs-up');
  		} 
  		// display the number of likes and dislikes
  		$clicked_btn.siblings('span.likes').text(res.likes);
  		$clicked_btn.siblings('span.dislikes').text(res.dislikes);

  		// change button styling of the other button if user is reacting the second time to post
  		$clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
  	}
  });		

});
});

function ajoutercomment() {
    var nom= document.comment.nom.value;
    var contenu = document.comment.commentaire.value;
    var email = document.comment.email.value;
  
   var verif = -1;
    if (nom.length == 0) {
      alert("Nom est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    if (!isNaN(nom)) {   
      alert("Nom doit comporter une Lettre");
      verif = 0;
      return false;
    } else verif = 1;
    if (contenu.length == 0) {
      alert("commentaire est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    if (!isNaN(contenu)) {   
      alert("le commentaire doit comporter une Lettre");
      verif = 0;
      return false;
    } else verif = 1;
    if (email.length == 0) {
      alert("l'email est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    if (!isNaN(email)) {   
      alert("l'email doit comporter une Lettre");
      verif = 0;
      return false;
    } else verif = 1;
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
      verif = 1;
    else{
      alert("l'email n'est pas valide");
      verif = 0;
      return false;
    }

    if (verif == 1) {  
      return true;
    }
  }

</script>   