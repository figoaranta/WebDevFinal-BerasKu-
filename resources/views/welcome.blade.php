<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h1>Welcome To BerasKu</h1>
    <h2>Please login to see greatness</h2>
    <form action="https://berasku.herokuapp.com/api/auth/login" method="POST">
         <!-- {{ csrf_field() }} -->
    <label >email :</label>
    <input type="text" name="email">
    <label >password :</label>
    <input type="text" name="password">
    <button class="btn btn--radius-2 btn--blue" type="submit" value="submit">Submit</button>
    </form>
</body>
</html>