<html>
    <head>
        <title>users</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css"/>
        <style>
            .profile-wall{
                height: 200px;
                background-color: #5addd8;
                position: relative;
                text-align: center;
                color: white;
            }
            .profile-pic{
                width: 120px;
                height: 120px;
                position: absolute;
                left: 0;
                right: 0;
                margin-left: auto;
                margin-right: auto;
                bottom: -60px;
            }
            .profile-block{
                vertical-align: bottom;
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
    <body ng-app="myApp" ng-controller="commentCtrl">

        <nav class="navbar navbar-default navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Brand</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container">
            <div>
                <div class="row profile-wall">
                    <div class="prof-name"><h1><?php echo($userData[0]->firstname) . " " . ($userData[0]->lastname) ?></h1></div>
                    <div class="profile-pic">
                        <img class="img-circle img-thumbnail" src="<?php echo base_url() . "img/profilepic/pp (" . $userData[0]->user_id . ").jpg" ?>" alt="">
                    </div>
                    <input type="button" value="desable account" class="btn btn-default pull-right profile-block"/>
                </div>
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#">About</a></li>
                        <li role="presentation"><a href="#">Active logs</a></li>
                        <li role="presentation"><a href="#">Messages</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>date</th>
                            <th>post</th>
                            <th>comment</th>
                        </tr>
                    </thead>
                    <tbody   ng-repeat="comment in comments">
                        <tr>
                            <td><a href="#" class="glyphicon glyphicon-link">{{comment.title}}</a></td>
                            <td>{{comment.date}}</td>
                            <td>{{comment.content}}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">


            <!-- pagination start -->
            <div class="text-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- pagination end -->
            </div>
            <div class="container">
                <hr>
            </div>
            <div> <button ng-click="loadComment()">load content</button> </div>
        </div>

    </body>
</html>
