<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\File;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Categories::all();
        return view('admin.category', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categoriesAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'bg_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            // Handle the main image upload
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_main.' . $mainImage->getClientOriginalExtension();
            $mainImage->move(public_path('images'), $mainImageName);

            // Handle the background image upload
            $bgImage = $request->file('bg_image');
            $bgImageName = time() . '_bg.' . $bgImage->getClientOriginalExtension();
            $bgImage->move(public_path('images'), $bgImageName);


            $category = new Categories();
            $category->name = $request->category_name;
            $category->main_image = $mainImageName;
            $category->bgimage = $bgImageName;
            $category->save();

            return redirect()->route('category.index')
                ->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while creating the category. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = Categories::find($id);

        return view('admin.categoriesAdd', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'bg_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        // dd($request->toArray());
        $category = Categories::findOrFail($id);
        // dd($category);

        try {
            // Update main image if a new file is uploaded
            if ($request->hasFile('main_image')) {
                // Delete the old main image
                $oldMainImagePath = public_path('images/' . $category->main_image);
                if (File::exists($oldMainImagePath)) {
                    File::delete($oldMainImagePath);
                }

                // Save the new main image
                $mainImage = $request->file('main_image');
                $mainImageName = time() . '_main.' . $mainImage->getClientOriginalExtension();
                $mainImage->move(public_path('images'), $mainImageName);

                $category->main_image = $mainImageName;
            }
            // dd($category);

            // Update background image if a new file is uploaded
            if ($request->hasFile('bg_image')) {
                // Delete the old background image
                $oldBgImagePath = public_path('images/' . $category->bgimage);
                if (File::exists($oldBgImagePath)) {
                    File::delete($oldBgImagePath);
                }

                // Save the new background image
                $bgImage = $request->file('bg_image');
                $bgImageName = time() . '_bg.' . $bgImage->getClientOriginalExtension();
                $bgImage->move(public_path('images'), $bgImageName);

                $category->bgimage = $bgImageName;
            }
            // dd($category);   

            // Update category details
            $category->name = $request->category_name;
            $category->save();

            // Redirect with success message
            return redirect()->route('category.index')
                ->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            // Handle unexpected errors
            return back()->withErrors(['error' => 'An error occurred while updating the category. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Categories::find($id);
        // dd($id);

        $main_image = public_path('image\\' . $data->main_image);
        if (File::exists($main_image)) {
            File::delete($main_image);
        }

        $bg_image = public_path('image\\' . $data->bg_image);
        if (File::exists($bg_image)) {
            File::delete($bg_image);
        }

        $data->delete();
        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully.');
    }
}
