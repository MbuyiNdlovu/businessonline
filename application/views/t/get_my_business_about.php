<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        .t {
            font-family: "Arial Black", Gadget, sans-serif;
            font-size: 50px;
            text-align: center;
        }
        .lrg {
            font-size: 25px;
        }
        .lrg {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="panel panel-default">
        <div class="panel-heading"> 
            <?php
            echo "<a href=" . base_url() . "t/get_business_by_id/$business_id>Contact Us</a>  |  ";
            echo "<a href=" . base_url() . "t/get_business_productsservices/$business_id>Products & Services</a> | ";
            echo " <a href=" . base_url() . "t/get_my_business_about/$business_id>About</a> ";
            
             echo " | <a href=" . base_url() . "login/logout>Log Out</a> ";
            ?>
        </div>
    </div>

    <p align="center" class="lrg">
        <?php
        echo ($companydata['about_us']);
        ?>
    </p>
</body>

