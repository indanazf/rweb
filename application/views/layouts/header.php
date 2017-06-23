<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url() ?>assets/favicon.ico">

    <title>Sahabat Cipta</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/font.css" rel="stylesheet">

    <!-- full slider -->
    <link href="<?= base_url() ?>assets/css/jquery.fullPage.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/fullslider.css" rel="stylesheet">

    <!-- animate -->
    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">

    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
  
    
  </head>

  <body>

    
     <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
            <a href="<?php echo site_url('home') ?>"><img src="<?= base_url() ?>assets/images/logo-white.png" class="header__logo">
           </a>
            <input type="text" class="header__search" placeholder="Search">

          
        </div>

        <?php
        $controller_name = $this->router->class;
        if($controller_name == 'home') {
        ?>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li id="aboutus_nav" class="active"><a onclick="GotoPage('aboutus')" >About Us</a></li>
            <li id="works_nav"><a onclick="GotoPage('works')" >Our Works</a></li>
            <li id="impact_nav"><a onclick="GotoPage('impact')" >Our Impact</a></li>
            <li id="involved_nav"><a onclick="GotoPage('involved')" >Get Involved</a></li>
            <li id="newsroom_nav"><a onclick="GotoPage('newsroom')" >Newsroom</a></li>
          </ul>
        </div><!--/.nav-collapse -->
        <?php
        } else {
        ?>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li id="aboutus_nav"><a href="<?php echo site_url('home#aboutus') ?>" >About Us</a></li>
            <li id="works_nav"><a href="<?php echo site_url('home#works') ?>">Our Works</a></li>
            <li id="impact_nav"><a href="<?php echo site_url('home#impact') ?>">Our Impact</a></li>
            <li id="involved_nav"><a href="<?php echo site_url('home#involved') ?>">Get Involved</a></li>
            <li id="newsroom_nav"><a href="<?php echo site_url('home#newsroom') ?>">Newsroom</a></li>
          </ul>
        </div>
        <?php
        }
        ?>
      </div>
    </nav>
    

    <div class="header__frame"></div> 

