<?php
    include("autoload.php");
    error_reporting(E_ALL ^ E_NOTICE);

    if (!session_id()) @session_start();

    if (!empty($_SESSION['cart_item'])){
        $cart_count = count($_SESSION['cart_item']);
    }else{
        $cart_count = 0;       
    }
?>

<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>
            <?=$title?>
        </title>

        <!-- Bootstrap core CSS -->
        <link href="inside/resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="inside/resources/css/bootstrap.min.css.map" rel="stylesheet">

        <!--Styles-->
        <link href="inside/resources/css/styles.css" rel="stylesheet">
        <!--Font awesome-->
        <link href="inside/resources/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <header class="header clearfix">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shopping-cart.php"><?=$cart_count?><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link" href="inside/index.php"><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </header>

            <main role="main">
                <div class="row">
                    <div class="col-sm-2 col-left">
                        <ul class="nav flex-column">
                            <form action="public-search.php" method="GET">
                            <h5><i class="fa fa fa-search" aria-hidden="true"></i>
                                <small><b>Search(soon)</b></small>
                            </h5>
                            <li class="nav-item">
                                <input disabled class="form-control" type="text" name="product">
                            </li>
                            <li class="nav-item">
                                <button disabled class="btn btn-outline-primary btn-sm botao-table btn-block" type="submit">Search</button>
                            </li>
                            </form>
                        </ul>
                    </div>
                    <div class="col-md-8 col-middle">
                        <div class="container main-content">
