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
                $scope.latestArticles;
                $scope.hotArticles;
                $scope.count = 1;
                $scope.loadLatest = function () {

                    $http({
                        method: 'GET',
                        url: '../index.php/getArticles/getLast'
                    }).then(function successCallback(response) {
                        $scope.latestArticles = response.data;
                    }, function errorCallback(response) {

                    });

                };
                $scope.loadPopular = function () {

                    $http({
                        method: 'GET',
                        url: '../index.php/getArticles/getpopular'
                    }).then(function successCallback(response) {
                        $scope.hotArticles = response.data;
                    }, function errorCallback(response) {

                    });

                };
                  $scope.loadPopular();
                //  $scope.loadLatest();
            });
        </script>
    </head>
    <body>
        <div>angular+bootstrap template</div>
        <div class="container">
            <div class="row">
                <div class="form-inline">
                    <div class="form-group">
                        <input type="text" value="" class="form-control"/>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span> 
                        </button>  
                    </div>
                </div>

            </div>
            <div class="row">
                <div id="filter-panel" class="collapse filter-panel">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-inline" role="form">
                                <div class="form-group">
                                    <label class="filter-col" style="margin-right:0;" for="pref-perpage">Rows per page:</label>
                                    <select id="pref-perpage" class="form-control">
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option selected="selected" value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
                                        <option value="400">400</option>
                                        <option value="500">600</option>
                                        <option value="1000">1000</option>
                                    </select>                                
                                </div> 
                                <div class="form-group">
                                    <label class="filter-col" style="margin-right:0;" for="pref-orderby">Order by:</label>
                                    <select id="pref-orderby" class="form-control">
                                        <option>Descendent</option>
                                    </select>                                
                                </div> <!-- form group [order by] --> 

                            </form>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#filter-panel">
                    <span class="glyphicon glyphicon-cog"></span> Advanced Search
                </button>
            </div>

            <section class="container" ng-controller="articlesCtrl" >
                <div class="pops-post row">
                    <h4>popular articles</h4>
                    <div class="pops-block col-sm-3" ng-repeat="articlex in hotArticles">
                        <h3>{{articlex.title}}</h3>
                        <img ng-src="http://logremxcxcxcxpixel.com/300/200/transport/{{$index}}" alt="" class="img-responsive">
                        <div class="des">
                            discription of the post
                        </div>
                    </div>          
                </div>
            </section>
        </div>
    </body>
</html>