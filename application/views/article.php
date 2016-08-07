<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://bootflat.github.io/bootflat/css/bootflat.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <style>
            body{
                background-color: #ededed;
            }
            .commenter-img>image{
                width: 50px;
                height: 50px;
            }
            .voteblock{
                display: inline-block;
                text-align: center;
            }
            .voteblock>a,.voteblock>span{
                display: inline-block;
            }
            .commentarea{
                height: 80px;
                border: 1px solid gainsboro;
            }
            .sidecontent{

                height: 400px;
            }
            .article-pane{
                background: #FFF;
                border: 1px solid RGBA(134, 134, 134, 0.35);
                padding: 5px 30px;
            }
            .share-social{
                width: 80px;
                height: 40px;
                display: inline-block;
                margin: 5px;
                border-radius: 50px;
                text-align: center;
                line-height: 2.8;
                color: white;
            }
            .share-fb{
                background-color: #24ccf0;
            }
            .share-google{
                background-color: rgb(246, 98, 98);
            }.social-connect {
                text-align: center;
                padding: 10px;
                background-color: rgb(252, 252, 252);
            }
            .social-icons >div{
                width: 50px;
                height:50px;
                display: inline-block;
                text-align: center;
                line-height: 2.4;
                border-radius: 50%;

                font-size: 20px;
            }
            .social-ico-twitter{
                color: #009999;
            }
            .social-ico-fb{
                color: #0086b3;
            }

        </style>

    </head>
    <body ng-app="myApp">
        <script src="<?php echo base_url() ?>js/libs/jquery-2.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/angular.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#commentbtn").click(function () {
                    sendComment();
                });

            });
            function popupwindow(url, title, w, h) {
                var left = (screen.width / 2) - (w / 2);
                var top = (screen.height / 2) - (h / 2);
                return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
            }


/////////////angular///
            var app = angular.module('myApp', []);
            app.controller('commentsCtrl', function ($scope, $http) {
                $scope.post_id;

                $scope.comments = [];
                $scope.lastcomment = 0;
                $scope.lastName = "Doe";
                var commentperload = 3;
                $scope.hasMore = true;

                $scope.getComment = function () {
                    var post_id = $("#post_id").val();
                    if ($scope.hasMore) {
                        $http({
                            method: 'GET',
                            url: '../comment/getPostComments/' + post_id + '/' + $scope.lastcomment
                        }).then(function successCallback(response) {
                            if (response.data.length < commentperload) {
                                $scope.hasMore = false;
                            }
                            $scope.comments = $scope.comments.concat(response.data);
                            $scope.lastcomment += response.data.length;

                            console.log(response);
                        }, function errorCallback(response) {

                        });
                    }
                };

                $scope.sendComment = function () {
                    var post_id = $("#post_id").val();
                    $.ajax({
                        url: "../comment",
                        type: "post",
                        data: {'comment': $scope.comment, 'post_id': post_id},
                        success: function (responce) {

                        },
                        error: function () {

                        }
                    });
                };
            });
//////////////////////    

            app.controller('articlesCtrl', function ($scope, $http) {
                $scope.latestArticles;
                $scope.hotArticles;
                $scope.count = 1;
                $scope.loadLatest = function () {
                    console.log("load latest");
                    $http({
                        method: 'GET',
                        url: '../article/getLast'
                    }).then(function successCallback(response) {
                        $scope.latestArticles = response.data;
                    }, function errorCallback(response) {

                    });

                };
                $scope.loadPopular = function () {

                    $http({
                        method: 'GET',
                        url: '../article/getpopular'
                    }).then(function successCallback(response) {
                        $scope.hotArticles = response.data;
                    }, function errorCallback(response) {

                    });

                };
                $scope.loadPopular();
                $scope.loadLatest();
            });
