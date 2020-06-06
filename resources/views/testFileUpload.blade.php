<form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="text" name="id">
	<input type="file" name="profilePic">
	<input type="submit">
</form>