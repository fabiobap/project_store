<?php
$title = "Home - Project Store";
include("public-header.php");

$productDao = new ProductDAO($connection);

$nameComputers = 'Computers';
$nameClothes= 'Clothes';
$nameHomeAppliance = 'Home Appliance';

$computingList = $productDao->publicProductList($nameComputers);
$clothingList = $productDao->publicProductList($nameClothes);
$homeAppliancesList = $productDao->publicProductList($nameHomeAppliance);

?>

    <h2><?=$nameComputers?></h2>
<hr>
<div class="row justify-content-md-center">
    <?php foreach($computingList as $product):?>
        <div class="col-md-4">
            <form action="add-cart-item.php" method="POST" id="needs-validation" novalidate>
                <input type="hidden" name="id" value="<?=$product->getId()?>">
                <figure class="figure">
                    <figcaption class="figure-caption">
                        <?= substr($product->getName(), 0, 20)?> - $<?=$product->getPrice()?> 
                        <?php $totalDeLetras = strlen($product->getName());
                        if ($totalDeLetras > 25 ):
                            echo "...";      
                        endif 
                        ?>
                    </figcaption>
                    <a href="<?= $product->getImage()?>">
                        <?php echo "<img class='figure-img img-fluid rounded' alt='".$product->getName()."' title='".$product->getName()."' src='".$product->getImage()."'/>"?>
                    </a>
                    <figcaption class="figure-caption">
                    <input type="number" name="quantity" id="quantity" value="1" class="form-control">
                    <button type="submit" class="btn btn-outline-primary btn-lg botao-table"><i class="fa fa-cart-plus" aria-hidden="true"></i>Add to cart</button>
                    </figcaption>
                </figure>
            </form>
        </div>
    <?php endforeach ?>
</div>
    <h2><?=$nameClothes?></h2>
<hr>
<div class="row justify-content-md-center">
    <?php foreach($clothingList as $product):?>
        <div class="col-md-4">
            <form action="add-cart-item.php" method="POST" id="needs-validation" novalidate>
                <input type="hidden" name="id" value="<?=$product->getId()?>">
                <figure class="figure">
                    <figcaption class="figure-caption">
                        <?= substr($product->getName(), 0, 20)?> - $<?=$product->getPrice()?> 
                        <?php $totalDeLetras = strlen($product->getName());
                        if ($totalDeLetras > 25 ):
                            echo "...";      
                        endif 
                        ?>
                    </figcaption>
                    <a href="<?= $product->getImage()?>">
                        <?php echo "<img class='figure-img img-fluid rounded' alt='".$product->getName()."' title='".$product->getName()."' src='".$product->getImage()."'/>"?>
                    </a>
                    <figcaption class="figure-caption">
                    <input type="number" name="quantity" id="quantity" value="1" class="form-control">
                    <button type="submit" class="btn btn-outline-primary btn-lg botao-table"><i class="fa fa-cart-plus" aria-hidden="true"></i>Add to cart</button>
                    </figcaption>
                </figure>
            </form>
        </div>
    <?php endforeach ?>
</div>
<h2><?=$nameHomeAppliance?></h2>
<hr>
<div class="row justify-content-md-center">
    <?php foreach($homeAppliancesList as $product):?>
        <div class="col-md-4">
            <form action="add-cart-item.php" method="POST" id="needs-validation" novalidate>
                <input type="hidden" name="id" value="<?=$product->getId()?>">
                <figure class="figure">
                    <figcaption class="figure-caption">
                        <?= substr($product->getName(), 0, 20)?> - $<?=$product->getPrice()?> 
                        <?php $totalDeLetras = strlen($product->getName());
                        if ($totalDeLetras > 25 ):
                            echo "...";      
                        endif 
                        ?>
                    </figcaption>
                    <a href="<?= $product->getImage()?>">
                        <?php echo "<img class='figure-img img-fluid rounded' alt='".$product->getName()."' title='".$product->getName()."' src='".$product->getImage()."'/>"?>
                    </a>
                    <figcaption class="figure-caption">
                    <input type="number" name="quantity" id="quantity" value="1" class="form-control">
                    <button type="submit" class="btn btn-outline-primary btn-lg botao-table"><i class="fa fa-cart-plus" aria-hidden="true"></i>Add to cart</button>
                    </figcaption>
                </figure>
            </form>
        </div>
    <?php endforeach ?>
</div>

<?php
include("public-footer.php");