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

<div class="jumbotron" style="background-image: url('http://chainraise.com/wp-content/uploads/2015/04/world-1.jpg')">
    <div class="container text-right">
        <h1>World News</h1>
        <p>Since its debut, CO-News has expanded its reach to a number of cable and satellite <br/>television providers, several websites, and specialized closed-circuit channels.</p>
        <p>
            <?php
                $attributes = array(
                    'class' => 'btn btn-primary btn-lg',
                    'role' => 'button'
                );

                echo anchor('feed/', 'RSS Feed', $attributes);
            ?>

            <?php
            $attributes = array(
                'class' => 'btn btn-info btn-lg',
                'role' => 'button'
            );

            echo anchor('user/signup/', 'Sing Up', $attributes);
            ?>
        </p>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach($articles as $article): ?>
            <div class="col-md-4">
                <h3><?php echo $article->getTitle(); ?></h3>
                <p><?php echo substr(strip_tags($article->getBody()), 0, 250) . "..."; ?></p>
                <p><?php
                        $attributes = array(
                            'class' => 'btn btn-default',
                            'role' => 'button'
                        );
                        echo anchor('news/show/' . $article->getId(), 'View more &raquo;', $attributes);
                    ?>
                </p>
            </div>
        <?php endforeach;?>
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