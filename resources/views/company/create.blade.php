@extends('template')

@section('title', 'Add a company - Unity Payments')

@section('content')
<div class="row mt-5">
    <div class="col-12">
        <h4>Add a company</h4>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form method="post" action="{{route('company.store')}}">
            @csrf
            <div class="form-group mb-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{old('name')}}" required>
              <span class="text-danger">{{$errors->first('name')}}</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
