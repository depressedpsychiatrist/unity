@extends('template')

@section('title', 'Add users to company - Unity Payments')

@section('content')
<div class="row mt-5">
    <div class="col-12">
        <h4>Add users to {{$company->name}}</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form method="post" action="{{route('company.attachUsers', $company->id)}}">
            @csrf
            <div class="form-group mb-3">
              <label for="users">Select users to add to {{$company->name}}</label>
              @if (count($users) > 0)
              <select multiple class="form-control" id="users" name="users[]">
                  @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
              </select>
              <small class="text-muted">Hold shift to select multiple options</small>
              @else
              <h6 class="mt-3">No users added. Please <a href="{{route('user.create')}}"> add </a>some users first.</h6>
              @endif

              <span class="text-danger">{{$errors->first('users')}}</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
