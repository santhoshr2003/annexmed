    @extends('layouts.app')

    @section('title', 'Dashboard')

    @section('content')

    @php
        $categories=$blogPosts->categories;
         foreach($categories as $category){
            $categories=$category->name;
         }
    @endphp

    <!-- Main Content -->
    <div class="main-content dashboard-section">
        <section class="section">

            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h4>Blog Post Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px;">Title</th>
                                        <td>{{ $blogPosts->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Content</th>
                                        <td>{{ $blogPosts->content }}</td>
                                    </tr>
                                    <tr>
                                        <th>Publication Date</th>
                                        <td>{{ $blogPosts->publication_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Categories</th>
                                        <td> {{ $categories}} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    @endsection
