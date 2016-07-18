<html>
    <head>
        <title>users</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css"/>
        <style>
            body{
                background-color: #ededed;
            }
            .vcenter{
                margin-top: 50px;
            }
            .alert-info{
                background-color: #5CC57B;
                color: white;
            }
        </style>

    </head>
    <body>
        <script src="<?php echo base_url() ?>js/jquery-2.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
        <div class="container" >
            <div class="alert alert-info">
                Enter your email address to recover account.
                We will send you resetting information.
            </div>
            <div class="row vcenter">


                <div class="form-right col-md-8" >
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal" method="post">

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" id="username" placeholder="username">
                            </div>

                        </div>
                        <div>
                            <input type="submit" value="Reset" class="btn btn-info">
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </body>
</html>
