<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $categories = category::orderBy('id','asc')->simplePaginate(5);
        return view('dashboard.pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate category
        $request->validate([
          'title'          => 'required|string|unique:categories,title|max:255',
          'description'    => 'nullable|string|max:1020',
          'create_user_id' => 'nullable|exists:users,id',
          'update_user_id' => 'nullable|exists:users,id'
        ]);

        // create category
        $category    = new Category();
        $category->title        = $request->title;
        $category->description  = $request->description;
        $category->create_user_id = auth()->user()->id;
        $category->update_user_id = null;
        $category->save(); // Eloquent ORM 
        return redirect()->route('categories.index')->with('Created_Category_Sucessfully',"the Category($category->title) has been created sucessfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id) ;
        if($category == null) {
            return redirect()->route('categories.index')->with('error' , 'category is not found') ;
        }
        return view('dashboard.pages.Category.show' ,compact('category')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( int $id)
    {
        $category = Category::find($id) ;
        if($category == null) {
            return view('dashboard.pages.Category.404.categories-404') ;
        }
        else
        {
            if(auth()->user()->user_type == 'admin')
            {
                return view('dashboard.pages.category.edit', compact('category'));
            }
            else
            {
                return view('dashboard.pages.Category.404.categories-404') ;
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        $request->validate([
          'title'          => 'required|string|max:255',
          'description'    => 'nullable|string|max:1020',
          'create_user_id' => 'nullable|exists:users,id',
          'update_user_id' => 'nullable|exists:users,id'
        ]);

        $category = Category::find($id);
        $category_old = Category::find($id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->update_user_id = auth()->user()->id;
        $category->save();

        return redirect()->route('categories.index', $category->$id)->with('Updated_Category_Sucessfully',"the Category($category_old->title) has been updated sucessfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (auth()->user()->user_type !== 'admin')
        {
            return view('dashboard.pages.Category.404.categories-404') ;
        }
        else{
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.delete')->with('status', sprintf('Trashed Successfully "%s"', $category->title));
    }
    }

    public function delete()
    {
        $categories = Category::orderBy('id', 'desc')->onlyTrashed()->simplePaginate(5); 
        $categories_count = $categories->count(); 
        return view('dashboard.pages.Category.delete', compact('categories', 'categories_count'));
    }


    public function restore($id)
    {
        $category = Category::onlyTrashed()->find($id);
        if ($category) {
            $category->restore();
            $category->update_user_id = auth()->user()->id;
            $category->save();
            return redirect()->route('categories.index')->with('Restored', 'Restored Category Successfully');
        }
        return redirect()->route('categories.index')->with('error', 'Category is not found');
    }

    public function forceDelete($id)
    {
        $category = Category::where('id',$id);
        $category->forceDelete();
        return redirect()->route('categories.index')->with('Deleted', 'Category deleted successfully');
    }
}



