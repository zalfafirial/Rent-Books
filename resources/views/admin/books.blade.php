@extends('layouts.main')

@section('title', 'books')

@section('content')
<h1>Books List</h1>
<div class="mt-4 d-flex justify-content-end">
    <a href="/books-add" class="btn btn-success">Add Books</a>
</div>


<div class="mt-5">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Book Code</th>
                <th>Title</th>
                <th>Cover</th>
                <th>Category</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
             @foreach($book as $value) 
            <tr>
               <td>{{$loop->iteration}}</td>
               <td>{{$value->book_code}}</td>
               <td>{{$value->title}}</td>
               <td>
                @if($value->cover !='')
                  <img src="{{asset('storage/cover/'.$value->cover)}}" alt="" width="40-px">
                 @else
                 <img src="{{asset('img/not-found.png')}}" alt="" width="75px" >
                 @endif
</td>
               
               <td>{{$value->status}}</td>
               <td>
                @foreach($value->categories as $category)
               {{$category->name}},
               @endforeach
               </td>
               <td>{{$value->status}}</td>
               <td>
                <a href="/books-edit/{{$value->slug}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
               </td>
               <td>
                <a href="/books-delet/{{$value->slug}}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
               </td>
            </tr>
             @endforeach 
        </tbody>
    </table>
</div>


@endsection