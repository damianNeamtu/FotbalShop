<?php

namespace App\Http\Controllers\Admin;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category', 'brand', 'product_images')->get();
        $brands = Brand::get();
        $categories = Category::get();

        return Inertia::render('Admin/Product/Index',
            [
                'products' => $products,
                'brands' => $brands,
                'categories' => $categories
            ]
        );

    }

    public function store(Request $req)
    {

        $produs = new Product;
        $produs->title = $req->title;
        $produs->price = $req->price;
        $produs->quantity = $req->quantity;
        $produs->description = $req->description;
        $produs->category_id = $req->category_id;
        $produs->brand_id = $req->brand_id;
        $produs->save();

        //Se verifica daca produsul are imagini incarcate

        if ($req->hasFile('product_images')) {
            $imaginiProdus = $req->file('product_images');
            foreach ($imaginiProdus as $imagine) {
                // Se genereaza un nume unic pentru imagine pe baza momentului de timp la care a fost adaugata si un string generat aleator
                $numeUnic = time() . '-' . Str::random(10) . '.' . $imagine->getClientOriginalExtension();
                // Se stocheaza imaginea cu numele unic
                $imagine->move('product_images', $numeUnic);
                // Create a new product image record with the product_id and unique name
                ProductImage::create([
                    'product_id' => $produs->id,
                    'image' => 'product_images/' . $numeUnic,
                ]);
            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Produs creat cu succes.');
    }

     //update
     public function update(Request $request, $id)
     {

         $product = Product::findOrFail($id);

         // dd($product);
         $product->title = $request->title;
         $product->price = $request->price;
         $product->quantity = $request->quantity;
         $product->description = $request->description;
         $product->category_id = $request->category_id;
         $product->brand_id = $request->brand_id;
         // Check if product images were uploaded
         if ($request->hasFile('product_images')) {
             $productImages = $request->file('product_images');
             // Loop through each uploaded image
             foreach ($productImages as $image) {
                 // Generate a unique name for the image using timestamp and random string
                 $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                 // Store the image in the public folder with the unique name
                 $image->move('product_images', $uniqueName);

                 // Create a new product image record with the product_id and unique name
                 ProductImage::create([
                     'product_id' => $product->id,
                     'image' => 'product_images/' . $uniqueName,
                 ]);
             }
         }
         $product->update();
         return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
     }

     public function deleteImage($id)
     {
         $image = ProductImage::where('id', $id)->delete();
         return redirect()->route('admin.products.index')->with('success', 'Image deleted successfully.');
     }

     public function destory($id)
     {
         $product = Product::findOrFail($id)->delete();
         return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
     }

}
