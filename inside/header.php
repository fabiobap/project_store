<?php
    include("autoload.php");

    error_reporting(E_ALL ^ E_NOTICE);
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
        <link href="resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="resources/css/bootstrap.min.css.map" rel="stylesheet">

        <!--Styles-->
        <link href="resources/css/styles.css" rel="stylesheet">
        <!--Font awesome-->
        <link href="resources/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

                <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown10">
                                <a class="dropdown-item" href="product-form-add.php">Add</a>
                                <a class="dropdown-item" href="product-search.php">Search</a>
                                <a class="dropdown-item" href="product-list.php">List</a>
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="container">
            <div class="row justify-content-center">
    <div class="col-6">    
            <?php $showAlert = new ShowAlert();
            $showAlert->showGenericAlert("success");
            $showAlert->showGenericAlert("danger");
            $showAlert->showGenericAlert("info");
            $showAlert->showGenericAlert("warning");?>
