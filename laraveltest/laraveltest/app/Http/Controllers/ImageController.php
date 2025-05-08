<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use Illuminate\Support\Facades\Log;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        try {
            $validatedData = $request->validated();
            // conver Image to base64
            $image = $validatedData['image'];
            $image = base64_encode(file_get_contents($image));
            $image = 'data:image/png;base64,' . $image;
            $validatedData['path'] = $image;
            $image = Image::create($validatedData);
            return redirect()->route('articles.show', $image->article_id)->with('success', 'Image created successfully.');
        } catch (\Exception $e) {
            // dd($e);
            Log::error('Error creating image: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to create image: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        try {
            $image->delete();
            return redirect()->route('articles.show', $image->article_id)->with('success', 'Image deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting image: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to delete image: ' . $e->getMessage()]);
        }
    }
}
