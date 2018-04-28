<?php

    class Paginator{
        
        function createPagination($href, $total_pages, $page){
            $limit = 8;
            $link = '';
            if ($total_pages >=1 && $page <= $total_pages){
                $counter = 1;
                $previous = $page-1;
                
                if ($page > ($limit / 3)){ 
                        $link .= "<li class='page-item'><a class='page-link' href='".$href."&page=1'>Primeiro</a></li>";
                }else{ 
                        $link .= "<li class='page-item disabled'><a class='page-link' href='".$href."&page=1'>First</a></li>";
                } 
                if($page !== 1 && $previous!==0 && $page!==2){
                    $link .= "<li class='page-item'><a class='page-link' href='".$href."&page=".$previous."'>".$previous."</a></li>";
                }
                for ($i=$page; $i<=$total_pages; $i++) {  
                    $active = ($i == $page) ? 'active' : '';
                    if($counter < $limit){
                        $link .= "<li class='page-item ".$active."'><a class='page-link' href='".$href."&page=".$i."'>".$i."</a></li>";
                        $counter++;
                    }
                }
                if ($page < $total_pages - $limit/2){ 
                        $link .= "<li class='page-item'><a class='page-link' href='".$href."&page=".$total_pages."'>Último</a></li>";
                }else{ 
                    $link .= "<li class='page-item disabled'><a class='page-link' href='".$href."&page=".$total_pages."'>Last</a></li>";
                }
            }
        echo $link;  
        }
    }
