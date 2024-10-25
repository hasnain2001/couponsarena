<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function language() {
        $languages = Language::all();
        return view('admin.language.index', compact('languages'));
    }

    public function create_language() {
        return view('admin.language.create');
    }

    public function store_language(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'language_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Check if an image file was uploaded
        $imagePath = null;
        if ($request->hasFile('language_image')) {
        $imagePath = $request->file('language_image')->store('uploads/lang', 'public');
        }
    
        // Create the language entry in the database
        Language::create([
            'name' => $request->name,
            'code' => $request->code,
            'language_image' => $imagePath, // Store the image path in the database
        ]);
    
        return redirect()->back()->with('success', 'Language created successfully');
    }
    
    


    public function edit_language($id) {
        $language = Language::find($id);
        return view('admin.language.edit', compact('language'));
    }

    public function update_language(Request $request, $id) {
        $languages = Language::find($id);

        $languages->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('admin.lang.lang')->with('success', 'Store Updated Successfully');
    }

    public function delete_language($id) {
        Language::find($id)->delete();
        return redirect()->back()->with('success', 'language Deleted Successfully');
    }
}
