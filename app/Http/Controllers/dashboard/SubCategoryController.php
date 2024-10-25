<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::simplePaginate(3);
        $subcategories_count = $subcategories->count();
        return view('dashboard.pages.SubCategory.index', compact('subcategories', 'subcategories_count'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('dashboard.pages.SubCategory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|string|max:255|unique:sub_categories,title',
            'description'    => 'nullable|string|max:1020',
            'category_id'    => 'required|exists:categories,id',
        ]);

        $subCategory = new SubCategory();
        $subCategory->title = $request->title;
        $subCategory->description = $request->description;
        $subCategory->category_id = $request->category_id;
        $subCategory->create_user_id = auth()->user()->id;
        $subCategory->save();
        return redirect()->route('subcategories.index')
        ->with('Created_Sub_Category_Sucessfully',"The Sub Category ($subCategory->title) has been created successfully");
    }

    public function show(string $id)
    {
        $subCategory = SubCategory::find($id);
        if($subCategory == null){
            return redirect()->route('subcategories.index')->with('error',"the sub category is not found");
        }
        return view('dashboard.pages.SubCategory.show', compact('subCategory'));
    }

    public function edit(string $id)
    {
        $subCategory = SubCategory::find($id);
        if($subCategory == null) {
            return view('dashboard.pages.Category.404.categories-404');
        }
        else{
            if(auth()->user()->user_type == 'admin')
            {
                $categories = \App\Models\Category::all();
                return view('dashboard.pages.SubCategory.edit', compact('subCategory', 'categories'));
            }
            else
            {
                return view('dashboard.pages.Category.404.categories-404');
            }
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'          => 'required|string|max:255|unique:sub_categories,title,' . $id,
            'description'    => 'nullable|string|max:1020',
            'category_id'    => 'required|exists:categories,id',
        ]);

        $subCategory = SubCategory::find($id);
        $subCategory->title = $request->title;
        $subCategory->description = $request->description;
        $subCategory->category_id = $request->category_id;
        $subCategory->update_user_id = auth()->user()->id;
        $subCategory->save();
        return redirect()->route('subcategories.index')->with('Updated_Sub_Category_Sucessfully',"The Sub Category has been updated successfully");
    }

    public function destroy(string $id) 
    {
        if (auth()->user()->user_type !== 'admin')
        {
            return view('dashboard.pages.Category.404.categories-404') ;
        }
        else{
            $subCategory = SubCategory::findOrFail($id);
            $subCategory->delete();
            return redirect()->route('subcategories.index')->with('status', sprintf('Trashed Successfully"%s"', $subCategory->title ));
        }
    }

    public function trash()
    {
        $subcategories = SubCategory::orderBy('id', 'desc')->onlyTrashed()->simplePaginate(5);
        $subcategories_count = $subcategories->count();
        return view('dashboard.pages.SubCategory.trash', compact('subcategories', 'subcategories_count'));
    }

    public function restore($id)
    {
        $subCategory = SubCategory::withTrashed()->find($id);

        if ($subCategory) {
            $subCategory->restore();
            return redirect()->route('subcategories.index')->with('Restored Sub_Category', 'Restored Sub Category Successfully');
        }

        return redirect()->route('subcategories.index')->with('error', ' SubCategory is not found');
    }

     public function forceDelete($id)
     {
        $subCategory = SubCategory::where('id',$id);
        $subCategory->forceDelete();
        return redirect()->route('subcategories.index')->with('Deleted Sub_Category', "Sub Category has been Deleted Successfully");
     }
}
