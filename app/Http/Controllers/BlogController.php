<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Display a listing of the blog posts
    public function index()
    {
        $blogs = Blog::latest()->get(); // Get the latest blogs
        return view('blogs.index', compact('blogs'));
    }

    // Show the form for creating a new blog post
    public function create()
    {
        return view('blogs.create');
    }

    // Store a newly created blog post in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        Blog::create($validatedData);
        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }

    // Display the specified blog post
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    // Show the form for editing the specified blog post
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    // Update the specified blog post in storage
    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $blog->update($validatedData);
        return redirect()->route('blogs.index')->with('success', 'Blog post updated successfully.');
    }

    // Remove the specified blog post from storage
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog post deleted successfully.');
    }


}
