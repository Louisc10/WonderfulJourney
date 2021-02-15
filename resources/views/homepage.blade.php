@extends('template/main')

@section('title')
    Homepage
@endsection

@section('content')
@if (Auth::user() != null && Auth::user()->role == 'User')
<h1 class="text-center m-5">
    Welcome {{Auth::user()->name}}.
</h1>

@else
@if ($title != '')
    <div class="justify-content-center m-1">
        <h1 class="text-center">
            {{$title}}
        </h1>
    </div>
@endif

<div class="row">
    @foreach ($datas as $data)
    <div class="col-sm-4 mt-4">
        <div class="card" style="width: 25vw;">
            <div class="card-body">
                <h5 class="card-title">{{$data->title}}</h5>
                <p class="card-text">{{$data->description}}</p>
                @if ($title == '')
                    <div>
                        Category: 
                        <a href="/category/{{ $data->name }}">{{$data->name}}</a>
                    </div>
                @endif
                <div class="mt-2">
                    <a href="/view/{{ $data->id }}" class="btn btn-dark">View Detail</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif

@endsection