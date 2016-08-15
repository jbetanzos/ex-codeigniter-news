<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $article->getTitle(); ?></title>
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">DemoSite News</a>
        </div>
    </div>
</nav>
<br/><br/><br/>
<div class="container">
    <div class="row">
        <div class="row"><h1><?php echo $article->getTitle(); ?></h1></div>
        <hr>
        <div class="row"><?php echo img('uploads/' . $article->getPhoto()); ?></div>
        <div class="row"><?php echo $article->getBody(); ?></div>
    </div>
</div>
</body>
</html>