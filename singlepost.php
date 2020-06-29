<?php
include_once("class/users.php");


   
if(isset($_GET['id'])){
$id = $_GET['id'] != ""? $_GET['id'] : "";  
  
   if(isset($_FILES['imgUpload'])){
    $_POST['imgUpload'] = $_FILES['imgUpload'];
    }

    $user = new User();
    $user_post = $user->read_single_post($id);
    /*echo"<pre>";
    print_r($user_post);
    echo"</pre>";
    die;*/
    $CurrentUser = new User();
   } 
   
    //$user = new User();
    //$select_res = $user->read_post();
    
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title><?=$user_post['title']?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header header">
        
        <div class="header__logo">
                
            <a class="logo" href="index.php">
                <img src="images/logo.svg" alt="Homepage">
            </a>
        </div> <!-- end header__logo -->

        <a class="header__search-trigger" href="#0"></a>
        <div class="header__search">

            <form role="search" method="get" class="header__search-form" action="#">
                <label>
                    <span class="hide-content">Search for:</span>
                    <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>

            <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

        </div>  <!-- end header__search -->

        <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
        <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6">Navigate to</h2>

            <ul class="header__nav">
                <li><a href="index.php" title="">Home</a></li>
                <li class="has-children">
                    <a href="#0" title="">Categories</a>
                    <ul class="sub-menu">
                        <li><a href="">Lifestyle</a></li>
                        <li><a href="">Health</a></li>
                        <li><a href="">Family</a></li>
                        <li><a href="">Management</a></li>
                        <li><a href="">Travel</a></li>
                        <li><a href="">Work</a></li>
                    </ul>
                </li>
                <li class="has-children current">
                    <a href="#0" title="">Blog</a>
                    <ul class="sub-menu">
                       
                    </ul>
                </li>
                <li><a href="" title="">Styles</a></li>
                <li><a href="" title="">About</a></li>
                <li><a href="" title="">Contact</a></li>
            </ul> <!-- end header__nav -->

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

        </nav> <!-- end header__nav-wrap -->

    </header> <!-- s-header -->


    <!-- s-content
    ================================================== -->
   
    <section class="s-content s-content--top-padding s-content--narrow">
            
        <article class="row entry format-standard">
        
            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                    <?=$user_post['title']?>
                </h1>
                <ul class="entry__header-meta">
                    <li class="date"><?=$user_post['created_at']?></li>
                    <li class="byline">
                        By
                        <a href="#0"><?php echo $CurrentUser->getFullname($user_post['username']);?></a>
                    </li>
                </ul>
            </div>
            
            <div class="entry__media col-full">
                <div class="entry__post-thumb">
                    <img src="./image/<?=$user_post['image']?>"/>
                </div>
            </div>

            <div class="col-full entry__main">

                <p class="lead drop-cap"><?=$user_post['body']?></p>
                <div class="entry__author">
                   

                    <div class="entry__author-about">
                        <h5 class="entry__author-name">
                            <span>Posted by</span>
                            <a href="#0"><?php echo $CurrentUser->getFullname($user_post['username']);?></a>
                        </h5>
                    </div>
                </div>

            </div> <!-- s-entry__main -->
           <div class="col-md-2" style="padding: 30px;">
            <a href="editpost.php?post_id=<?=$user_post['id']?>" class="btn btn-primary">Edit</a> 
           </div>
           <div class="col-md-2" style="float: right;padding: 30px;">
            <a href="delete.php?post_id=<?=$user_post['id']?>" class="btn btn-primary">Delete</a>
            </div>
        </article> <!-- end entry/article -->


       

         <!-- end comments-wrap -->

    </section> <!-- end s-content -->


    <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row">

            <div class="col-seven md-six tab-full popular">
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">
                    <article class="col-block popular__post">
                            <img style="height: 80px;"src="./image/<?=$user_post['image']?>" alt=""/>
                        </a>
                        <h5><?=$user_post['title']?></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href=""><?php echo $CurrentUser->getFullname($user_post['username']);?></a></span>
                            <span class="popular__date"><span>on</span>&nbsp;<?=$user_post['created_at']?></span>
                        </section>
                    </article>
                    
  
                </div> <!-- end popular_posts -->
                
            </div> <!-- end popular -->

            <div class="col-four md-six tab-full end">
                <div class="row">
                    <div class="col-six md-six mob-full categories">
                        <h3>Categories</h3>
        
                        <ul class="linklist">
                            <li><a href="#0">Lifestyle</a></li>
                            <li><a href="#0">Travel</a></li>
                            <li><a href="#0">Recipes</a></li>
                            <li><a href="#0">Management</a></li>
                            <li><a href="#0">Health</a></li>
                            <li><a href="#0">Creativity</a></li>
                        </ul>
                    </div> <!-- end categories -->
        
                    <div class="col-six md-six mob-full sitelinks">
                        <h3>Site Links</h3>
        
                        <ul class="linklist">
                            <li><a href="#0">Home</a></li>
                            <li><a href="#0">Blog</a></li>
                            <li><a href="#0">Styles</a></li>
                            <li><a href="#0">About</a></li>
                            <li><a href="#0">Contact</a></li>
                            <li><a href="#0">Privacy Policy</a></li>
                        </ul>
                    </div> <!-- end sitelinks -->
                </div>
            </div>
        </div> <!-- end row -->

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-six tab-full s-footer__about">
                        
                    <h4>About Wordsmith</h4>

                    <p></p>

                </div> <!-- end s-footer__about -->

                <div class="col-six tab-full s-footer__subscribe">
                        
                    <h4>Our Newsletter</h4>

                    <p></p>

                    <div class="subscribe-form">
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                
                            <input type="submit" name="subscribe" value="Send">
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>
                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">

                <div class="col-six">
                    <ul class="footer-social">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="col-six">
                    <div class="s-footer__copyright">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                    </div>
                </div>
                
            </div>
        </div> <!-- end s-footer__bottom -->

        <div class="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>

    </footer> <!-- end s-footer -->


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>