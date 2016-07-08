<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nasiol | Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo CSS; ?>bootstrap.css" rel="stylesheet">
    <link href="<?php echo CSS; ?>dashboard.css" rel="stylesheet">
    <link href="<?php echo CSS; ?>datatable.css" rel="stylesheet">
    <link href="<?php echo DATATABLE; ?>Select/css/select.bootstrap.css" rel="stylesheet">
    <link href="<?php echo FILEINPUT; ?>css/fileinput.css" rel="stylesheet">


</head>

<body>
<?php require_once TEMPLATE . 'navbar.php'; ?>

<div class="container-fluid">
    <div class="row">
        <?php require_once TEMPLATE . 'nav_sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <!-- CONTENT !-->
            <?php echo $yield; ?>
            <!-- CONTENT !-->
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo JS; ?>jquery.cookie.js"></script>
<script src="<?php echo JS; ?>jquery-ui.js"></script>
<script src="<?php echo JS; ?>bootstrap.js"></script>
<script src="<?php echo JS; ?>custom/baseFunctions.js"></script>
<script src="<?php echo JS; ?>bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>validator.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>functions.js" ></script>
<script type="text/javascript" src="<?php echo DATATABLE; ?>datatable.js"></script>
<script type="text/javascript" src="<?php echo DATATABLE; ?>Select/js/dataTables.select.js"></script>
<script type="text/javascript" src="<?php echo FILEINPUT; ?>js/fileinput.js"></script>
<script type="text/javascript" src="<?php echo FILEINPUT; ?>js/locales/es.js"></script>
<script type="text/javascript" src="<?php echo FILEINPUT; ?>js/plugins/canvas-to-blob.js"></script>
</body>
</html>