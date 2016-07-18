<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet"/>

        <style>
            #summernote{
                min-height: 500px;
            }
            .tag-input{
                max-width: 200px;
                display: inline-block;
            }
        </style>

    </head>
    <body>
        <script src="<?php echo base_url() ?>js/libs/jquery-2.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/bootstrap.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
        <script>
            $(document).ready(function () {
                $('#summernote').summernote({height: 300});
//                $('#sourcegen').click(function () {
//                    var markupStr = $('#summernote').summernote('code');
//                    alert(markupStr);
//                });

                $(".tag-input").keyup(function (e) {
                    if (e.keyCode == 13) {
                        insertTag($(this).val());
                    }

                });
            });

            function insertTag(text) {
                $('#article-tags').append('<span class="label label-success">' + text + '</span>');
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
            <form role="form">
                <div class="form-group">
                    <label for="article-name">Article title:</label>
                    <input type="text" class="form-control" id="article-name" value="<?php echo $details['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="pwd">tags</label>
                    <input type="text" class="form-control tag-input">
                    <span class="article-tags" id="article-tags">
                        <span class="label label-success">biology </span>
                        <span class="label label-warning">modern </span>
                        <span class="label label-info">space </span> 
                    </span>

                </div>

                <div class="row">
                    <div id="summernote"><?php echo($posthtml) ?></div>
                </div>

                <button type="button" data-toggle="modal"  data-target="#myModal" class="btn btn-default">save edits</button>
            </form>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">do you want to save changes?</h4>
                    </div>
                    <div class="modal-body">
                        <p>post will update...</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">discard</button>
                    </div>
                </div>

            </div>
        </div>




    </body>
</html>
