<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all articles from the database
        $articles = \App\Models\Article::paginate(10);

        // Return the articles to the view
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new article
        return view('articles.create', ['article' => null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        try {

            $validatedData = $request->validated();
            // dd($validatedData);
            \App\Models\Article::create($validatedData);
            return redirect()->route('articles.index')->with('success', 'Article created successfully.');
        } catch (\Exception $e) {
            // dd($e);
            Log::error('Error creating article: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to create article: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the article by ID
        $article = \App\Models\Article::with('images')->findOrFail($id);

        // dd($article);
        // Return the article to the view
        return view('articles.details', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the article by ID
        $article = \App\Models\Article::findOrFail($id);

        // Return the view to edit the article
        return view('articles.create', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'price' => 'required|numeric|min:0',
            ]);

            // Find the article by ID and update it
            $article = \App\Models\Article::findOrFail($id);
            $article->update($validatedData);

            // Redirect to the articles index with a success message
            return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
        } catch (\Throwable $th) {
            // Handle any exceptions that occur during the update process
            return redirect()->back()->withErrors(['error' => 'Failed to update article: ' . $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Find the article by ID and delete it
            $article = \App\Models\Article::findOrFail($id);
            $article->delete();

            // Redirect to the articles index with a success message
            return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
        } catch (\Throwable $th) {
            // Handle any exceptions that occur during the deletion process
            return redirect()->back()->withErrors(['error' => 'Failed to delete article: ' . $th->getMessage()]);
        }
    }
}
