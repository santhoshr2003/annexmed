@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 style="font-size: 25px; font-family: none; margin-bottom: 12px;">Create Blog Post</h1>
                    <form method="POST" action="{{ route('blogs.update', $blogPost->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title" style="font-family: none; font-size:16px;margin-bottom:7px">{{ __('Title') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $blogPost->title) }}" required autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content" style="font-family: none; font-size:16px;margin-bottom:7px">{{ __('Content') }}</label>
                            <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" rows="4" required autocomplete="content">{{ old('content', $blogPost->content) }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="publication_date" style="font-family: none; font-size:16px;margin-bottom:7px">{{ __('Publication Date') }}</label>
                            <input id="publication_date" type="datetime-local" class="form-control @error('publication_date') is-invalid @enderror" name="publication_date" value="{{ old('publication_date', $blogPost->publication_date ? $blogPost->publication_date->format('Y-m-d\TH:i') : null) }}" required autocomplete="publication_date">
                            @error('publication_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="categories" style="font-family: none; font-size:16px;margin-bottom:7px">Categories</label>
                            <select id="categories" name="categories[]" class="form-control category_drpdown" multiple style="width:822px">
                                <option value="" selected disabled>Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if(in_array($category->id, old('categories', []))) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary mt-3">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


<style>
    .chosen-choices{
    height: 42px !important;
    border-radius: 6px;
    border-color: #158e15 !important;
    }
    .chosen-container-multi .chosen-choices li.search-field {
    margin: 4px!important;
    }
.category_drpdown{
    width: 106% !important;
    margin-left: -15px;
    height: 41px;
}
.chosen-container-multi .chosen-choices li.search-choice{
    margin: 11px 4px 3px 0 !important
    ;}
</style>
