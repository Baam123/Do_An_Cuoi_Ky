<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cart;
use Session;
use App\Models\Product;

class CartController extends Controller
{
    public function Index()
    {
        $products = DB::table('products')->get();
        return view('index', compact('products'));
    }

    public function AddCart($id)
    {
        $product = Product::find($id);
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
            session()->put('Cart', $newCart);
        }
        return view('cart');
    }

    public function DeleteItemCart(Request $req, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if (Count($newCart->products) > 0) {
            $req->Session()->put('Cart', $newCart);
        } else {
            $req->Session()->forget('Cart');
        }
        return view('cart');
    }

    public function ViewListCart()
    {
        return view('list');
    }

    public function DeleteListItemCart(Request $req, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);

        if (Count($newCart->products) > 0) {
            $req->Session()->put('Cart', $newCart);
        } else {
            $req->Session()->forget('Cart');
        }
        return view('list-cart');
    }

    public function SaveListItemCart(Request $req, $id, $quanty)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $quanty);

        if (Count($newCart->products) > 0) {
            $req->Session()->put('Cart', $newCart);
        } else {
            $req->Session()->forget('Cart');
        }
        return view('list-cart');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")->get();
        return view('search')->with('products', $products);
    }
}
