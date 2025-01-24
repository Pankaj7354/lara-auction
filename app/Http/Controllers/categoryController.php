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
            'bg_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
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
            'bg_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $category = Categories::find($id);

        $main_image = public_path('image\\' . $category->main_image);
        if (File::exists($main_image)) {
            File::delete($main_image);
        }

        $bg_image = public_path('image\\' . $category->bg_image);
        if (File::exists($bg_image)) {
            File::delete($bg_image);
        }

        $image = $request->file('main_image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('/images');
        $image->move($path, $name);

        $bg_image = $request->file('bg_image');
        $bg_name = time() . '.' . $bg_image->getClientOriginalExtension();
        $bg_path = public_path('/images');
        $bg_image->move($bg_path, $bg_name);

        $category->name = $request->category_name;
        $category->main_image = $name;
        $category->bgimage = $bg_name;
        $category->save();

        return redirect()->route('category.index')
            ->with('success', 'Category updated successfully.');
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
