<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartsController extends Controller
{
    //
    public function __construct()
    {
       // kijk of er al een winkelwagentje is voor deze sessie (?) zoniet maak er één aan
       // en voeg het product toe aan carts_products met het card_id en de user_id
    }

    public function addToCart()
    {
        // voeg een item (product_id) toe aan carts_products met het juiste cart id. Ook checken of het cart_id hoort bij deze user
    }

    public function removeFromCart()
    {
        // verwijder het desbetreffende product_id uit de carts_products
    }

    public function emptyCart()
    {
        // verwijder alle velden met het juiste cart_id uit carts_products
    }

    public function checkoutCart()
    {
        // sla een winkelwagentje op met alle producten naar de orders table 
    }
}
