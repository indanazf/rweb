<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sahabat Cipta</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    
  </head>

  <body>

   <div class="header">
     <div class="container">
       <img src="<?= base_url() ?>assets/images/logo.png" class="header__logo">
       <a href="<?php echo site_url('home') ?>"><div class="header__title">Sahabat Cipta</div></a>
       <input type="text" class="header__search" placeholder="Search">
       <div class="header__menu">
         <a href="#newsroom"><div class="header__menu__item">Newsroom</div></a>
         <a href="#involved"><div class="header__menu__item">Get Involved</div></a>
         <a href="#impact"><div class="header__menu__item">Our Impact</div></a>
         <a href="#works"><div class="header__menu__item">Our Works</div></a>
         <a href="#aboutus"><div class="header__menu__item header__menu__item--active">About Us</div></a>
       </div>
     </div>
   </div>
   <div class="header__frame"></div>

