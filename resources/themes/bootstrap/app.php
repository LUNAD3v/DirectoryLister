<!DOCTYPE html>

<html>

    <head>

        <title>LUNA镜像站<?php echo $lister->getListedPath(); ?></title>
        <link rel="shortcut icon" href="<?php echo THEMEPATH; ?>/img/folder.png">

        <!-- STYLES -->
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/css/style.css">
        <!-- <link href="<?php echo THEMEPATH; ?>/css/creative.min.css" rel="stylesheet"> -->

        <!-- SCRIPTS -->
        <script type="text/javascript" src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <div class="col-md-2 col-sm-12 col-xs-12" id="leftCol">

            <ul class="nav nav-stacked" id="sidebar">
                <li><a href="https://lunaluna.org">LUNA首页</a></li>
                <li><a href="#">帮助</a></li>
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

                <div class="navbar-right">

                    <ul id="page-top-nav" class="nav navbar-nav">
                        <li>
                            <a href="javascript:void(0)" id="page-top-link">
                                <i class="fa fa-arrow-circle-up fa-lg"></i>
                            </a>
                        </li>
                    </ul>

                    <?php  if ($lister->isZipEnabled()): ?>
                        <ul id="page-top-download-all" class="nav navbar-nav">
                            <li>
                                <a href="?zip=<?php echo $lister->getDirectoryPath(); ?>" id="download-all-link">
                                    <i class="fa fa-download fa-lg"></i>
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>

                </div>

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

                        <?php if (is_file($fileInfo['file_path'])): ?>

                            <a href="javascript:void(0)" class="file-info-button">
                                <i class="fa fa-info-circle"></i>
                            </a>

                        <?php else: ?>

                            <?php if ($lister->containsIndex($fileInfo['file_path'])): ?>

                                <a href="<?php echo $fileInfo['file_path']; ?>" class="web-link-button" <?php if($lister->externalLinksNewWindow()): ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-external-link"></i>
                                </a>

                            <?php endif; ?>

                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>

            </ul>
        </div>




    </div>
    <?php file_exists('footer.php') ? include('footer.php') : include($lister->getThemePath(true) . "/default_footer.php"); ?>

    <div id="file-info-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{modal_header}}</h4>
                </div>

                <div class="modal-body">

                    <table id="file-info" class="table table-bordered">
                        <tbody>

                        <tr>
                            <td class="table-title">MD5</td>
                            <td class="md5-hash">{{md5_sum}}</td>
                        </tr>

                        <tr>
                            <td class="table-title">SHA1</td>
                            <td class="sha1-hash">{{sha1_sum}}</td>
                        </tr>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

    <aside id="aside" class="sidebar col-sm-3 col-md-2 hidden-print small">
        <div class="sidebar-content">
            <div class="sidebar-body collapse in">

                <p>
                    <img src="<?php echo THEMEPATH; ?>/img/lm_logo.png" style="position: fixed; bottom: -180px; left: -230px; opacity: 0.1; z-index: -100" alt="">
                </p>
            </div>
        </div>
    </aside>


    </body>
    <script>
        $('#sidebar').affix({
            offset: {
                top: 245
            }
        });
    </script>

</html>
