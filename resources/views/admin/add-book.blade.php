@extends('layouts.main')

@section('title','Add Book')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<h1> add book</h1>

<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <label for="book_code" class="form-label">Book Code</label>
    <input type="text"name="book_code" id="book_code" class="form-control  w-50" placeholder="Book Code">
    <label for="title" class="form-label">Title</label>
    <input type="text"name="title" id="title" class="form-control w-50" placeholder="Title">
    <label for="image" class="form-label">Cover</label>
    <input type="file" name="image" id="image" class="form-control w-50">
    <label for="categories" class="for-label mt-4">Category</label>
    <select class="form-control w-50 select" name="categories[]" id="categories" multiple="multiple">
        @foreach($categories as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
$('.select').select2();
});
</script>
@endsection