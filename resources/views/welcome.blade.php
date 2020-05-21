<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  @if($user)
    {{$user->email}}
      <a href="cart/{{$user->id}}">
        <i style="margin-left: 5rem" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
        <span class="badge">{{Session::has('cart'.$user->id)? Session::get('cart'.$user->id)->totalQuantity :''}}</span>
      </a>
      <div class="jumbotron text-center">
        <h1>Products</h1>
        <p>Welcome to kinoKW</p> 
      </div>
        
        <div class="container">
          <div  class="row">
            <div class=""></div>
            <div class="col-sm-4" style="border-style: solid">
              <h3 style="padding-top: 5rem" class="text-center">Beras Basmani</h3>
              <h3 style="padding: 5rem" class="text-center">Price : $490</h3>
              <div style="margin-bottom: 5rem" class="text-center">
                    <a onclick="passValue()" href="/public/productPage/addProduct/1/{{$user->id}}" class="btn btn-primary">Buy Now!</a>
                  </div>
            </div>
            <div class="col-sm-4" style="border-style: solid">
              <h3 style="padding-top: 5rem" class="text-center">Beras Jasmine</h3>
              <h3 style="padding: 5rem" class="text-center">Price : $450</h3>
              <div style="margin-bottom: 5rem" class="text-center">
                    <a onclick="passValue()" href="/public/productPage/addProduct/2/{{$user->id}}" class="btn btn-primary">Buy Now!</a>
                  </div>
            </div>
          </div>
      </div>
   
  @else
    <a href="#">
        <i style="margin-left: 5rem" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
        <span class="badge"></span>
    </a>
    
    <div class="jumbotron text-center">
      <h1>Products</h1>
      <p>Welcome to kinoKW</p> 
    </div>
        
        <div class="container">
            <div  class="row">
                <div class=""></div>
                <div class="col-sm-4" style="border-style: solid">
                <h3 style="padding-top: 5rem" class="text-center">Beras Basmani</h3>
                <h3 style="padding: 5rem" class="text-center">Price : $490</h3>
                <div style="margin-bottom: 5rem" class="text-center">
                    <a onclick="passValue()" href="#" class="btn btn-primary">Buy Now!</a>
                    </div>
                </div>
                <div class="col-sm-4" style="border-style: solid">
                <h3 style="padding-top: 5rem" class="text-center">Beras Jasmine</h3>
                <h3 style="padding: 5rem" class="text-center">Price : $450</h3>
                <div style="margin-bottom: 5rem" class="text-center">
                    <a onclick="passValue()" href="#" class="btn btn-primary">Buy Now!</a>
                    </div>
                </div>
            </div>
    </div>
   @endif
</body>
</html>
