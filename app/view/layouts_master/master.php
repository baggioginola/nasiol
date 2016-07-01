<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Professional Nano Coating Products | ® NASIOL</title>
    <meta name="google-site-verification" content="sNLsMzvrFWhJlkEDpVhD-pDfvTKXkIcWZMYaJQM5Kx0" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="owner" content="Nasiol" />
    <meta name="copyright" content="(c) 2016" />
    <meta name="reply-to" content="info@nasiol.com" />
    <meta name="language" content="English" />

    <meta name="description" content="SPECIAL COATING - We are the pioneer ✓ Hi-tech nano coatings manufacturer in the world. You can see ✓nano coatings product price in our website. ➤ info@nasiol.com" />

    <link href="http://www.nasiol.com/nasiol.ico" rel="icon" />
    <link href="http://www.nasiol.com/" rel="canonical" />

    <!-- Begin jquery library -->
    <script src="<?php echo JS; ?>jquery.min.js"></script>
    <!-- End jquery library -->
    <script src="<?php echo JS; ?>deprecated.js"></script>

    <!-- Begin Google fonts (Oswald & Open Sans) -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans&subset=latin,greek,cyrillic,vietnamese' rel='stylesheet' type='text/css'>
    <!-- End Google fonts (Oswald & Open Sans) -->

    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>fonts.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>cloud-zoom.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>jquery.qtip.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo JS; ?>flexslideshow/flexslideshow.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>slidingbox.css" />
    <link rel="stylesheet" media="all" href="<?php echo CSS; ?>mobile.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>blog_manager_custom.css" /> <!-- ATTENTION! Blog Manager extension is NOT included in the theme download pack! If you want to use it, you must purchase the extension here: http://www.echothemes.com -->

    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>jquery-ui-1.8.16.custom.css" />

    <meta name="google-site-verification" content="xQAY1vSFJiACiLt-VT1H1IKYjShVZjwPrc6vFVjG_Hw" />
</head>

<body>

<?php require_once TEMPLATE . 'top_bar.php'; ?>

<?php require_once TEMPLATE . 'top_menu.php' ?>

<?php
global $app;
$req = $app->request;

$resourceUri = $req->getResourceUri();

if($resourceUri == '/') {
    require_once __VIEW__ . 'slider.php';
}
?>


<div id="container-wrapper"><?php echo $yield; ?></div>

<div style="clear:both;"></div>

<?php require_once TEMPLATE . 'footer.php'; ?>

<script type="text/javascript" src="<?php echo JS; ?>common.js"></script>

<script type="text/javascript" src="<?php echo JS; ?>custom.js"></script>
<script type="text/javaScript" src="<?php echo JS; ?>cloud-zoom.1.0.2.js"></script>
<script type="text/javaScript" src="<?php echo JS; ?>slidingbox.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>tooltip/jquery.qtip.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>tooltip/tooltip.js"></script>
<script type="text/javaScript" src="<?php echo JS; ?>jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>flexslideshow/jquery.flexslider-min.js"></script>

</body>
</html>