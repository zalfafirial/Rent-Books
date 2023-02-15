@extends('layouts.main')

@section('title', 'Users Banned')

@section('content')
<h1>List User Banned</h1>
<div class="mt-4 d-flex justify-content-end">
        <a href="/user" class="btn btn-primary me-3">List User</a>
</div>
<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
                <td>No.</td>
                <td>Username</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($usersBanned as $value)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$value->username}}</td>
                <td>{{$value->phone}}</td>
                <td>{{$value->address}}</td>
                <td>
                    <a href="/users-restore/{{$value->slug}}" class="btn btn-secondary me-3">Restore</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection