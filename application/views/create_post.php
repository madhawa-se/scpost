<?php ?>
<html ng-app="myapp">
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
        <style type="text/css">
            .note-editable{
                min-height: 300px;
            }
            .dark {
                background-color: rgba(0, 0, 0, 0.49) !important;
            }
        </style>



    </head>
    <body>
        <script src="<?php echo base_url() ?>js/libs/jquery-2.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/angular.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/summernote.js"></script>
        <script>
            $(document).ready(function () {
                $('#summernote').summernote({
                    toolbar: [
                        ['mybutton', ['hello']],
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'hr']],
                        ['view', ['fullscreen', 'codeview']],
                        ['help', ['help']]
                    ],
                    buttons: {
                        hello: HelloButton
                    }
                });
                var node = document.createElement('p');
                node.id = "thumbnailholder";
                $('#summernote').summernote('insertNode', node)
                $('#sourcegen').click(function () {
                    var markupStr = $('#summernote').summernote('code');
                    alert(markupStr);
                });

            });

            var HelloButton = function (context) {
                var ui = $.summernote.ui;

                // create button
                var button = ui.button({
                    contents: '<i class="glyphicon glyphicon-eye-open"/>',
                    tooltip: 'hello',
                    click: function () {
                        angular.element($('#postCtrlId')).scope().setVisible(true);
                    }
                });

                return button.render();   // return button as jquery object 
            }

            var myapp = angular.module('myapp', []);
            myapp.controller('postCTRL', function ($scope) {
                $scope.name = "madhawa";
                $scope.img_insert = false;
                $scope.modelvisible = false;
                $scope.setVisible = function (state) {
                    $scope.$apply(function () {
                        $scope.modelvisible = state;
                    });

                };
                $scope.imgPreview = function () {
                    $scope.img_insert = true;
                    $('#thumbnailholder').html("<img src='" + $scope.image_source + "' class='img-responsive'/>");

                };

                $scope.setFile = function (element) {
                    $scope.currentFile = element.files[0];
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        $scope.image_source = event.target.result;
                        $scope.$apply();


                    };
                    // when the file is read it triggers the onload event above.
                    reader.readAsDataURL(element.files[0]);
                };
            });


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
        <div id="postCtrlId" ng-controller="postCTRL">
            <div  class="container" >

                <?php echo validation_errors(); ?>
                <?php echo form_open('create_post'); ?>
                <form role="form">
                    <div class="form-group">
                        <label for="article-name">Article title</label>
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
                        <textarea  id="summernote" name="summernote"></textarea >
                    </div>
                </form>
            </div>

            <!-- model-->

            <div ng-show="modelvisible" style="display: block; padding-right: 17px;" class="modal in dark" aria-hidden="false" tabindex="-1">
                <div class="modal-dialog"> 
                    <div class="modal-content"> 
                        <div class="modal-header">  
                            <button type="button" ng-click="modelvisible = false" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" >×</span>
                            </button>     
                            <h4 class="modal-title">Insert Image</h4>
                        </div> 
                        <div class="modal-body">
                            <div class="form-group note-group-select-from-files">
                                <label>Select from files</label>
                                <input type="file" class="note-image-input form-control" id="trigger" onchange="angular.element(this).scope().setFile(this)" accept="image/*">
                            </div>
                            <div class="form-group" style="overflow:auto;">
                                <label>Image URL</label>
                                <input class="note-image-url form-control col-md-12" type="text">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button ng-click="imgPreview()" href="#" class="btn btn-primary note-image-btn">Insert Image</button>
                        </div> 
                    </div>
                </div>
            </div>

            <!--end model-->
        </div>





    </body>
</html>

