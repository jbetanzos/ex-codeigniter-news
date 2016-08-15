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

<div class="jumbotron" style="background-image: url('http://chainraise.com/wp-content/uploads/2015/04/world-1.jpg')">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-md-offset-3">
                <?php if (isset($error_message) && !empty($error_message)): ?>
                    <div role="alert" ng-class="[\'alert-\' + (type || \'warning\'), closeable ? \'alert-dismissable\' : null]" class="alert ng-isolate-scope alert-danger alert-dismissable" close="closeAlert($index)" type="danger" ng-repeat="alert in alerts">
                        <div ng-transclude=""><span class="ng-binding ng-scope"><?php echo $error_message;?></span></div>
                    </div>
                <?php endif; ?>
                <?php
                echo form_open('user/signup');
                ?>
                <div class="form-group">
                    <input name="email" id="email" type="text" placeholder="Email" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign up</button>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>

<div class="container">

</div>

<script src="<?php echo base_url(); ?>js/angular.min.js"></script>
<script src="<?php echo base_url(); ?>js/ui-bootstrap-tpls-0.13.0.min.js"></script>
</body>
</html>