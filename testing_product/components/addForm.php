<?php  
require_once 'app/App.php';
if(isset($_POST['add'])){
  $addProduct = new App;
  // var_dump(@$_POST);
  if($addProduct->addProduct($_POST, 'product')):
    // echo "Success";
    $alert = true;
  endif;
}

?>

<?php if(isset($alert)): ?>

  <div class="alert alert-primary" role="alert">
    New product successfully addedd
  </div>

<?php else: ?>

<form method="POST" action="">
  <div class="form-group">
    <label for="product_name">Product Name</label>
    <input type="text" class="form-control" id="product_name" name="product_name">
  </div>
  <div class="form-group">
    <label for="product_price">Product Price</label>
    <input type="text" class="form-control" id="product_price" name="product_price">
  </div>
  <div class="form-group">
    <label for="product_name">Product Category</label>
    <input type="text" class="form-control" id="product_category" name="product_category">
  </div>

  <div class="form-group">
    <label for="product_description">Product Description</label>
    <textarea class="form-control" id="product_description" rows="3" name="product_description"></textarea>
  </div>

  <button type="submit" class="btn btn-primary" name="add">Add Product</button>
</form>

<?php endif; ?>