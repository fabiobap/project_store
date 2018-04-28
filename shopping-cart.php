<?php
$title = "Home - Project Store";
include("public-header.php");
?>
<?php 
if(empty($_SESSION['cart_item'])){
    echo '<div class="semRegistro">The cart is empty!</div>';
}else{
    $total = 0;
?>
   <table class="table table-striped table-responsive-lg">
        <tbody>
            <thead>
            <tr class="tabela-geral">
                <th>Product</th>
                <th>Quantity</th>
                <th>Un. Price</th>
            </tr>
        </thead>
            <?php
                foreach($_SESSION['cart_item'] as $cartProduct):
                    $total += $cartProduct['price'] * $cartProduct['quantity'];
            ?>
            <tr>
                <td>
                    <?php echo "<img class='figure-img img-fluid rounded' alt='".$cartProduct['name']."' title='".$cartProduct['name']."' src='".substr_replace($cartProduct['image'] ,"./inside",0,1)."' width='100x' height='100px'/>"?>
                        <?=$cartProduct['name']?>
                        </td>
                <td>
                <form action="update-shopping-cart.php" method="POST">
                    <div>
                    <input type="number" name="quantity" id="quantity" value="<?=$cartProduct['quantity']?>" class="form-control cart-input-resized">
                    <input type="hidden" value="<?=$cartProduct['id']?>" name="id">
                    <a href="remove-cart-item.php?id=<?=$cartProduct['id']?>" class="btn btn-outline-danger btn-sm botao-table"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                    <button type="submit" class="btn btn-outline-primary btn-sm botao-table"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                        </form>
                        
                </td>
                <td>$: <?=$cartProduct['price']?></td>
            </tr>
            <?php
                endforeach
            ?>
        </tbody>
        <tfoot>
            <tr class="footer-tabela">
                <td></td>
                <td></td>
                <td>Total: $<?=$total?></td>
            </tr>
        </tfoot>
    </table>
<?php } ?>
<?php include("public-footer.php");?>