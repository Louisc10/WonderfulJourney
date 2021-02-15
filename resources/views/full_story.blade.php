@extends('template/main')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
<div class="container">
    <h1 class="text-center m-3">
        {{ $article->title }}
    </h1>
    <div class="container">
        <img src="{{ asset('storage/'.$article->image) }}" width="100%">
    </div>
    <p class="text-break"> {{ $article->description }} </p>
    <input onclick="history.back()" class="btn btn-outline-dark" value="Back" type="button">
</div>
@endsection