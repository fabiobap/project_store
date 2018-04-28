<?php
    require_once("Product.php");
    class ProductDAO{
        
        private $connection;
        
        function __construct($connection){
            $this->connection = $connection;
        }

        function alterProduct(Product $product){
            $query = "UPDATE products SET name = :name, brand = :brand, model = :model, price = :price, description = :description, details = :details, category_id = :category, image = :image, modificationDate = NOW() WHERE id = :id";
            $stm = $this->connection->prepare($query);
            $stm->bindValue(":id", $product->getId());
            $stm->bindValue(":name", $product->getName());
            $stm->bindValue(":brand", $product->getBrand());
            $stm->bindValue(":model", $product->getModel());
            $stm->bindValue(":price", $product->getPrice());
            $stm->bindValue(":description", $product->getDescription());
            $stm->bindValue(":details", $product->getDetails());
            $stm->bindValue(":category", $product->getCategory()->getId());
            $stm->bindValue(":image", $product->getImage());
            return $stm->execute();

        }

        function getId(int $id) : Product{  
            $query = "SELECT * FROM products WHERE id = :id";
            $stm = $this->connection->prepare($query);
            $stm->bindValue(":id", $id);
            $stm->execute();

            $product = $stm->fetchObject('Product');
            return $product;
        }

        function removeProduct(int $id) {
            $query = "DELETE FROM products WHERE id = :id";
            $stm = $this->connection->prepare($query);
            $stm->bindValue(":id", $id);
            return $stm->execute();
        }
        
        function addProduct(Product $product){
            $query = "INSERT INTO products (name, brand, model, price, description, details, category_id, image, insertionDate, modificationDate) VALUES (:name, :brand, :model, :price, :description, :details, :category, :image, NOW(), NOW())";

            $stm = $this->connection->prepare($query);
            $stm->bindValue(":name", $product->getName());
            $stm->bindValue(":brand", $product->getBrand());
            $stm->bindValue(":model", $product->getModel());
            $stm->bindValue(":price", $product->getPrice());
            $stm->bindValue(":description", $product->getDescription());
            $stm->bindValue(":details", $product->getDetails());
            $stm->bindValue(":category", $product->getCategory()->getId());
            $stm->bindValue(":image", $product->getImage());
            return $stm->execute();

        }

        function getNameAndCategory(int $page, int $per_page, String $name, int $category) : array{
            // Page will start from 0 and Multiple by Per Page
            $start_from = ($page*$per_page) - $per_page;

            $query = "SELECT p.id as product_id, p.name as product_name, p.price as product_price, p.modificationDate as product_modificationDate, p.category_id as product_categoryId,  p.image as product_image,
            c.id as category_id, c.name as category_name
            FROM products AS p
            INNER JOIN categories AS c
            ON p.category_id = c.id
            WHERE p.name LIKE CONCAT('%', :name , '%') AND c.id = :category
            ORDER BY p.modificationDate DESC
            LIMIT :start_from,:per_page";
            $products = array();

            $stm = $this->connection->prepare($query);
            $stm->bindValue(":name", $name);
            $stm->bindValue(":category", $category);
            $stm->bindValue(":start_from", (int) $start_from, \PDO::PARAM_INT);
            $stm->bindValue(":per_page", (int) $per_page, \PDO::PARAM_INT);
            $stm->execute();

            while($current_product = $stm->fetch(\PDO::FETCH_ASSOC)){
                
                $category = new Category();
                $category->setId($current_product['product_categoryId']);
                $category->setName($current_product['category_name']); 
                
                $product = new Product();
                $product->setId($current_product['product_id']);
                $product->setName($current_product['product_name']);
                $product->setPrice($current_product['product_price']);
                $product->setImage($current_product['product_image']);
                $product->setModificationDate($current_product['product_modificationDate']);
                $product->setCategory($category);
                
                array_push($products, $product);
            }
        return $products;
        }                              
        
        function productList(int $page, int $per_page) : array{
            // Page will start from 0 and Multiple by Per Page
            $start_from = ($page*$per_page) - $per_page;

            $query = "SELECT p.id as product_id, p.name as product_name, p.price as product_price, p.modificationDate as product_modificationDate, p.category_id as product_categoryId, p.image as product_image, 
            c.id as category_id, c.name as category_name
            FROM products AS p
            INNER JOIN categories AS c
            ON p.category_id = c.id
            ORDER BY p.modificationDate DESC
            LIMIT :start_from,:per_page";
            $products = array();

            $stm = $this->connection->prepare($query);
            $stm->bindValue(":start_from", (int) $start_from, \PDO::PARAM_INT);
            $stm->bindValue(":per_page", (int) $per_page, \PDO::PARAM_INT);
            $stm->execute();

            while($current_product = $stm->fetch(\PDO::FETCH_ASSOC)){
                
                $category = new Category();
                $category->setId($current_product['product_categoryId']);
                $category->setName($current_product['category_name']); 
                
                $product = new Product();
                $product->setId($current_product['product_id']);
                $product->setName($current_product['product_name']);
                $product->setImage($current_product['product_image']);
                $product->setPrice($current_product['product_price']);
                $product->setModificationDate($current_product['product_modificationDate']);
                $product->setCategory($category);
                array_push($products, $product);
            }
        return $products;
        }                      
                
        function publicProductList(String $name) : array{
      // Page will start from 0 and Multiple by Per Page

            $query = "SELECT p.id as product_id, p.name as product_name, p.price as product_price, p.modificationDate as product_modificationDate, p.category_id as product_categoryId,
            p.image as product_image,
            c.id as category_id, c.name as category_name
                        FROM products AS p
                        INNER JOIN categories AS c
                        ON p.category_id = c.id
                        WHERE c.name LIKE CONCAT('%', :name , '%')
                        ORDER BY p.modificationDate DESC
                        LIMIT 3";
            $products = array();

            $stm = $this->connection->prepare($query);
            $stm->bindValue(":name", $name);
            $stm->execute();

            while($current_product = $stm->fetch(\PDO::FETCH_ASSOC)){
                
                $category = new Category();
                $category->setId($current_product['product_categoryId']);
                $category->setName($current_product['category_name']); 
                
                $product = new Product();
                $product->setId($current_product['product_id']);
                $product->setName($current_product['product_name']);
                $product->setPrice($current_product['product_price']);
                $product->setImage(substr_replace($current_product['product_image'] ,"./inside",0,1));
                $product->setModificationDate($current_product['product_modificationDate']);
                $product->setCategory($category);
                array_push($products, $product);
            }
        return $products;
        }                      
        
        /** *********************paginacao**************************** **/
        function getNameAndCategoryToPagination(String $name, int $category){
            $query = "SELECT count(*)
                        FROM products AS p
                        INNER JOIN categories AS c
                        ON p.category_id = c.id
                        WHERE p.name LIKE CONCAT('%', :name , '%') AND c.id = :category
                        ORDER BY p.modificationDate DESC";
            $stm = $this->connection->prepare($query);
            $stm->bindValue(":name", $name);
            $stm->bindValue(":category", $category);
            $stm->execute();

            return $stm->fetchColumn();
        }        
        function paginationList(){
            $query = "SELECT count(*)
                        FROM products AS p
                        INNER JOIN categories AS c
                        ON p.category_id = c.id
                        ORDER BY p.modificationDate DESC";
            $stm = $this->connection->prepare($query);
            $stm->execute();

            return $stm->fetchColumn();
        }
    }
?>