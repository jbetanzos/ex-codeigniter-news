<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Articles</title>
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">DemoSite News</a>
        </div>
    </div>
</nav>
<br/><br/>

<div class="container">
    <h1><?php echo $heading; ?></h1>
    <?php echo $message; ?>
</div>

<script src="<?php echo base_url(); ?>js/angular.min.js"></script>
<script src="<?php echo base_url(); ?>js/ui-bootstrap-tpls-0.13.0.min.js"></script>
</body>
</html>