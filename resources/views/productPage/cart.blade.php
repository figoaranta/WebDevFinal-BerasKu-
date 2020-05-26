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
  {{$email}}
	<a href="{{$id}}">
		<i style="margin-left: 5rem" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
		<span class="badge">{{Session::has('cart'.$id)? Session::get('cart'.$id )->totalQuantity :''}}</span>
	</a>
	<div class="jumbotron text-center">
	  <h1>Products</h1>
	  <p>Welcome to kinoKW</p> 
	</div>

  	@if(Session::has('cart'.$id))
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <ul class="list-group">
            @foreach($products as $product)
                <li class="list-group-item">
                  <span class="badge">{{$product['quantity']}}</span>
                  <strong>{{$product['item']['riceType']}}</strong>
                  <span class="label label-success">{{$product['price']}}</span>
                  <div class="btn-group">
                    <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle='dropdown'>
                      Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href="/public/productPage/productDelete/{{$product['item']['id']}}/{{$id}}">Remove by 1</a></li>
                      <li><a href="/public/productPage/productDeleteAll/{{$product['item']['id']}}/{{$id}}">Remove All</a></li>
                    </ul>
                  </div>
                </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <strong>Total : {{$totalPrice}}</strong>
        </div>
        <div class="col-md-6 col-md-offset-3">
          <a href="http://localhost:8080/public/productPage/products?accountId={{$id}}">Back</a>
        </div>
      </div>
      <hr> 
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <a href="/public/testStripe/checkout/{{$id}}"type="button" class="btn btn-success">Checkout</a>
        </div>
      </div>
  	@else
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h2>No Item in Cart</h2>
        </div>
      </div>
      <div class="col-md-6 col-md-offset-3">
          <a href="http://localhost:8080/public/productPage/products?accountId={{$id}}">Back</a>
      </div>
    @endif

</body>
</html>

