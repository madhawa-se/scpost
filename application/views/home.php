
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
                var latestLastIndex = 0;
                var popularLastIndex = 0;
                $scope.hotArticles = [];
                $scope.latestArticles = [];

                $scope.loadPopular = function () {
                    $http({
                        method: 'GET',
                        url: '../index.php/article/getPopularPosts/' + popularLastIndex
                    }).then(function successCallback(response) {
                        popularLastIndex += 10;
                        $scope.hotArticles = $scope.hotArticles.concat(response.data);
                    }, function errorCallback(response) {

                    });

                };
                $scope.loadLatest = function () {

                    $http({
                        method: 'GET',
                        url: '../index.php/article/getLatestPosts/1'
                    }).then(function successCallback(response) {
                        latestLastIndex += 10;
                        $scope.latestArticles = response.data;
                    }, function errorCallback(response) {

                    });

                };

                $scope.loadPopular();
                $scope.loadLatest();
            });
        </script>
    </head>
    <body>


        <div class="container">

            <div class="">
                <div class="form-inline">
                    <input class="form-control" ><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
                </div>
            </div>
            <div class="" ng-controller="articlesCtrl">
                <h2> posts for you </h2>
                <div class="pops-post row" >

                    <h4>popular articles</h4>
                    <div class="pops-block col-sm-3" ng-repeat="articlex in hotArticles">
                        <a ng-href="../index.php/article/{{articlex.post_id}}">
                            <h3>{{articlex.title}}</h3>
                            <img ng-src="http://lorempixel.com/300/200/transport/{{$index}}" alt="" class="img-responsive">
                            <div class="des">
                                discription of the post
                            </div>
                        </a>
                    </div> 

                </div>
                <div class="">
                    <button class="btn btn-info" ng-click="loadPopular()">load more</button>
                </div>

                <h2> Latest posts</h2>
                <div class="pops-post row">
                    <h4>popular articles</h4>
                    <div class="pops-block col-sm-3" ng-repeat="articlex in latestArticles">
                        <h3>{{articlex.title}}</h3>
                        <img ng-src="http://lorempixel.com/300/200/transport/{{$index}}" alt="" class="img-responsive">
                        <div class="des">
                            discription of the post
                        </div>
                    </div>
                </div>
                <div class="">
                    <button class="btn btn-info" ng-click="loadLatest()">load more</button>
                </div>

            </div>


        </div>
    </body>
</html>