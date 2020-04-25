<!DOCTYPE html>
<html>
<head>
	<title>Add Product Image </title>
</head>
<body>
	<h2 class="title">Add Product Image</h2>
        <form action = "updateProductImage/{{$productImage->id}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <input type="text" name="productId" value="{{$productImage->productId}}">
            <label>Product ID</label>
             
            <input  type="file" name="productImage" value="{{$productImage->productImage}}">
            <label>Choose File</label>
                        
         
            <input  type="submit" name="submit">Update Data
        </form>
</body>
</html>