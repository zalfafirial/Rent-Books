@extends('layouts.main')

@section('title', 'category')

@section('content')
<h1>Category List</h1>
<div class="mt-4 d-flex justify-content-end">
    <a href="/category-add" class="btn btn-success">Add Category</a>
</div>

@if(session('status'))
     <div class="alert alert-success mt-3">
        {{session('status')}}
     </div>
@endif
<div class="mt-5">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $item)
            <tr>
               <td>{{$loop->iteration}}</td>
               <td>{{$item->name}}</td>
               <td>
                <a href="/category-edit/{{$item->slug}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
               </td>
               <td>
                <a href="/category-delete/{{$item->slug}}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
               </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection