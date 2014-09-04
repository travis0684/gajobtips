<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

   <?php wp_enqueue_script( 'jquery' ); ?>

    <?php wp_head(); ?>
    <?php define('WP_USE_THEMES', false); get_header(); ?>
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top mynav" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h2 style="margin-bottom:0;"><a href="index.php" style="color:#FFF;">Georgia Job T.I.P.S Inc.</a></h2>
          <p>Training Innovations Placement Service</p>
        </div>
        <div class="navbar-collapse collapse">
          <div class="navbar-right text-center" style="color:#fff; margin-top:20px;">
            <a href="https://www.facebook.com/GeorgiajobTIPS" style="color:#FFF;"><span class="fa fa-facebook-square fa-2x"></span><br>Like Us</a>
          </div>
          <!--<form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>-->
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    
