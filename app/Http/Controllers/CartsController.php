<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 
use App\Order;
use App\Cart;
use App\Cart_Product;

class CartsController extends Controller
{
    //

    var $cart_id;

    public function __construct(Request $request)
    {
      
    }

        public function index(Request $request)
        {
            // to do: check if user id matches with cart
           
            if (! Cart::where('id',$request->cart_id)->first()){
                // when cart id doesnt exist, go back to products page
                // other view eventually?
                $products = Product::All();
                return view('products.index')->with('products', $products);
            }
            else {
               // go to cart page an show cart items
                $cart_items = Cart_Product::where('cart_id',$request->cart_id)->get();

                $cart_products = [];
            foreach ($cart_items as $cart_item) {
                array_push($cart_products,Product::where('id',$cart_item->product_id)->first());
            }
        
            return view('carts.index')->with('cart_items',$cart_products);
             

            // var_dump ($cart_items->product_id);
                // haal alle cart_items op -> haal van products alle producten op met dat product id
            }

        }


        public function addToCart(Request $request)
        {
        // TODO: Als een product nog niet bestaat komt er een Foreign key error. Fixen!
        $user_id =  $request->user_id;
        $product_id = $request->product_id;
        // Make a new cart when current user does not have one:
        if (! Cart::where('user_id',$user_id)->first()){
            echo "maak een nieuw winkelmandje aan";
            $cart = new Cart();
            $cart->user_id = $request->user_id;
            $cart->save();
            $this->cart_id = Cart::where('user_id',$user_id)->first();

        }
        else {
            // Get cart_id to pass on to addToCart function
            $this->cart_id = Cart::where('user_id',$user_id)->first();
        }

        // add an item to a cart
        if (Cart_Product::where('cart_id',$this->cart_id->id)->first() && Cart_Product::where('product_id',$product_id)->first()){
            // when product already exists in the cart, add one to the amount
            $add_to_item = Cart_Product::where([
                'cart_id' => $this->cart_id->id,
                'product_id' => $product_id
            ])->first();
            $add_to_item->amount = $add_to_item->amount +1 ;
            $add_to_item->save();
        }
        else {
            // add new product to cart
            $target_cart = $this->cart_id->id;
            $product_to_cart = new Cart_Product;
            $product_to_cart->cart_id = $target_cart;
            $product_to_cart->product_id = $request->product_id;
            $product_to_cart->amount = "1";
            $product_to_cart->save();
        }
       
    }

    public function removeFromCart(Request $request)
    {
        // delete or substract one from amount if the count is higher than one
        // TODO: extra checks
        if (! Cart_Product::find($request->cart_product_id)){
            echo "nothing to delete";
        }
        else {
            
        $product_to_remove = Cart_Product::find($request->cart_product_id);

            if ($product_to_remove->amount > 1)
            {
                $product_to_remove->amount = $product_to_remove->amount -1;
                $product_to_remove->save();
            }
            else {
                $product_to_remove->delete();
                echo "succesfully deleted!";
            }
        }
    }

    public function emptyCart(Request $request)
    {
        // Empty the cart
        // TODO: extra checks
        $cart_to_empty = $request->cart_id;
        $items = Cart_Product::where('cart_id',$cart_to_empty)->get();
        foreach($items as $item) 
            {
                $item->delete();
            }
        echo "winkelwagentje geleegd!";
    }

    public function checkoutCart()
    {
        // sla een winkelwagentje op met alle producten naar de orders table 
    }
}
