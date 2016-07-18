<html>
    <head>
        <title>users</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css"/>
        <style>
            .user-panel{
                padding: 10px;
            }
            .form-social{
                padding: 5px;
                margin: 5px;
            }
        </style>

    </head>
    <body>
        <script src="<?php echo base_url() ?>js/libs/jquery-2.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>js/libs/bootstrap.min.js"></script>
        <div class="container">
            <div class="row col-md-8">
                <div class="form-left col-md-4">
                    <h3>login with social media</h3>
                    <div>
                        <button class="form-social btn btn-info">login with facebook</button>
                        <button class="form-social btn btn-danger">login with google</button>
                    </div>
                </div>
                <div class="form-right col-md-8">
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal" method="post">

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" id="username" placeholder="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password"  id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="checkpoint">forget username or password</a>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
