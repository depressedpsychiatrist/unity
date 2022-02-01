@extends('template')

@section('title', 'Company Users List - Unity Payments')

@section('content')
<div class="row mt-5">
    <div class="col-12">
        <h4>{{$company->name}} Users</h4>
    </div>
</div>

<div class="row">
    <div class="">
        <a href="{{route('company.addUsers', $company->id)}}">
            <button class="btn btn-success">Add users</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        @if (count($company->users) > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($company->users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>
                    <a href="{{route('company.detachUser', ['company' => $company->id, 'user' => $user->id])}}" class="btn btn-warning">Detach User</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        @else
        <h6 class="mt-4">You haven't added any users to this company yet.</h6>
        @endif
    </div>
</div>
@endsection
