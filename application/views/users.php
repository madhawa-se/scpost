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
        </style>

    </head>
    <body>
        <script src="<?php echo base_url() ?>js/jquery-2.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
        <div class="container">
            <div class="row">
                <form class="form-inline">
                    <input type="text" class="form-control"/>
                    <input type="button" class="btn btn-primary" value="search"/>
                </form>
            </div>
            <div class="row">
                <!-- -->
                <?php
                foreach ($usersData as $row) {
                    ?>
                    <div class = "col-lg-3 col-md-4 col-xs-12">
                        <div class = "user-panel panel clearfix">
                            <div class = "user-gravatar48 pull-left">
                                <a href = "/users/6309/vonc"><div class = "gravatar-wrapper-48"><img class = "img-circle img-thumbnail" src = "<?php echo base_url() . "img/profilepic/pp (" . $row->user_id . ").jpg" ?>" alt = "" height = "48" width = "48"></div></a>
                            </div>
                            <div class = "user-details pull-left">
                                <a href = "../users/<?php echo $row->user_id ?>"><?php echo $row->firstname ?></a>
                                <span class = "user-location"><?php echo $row->city ?></span>
                                <div class = "user-tags">
                                    <a href = "#" class="label label-info">Android</a> <a href = "#" class="label label-success">Software</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="row">
                <?php echo $pagination ?>
            </div>
        </div>

    </body>
</html>
