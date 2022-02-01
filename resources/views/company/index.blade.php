@extends('template')

@section('title', 'Companies List - Unity Payments')

@section('content')
<div class="row mt-5">
    <div class="col-12">
        <h4>Companies List</h4>
    </div>
</div>

<div class="row">
    <div class="">
        <a href="{{route('company.create')}}">
            <button class="btn btn-success">Add Company</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        @if (count($companies) > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($companies as $company)
            <tr>
                <th scope="row">{{$company->id}}</th>
                <td>{{$company->name}}</td>
                <td>
                    <a href="{{route('company.addUsers', $company->id)}}" class="btn btn-primary">Add users</a>
                    <a href="{{route('company.show', $company->id)}}" class="btn btn-secondary">View Users</a>
                    <a href="{{route('company.edit', $company->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{route('company.destroy', $company->id)}}" method="post" class="d-inline">
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
        <h6 class="mt-4">You haven't added any companiess yet.</h6>
        @endif
    </div>
</div>
@endsection
