@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 25px;
                font-family: none;
                margin-bottom: 12px;">Edit Category</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update' , ['category' => $category->id]) }}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="name" style="font-size: 16px;margin-botton:12px">Category Name</label>
                            <input id="name" type="text" class="form-control mt-2 @error('name') is-invalid @enderror" name="name" value="{{$category->name}}" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
