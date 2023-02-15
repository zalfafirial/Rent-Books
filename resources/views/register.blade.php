<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <style>
    .form-register{
      border: 1px solid;
      padding : 10px;
      border-radius : 10px;
    }
  </style>
  <body>
    <div class="container d-flex  flex-column justify-content-center align-items-center" style="height:100vh">
      <div class="form-register">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('messege') }}
        </div>
        @endif

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
      <form action="#" method="post" style="width:500px;">
      @csrf

      <div class="mb-3 text-center">
        <h2>Register</h2>
      </div>
  <div class="mb-3">
    <label for="username" class="form-label">User Name</label>
    <input type="text"  name="username" class="form-control" id="username">
  <div class="mb-3">
    <label for="password" class="form-label">password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text"  name="phone" class="form-control" id="phone">
  <div class="mb-3">
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea type="text"  name="address" class="form-control" id="exampleInputadrress">
    </textarea><br>
  <div class="mb-3">
  <button type="submit" class="btn btn-primary w-100">Submit</button>
  <div class="mb-3 text-center">
    <p>Have a account? <a href="/login" style="text-decoration: none;">Login</a></p>
  </div>
</form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>  
</body>
  
</html>