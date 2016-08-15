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
<br/><br/><br/><br/>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <h1>Create your password</h1>
            <?php
            $attributes = array('id' => 'PasswordForm', 'name' => 'PasswordForm');
            $hidden = array('email' => $email, 'key' => $key);
            echo form_open('user/changepassword', $attributes, $hidden);
            ?>


            <div class="form-group">
                <input name="password" id="password" type="password" placeholder="" class="form-control">
            </div>
            <div class="form-group">
                <input name="confirmpass" id="confirmpass" type="password" placeholder="" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Create</button>

            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>

<div class="container">

</div>

<script src="<?php echo base_url(); ?>js/angular.min.js"></script>
<script src="<?php echo base_url(); ?>js/ui-bootstrap-tpls-0.13.0.min.js"></script>
</body>
</html>