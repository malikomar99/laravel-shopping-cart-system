@extends('layouts.app')
{{-- <x-adminnavbar/> --}}
{{-- <x-navbar1 /> --}}

@section('content')

  
    
 
  <div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Fresh & Organic Mangoes</p>
							<h1>Mango Seasonal Fruits</h1>
							<div class="hero-btns">
								<a href="{{route('index')}}" class="boxed-btn">Fruit Collection</a>
								<a href="{{route('contact')}}" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free Shipping</h3>
							<p>When order over $75</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Get refund within 3 days!</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
     <!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

</div>
{{-- @if(Session::has('massage'))
<p class="alert alert-success">
  {{session::get('massage')}}
</> @endif --}}
<div class="row">
  @foreach ($data as $pro )
  <div class="col-lg-4 col-md-6 text-center">
    <div class="single-product-item">
      <div class="product-image">
        <a href="single-product.html"><img src="{{$pro->images}}" alt=""></a>
      </div>
      <h3>{{$pro->title}}</h3>
      <p class="product-price"><span>Per Kg</span> {{$pro->price}}$ </p>
      <p class="card-text">quantity:{{$pro->quantity}} KG</p>
      <a href="{{route('addtocart',['id'=>$pro->id])}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
    </div>
  </div>
  @endforeach
  </div>
 
    {{-- <div class="row">
       
        <div class="col-md-3">
            <div class="card">
                <img src=" "class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"> </h5>
                  <p class="card-text">{{$pro->description}}</p>
                  <p class="card-text">price:</p>
                  
                  
                  <a href="" class="btn btn-primary">view details </a>
                   <a href="{{route('checkout')}}" class="btn btn-primary">Buy Now </a> --}}
                  {{-- <a href="{{env('APP_URL')}}/product/{{$pro->id}}" class="btn btn-primary">view details </a> --}}
                  {{-- <a href="{{route('addtocart',['id'=>$pro->id])}}" class="btn btn-primary">add to cart </a> --}}

                {{-- </div>
              </div>
        </div>
            
        
    </div> --}}
    <!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://youtu.be/I6D8RM7jjng?si=HUvSwZUTTQGeWsw0" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 1999</p>
						<h2>We are <span class="orange-text">Fruitkha</span></h2>
						<p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac vel nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed, interdum velit. Nam eu molestie lorem.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat veritatis minus, et labore minima mollitia qui ducimus.</p>
						<a href="about.html" class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
  <!-- FOOTER -->
	<div class="copyright">
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
	</div>
  
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>
  
</body>
</html>
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




