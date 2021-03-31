<?php 
require_once 'app/App.php'; 
$ProductData = new App;
$allProductData = $ProductData->showProduct('select * from product')
?>

<ul class="list-group">
	<?php foreach($allProductData as $product): ?>
	<li class="list-group-item d-flex justify-content-between align-items-center">
		<div class="container">		
			<div class="row mx-md-5">
				<div class="col px-md-6">
					<?=$product['product_name']; ?>
				</div>
				<div class="col px-md-12" id="list-data">
					<a class="detail badge badge-primary badge-pill btn btn-sm" data-id="<?=$product['id']?>" data-toggle="modal" data-target="modalDetail">
						Detail 
					</a>
					<a class="badge badge-info badge-pill btn btn-sm ml-3">
						Edit
					</a> 
					<a class="badge badge-danger badge-pill btn btn-sm ml-3">
						Delete
					</a> 
				</div>
			</div>
		</div>
	</li>
	<?php endforeach; ?>
</ul>



<?php require_once 'detail.php'; ?>