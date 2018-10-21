<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Phangisa</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() ?>sbadmin2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="<?= base_url() ?>sbadmin2/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?= base_url() ?>sbadmin2/dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="<?= base_url() ?>sbadmin2/vendor/morrisjs/morris.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?= base_url() ?>sbadmin2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <!-- DataTables CSS -->
        <link href="<?= base_url() ?>sbadmin2/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="<?= base_url() ?>sbadmin2/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116318339-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-116318339-1');
        </script>

    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                        <a class="navbar-brand" href="<?php echo base_url("catalogue/index"); ?>">Phangisa</a>
                </div>
                <!-- /.navbar-header -->







                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-reorder"></i><i class="fa fa-reorder"></i><i class="fa fa-reorder"></i><i class="fa fa-reorder"></i>
                        </a>	

                        <!-- /.dropdown-messages -->
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">


                            <?php if ($visitor_email == get_default_username()) { ?>
                                <li><a href="<?php echo base_url() . 'registration' ?>"><i class="fa fa-user-plus fa-fw"></i> Account</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url() . 'index.php/login' ?>"><i class="fa fa-sign-out fa-fw"></i> Login</a></li>

                                <?php
                            } else {
                                ?>
                                <li><a href="<?php echo base_url() . 'profile' ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>

                                </li>

                                <li class="divider"></li>
                                <li><a href="<?php echo base_url() . 'login/logout' ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                            <?php } ?>



                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>


                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <?php if ($visitor_email == get_default_username() || strlen($visitor_email) == 0) {
                                ?>  <br/> <li role="presentation"><p>   &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("login") ?>"><button   type="button" class="btn btn-danger">User Login</button></a></p></li>
                            <?php } ?>
                            <li role="presentation"><a href="<?php echo base_url("catalogue/index"); ?>"> <i class="fa fa-home"></i>  Home </a></li>
                            <li role="presentation"><a href="<?php echo base_url() . 'content/how_does_it_work' ?>"><i class="fa fa-question-circle"></i>  How it works </a></li>  
                            <li role="presentation"><a href="<?php echo base_url("catalogue/index"); ?>"><i class="fa fa-shopping-bag"></i> Service Providers</a></li>
                            <li><a href="<?= base_url('search/categorylist') ?>"><i class="fa fa-search-minus"></i>  Filter Ads</a></li>
                            <li role="presentation"><a href="<?php echo base_url("content/investors"); ?>"><i class="fa fa-umbrella"></i> Investors </a></li>
                            <li role="presentation"><a href="<?php echo base_url() . 'content/about' ?>"><i class="fa fa-info-circle"></i>  About </a></li>
                            <li role="presentation"><a href="<?php echo base_url() . 'content/terms_conditions' ?>"><i class="fa fa-gavel"></i>  Terms & Conditions </a></li>
                            <li role="presentation"><a href="<?php echo base_url() . 'feedback' ?>"><i class="fa fa-pencil"></i>  Feedback </a></li>                         
                            <li role="presentation"><a href="<?php echo base_url() . 'help' ?>"><i class="fa fa-hand-paper-o"></i>  Help </a></li>  
                            <li role="presentation"><a href="<?php echo base_url() . 'content/refer' ?>"><i class="fa fa-users"></i>  Refer </a></li>   
                            <?php
                            if ($visitor_email == get_default_username()) {
                                
                            } else {
                                ?>
                                <li role="presentation"><a href="<?php echo base_url() . 't' ?>"> <button   type="button" class="btn btn-danger">My Businesses</button> </a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <div id="page-wrapper">

