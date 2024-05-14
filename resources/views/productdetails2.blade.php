@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($data as $pro )
        <div class="col-md-3">
            <div class="card">
                <img src="{{$pro->images}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$pro->title}} </h5>
                  <p class="card-text">{{$pro->description}}</p>
                </div>
                <div class="block quantity">
                  <input type="number" class="form-control btn btn-outline-dark rounded-3"
                      id="cart_quantity" value="1" min="1" max="{{$pro->quantity}}" name="cart_quantity">
              </div>
              <div class="buttons d-flex my-5">
                <div class="block">
                    <a href="{{ route('checkout',['id' => $pro->id]) }}" 
                        class="shadow btn custom-btn ">Buy Now</a>                            </div>
                <div class="block">
                    <a href="{{ route('addtocart',['id' => $pro->id]) }}" 
                        class="shadow btn custom-btn ">Add to Cart</a>
                </div>

        </div>

              </div>
              
            
        
    </div>
</div>
<script>
  let av_qty = {{$pro->quantity}};
  cart_quantity.onchange = () => {
      if(cart_quantity.value > av_qty){
          alert("You can't add more than {{$pro->quantity}} items");
          cart_quantity.value = av_qty;
      }
  }
</script>

@endsection