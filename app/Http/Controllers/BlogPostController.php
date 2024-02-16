<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\blogpostcategory;
use App\Models\category;

class BlogPostController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $blogPosts = BlogPost::with('categories')->paginate(4);
        return view('blogs.index', compact('blogPosts', 'categories'));
    }

    public function create()
    {
        $categories = category::all();
        return view('blogs.create' , compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publication_date' => 'nullable|date',
            'categories' => 'required|array',
        ]);

        $blogPost = new blogPost();
        $blogPost->title = $request->input('title');
        $blogPost->content = $request->input('content');
        $blogPost->publication_date = $request->input('publication_date');
        $blogPost->save();

        $categoryIds = $request->input('categories');

        foreach ($categoryIds as $categoryId) {
            $blogPostCategory = new blogpostcategory();
            $blogPostCategory->blog_post_id = $blogPost->id;
            $blogPostCategory->category_id = $categoryId;
            $blogPostCategory->save();
        }

        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }


    public function edit($id)
    {
        $blogPost = blogpost::findOrFail($id);
        $categories = category::all();
        return view('blogs.edit', compact('blogPost' , 'categories'));
    }

    public function view($id){
        $blogPosts = blogPost::with('categories')->where("id" , $id)->firstOrFail();
        return view('blogs.view' , compact('blogPosts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publication_date' => 'nullable|date',
        ]);

        $blogPost = blogpost::findOrFail($id);
        $blogPost->title = $request->input('title');
        $blogPost->content = $request->input('content');
        $blogPost->publication_date = $request->input('publication_date');

        $blogPost->save();

        return redirect()->route('blogs.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy($id)
    {
        $blogPost = blogpost::findOrFail($id);
        $blogPost->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog post deleted successfully.');
    }

    public function searchByCategory(Request $request){
    $categoryId = $request->input('categoryId');

    if ($categoryId) {
        $blogPosts = blogpost::whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })->get();
    } else {
        $blogPosts = blogpost::all();
    }

    return view('blogs.search', compact('blogPosts'));
}

}
