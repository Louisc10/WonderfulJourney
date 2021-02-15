@extends('template/main')

@section('title')
    Login
@endsection

@section('content')
<div class="container mt-3">
    <form action="/login" method="post">
        @csrf
        {{-- <div class="form-group">
            <label for="formControlRole">Login As</label>
            <select class="form-control" id="formControlRole" name="role">
                <option>Admin</option>
                <option>User</option>
            </select>
        </div> --}}

        <div class="form-group">
            <label for="formControlEmail">Email</label>
            <input type="text" class="form-control" id="formControlEmail" placeholder="name@example.com" name="email" value="{{old('email')}}">
        </div>

        <div class="form-group">
            <label for="formControlPassword">Password</label>
            <input type="password" class="form-control" id="formControlPassword" name="password" value="{{old('password')}}">
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