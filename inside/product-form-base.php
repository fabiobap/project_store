    <div class="form-group col-lg-12">
        <label for="name">Name</label>
        <input class="form-control" type="text" value="<?=$product->getName()?>" id="name" name="name" autofocus required/>
        <div class="invalid-feedback">
            Name field is mandatory!
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="price">Price</label>
        <input class="form-control" id="price" value="<?=$product->getPrice()?>" type="number" name="price" min="0" step="0.01" required/><br/>
        <div class="invalid-feedback">
            Price field is mandatory!
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control" required>
            <?php foreach($categories as $category) :
                $thisCategory = $product->category_id == $category->getId();
                $selecao = $thisCategory ? "selected='selected'" : "";
            ?> 
            <option value="<?=$category->getId()?>" <?=$selecao?>>
                <?=$category->getName()?> 
            </option>
            <?php endforeach ?> 
        </select>
        <div class="invalid-feedback">
            Category field is mandatory!
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="brand">Brand</label>
        <input class="form-control" type="text" value="<?=$product->getBrand()?>" id="brand" name="brand" />
    </div>
    <div class="form-group col-md-6">
        <label for="model">Model</label>
        <input class="form-control" type="text" value="<?=$product->getModel()?>" id="model" name="model" />
    </div>    
    <div class="form-group col-lg-12">
        <label for="details">Details</label>
        <textarea class="form-control" id="details" name="details"><?=$product->getDetails()?></textarea>
    </div>
    <div class="form-group col-md-12">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"><?=$product->getDescription()?></textarea>
    </div>
