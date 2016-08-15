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
    <?php $this->load->view('General/nav.top.view.php'); ?>
    <div class="container">
        <div class="row">
            <div class="row"><h1><?php echo $article->getTitle(); ?></h1></div>
            <div class="row"><?php echo anchor('news/pdf/' . $article->getId(), 'Download PDF'); ?></div>
            <hr>
            <div class="row"><?php echo img('uploads/' . $article->getPhoto()); ?></div>
            <div class="row"><?php echo $article->getBody(); ?></div>
        </div>
    </div>
<script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</body>
</html>