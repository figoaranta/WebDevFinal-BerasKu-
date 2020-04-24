<!DOCTYPE html>
<html>
<head>
	<title>Account Image</title>
</head>
<body>
	<h1>Account Image</h1>
	<table border="1">
		<tr>
			<th>User ID</th>
			<th>Image</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>

		<tbody>
			@foreach($accountImages as $accountImage)
			<tr>
				<th>{{$accountImage->id}}</th>
				<th><img alt="image" src="{{asset('sources/images/'.$accountImage->profilePic)}}" width="100px" height="100px"></th>
				<th><a href="editImage/{{$accountImage->id}}">EDIT</a></th>
				<th><a href="deleteImage/{{$accountImage->id}}">DELETE</a></th>
			</tr>
			@endforeach
		</tbody>
	</table>
	<a href="/public/accountImageCRUD/insertAccountImage">Add Image</a>
</body>
</html>