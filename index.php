<?php

    $welcome_url = 'http://161.202.225.107/+welcome';
    $push = false;

if( isset($_GET['push']) ){
    $decrypt_url = 'http://161.202.225.107/+decrypt';
    if($_GET['code']){
    $decrypt_url .= '?code='.$_GET['code'].'&push='.urlencode($_GET['push']);
    }else{
    $decrypt_url .= '?push='.urlencode($_GET['push']);
    }

    $push = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>@xavps #Hackathon Powered by Koding</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

<link rel="stylesheet" href="http://161.202.225.107/assets/css/normalize.css">
<link rel="stylesheet" href="http://161.202.225.107/assets/css/framework.css">
<link rel="stylesheet" href="http://161.202.225.107/assets/css/style.css">

<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!--[if IE]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="html">
<section class="w-section mobile-wrapper">

    <div class="page-content xavps-content" id="main-stack" xavps-scroll="0" xavps-splash="2999" xavps-redirect="<?php echo ($push) ? $decrypt_url : $welcome_url; ?>" xavps-decrypt="<?php echo ($push) ? 'true' : 'false'; ?>" >
      <div class="w-nav navbar"></div>
      <div class="body padding">
        <div class="splash-logo"></div>
        <div class="bottom-section padding text-centered">
          <h4>Now Loading ...</h4>
          <p class="welcome-splash-text">PUSH TO START</p>
          <div class="separator-big"></div>
          <div class="link-upper">BY @XAVPS</div>
          <div class="separator-bottom"></div>
        </div>
      </div>
    </div>
    <div class="page-content loading-mask" id="new-stack">
      <div class="loading-icon">
        <div class="navbar-button-icon icon ion-load-d"></div>
      </div>
    </div>
    <div class="shadow-layer"></div>
  </section>
</body>
<script src="http://161.202.225.107/hack.app.js"></script>
</html>