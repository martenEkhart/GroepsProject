<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 
use App\Order;
use App\Cart;
use App\Cart_Product;
use Auth;

// Overall to do:
// views op het einde van de functies defineren
// mensen die niet ingelogd zijn moeten ook dingen kunnen toevoegen!!!!!

class CartsController extends Controller
{
    

    var $cart_id;

    public function __construct(Request $request)
    {
      
    }

        public function index(Request $request)
        {
            // TODO: check if user id matches with cart
            $current_cart = Cart::where('user_id',$request->user_id)->first();

            if (!$current_cart){
            // when cart id doesnt exist, go back to products page
            // other view eventually?
            $products = Product::All();
            return redirect ('product');
            }
            else {
            
            // get data from tables products and cart_products to pass to view 
            $cart_items = Cart_Product::where('cart_id',$current_cart->id)->get();
            $cart_products = [];
            foreach ($cart_items as $cart_item) {
                array_push($cart_products,Product::where('id',$cart_item->product_id)->first());
            }
            return view('carts.index')->with(['cart_items'=>$cart_products, 'zegeenswat'=> $cart_items]);
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
        return redirect ('product')->with('success', 'Product added to shopping cart');
    }

    public function changeAmount(Request $request)
    {
        // verander aantal van product in cart_product mbv ajax
        $change_amount = Cart_Product::find($request->cart_product_id);
        $change_amount->amount =$request->amount;
        $change_amount->save();
        // return $request->succes;
    }
    public function removeFromCart(Request $request)
    {
        // delete or substract one from amount if the count is higher than one
        // TODO: extra checks
        $user_id =  Auth::user()->id;
        if (! Cart_Product::find($request->cart_product_id)){
            return redirect ('product');
        }
        else {
        $product_to_remove = Cart_Product::find($request->cart_product_id);
        $product_to_remove->delete();
        return redirect ('cart/' . $user_id);
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
            return redirect ('product')->with('success', 'Your shopping cart is empty again!');
        }

    public function checkoutCart(Request $request)
    {

        // TO DO:     laat gebruiker adres kiezen?
        $user_id = $request->user_id;
        $cart_id =  $request->cart_id;
        $address_id = "1";
        // get all products in cart:
        $cart_items = Cart_Product::where('cart_id',$cart_id)->get();
        $cart_products = [];
        $total_cost = 0;
        
        // get info about products in cart:
        foreach ($cart_items as $cart_item) {
            $current_product = Product::where('id',$cart_item->product_id)->first();
            array_push($cart_products,$current_product);
            $cart_products[$cart_item->amount] = $current_product;
            $total_cost += $cart_item->amount * $current_product->price; 
        }
     
        // create a new order and save it to db
        $new_order = new Order;
        $new_order->user_id = $user_id;
        $new_order->address_id = $address_id;
        $new_order->cart_id = $cart_id;
        $new_order->totalcost = $total_cost;
        $new_order->save();

        $order_id = $new_order->id;

        //Force two decimals because of Mollie amount format
        $total_cost_mollie = number_format((float)$total_cost, 2, '.', '');
        //Show Mollie payment screen
       return redirect("payment/".$order_id."/".$total_cost_mollie);
    }

    public function guestCart(){
        
    }
}
