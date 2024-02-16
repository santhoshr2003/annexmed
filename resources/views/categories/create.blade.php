@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 25px;
                font-family: none;
                margin-bottom: 12px;">Create Category</div>

                <div class="card-body">
                    <form id="createCategoryForm" method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" style="font-size: 16px">Category Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>
                            <span id="name-error" class="invalid-feedback" role="alert"></span>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#createCategoryForm').submit(function(e) {
            e.preventDefault();
            var name = $('#name').val();
            $('#name').removeClass('is-invalid');
            $('#name-error').text('');

            if (!name) {
                $('#name').addClass('is-invalid');
                $('#name-error').text('Category name is required.');
                return false;
            }

            this.submit();
        });
    });
</script>
@endsection
