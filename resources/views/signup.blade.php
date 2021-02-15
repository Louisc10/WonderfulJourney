@extends('template/main')

@section('title')
    Signup
@endsection

@section('content')
<div class="container mt-3">    
    <form action="/signup" method="post">
        @csrf
        <div class="form-group">
            <label for="formControlName">Name</label>
            <input type="text" class="form-control" id="formControlName" name="name" value="{{old('name')}}">
        </div>

        <div class="form-group">
            <label for="formControlEmail">Email</label>
            <input type="text" class="form-control" id="formControlEmail" placeholder="name@example.com" name="email" value="{{old('email')}}">
        </div>

        <div class="form-group">
            <label for="formControlPassword">Password</label>
            <input type="password" class="form-control" id="formControlPassword" name="password" value="{{old('password')}}">
        </div>

        <div class="form-group">
            <label for="formControlPassword">Confirm Password</label>
            <input type="password" class="form-control" id="formControlPassword" name="confirm_password" value="{{old('confirm_password')}}">
        </div>

        <div class="form-group">
            <label for="formControlPhone">Phone</label>
            <input type="text" class="form-control" id="formControlPhone" name="phone" value="{{old('phone')}}">
        </div>

        <button type="submit" class="btn btn-dark">Submit</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>
@endsection