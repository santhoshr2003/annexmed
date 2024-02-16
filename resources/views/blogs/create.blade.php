@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 style="font-size: 25px; font-family: none; margin-bottom: 12px;">Create Blog Post</h1>

                    <form id="createBlogForm" method="POST" action="{{ route('blogs.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="title" style="font-family: none; font-size:16px;margin-bottom:7px">{{ __('Title') }}</label>
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}"  autocomplete="title" autofocus>
                            <span id="title-error" class="invalid-feedback" role="alert"></span>
                        </div>

                        <div class="form-group">
                            <label for="content" style="font-family: none; font-size:16px;margin-bottom:7px">{{ __('Content') }}</label>
                            <textarea id="content" class="form-control" name="content" rows="4"  autocomplete="content">{{ old('content') }}</textarea>
                            <span id="content-error" class="invalid-feedback" role="alert"></span>
                        </div>

                        <div class="form-group">
                            <label for="publication_date" style="font-family: none; font-size:16px;margin-bottom:7px">{{ __('Publication Date') }}</label>
                            <input id="publication_date" type="datetime-local" class="form-control" name="publication_date" value="{{ old('publication_date') }}"  autocomplete="publication_date">
                            <span id="publication_date-error" class="invalid-feedback" role="alert"></span>
                        </div>

                        {{-- <div class="form-group">
                            <label for="categories" style="font-family: none; font-size:16px;margin-bottom:7px">Categories</label>
                            <select name="categories[]" id="categories" class="form-control" multiple>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span id="categories-error" class="invalid-feedback" role="alert"></span>
                        </div> --}}
                        <div class="form-group">
                            <label for="categories" style="font-family: none; font-size:16px;margin-bottom:7px">Categories</label>
                            <select name="categories[]" id="categories" class="form-control" multiple>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary mt-3">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Select2 CDN -->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#createBlogForm').submit(function(e) {
            e.preventDefault();
            var title = $('#title').val();
            var content = $('#content').val();
            var publication_date = $('#publication_date').val();
            var categories = $('#categories').val();

            // Reset error messages
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').text('');

            // Validation
            if (!title) {
                $('#title').addClass('is-invalid');
                $('#title-error').text('Title is required.');
                return false;
            }

            if (!content) {
                $('#content').addClass('is-invalid');
                $('#content-error').text('Content is required.');
                return false;
            }

            if (!publication_date) {
                $('#publication_date').addClass('is-invalid');
                $('#publication_date-error').text('Publication Date is required.');
                return false;
            }

            if (!categories) {
                $('#categories').addClass('is-invalid');
                $('#categories-error').text('At least one category is required.');
                return false;
            }

            // Submit the form if validation passes
            this.submit();
        });
    });
</script>

@endsection
