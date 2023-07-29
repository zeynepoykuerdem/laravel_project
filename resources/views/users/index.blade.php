<!-- resources/views/users/index.blade.php -->

@extends('layout')
@section('content')
<main class="login-form">
    <div class="container">
           <h1>Users List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
 
    </main>
@endsection