////////////////////// 
        </script>
        <?php
        // var_dump($this->_ci_cached_vars);
        $this->load->view($nev);
        ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-9 article-pane">
                    <div>
                        <div class="post-title h1"><?php echo $details['title'] ?></div>
                        <div>
                            <div>author:<span><?php echo $details['author'] ?></span> <br>
                                date: <span><?php echo $details['date'] ?></span>
                            </div>
                            <div>shares:<?php echo $details['shares'] ?>  likes: <?php echo $details['likes'] ?>views: <?php echo $details['views'] ?></div>
                        </div>
                        <!-- Load Facebook SDK for JavaScript -->   
                        <div class="share-container">
                            <a class="share-social share-fb" onclick="popupwindow('http://www.facebook.com/sharer/sharer.php?u=http://www.sciencealert.com/new-algorithm-will-help-make-sure-random-numbers-really-are-random', 'Facebook Share', '600', '400')" >
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a class ="share-social share-google" onclick="popupwindow('http://www.facebook.com/sharer/sharer.php?u=http://www.sciencealert.com/new-algorithm-will-help-make-sure-random-numbers-really-are-random', 'Facebook Share', '600', '400')">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                        <!-- Your share button code -->
                        <!-- <div class="post-img "><img class="img-responsive img-thumbnail" src="http://cdn.iflscience.com/images/7a360057-0107-58f9-a58d-64b2096d607a/extra_large-1466144127-chocolate-and-almonds.jpg"/></div>-->
                        <div class="post-auther"></div>
                        <div class="post-content">
                            <?php echo "<div><img class='img-responsive center-block' src='../../postdb/thumbs/thumb_{$details['post_id']}.jpg'/></div>" ?>
                            <?php echo $posthtml ?>
                        </div>

                        <div  class="panel article-auther">
                            <img alt="" src="http://1.gravatar.com/avatar/18635cef09f45858ce6b07c8612c9f5b?s=60&amp;d=mm&amp;r=g" src="http://1.gravatar.com/avatar/18635cef09f45858ce6b07c8612c9f5b?s=120&amp;d=mm&amp;r=g 2x" class="avatar avatar-60 photo" height="60" width="60">					
                            <h5>by <strong><?php echo $details['author'] ?></strong></h5>
                            <p>Martin is a web developer with an eye for design from Bulgaria. He founded Tutorialzine in 2009 and it still is his favorite side project.</p>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3 sidecontent" ng-controller="articlesCtrl">
                    <div class="social-connect">
                        <h4>Stay Connected</h4>
                        <div class="social-icons">
                            <div class="social-ico-fb fa fa-facebook"></div>
                            <div class="social-ico-twitter fa fa-twitter"></div>
                        </div>
                    </div>
                    <div class="article-latest">
                        <h4>latest articles</h4>
                        <div class="post-block" ng-repeat="article in latestArticles">
                            <h3>{{article.title}}</h3>
                            <img ng-src="http://lorempixel.com/300/200/transport/{{$index}}" alt="" class="img-responsive">

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
        <br>
        <hr>

        <section class="comments container" ng-controller="commentsCtrl">
            <!--  <?php var_dump($details) ?>-->
            <input id="post_id" type="hidden" value="<?php echo $details['post_id']; ?>"/>
            <ul class = "media-list col-md-4 col-lg-8">
                <li class = "media panel">
                    <a class = "pull-left commenter-img" href ="">
                        <img class = "media-object img-circle img-thumbnail" width="80px" height="80px" src = "http://localhost/science_posts/img/profilepic/pp%20%282%29.jpg" alt = "Generic placeholder image">
                    </a>
                    <div class = "media-body">

                        <div>
                            <h4 class = "media-heading">right a comment</h4>

                            <input class="commentarea" ng-model="comment"/>
                        </div>
                        <div class="clearfix"></div>
                        <div>
                            <input type="button" value="comment" class="btn btn-default" id="commentbtn" ng-click="sendComment()"/>
                        </div>

                    </div>
                </li>
            </ul>
            <ul class = "media-list col-md-4 col-lg-8" ng-repeat="comment in comments">

                <li class = "media panel">
                    <a class = "pull-left commenter-img" href ="../users/{{comment.user_id}}">
                        <img class = "media-object img-circle img-thumbnail" width="80px" height="80px" ng-src = "../../img/profilepic/pp ({{comment.user_id}}).jpg" alt = "Generic placeholder image"/>
                    </a>
                    <div class = "media-body">
                        <div class="voteblock pull-left">
                            <a href="" class="voted glyphicon glyphicon-chevron-up"></a><br>
                            <span class="badge"> 5 </span> <br>
                            <a href="" class="voted glyphicon glyphicon-chevron-down"></a><br>
                        </div>
                        <div class="pull-left">
                            <h4 class = "media-heading">{{comment.nickname}}></h4>

                            <p>
                                {{comment.content}}
                            </p>
                        </div>

                    </div>
                </li>
            </ul>
            <br>
            <div class="clearfix"></div>
            <button id="getcomment" ng-click="getComment()" ng-disabled="!hasMore" class="btn btn-info" des> load more comments</button>

        </section> 

        <section class="container" ng-controller="articlesCtrl" >
            <div class="pops-post row">
                <h4>popular articles</h4>
                <div class="pops-block col-sm-3" ng-repeat="articlex in hotArticles">
                    <h3>{{articlex.title}}</h3>
                    <img ng-src="http://lorempixel.com/300/200/transport/{{$index}}" alt="" class="img-responsive">
                    <div class="des">
                        discription of the post
                    </div>
                </div>          
            </div>
        </section>



    </body>
</html>
