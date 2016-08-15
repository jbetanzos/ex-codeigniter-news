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
<?php $this->load->view('General/nav.top.view.php'); ?>
<br/>
<div class="container">
    <div class="row">
        <ul class="list-group">
            <?php foreach($articles as $article): ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-1">
                        <?php
                        $attributes = array(
                            'class' => 'btn btn-danger',
                            'role' => 'button'
                        );
                        echo anchor('news/delete/' . $article->getId(), 'Delete', $attributes);
                        ?>
                    </div>
                    <div class="col-md-11">
                        <?php echo $article->getTitle(); ?>
                    </div>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
    </div>

    <hr>

    <footer>
        <p>&copy; DemoSite News 2015</p>
    </footer>
</div>

<script src="<?php echo base_url(); ?>js/angular.min.js"></script>
<script src="<?php echo base_url(); ?>js/ui-bootstrap-tpls-0.13.0.min.js"></script>
</body>
</html>