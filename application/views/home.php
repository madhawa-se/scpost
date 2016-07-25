
<!DOCTYPE html>

<html ng-app="myapp">
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
        <style>

        </style>
        <script src="<?php echo base_url() ?>js/libs/jquery-2.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/angular.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/bootstrap.min.js"></script>
        <script>
            var app = angular.module('myapp', []);
            app.controller('articlesCtrl', function ($scope, $http) {
                $scope.loadPopular = function () {

                    $http({
                        method: 'GET',
                        url: '../index.php/home/getPopularPosts'
                    }).then(function successCallback(response) {
                        $scope.hotArticles = response.data;
                    }, function errorCallback(response) {

                    });

                };
                $scope.loadPopular();
            });
        </script>
    </head>
    <body>
        <div class="">
            <?php
            print_r($popposts);
            ?>
            <div class="">
                <div class="container">
                    <h2> posts for you </h2>
                    <div class="pops-post row" ng-controller="articlesCtrl">
                        <h4>popular articles</h4>
                        <div class="pops-block col-sm-3" ng-repeat="articlex in hotArticles">
                            <h3>{{articlex.title}}</h3>
                            <img ng-src="http://lorempixel.com/300/200/transport/{{$index}}" alt="" class="img-responsive">
                            <div class="des">
                                discription of the post
                            </div>
                        </div>          
                    </div>
                </div>
            </div>
            <div class="">
                <div class="">
                    <h2> posts for you </h2>
                </div>
            </div>
            <div class="">
                <div class="">
                    <h2> posts for you </h2>
                </div>
            </div>


        </div>
    </body>
</html>