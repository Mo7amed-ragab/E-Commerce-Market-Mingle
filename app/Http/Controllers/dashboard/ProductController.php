<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, SubCategory};

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::latest()->simplePaginate(5);
        return view('dashboard.pages.Product.index', compact('products'));
    }

    public function create()
    {
        $subcategories = SubCategory::all();
        return view('dashboard.pages.Product.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'                    => 'required|string|max:255',
            'image'                    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'description'              => 'nullable|string|max:1020',
            'price'                    => 'required|numeric|max:1020',
            'available_quantity'       => 'required|integer|max:1020',
            'sub_category_id'          => 'nullable|exists:sub_categories,id',
            'create_user_id'           => 'nullable|exists:users,id',
            'update_user_id'           => 'nullable|exists:users,id'
        ]);

        $product = new Product();
        $product->title                   = $request->title;
        $product->description             = $request->description;
        $product->price                   = $request->price;
        $product->available_quantity      = $request->available_quantity;
        $product->sub_category_id         = $request->sub_category_id;
        $product->create_user_id          = auth()->user()->id;
        $product->update_user_id          = null;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('products', 'public'); 
            $product->image = $imageName;
        }

        $product->save();
        return redirect()->route('products.index')->with('Created_Product_Sucessfully', "The Product ($product->title) has been created successfully");
    }

    public function show($id)
    {
        $product = Product::find($id);
        if($product == null) {
            return redirect()->route('products.index')->with('error', 'product is not found') ;
        }
        return view('dashboard.pages.Product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if($product == null) {
           return view('dashboard.pages.Category.404.categories-404');
        }else{
            if(auth()->user()->user_type ==='admin'){
                $subcategories = SubCategory::all();
                return view('dashboard.pages.Product.edit', compact('product','subcategories'));

            }else{
                return view('dashboard.pages.Category.404.categories-404');
            }
        }
    }

   public function update(Request $request, string $id)
    {
        $request->validate([
            'title'                    => 'required|string|max:255',
            'image'                    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'description'              => 'nullable|string|max:1020',
            'price'                    => 'required|numeric|max:1020',
            'available_quantity'       => 'required|integer|max:1020',
            'sub_category_id'          => 'nullable|exists:sub_categories,id',
            'create_user_id'           => 'nullable|exists:users,id',
            'update_user_id'           => 'nullable|exists:users,id'
        ]);

        $product = Product::find($id);
        $product_old = Product::find($id);
        $product->title = $request->title;
        $product->description             = $request->description;
        $product->price                   = $request->price;
        $product->available_quantity      = $request->available_quantity;
        $product->sub_category_id         = $request->sub_category_id;
        $product->update_user_id          = auth()->user()->id;

        if ($request->hasFile('image')) {
            if ($product->image) {
                $oldImagePath = public_path('storage/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $imageName = $request->file('image')->store('products', 'public');
            $product->image = $imageName;
        }

        $product->save();
        return redirect()->route('products.index')->with('Updated_Product_Sucessfully', "The Product ($product_old->title) has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (auth()->user()->user_type !== 'admin')
        {
            return view('dashboard.pages.Category.404.categories-404') ;
        }
        else{
            $product = Product::find($id);
            $product->delete();
        return redirect()->route('products.delete')->with('status', sprintf('Are you sure you want to delete the product "%s"?', $product->title ));
        }
    }

    public function delete()
    {
        $products= Product::orderBy('id', 'desc')->onlyTrashed()->simplePaginate(5);

        $products_count = $products->count();

        return view('dashboard.pages.Product.delete', compact('products', 'products_count'));
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);

        if ($product) {
            $product->restore();
            $product->update_user_id = auth()->user()->id;
            $product->save();
            return redirect()->route('products.index')->with('Restored Product', 'Restored Product Successfully');
        }

        return redirect()->route('products.index')->with('error', ' Product not found');
    }

    public function forceDelete($id)
    {
    $product = Product::where('id',$id);

    $product->forceDelete();

    return redirect()->route('products.index')->with('Deleted Product', "the Product has been Successfully permanently deleted");

    }
}
