<?php ?>
<html ng-app="myapp">
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
        <style>
            .note-editable{
                min-height: 300px;
            }
            .model-dark{
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background-color: rgba(26, 26, 26, 0.51);
                z-index: 1050;
            }
            .model-pop{
                position: relative;
            }
        </style>



    </head>
    <body>
        <script src="<?php echo base_url() ?>js/libs/jquery-2.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/angular.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/summernote.js"></script>
        <script>


            var myapp = angular.module('myapp', []);
            myapp.directive("fileread", [function () {
                    return {
                        scope: {
                            imsrc: '='
                        },
                        link: function (scope, element, attributes) {
                            element.bind("change", function (changeEvent) {
                                var reader = new FileReader();
                                reader.onload = function (loadEvent) {
                                    scope.$apply(function () {
                                        scope.fileread = loadEvent.target.result;
                                        alert(scope.fileread);
                                    });
                                }
                                reader.readAsDataURL(changeEvent.target.files[0]);
                            });
                        }
                    }
                }]);

            myapp.controller('thumbCTRL', function ($scope) {
                $scope.imgSrc;
                $scope.fuck = true;
                $scope.modelVisible = false;
                $scope.setVisible = function (state) {
                    $scope.$apply(function () {
                        $scope.modelVisible = state;
                    });
                };
            });
            $(document).ready(function () {
                $('#summernote').summernote({
                    toolbar: [
                        ['post', ['postimg', 'postbar']],
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                    ,
                    buttons: {
                        postimg: postimgBtn, postbar: postimgBtn
                    }
                });
                $('#sourcegen').click(function () {
                    var markupStr = $('#summernote').summernote('code');
                    alert(markupStr);
                });

                var node = document.createElement('p');
                node.id = "postthumb";
                $('#summernote').summernote('insertNode', node);
            });

            var postimgBtn = function (context) {


                var ui = $.summernote.ui;

                // create button
                var button = ui.button({
                    contents: '<i class="fa fa-child"/> Hello',
                    tooltip: 'hello',
                    click: function () {
                        angular.element('#model-wrapper').scope().setVisible(true);
                        //context.invoke('editor.insertText', 'hello');
                        // alert("hi");
                    }
                });

                return button.render();   // return button as jquery object 
            }
        </script>

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
            <?php echo validation_errors(); ?>
            <?php echo form_open('create_post'); ?>
            <form role="form">
                <div class="form-group">
                    <label for="article-name">Article title:</label>
                    <input type="text" class="form-control" id="article-name" name="article-name">
                </div>
                <div class="form-group">
                    <label for="pwd">tags</label>
                    <span class="article-tags">
                        <span class="label label-success">biology </span>
                        <span class="label label-warning">modern </span>
                        <span class="label label-info">space </span> 
                    </span>
                </div>
                <button type="submit" class="btn btn-default">Post article</button> <br><br>
                <div class="row">
                    <textarea  id="summernote" name="summernote">write your post here.use markup buttons to style your post.</textarea >
                </div>
            </form>
        </div>
        <div ng-controller="thumbCTRL" id="model-wrapper">{{fuck}}
            <div class="model-dark" ng-show="modelVisible">
                <div class="model-pop" id="imgSelecter" >
                    <div class="modal-dialog"> 
                        <div class="modal-content">    
                            <div class="modal-header">    
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="modelVisible=false">
                                    <span aria-hidden="true" >×</span>
                                </button>    
                                <h4 class="modal-title">Insert Image</h4>    
                            </div>    
                            <div class="modal-body">
                                <div class="form-group note-group-select-from-files">
                                    <label>Select from files</label>
        <!--                            <input class="note-image-input form-control" id="fileimg" ng-model="imgmodel" ng-change="readURL" name="files" accept="image/*" type="file">-->
                                    <input type="file" fileread="vm.uploadme" />
                                </div>
                                <div class="form-group" style="overflow:auto;"><label>Image URL</label>
                                    <input class="note-image-url form-control col-md-12" type="text">
                                    <div class=""><img ng-src="{{imsrc}}"/></div>
                                </div>
                            </div>    
                            <div class="modal-footer">
                                <button href="#" class="btn btn-primary note-image-btn " >Insert Image</button>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </body>
</html>

