@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
        <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                  <svg class="bi"><use xlink:href="#house-fill"></use></svg>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                {{-- <a class="nav-link d-flex align-items-center gap-2" href="{{route('admin.omar')}}">
                  <svg class="bi"><use xlink:href="#file-earmark"></use></svg>
                  omar
                </a> --}}
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{route('admin.orders')}}">
                  <svg class="bi"><use xlink:href="#file-earmark"></use></svg>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{route('admin.products')}}">
                  <svg class="bi"><use xlink:href="#cart"></use></svg>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{route('admin.customers')}}">
                  <svg class="bi"><use xlink:href="#people"></use></svg>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="#">
                  <svg class="bi"><use xlink:href="#graph-up"></use></svg>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="#">
                  <svg class="bi"><use xlink:href="#puzzle"></use></svg>
                  Integrations
                </a>
              </li>
            </ul>
  
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
              <span>Saved reports</span>
              <a class="link-secondary" href="#" aria-label="Add a new report">
                <svg class="bi"><use xlink:href="#plus-circle"></use></svg>
              </a>
            </h6>
            <ul class="nav flex-column mb-auto">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="#">
                  <svg class="bi"><use xlink:href="#file-earmark-text"></use></svg>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="#">
                  <svg class="bi"><use xlink:href="#file-earmark-text"></use></svg>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="#">
                  <svg class="bi"><use xlink:href="#file-earmark-text"></use></svg>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="#">
                  <svg class="bi"><use xlink:href="#file-earmark-text"></use></svg>
                  Year-end sale
                </a>
              </li>
            </ul>
  
            <hr class="my-3">
  
            <ul class="nav flex-column mb-auto">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="#">
                  <svg class="bi"><use xlink:href="#gear-wide-connected"></use></svg>
                  Settings
                </a>
              </li>
              <li class="nav-item">
                {{-- <a class="nav-link d-flex align-items-center gap-2" href="#">
                  <svg class="bi"><use xlink:href="#door-closed"></use></svg>
                  Sign out
                </a> --}}
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
  
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                {{-- <a href="/addproduct" class="btn btn-success">add new product</a> --}}
              <a href="{{route('admin.adduser')}}" class="btn btn-success">add new user</a>

            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
              <svg class="bi"><use xlink:href="#calendar3"></use></svg>
              This week
            </button>
          </div>
        </div>
  
  
        <h2>Section title</h2>
        @if(session('massage'))
        <div class="alert alert-success id=msg-box">
            {{session('massage')}}
        @endif
        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
              <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td><a onclick="return confirm('you want to delete user?')" href="{{route('delete.user', ['id'=>$u->id])}}" class="btn btn-danger">delete</a></td>
                <td><a href="{{route('admin.edit.user', ['id'=>$u->id])}}" class="btn btn-primary">update</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  <!-- jquery -->
	<script src="{{env('APP_URL')}}/assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="{{env('APP_URL')}}/assets/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="{{env('APP_URL')}}/assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="{{env('APP_URL')}}/assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="{{env('APP_URL')}}/assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="{{env('APP_URL')}}/assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="{{env('APP_URL')}}/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="{{env('APP_URL')}}/assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="{{env('APP_URL')}}/assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="{{env('APP_URL')}}/assets/js/main.js"></script>
  <script>
     setTimeout(() => {
        msg-box.style.display='none';
     }, 3000);

  </script>
@endsection
