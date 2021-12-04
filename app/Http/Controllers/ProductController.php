<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Mail\ContactMail;
use App\Models\Product;
use Illuminate\Http\Request;
use Mail;
class ProductController extends Controller
{
    
    public function __construct(){
       // $this->middleware('isadmin');
    }

    public function show(Product $product){
        return view('show_product', ['product' => $product]);
    }
    
    public function index(){
       $products = Product::all();

        return view('list_products',['products' => $products]);
    }

    public function create(){
       
        return view('create_products');
    }

    public function store(AddProductRequest $request){
        $image = $request->file('image');

        $image_name = time(). '.'.$image->extension();

      
        $image->move(public_path('uploads/products/'), $image_name);

        Product::create([
            'libelle' => $request->libelle,
            'price' => $request->price,
            'image' => '/uploads/products/'.$image_name,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);

        $data = [
            'libelle' => $request->libelle,  'price' => $request->price,
        ];

        Mail::to('contact@myeasyclassrooms.com')->send( new ContactMail($data));
        return redirect()->back()->with('success','Produit ajouté!');
    }

    public function edit(Product $product){
        return view('edit_products', ['product' => $product]);
    }
    public function update(Product $product, Request $request){
        
        $new_image_name = $product->image;

        if($request->file('image')){
            $image = $request->file('image');

            $image_name = time() . '.' . $image->extension();

            $image->move(public_path('uploads/products/'), $image_name);
            $new_image_name = '/uploads/products/' . $image_name;
        }
        $product->update([
            'libelle' => $request->libelle,
            'price' => $request->price,
            'image' =>  $new_image_name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Produit mise à jour avec succsès!');
    }

    public function destroy(Product $product){

        $product->delete();
        return redirect()->back()->with('success', 'Produit supprimé!');

    }
}
