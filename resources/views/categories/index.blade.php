@extends('layouts.app')

@section('content')
@if (session()->has('success'))
    <div class="alert alert-success" role="alert" id="successMessage">
        {{ session('success') }}
    </div>
 @endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="" style="font-size: 30px;
            font-family: none;
            margin-bottom: 14px;">
             <h1>Categories</h1>
            </div>
            <div class="card">
                {{-- <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('categories.create') }}" class="btn btn-success float-right">Create Category</a>
                </div> --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"></h5>
                    <a href="{{ route('categories.create') }}" class="btn btn-success float-right">Create Category</a>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key=> $category)
                                    <tr>
                                        <td>{{ $key + ($categories->perPage() * ($categories->currentPage() - 1)) + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex">
                                {{ $categories->links('pagination.simple') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
</style>
@endsection
