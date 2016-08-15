<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DemoSite News - Administrator</title>
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/textAngular.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/font-awesome.min" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
</head>
<body>
    <?php $this->load->view('General/nav.top.view.php'); ?>
    <div class="container">
        <br/><br/><br/>
        <div class="row">
            <?php echo validation_errors('
                <div role="alert" ng-class="[\'alert-\' + (type || \'warning\'), closeable ? \'alert-dismissable\' : null]" class="alert ng-isolate-scope alert-danger alert-dismissable" close="closeAlert($index)" type="danger" ng-repeat="alert in alerts">
                    <div ng-transclude=""><span class="ng-binding ng-scope">
            ', '</span></div></div>'); ?>
            <?php
                $attributes = array('id' => 'NewsForm', 'name' => 'NewsForm');
                echo form_open_multipart('news/create', $attributes);
            ?>
            <h1>Create News</h1>
            <div ng-class="{'has-error' : !inputModel}" class="form-group has-error">
                <p><input name="title" id="title" type="text" tooltip-enable="!inputModel" tooltip-trigger="mouseenter" tooltip-placement="top" tooltip="Enter the title of the new" placeholder="Type the news title" class="form-control ng-pristine ng-valid ng-touched" ng-model="inputModel"></p>
                <div ng-app="TextAngularDemo" ng-controller="DemoController">
                    <div text-angular ng-model="htmlContent" name="body" id="body" ta-text-editor-class="border-around" ta-html-editor-class="border-around"></div>
                </div>
            </div>
            <p>
                <div class="fileUpload btn btn-primary">
                    <span>Upload Article's Image</span>
                    <?php
                    $photo = array(
                        'name'        => 'photo',
                        'id'          => 'photo',
                        'class'       => 'upload',
                    );
                    echo form_upload($photo);
                    ?>
                </div>
                <button class="btn btn-success" type="submit">Save Article</button>
            </p>
            <?php
                echo form_close();
            ?>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>js/angular.min.js"></script>
    <script src="<?php echo base_url(); ?>js/ui-bootstrap-tpls-0.13.0.min.js"></script>
    <script src="<?php echo base_url(); ?>js/textAngular-rangy.min.js"></script>
    <script src="<?php echo base_url(); ?>js/textAngular-sanitize.min.js"></script>
    <script src="<?php echo base_url(); ?>js/textAngular.min.js"></script>
    <script type="text/javascript">
        (function() {
            angular
                .module("TextAngularDemo", ['textAngular'])
                .controller("DemoController", DemoController);

            function DemoController($scope) {
                $scope.id = "body";
                $scope.name = "body";
            };
        })();
    </script>
</body>
</html>