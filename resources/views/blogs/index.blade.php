@extends('layouts.app')

@section('content')
@if (session()->has('success'))
    <div class="alert alert-success" role="alert" id="successMessage">
        {{ session('success') }}
    </div>
 @endif
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="" style="font-size: 30px;
            font-family: none;
            margin-bottom: 16px;">
             <h1>Blog Posts</h1>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="text-right" style="margin-top: 25px;">
                <div class="form-group d-flex">
                    <select name="categories" id="categories" class="form-control mr-2" style="height: 35px;">
                        <option value="">Search Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="button"id="searchbtn"  onclick="searchByCategory()" class="btn btn-primary mr-2" style="display:block">Search</button>
                    <button type="button" id="resetbtn" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"></h5>
                    <a href="{{ route('blogs.create') }}" class="btn btn-success">Create Blog Posts</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table" id="blogPostsTable">
                                <thead>
                                    <tr>
                                        <th>S no</th>
                                        <th>Title</th>
                                        <th>Publication Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogPosts as $key => $blogPost)
                                    <tr>
                                        <td>{{ $key + ($blogPosts->perPage() * ($blogPosts->currentPage() - 1)) + 1 }}</td>
                                        <td>{{ $blogPost->title }}</td>
                                        <td>{{ $blogPost->publication_date }}</td>
                                        <td>
                                            <a href="{{ route('blogs.edit', $blogPost->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('blogs.view', $blogPost->id) }}" class="btn btn-success">View</a>
                                            <form action="{{ route('blogs.destroy', $blogPost->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog post?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex">
                                {{ $blogPosts->links('pagination.simple') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    $('#searchbtn').click(function() {
        searchByCategory();
    });

    $('#resetbtn').click(function() {
        location.reload();
    });
   });

    function searchByCategory() {
        var categoryId = $('#categories').val();
        var url = "{{ route('blogs.searchByCategory') }}";

        $.ajax({
            url: url,
            type: "GET",
            data: {
                categoryId: categoryId
            },
            success: function(response) {
                $('#blogPostsTable tbody').html(response);
            }
        });
    }

    $(document).ready(function() {
        setTimeout(function() {
            $('#successMessage').fadeOut('slow');
        }, 3000);
    });
</script>

<style>
    .pagination {
        margin-top: 20px;
    }

    .pagination > .flex {
        display: flex;
    }

    .pagination > .flex > .page-item > .page-link {
        padding: 6px 12px;
        font-size: 14px;
        border-radius: 4px;
    }

    .pagination > .flex > .page-item > .page-link:hover {
        background-color: #f8f9fa;
    }

    .pagination > .flex > .page-item.active > .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }

    .pagination > .flex > .page-item.disabled > .page-link {
        color: #6c757d;
        pointer-events: none;
        cursor: not-allowed;
        background-color: transparent;
        border-color: transparent;
    }

    .pagination > .flex > .page-item.disabled > .page-link:hover {
        background-color: transparent;
    }
    .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px;
    height: 35px;
}
</style>

@endsection


