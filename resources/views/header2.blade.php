


  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href="{{Route('welcome')}}"><img src="{{ asset('img/logo1.png') }}" style="width: 126px; height: 32px;" alt=""></a>

      </div>

      <nav id="navbar" class="navbar">
        <ul>


        <li><a class="nav-link scrollto active" href="{{Route('welcome')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ Route('about') }}">About</a></li>
          <li><a class="nav-link scrollto" href="{{Route('faq')}}">FAQ</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

          <li class="dropdown"><a href="#"><span>Event Catagories</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Wedding</a></li>
              <li class="dropdown"><a href="#"><span>Corporate Function</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Seminar</a></li>
                  <li><a href="#">Conference</a></li>
                  <li><a href="#">Office Party</a></li>


                </ul>
              </li>
              <li><a href="#">Birthday party</a></li>
              <li><a href="#">Social Function</a></li>

            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Essential Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Catering</a></li>
              <li><a href="#">Car Rental</a></li>
              <li><a href="#">Music System Rental</a></li>
              <li><a href="#">Perlour</a></li>
              <li><a href="#">Worker</a></li>
              <li><a href="#">Gifts</a></li>
            </ul>
          </li>

            @if(Auth::guard('admin')->check())
                <li class="dropdown" aria-labelledby="navbarDropdown"><a href="#">
                        <span> {{ Auth::guard('admin')->user()->username }} </span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li> <a class="dropdown-item" href="{{ url('admin/dashboard') }}">Dashboard</a> </li>
                        <li> <a class="dropdown-item" href="{{ route('admin.addproviderpage') }}">Add Providers</a> </li>
                        <li> <a class="dropdown-item" href="{{ route('admin.addcustomerpage') }}">Add Customer</a> </li>
                        <li> <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>


                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                        </form>


                    </ul>


                </li>
            @elseif(Auth::guard('customer')->check())
                <li class="dropdown" aria-labelledby="navbarDropdown"><a href="#">
                        <span> {{ Auth::guard('customer')->user()->username }} </span> <i class="bi bi-chevron-down"></i></a>
                    <ul>

                        <li> <a class="dropdown-item" href="{{route('customer.showprovider')}}">Providers</a> </li>
                        <li> <a class="dropdown-item" href="{{route('customer.meetinglist')}}">Meeting</a> </li>
                        <li> <a class="dropdown-item" href="{{ route('customer.logout') }}"
                                onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>


                        <form id="logout-form" action="{{ route('customer.logout') }}" method="POST">
                            @csrf
                        </form>


                    </ul>


                </li>
            @elseif(Auth::guard('provider')->check())
                <li class="dropdown" aria-labelledby="navbarDropdown"><a href="#">
                        <span> {{ Auth::guard('provider')->user()->username }} </span> <i class="bi bi-chevron-down"></i></a>
                    <ul>

                        <li> <a class="dropdown-item" href="{{route('provider.allproducts')}}">Products List</a> </li>
                        <li> <a class="dropdown-item" href="{{route('provider.createproduct')}}">Products Add</a> </li>
                        <li> <a class="dropdown-item" href="{{route('provider.showmeeting')}}">Meetings</a> </li>
                      
                        <li> <a class="dropdown-item" href="{{ route('provider.logout') }}"
                                onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>


                        <form id="logout-form" action="{{ route('provider.logout') }}" method="POST">
                            @csrf
                        </form>


                    </ul>


                </li>
            @else
                <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
            <li><a class="nav-link scrollto" href="{{ route('customer.register') }}">Register</a></li>
            @endif


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
