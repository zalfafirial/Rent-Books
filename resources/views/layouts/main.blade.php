<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rents Books | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    .main{
        height: 100vh;
    }

    .sidebar{
        background-color : #76BA99;
    }

    .sidebar a{
         text-decoration : none;
         padding : 10px 7px;
         color : #ffff;
         display : block;
    }

    .sidebar a:hover{
        background-color : #82A284;
    }

    .sidebar a.active{
        background-color : #82A284;
        border-right : solid 4px #78938A;
    }

    .books{
      background-color: #92BA92;
    }

    .card-data{
      border-radius: 5px;
      padding: 20px 40px;
      border: solid 1px;
      color: #ffff
    }

    .card-data i{
      font-size: 40px;
    }

    .desc{
      font-size: 30px;
    }

    .count{
      font-size: 30px;
    }

    .category{
      background-color: #92BA92;
    }
    
    .user{
      background-color: #92BA92;
    }
</style>
<body>
    <div class="main d-flex flex-column justify-content-between" >
<nav class="navbar navbar-expand-lg" style="background-color: #3D8361;">
    <!-- navbar -->
  <div class="container">
    <a class="navbar-brand text" href="#">Zalfa  Rents-Books</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    </div>
  </div>
</nav>
<div class="body-main h-100">
       <div class="row g-0 h-100">
        <div class="sidebar col-lg-2  collapse d-lg-block" id="navbarSupportedContent">
            @if(Auth::user()->roles_id == 1)
          <a href="/dashboard"@if(request()->route()->uri == 'dashboard') class= 'active' @endif><i class="bi bi-house-door-fill">
          </i>Dashboard</a>
          <a href="/user"@if(request()->route()->uri == 'user') class= 'active' @endif><i class="bi bi-person-fill-lock">
          </i>User</a>
          <a href="/category"@if(request()->route()->uri == 'category') class= 'active' @endif><i class="bi bi-bookmarks">
          </i>Category</a>
          <a href="/books"@if(request()->route()->uri == 'books') class= 'active' @endif><i class="bi bi-book-half">
          </i>Books</a>
          <a href="/rentlogs"@if(request()->route()->uri == 'rentlogs') class= 'active' @endif><i class="bi bi-cart2">
          </i>Rent Logs</a>
          <a href="/logout"@if(request()->route()->uri == 'logout') class= 'active' @endif><i class="bi bi-box-arrow-left">
          </i>Logout</a>
        </div>
        @else
        <a href="/profile"><i class="bi bi-person"></i>
          </i>Profile</a>
          <a href="/logout"><i class="bi bi-box-arrow-left">
          </i>Logout</a>
        @endif

        <div class="col-lg-10 p-3 content">
        @yield('content')
        </div>
       </div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</html>