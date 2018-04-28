<?php
    if (!session_id()) @session_start();
    
    include("autoload.php");
    try{ 
        
        $file = $_FILES['image'];
        
        $uploadHandler = new UploadHandler();
        $fileUpload = $uploadHandler->verifyImg($file);
        
        if ($fileUpload === TRUE){

            $name = $_POST["name"];
            $brand = $_POST["brand"];
            $model = $_POST["model"];
            $price = $_POST["price"];
            $description = $_POST["description"];
            $details = $_POST["details"];
            $categoryId = $_POST["category"];

            //extension from the file
            $extension = explode(".", $_FILES["image"]["name"]);
            $extension = end($extension);

            //path to save it
            $imagesFolder = "./resources/images/";
            $productsFolder = "./resources/images/products/";

            //differential to organize it
            $differential = time().rand(1000,5000);

            //format name so there's no confusion when we retrieve it
            $formatedName = str_replace( ' ', '+', $name );

            //product name + differential with the extension
            $image = "$formatedName-$differential.$extension";

            //verify and create the folders if there isnt one in the first place
            $folderCreator = new FolderCreator();
            $folderCreator->verifyAndCreateFolder($imagesFolder);
            $folderCreator->verifyAndCreateFolder($productsFolder);

            //folder path + name of the file
            $finalDestination = $productsFolder.$image;
            
            //move the file to the folder
            $wasUploaded = $uploadHandler->upload($file, $finalDestination);
            
            if($wasUploaded === TRUE){

                $category = new Category();
                $category->setId($categoryId);

                $product = new Product();
                $product->setName($name);
                $product->setBrand($brand);
                $product->setModel($model);
                $product->setPrice($price);
                $product->setDescription($description);
                $product->setDetails($details);
                $product->setCategory($category);
                $product->setImage($finalDestination);

                $productDao = new ProductDAO($connection);
            }
        }
    }catch (\Exception $e){
        ErrorHandler::processError($e);
        exit;
     }
    if ($productDao->addProduct($product)){
        if (!session_id()) @session_start();
        $_SESSION["success"] = "Product was successfully added! ";
        header("Location: product-form-add.php");
        exit;
    }else{
        if (!session_id()) @session_start();
        $_SESSION["danger"] = "Product was not added! ";
        header("Location: product-form-add.php");
        exit;
    }
?>
