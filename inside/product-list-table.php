<?php
try{    
    $productDao = new ProductDAO($connection);
    $products = $productDao->productList($page, $per_page);
    $productsToPagination = $productDao->paginationList();

    //Using ceil function to divide the total records on per page
    $total_pages = ceil($productsToPagination / $per_page);
}catch (\Exception $e){
    ErrorHandler::processError($e);
    exit;
}
    if ($products == FALSE){
        echo '<div class="noRegister">No data was found!</div>';
    }else{ 
?>
    <table class="table table-striped table-responsive">
        <thead>
            <tr class="table-general">
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Last Update</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($products as $product):
            ?>
            <tr>
                <td><?=$product->getName()?></td>
                <td>$ <?=$product->getPrice()?></td>
                <td><?=$product->getCategory()->getName()?></td>
                <td><?php 
                        $modificationDateFormated = date('d-n-Y',strtotime($product->getModificationDate()));    
                        echo $modificationDateFormated;?>
                </td>
                <td>
                    <form action="remove-product.php" method="POST">
                        <input type="hidden" name="id" value="<?=$product->getId()?>"/>
                        <a href="product-form-alter.php?id=<?=$product->getId()?>" class='btn btn-outline-warning btn-lg button-table'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <button class="btn btn-outline-danger btn-lg button-table" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
            <?php
                endforeach
            ?>
        </tbody>
        <tfoot>
            <tr class="footer-table">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    <ul class="pagination justify-content-center pagination-lg">
            <?php
            $href = "product-list.php?";
            $paginator = new Paginator;
            $paginator->createPagination($href, $total_pages, $page);
            ?>
    </ul>
     <?php } ?>