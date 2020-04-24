<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title Page-->
    <title>BERASKU Registration Form</title>

    <!-- Icons font CSS-->

    <!-- Vendor CSS-->
   

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>

                    <h2 class="title">BERASKU Registration Form</h2>
                    <form action = "updateimage/{{$accountImage->id}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                                    <!-- <input type="text" name="userId"  value="{{$accountImage->userId}}">
                                    <label>User ID</label> -->
                                   
                                    <input  type="file" name="profilePic" value="{{$accountImage->profilePic}}">
                                    <label>Choose File</label>
                                    
                     
                            <input  type="submit" name="submit">Update Data
                    </form>


</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->