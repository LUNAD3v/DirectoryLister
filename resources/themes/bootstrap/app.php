<!DOCTYPE html>

<html>

    <head>

        <title>LUNA协会镜像站</title>
        <link rel="shortcut icon" href="<?php echo THEMEPATH; ?>/img/folder.png">

        <!-- STYLES -->
        <link rel="stylesheet" href="<?php echo THEMEPATH; ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo THEMEPATH; ?>/css/mdb.min.css">
        <link rel="stylesheet" href="<?php echo THEMEPATH; ?>/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/css/style.css">
        <!-- <link href="<?php echo THEMEPATH; ?>/css/creative.min.css" rel="stylesheet"> -->

        <!-- SCRIPTS -->
        <script type="text/javascript" src="<?php echo THEMEPATH; ?>/js/jquery.min.js"></script>
        <script src="<?php echo THEMEPATH; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo THEMEPATH; ?>/js/directorylister.js"></script>

        <!-- FONTS -->
        <!-- <link rel="stylesheet" type="text/css"  href="//fonts.googleapis.com/css?family=Cutive+Mono"> -->

        <!-- Plugin CSS -->
        <link href="<?php echo THEMEPATH; ?>/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- META -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">


    </head>

    <body>

    <div class="row">
        <div class="col-md-2 col-sm-12 col-xs-12">

            <ul class="nav nav-stacked" id="sidebar">
                <li><a href="https://lunaluna.org">LUNA首页</a></li>
                <li><a href="mailto:lunaluna@riseup.net">联系我们</a></li>
            </ul>

        </div>
    <div id="page-content" class="container col-md-10 col-sm-12 col-xs-12">

            <?php file_exists('header.php') ? include('header.php') : include($lister->getThemePath(true) . "/default_header.php"); ?>

            <?php if($lister->getSystemMessages()): ?>
                <?php foreach ($lister->getSystemMessages() as $message): ?>
                    <div class="alert alert-<?php echo $message['type']; ?>">
                        <?php echo $message['text']; ?>
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        <div id="page-navbar" class="navbar navbar-default navbar-fixed-top">
            <div class="container">

                <?php $breadcrumbs = $lister->listBreadcrumbs(); ?>

                <ul class="navbar-text">
                    <?php foreach($breadcrumbs as $breadcrumb): ?>
                        <?php if ($breadcrumb != end($breadcrumbs)): ?>
                            <a href="<?php echo $breadcrumb['link']; ?>"><?php echo $breadcrumb['text']; ?></a>
                            <span class="divider">/</span>
                        <?php else: ?>
                            <?php echo $breadcrumb['text']; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>



            <div id="directory-list-header">
                <div class="row">
                    <div class="col-md-7 col-sm-6 col-xs-10">文件名</div>
                    <div class="col-md-2 col-sm-2 col-xs-2 text-right">文件大小</div>
                    <div class="col-md-3 col-sm-4 hidden-xs text-right">修改时间</div>
                </div>
            </div>



            <ul id="directory-listing" class="nav nav-pills nav-stacked">

                <?php foreach($dirArray as $name => $fileInfo): ?>
                    <li data-name="<?php echo $name; ?>" data-href="<?php echo $fileInfo['url_path']; ?>">
                        <a href="<?php echo $fileInfo['url_path']; ?>" class="clearfix" data-name="<?php echo $name; ?>">


                            <div class="row">
                                <span class="file-name col-md-7 col-sm-6 col-xs-9">
                                    <i class="fa <?php echo $fileInfo['icon_class']; ?> fa-fw"></i>
                                    <?php echo $name; ?>
                                </span>

                                <span class="file-size col-md-2 col-sm-2 col-xs-3 text-right">
                                    <?php echo $fileInfo['file_size']; ?>
                                </span>

                                <span class="file-modified col-md-3 col-sm-4 hidden-xs text-right">
                                    <?php echo $fileInfo['mod_time']; ?>
                                </span>
                            </div>

                        </a>


                    </li>
                <?php endforeach; ?>

            </ul>
        </div>




    </div>
    <?php file_exists('footer.php') ? include('footer.php') : include($lister->getThemePath(true) . "/default_footer.php"); ?>

    <aside id="aside" class="sidebar col-sm-3 col-md-2 hidden-print small">
        <div class="sidebar-content">
            <div class="sidebar-body collapse in">
                <p>
                    <img src="<?php echo THEMEPATH; ?>/img/lm_logo.png" style="position: fixed; bottom: -1px; left: -2px; opacity: 0.4; z-index: -100" alt="">
                </p>
            </div>
        </div>
    </aside>


    </body>


</html>
