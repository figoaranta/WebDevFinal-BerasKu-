<!DOCTYPE html>
<html>
<head>
	<title>Product Image</title>
</head>
<body>
	<h1>Product Image</h1>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Product ID</th>
			<th>Product Image</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<tbody>
			@foreach($productImages as $productImage)
			<tr>
				<th>{{$productImage->id}}</th>
				<th>{{$productImage->productId}}</th>
				<th><img alt="image" src="{{asset('sources/productImages/'.$productImage->productImage)}}" width="100px" height="100px"></th>
				<th><a href="editProductImage/{{$productImage->id}}">EDIT</a></th>
				<th><a href="deleteImage/{{$productImage->id}}">DELETE</a></th>
			</tr>
			@endforeach
		</tbody>
	</table>
	<a href="/public/productImageCRUD/insertProductImage">Add Image</a>
	
</body>
</html>