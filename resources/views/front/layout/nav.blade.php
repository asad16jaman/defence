<nav class="navbar navbar-expand-md fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">
        <img src="{{ asset('school') }}/img/logo.png" height="30px" width="30px" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 navContent">
          <li class="nav-item">
            <a class="nav-link text-white active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('front.courses') }}">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('discus.index') }}">Discussion</a>
          </li>
        </ul>
        <div class="d-flex justify-contend-end">
          <div class="btn-group toggleMain ">
            <div class="drop-btn">
              
            @auth
              @if(auth()->user()->img)
                <img src="{{ asset('storage')."/".auth()->user()->img }}" class="profileImage" alt="User Image">

              @else
                <a href="#"><img src="{{ asset('school') }}/img/default-avatar.png" alt="" class="profileImage"></a>
              @endif
            @endauth

            @guest
            <a href="#"><img src="{{ asset('school') }}/img/default-avatar.png" alt="" class="profileImage"></a>
            @endguest
                
            
              
            </div>
            <button type="button" class="btn drop dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
              aria-expanded="false">
              <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu manu-margin">
              @auth
                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
              @endauth

              @guest
              <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
              @endguest
                
            
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>