@extends('template/main')

@section('title')
    Manage User
@endsection

@section('content')
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
              <form action="/manage-user/delete/{{ $user->id }}" method="post">
                @csrf
                <button type="submit" class="btn btn-dark">Delete</button>
              </form>
          </td>
        </tr>
            
        @endforeach
    </tbody>
  </table>

</div>
@endsection