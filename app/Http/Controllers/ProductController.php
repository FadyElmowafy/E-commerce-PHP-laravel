<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function all(){
        $products = Product::paginate(5);
        return view('admin.allProduct')->with('products', $products);
    }
    
    public function show($id){
        $product = Product::findOrFail($id);
        return view("admin.showProduct")->with('product',$product);
    }

    public function createProduct(){
        $categories = Category::all();
        return view("admin.createProduct",compact("categories"));
    }

    public function storeProduct(Request $request){
        $data = $request->validate([
            "name"=>"required|string|max:255",
            "desc"=>"required|string",
            "price"=>"required|numeric",
            "quantity"=>"required|numeric",
            "image"=>"required|image|mimes:jpg,jpeg,png",
            "category_id"=>"required|exists:categories,id||not_in:ex"                    //exists to check the value in table categories column id
        ]);
        if($request->has("image")){
            $data['image'] = Storage::putFile("products",$data['image']);
        }
        Product::create($data);
        session()->flash("message_success","Product Added Successfully");
        return redirect(url("products"));
    }

    public function editProduct($id){
        $product = Product::findOrFail($id);
        $product_category = Category::findOrFail($product->category_id);
        $categories = Category::all();
        return view("admin.editProduct",compact("product","product_category","categories"));
    }

    public function updateProduct(Request $request){
        $data = $request->validate([
            "name"=>"required|string|max:255",
            "desc"=>"required|string",
            "price"=>"required|numeric",
            "quantity"=>"required|numeric",
            "newimage"=>"image|mimes:jpg,jpeg,png",
            "category_id"=>"required|exists:categories,id||not_in:ex"                   
        ]);
        if($request->has("newimage")){
            Storage::delete($request->oldimage);
            $data['image'] = Storage::putFile("products" , $data['newimage']);
        }else{
            $data['image']= $request->oldimage;
        }
        Product::findOrFail($request->product_id)->update([
            'name'=>$data['name'],
            'desc'=>$data['desc'],
            'price'=>$data['price'],
            'quantity'=>$data['quantity'],
            'category_id'=>$data['category_id'],
            'image'=>$data['image']
        ]);
        session()->flash("message_update","Product Updated Successfully");
        return redirect(url("products"));
    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        if($product){
            Storage::delete($product->image);
            $product->delete();
        }
        session()->flash("message_delete","Product Deleted Successfully");
        return redirect(url("products"));
    }
}