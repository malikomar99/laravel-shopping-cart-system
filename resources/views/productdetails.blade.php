@php $show_menu = false; @endphp
@extends('layouts.app')
<!------ Include the above in your HEAD tag ---------->
<x-adminnavbar/>
@section('content')
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
	  <div class="row">
		<div class="col-lg-8 offset-lg-2 text-center">
		  <div class="breadcrumb-text">
			<p>Fresh and Organic</p>
			<h1>Check Out Product</h1>
		  </div>
		</div>
	  </div>
	</div>
  </div>
	<div class="container">
		<div class="card">
			<div class="container-fliud">
                @foreach ($data as $pro )
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="{{$pro->images}}" ></div>
						  {{-- <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div> --}}
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{$pro->images}}" class="card-img-top" alt="..."></a></li>
						  {{-- <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li> --}}
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{$pro->title}} </h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description"> {{$pro->description}}</p>
						<h4 class="price">current price: <span>{{$pro->price}}</span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						
						
						<div class="block quantity">
                  <input type="number" class="form-control btn btn-outline-dark rounded-3"
                      id="cart_quantity" value="1" min="1" max="{{$pro->quantity}}" name="cart_quantity">
              </div>
						<div class="action">
                            <a href="{{ route('checkout',['id' => $pro->id]) }}" 
                                class="shadow btn custom-btn ">Buy Now</a>
								<a href="{{ route('addtocart',['id' => $pro->id]) }}" 
                        class="shadow btn custom-btn ">Add to Cart</a>
						</div>
					</div>
				</div>
                @endforeach
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