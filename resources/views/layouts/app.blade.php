<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
      .thback{ backround-color: #D3D3D3;}
    </style>

    <script type="text/javascript">
      function Clickheretoprint()
      { 
        var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
            disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
        var content_vlue = document.getElementById("content").innerHTML; 
        
        var docprint=window.open("","",disp_setting); 
         docprint.document.open(); 
         docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
         docprint.document.write(content_vlue); 
         docprint.document.close(); 
         docprint.focus(); 
      }
    </script>
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-md  navbar-light bg-white shadow-sm" >
            <div class="container" style="background-color:#00BFFF">
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" >
                    @hasrole('Admin')
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Manage Users
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('admin.users.index') }}">Uers</a>
                      <a class="dropdown-item" href="{{ route('register') }}">Add User</a>
                      
                    </div>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Customers Manager
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('customers.index') }}">Customers</a>
                    <a class="dropdown-item" href="{{ route('customers.create') }}">Add customer</a>
                    
                    </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Laundry Manager
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('cloths.index') }}">Cloths</a>
                        <a class="dropdown-item" href="{{ route('cloths.create') }}">Add new cloths</a>
                        
                      </div>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Washing Machine
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('wmachines.index') }}">Washing Machine</a>
                        <a class="dropdown-item" href="{{ route('wmachines.create')}}">Add new machine</a>
                        
                      </div>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reports
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Report</a>
                        <a class="dropdown-item" href="{{ route('orders_sumry.show', 'Ready') }}">Ready</a>
                        <a class="dropdown-item" href="{{ route('orders_sumry.show', 'Pending') }}">Pending</a>
                        <a class="dropdown-item" href="{{ route('orders_sumry.index') }}">All</a>
                        
                      </div>
                    </li>
                    @endhasrole
                      @hasrole('Manager')
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Manage Users
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('admin.users.index') }}">Uers</a>
                      <a class="dropdown-item" href="{{ route('register') }}">Add User</a>
                      
                    </div>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Customers Manager
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('customers.index') }}">Customers</a>
                    <a class="dropdown-item" href="{{ route('customers.create') }}">Add customer</a>
                    
                    </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Laundry Manager
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('cloths.index') }}">Cloths</a>
                        <a class="dropdown-item" href="{{ route('cloths.create') }}">Add new cloths</a>
                        
                      </div>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Washing Machine
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('wmachines.index') }}">Washing Machine</a>
                        <a class="dropdown-item" href="{{ route('wmachines.create')}}">Add new machine</a>
                        
                      </div>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reports
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Report</a>
                        <a class="dropdown-item" href="{{ route('orders_sumry.show', 'Ready') }}">Ready</a>
                        <a class="dropdown-item" href="{{ route('orders_sumry.show', 'Pending') }}">Pending</a>
                        <a class="dropdown-item" href="{{ route('orders_sumry.index') }}">All</a>
                        
                      </div>
                    </li>
                    @endhasrole

                    @hasrole('Front Desk')   

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Customers Manager
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('customers.index') }}">Customers</a>
                    <a class="dropdown-item" href="{{ route('customers.create') }}">Add customer</a>
                    
                    </div>
                    </li>

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Reporting
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('orders_sumry.index') }}">All orders</a>
                      <a class="dropdown-item" href="{{ route('orders_sumry.show', 'Ready') }}">Ready</a>
                      <a class="dropdown-item" href="{{ route('orders_sumry.show', 'Pending') }}">Pending</a>
                      <a class="dropdown-item" href="#">Report</a>
                      <a class="dropdown-item" href="#">By date</a>
                      
                      </div>
                      </li>
                    @endhasrole
                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif
                        @else
                            

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.edit', Auth::user()->id) }}">
                                        {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('passwords.edit', Auth::user()->id) }}">
                                        {{ __('Change Password') }}
                                </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @include('partials.alert')
            @yield('content')
        </main>
    </div>
</body>
<footer class="my-5 pt-5 text-muted text-center text-small" style="height: 20px;">
     <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Laundry Management System @2019</a></li>
      <li class="list-inline-item"><a href="#">Mohammed Adamu</a></li>
      <li class="list-inline-item"><a href="https://www.gtu.ac.in">@GTU 185223693129</a></li>
    </ul>
  </footer>
</html>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
