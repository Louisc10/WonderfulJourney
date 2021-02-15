@extends('template/main')

@section('title')
    List Blog
@endsection

@section('content')
<div class="container">
    <h1 class="text-center m-5">
        List Blog
    </h1>
    <div class="w-100 d-flex justify-content-center my-3">
        <a href="/blog/create" class="btn btn-dark">
            <i class="bi-plus" style="color: lightgrey;"></i>
            Create Blog
        </a>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($articles as $article)
          <tr>
            <td>{{ $article->title }}</td>
            <td>
                <form action="/blog/delete/{{ $article->id }}" method="post">
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