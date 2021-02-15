@extends('template/main')

@section('title')
    Create blog
@endsection

@section('content')
<div class="container">
    <h1 class="text-center m-5">
        Create Blog
    </h1>

    <form action="/blog/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="formControlTitle">Title</label>
            <input type="text" class="form-control" id="formControlTitle" name="title" value="{{old('title')}}">
        </div>

        <div class="form-group">
            <label for="formControlCategory">Category</label>
            <select class="form-control" id="formControlCategory" value="1" name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="formControlImage">Photo</label> <br>
            <input type="file" id="formControlImage" name="image" aria-describedby="inputGroupFileAddon01">
        </div>

        <div class="form-group">
            <label for="formControlDesctiption">Story</label>
            <textarea class="form-control" id="formControlDesctiption" rows="5" name="description" value="{{old('description')}}"></textarea>
        </div>

        <button type="submit" class="btn btn-dark">Create</button>
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