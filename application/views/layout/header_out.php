<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Business Online</title>

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
                    <a class="navbar-brand" href="<?php echo base_url("catalogue/index"); ?>">Business Online</a>
                </div>
                <!-- /.navbar-header -->


                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                            <?php if ($visitor_email == get_default_username()  || strlen($visitor_email)==0)  
                            {?>  <br/> <li role="presentation"><p>   &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("login")?>"><button   type="button" class="btn btn-danger">User Login</button></a></p></li>
                            <?php   } ?>
                               <li role="presentation"><a href="<?php echo base_url("catalogue/index"); ?>"> <i class="fa fa-home"></i>  Home </a></li>
                            <li role="presentation"><a href="<?php echo base_url() . 'content/how_does_it_work' ?>"><i class="fa fa-question-circle"></i>  How it works </a></li>  
                            
                            
                            
                            
                            

 <li role="presentation"><a href="<?php echo base_url("catalogue/index"); ?>"><i class="fa fa-shopping-bag"></i> Service Providers</a></li>
                            <li>
                                <a href="<?= base_url('search/categorylist') ?>"><i class="fa fa-search-minus"></i>  Filter Ads</a>
                            </li>
                       
                            <li role="presentation"><a href="<?php echo base_url("content/investors"); ?>"><i class="fa fa-umbrella"></i> Investors </a></li>
                      
                                 <li role="presentation"><a href="<?php echo base_url() . 'content/about' ?>"><i class="fa fa-info-circle"></i>  About </a></li>
                            <li role="presentation"><a href="<?php echo base_url() . 'content/terms_conditions' ?>"><i class="fa fa-gavel"></i>  Terms & Conditions </a></li>
                            <li role="presentation"><a href="<?php echo base_url() . 'feedback' ?>"><i class="fa fa-pencil"></i>  Feedback </a></li>  
                            <li role="presentation"><a href="<?php echo base_url() . 'help' ?>"><i class="fa fa-hand-paper-o"></i>  Help </a></li>   
                            <li role="presentation"><a href="<?php echo base_url() . 'content/refer' ?>"><i class="fa fa-users"></i>  Refer </a></li> 
                                
                            
                             

                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">