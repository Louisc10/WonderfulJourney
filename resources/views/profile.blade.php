@extends('template/main')

@section('title')
    Profile
@endsection

@section('content')
<div class="container mt-3">
    <form action="/profile" method="post">
        @csrf
        <div class="form-group">
            <label for="formControlName">Name</label>
            <input type="text" class="form-control" id="formControlName" name="name" value="{{Auth::user()->name}}">
        </div>
        <div class="form-group">
            <label for="formControlEmail">Email</label>
            <input type="text" class="form-control" id="formControlEmail" name="email" value="{{Auth::user()->email}}">
        </div>
        <div class="form-group">
            <label for="formControlPhone">Phone</label>
            <input type="text" class="form-control" id="formControlPhone" name="phone" value="{{Auth::user()->phone}}">
        </div>

        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
    
    @if (count($errors) > 0)
        <div class="alert alert-danger m-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection