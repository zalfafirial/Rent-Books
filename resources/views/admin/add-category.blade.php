@extends('layouts.main')

@section('title', 'Add Category')

@section('content')
<h1>Add Category</h1>

        @if ($errors->any())
    <div class="alert alert-danger w-50">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
<form action="category-add" method="post">
    @csrf
    <label for="name" class="form-label">Category Name</label>
    <input type="text"  name="name" class="form-control w-50" id="name">
    <button type="submit" class="btn btn-success">
        Save
    </button>
</form>

@endsection