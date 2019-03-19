<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
              crossorigin="anonymous">
        <link rel="stylesheet" href="<?= base_url() ?>sbadmin2/css/style.css">
        <title>listyobiz.co.za</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3 fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="<?= base_url() ?>"><span style="color:#ff3232">listYo</span>biz</a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <?php if ($visitor_email == get_default_username() || strlen($visitor_email) == 0) {
                                ?>  <li class="nav-item"><a class="nav-link" href="<?php echo base_url("login/index"); ?>"><i class="fas fa-user"></i></a></li>
                            <?php } ?>

                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url("catalogue/index"); ?>">SPs</a></li>
                            <li  class="nav-item"><a class="nav-link" href="<?= base_url('search/categorylist') ?>"><i class="fas fa-book"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url("content/investors"); ?>">Investors </a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'feedback' ?>">Feedback </a></li>                         
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'help' ?>">Help </a></li>  
                        </ul>
                    </div>
                </div>
            </nav>
        </header>