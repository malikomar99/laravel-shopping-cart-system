
@extends('layouts.app')

@section('content')
<div class="breadcrumb-section breadcrumb-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 text-center">
        <div class="breadcrumb-text">
          <p>Fresh and Organic Mangoes</p>
          <h1>Cart</h1>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <section class="h-100" style="background-color: #f0eeee;">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
            @if (Session::has('massage'))
            <div class="alert alert-danger">
               {{Session::get('massage')}} 
            </div>
                
            @endif
  
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
            <div>
              <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                    class="fas fa-angle-down mt-1"></i></a></p>
            </div>
          </div> --}}
  
          
  
         {{-- @if (Session::has('cart'))
         @php $total = 0; @endphp
         @foreach (Session::get('cart') as $cart )
               <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img
                  src="{{$cart['images']}}"

                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2">{{$cart['title']}}</p>
                  <p><span class="text-muted">price:{{$cart['price']}} </span></p>
                  <p><span class="text-muted">quantity:{{$cart['quantity']}} </span></p>
                </div>
                
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">total:{{$cart['price'] * $cart['quantity']}}</h5>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0"></h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  <a onclick="return confirm('Are you sure to remove cart')" href="{{route('removeitems', ['id'=>$cart['id']])}}" class="btn btn-danger">remove<i class="fas fa-trash fa-lg"></i></a>
                </div>
               
              </div>
            </div>

          </div>
          
          @endforeach
          @else
          <div class="alert alert-info">
            no items in your cart
          </div>

          @endif
         
          <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
            <p class="mb-0"> Total Amount: </p>
          </div>
          <div class="card">
            <div class="card-body">
                <a href="{{route('checkout')}}" class="btn btn-primary">checkout </a>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </section> --}}
  <div class="cart-section mt-150 mb-150">
		<div class="container">
      <div class="col-10">
        {{-- @if (Session::has('massage'))
        <div class="alert alert-danger">
           {{Session::get('massage')}} 
        </div>
            
        @endif --}}
        @php $total = 0; @endphp
        @if (Session::has('cart'))
              
              @foreach (Session::get('cart') as $cart )
							<tbody>
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
              
                <tr class="table-body-row">
									<td class="product-remove"><a onclick="return confirm('Are you sure to remove cart')" href="{{route('removeitems', ['id'=>$cart['id']])}}"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="{{$cart['images']}}" alt=""></td>
									<td class="product-name">{{$cart['title']}}</td>
									<td class="product-price">{{$cart['price']}}</td>
									<td class="product-quantity">quantity:{{$cart['quantity']}} </td>
									<td class="product-total">${{$cart['price'] * $cart['quantity']}}</td>
                  @php
                   $total += $cart['price'] * $cart['quantity']
                  @endphp
								</tr>
              </tbody>
              @endforeach
						</table>
					</div>
				</div>
        @else
        <div class="alert alert-info">
          no items in your cart
        </div>

        @endif
       
        {{-- <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
          <p class="mb-0"> Total Amount: </p>
        </div> --}}
        {{-- <div class="card">
          <div class="card-body">
              <a href="{{route('checkout')}}" class="btn btn-primary">checkout </a>
          </div>
        </div> --}}

      </div>
  <div class="col-lg-4">
    <div class="total-section">
      <table class="total-table">
        <thead class="total-table-head">
          <tr class="table-total-row">
            <th>Total</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <tr class="total-data">
            <td><strong>Subtotal: </strong></td>
            <td>${{$total}}</td>
          </tr>
          <tr class="total-data">
            <td><strong>Shipping: </strong></td>
            <td>$45</td>
          </tr>
          <tr class="total-data">
            <td><strong>Total: </strong></td>
            <td>  {{$total + 45 }}</td>
          </tr>
        </tbody>
      </table>
      <div class="cart-buttons">
        {{-- <a href="cart.html" class="boxed-btn">Update Cart</a> --}}
        <a href="{{route('checkout')}}" class="boxed-btn black">Check Out</a>
      </div>
    </div>

    
  </div>
   <!-- FOOTER -->
	{{-- <div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="">Malik omarfarooq</a>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
  
  <script>


    //  setTimeout(() => {
    //     massage-box.style.display='none';
    //  }, 3000);

  
	@if (Session::has('massage'))
	var type = "{{ session::get('alert-type', 'success') }}"
				toastr.options.timeOut = 10000;
				toastr.success("{{ session::get('massage') }}");
				
				@endif
    </script>
  
@endsection