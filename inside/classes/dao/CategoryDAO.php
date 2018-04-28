<?php
    require_once("Category.php");

class CategoryDAO{
    
    private $connection;
    
    function __construct($connection){
        $this->connection = $connection;
    }
    
    function categoriesList() : array{

        $query = "SELECT * FROM categories
                    ORDER BY name ASC";
        $categories = array();
        
        $stm = $this->connection->prepare($query);
        $stm->execute();
        
        while($category = $stm->fetchObject('Category')){
            array_push($categories, $category);
        }
        return $categories;
    }     
    
    
    function getId(int $id) : Category{  
        $query = "SELECT * FROM categories WHERE id = :id";
        $stm = $this->connection->prepare($query);
        $stm->bindValue(":id", $id);
        $stm->execute();
        
        $category = $stm->fetchObject('Category');
        return $category;
    } 
/*    function listaCategorysParaNota($clazz){
        $categories = array();
        $query = "SELECT * FROM categories where clazz like '{$clazz}' ORDER BY nome"; 
        $resultado = mysqli_query($this->connection, $query);
        while($category = mysqli_fetch_assoc($resultado)) {
            array_push($categories, $category);
        }
        return $categories;
    }*/
}
   
    