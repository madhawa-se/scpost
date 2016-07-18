<html>
    <head>
        <title>users</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css"/>
        <style>
            body{
                background-color: #525252;
            }
            .centered-form{
                margin-top: 60px;
            }

            .centered-form .panel{
                background: rgba(255, 255, 255, 0.8);
                box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
            }

        </style>
        <script src="<?php echo base_url() ?>js/libs/jquery-2.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/angular.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/bootstrap.min.js"></script>

        <script>
            $(document).ready(function () {
                //var scope = angular.element(document.body).scope();
                // console.log(scope);
            });

////////////////////////////////////////////////////////////
            var app = angular.module('myApp', []);
            app.controller('commentCtrl', function ($scope, $http) {
                $scope.comments;
                $scope.lastcomment = 1;
                $scope.lastName = "Doe";

                $scope.loadComment = function () {
                    $http({
                        method: 'GET',
                        url: '../../comment/getUserComments/' + $scope.lastcomment
                    }).then(function successCallback(response) {
                        $scope.comments = response.data;
                        $scope.lastcomment += $scope.comments.length;
                        console.log(response);
                    }, function errorCallback(response) {

                    });
                };
            });
////////////////////////////////////////////////////////////


        </script>

    </head>
    <div class="container">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign Up<small>It's free!</small></h3>
                    </div>
                    <div class="panel-body">
                        <?php echo validation_errors(); ?>
                        <form role="form" method="post">
                            <div class="row">
                                <div>
                                    <div class="form-group">
                                        <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="user_name" id="user_name" class="form-control input-sm" placeholder="user Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" class="form-control input-sm" placeholder="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="password" id="password" class="form-control input-sm" placeholder="password">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="confirm" id="confirm" class="form-control input-sm" placeholder="confirm password">
                                    </div>
                                </div>

                            </div>




                            <input type="submit" value="Register" class="btn btn-info btn-block">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
