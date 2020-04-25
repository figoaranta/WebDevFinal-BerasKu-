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

                    <h2 class="title">Add Account Image</h2>
                    <form action = "{{route('addimage')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                                    <input type="text" name="userId">
                                    <label>User ID</label>
                                   
                                    <input  type="file" name="profilePic">
                                    <label>Choose File</label>
                                    
                     
                            <input  type="submit" name="submit">Save Data
                    </form>

  <!--   <script>
         $('#regis-form').on('submit',function(){
        var namapertama=$("#first_name").val();
        var lastname = $("#last_name").val();
        var username = $("#username").val();
        var NIK = $("#NIK").val();
        var dateofbirth = $("#dateofbirth").val();
        var email = $("#email").val();
        var phonenumber = $("#phone").val();
        var password = $("#password").val();
        var usertype = $("#customer").val();
        var dataJson = JSON.stringify({
            "firstName":"Marc",
            "lastName":"Antonio",
            "userName":"marcAntonio",
            "NIM":"2201816208",
            "dateOfBirth":"040400",
            "email":"marc@gmail.com",
            "phoneNumber":"083849583947",
            "password":"polopolo",
            "userType":"Shop"
        });
        dataJson = JSON.parse(dataJson);
        document.write(dataJson);
        $.post("http://localhost:8080/public/api/v1/account",dataJson);
        
    });
        
    </script> -->


    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->