<?php
     class Product{
        
        private $id;
        private $name;
        private $brand;
        private $model;
        private $price;
        private $description;
        private $details;
        private $insertionDate;
        private $modificationDate;
        private $category;
        private $image;
        
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }	
        public function getName(){
            return $this->name;
        }
        public function setName($name){
            $this->name = $name;
        } 	         
        public function getBrand(){
            return $this->brand;
        }
        public function setBrand($brand){
            $this->brand = $brand;
        }	
        public function getModel(){
            return $this->model;
        }
        public function setModel($model){
            $this->model = $model;
        }         
        public function getDescription(){
            return $this->description;
        }
        public function setDescription($description){
            $this->description = $description;
        } 	        
        public function getDetails(){
            return $this->details;
        }
        public function setDetails($details){
            $this->details = $details;
        }	
        public function getInsertionDate(){
            return $this->insertionDate;
        }
        public function setInsertionDate($insertionDate){
            $this->insertionDate = $insertionDate;
        } 	        
        public function getModificationDate(){
            return $this->modificationDate;
        }
        public function setModificationDate($modificationDate){
            $this->modificationDate = $modificationDate;
        } 	                 
        public function getCategory(){
            return $this->category;
        }
        public function setCategory(Category $category){
            $this->category = $category;
        } 
        public function setPrice($price){
            if($price > 0){
                $this->price = $price;
            }
        }
        public function getPrice(){
            return $this->price;
        }
         
        public function getImage(){
            return $this->image;
        }
        public function setImage($image){
            $this->image = $image;
        } 	
    }