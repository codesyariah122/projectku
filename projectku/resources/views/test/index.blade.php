<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
</head>
<body>

	<h1>Test Hallo</h1>

	<h4 style="color:crimson;">Product List</h4>

	<ul style="list-style: none;">
		@foreach($products as $key => $product)
			<li>{{$product->name}} : {{$product->price}}<br/>
				{{$product->description}}</li>
		@endforeach
	</ul>
</body>
</html>