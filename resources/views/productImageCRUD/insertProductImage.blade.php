<!DOCTYPE html>
<html>
<head>
	<title>Add Product Image </title>
</head>
<body>
	<h2 class="title">Add Product Image</h2>
        <form action = "{{route('addProductImage')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                        <input type="text" name="productId">
                        <label>Product ID</label>
                       
                        <input  type="file" name="productImage">
                        <label>Choose File</label>
                        
         
                <input  type="submit" name="submit">Save Data
        </form>
</body>
</html>