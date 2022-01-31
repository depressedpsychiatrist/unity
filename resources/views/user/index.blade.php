@extends('template')

@section('title', 'Users List - Unity Payments')

@section('content')
<div class="row mt-5">
    <div class="col-12">
        <h4>Users List</h4>
    </div>
</div>

<div class="row">
    <div class="">
        <a href="{{route('user.create')}}">
            <button class="btn btn-success">Add User</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        @if (count($users) > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>
                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{route('user.destroy', $user->id)}}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</a>
                    </form>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        @else
        <h6 class="mt-4">You haven't added any users yet.</h6>
        @endif
    </div>
</div>
@endsection
