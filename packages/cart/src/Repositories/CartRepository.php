<?php

namespace datnguyen\cart\Repositories;

use datnguyen\product\Models\Product;
use datnguyen\cart\Interfaces\CartRepositoryInterface;

class CartRepository implements  CartRepositoryInterface
{

    protected $cart;

    // public function __construct(Cart $cart)
    // {
    //     $this->cart = $cart;
    // }

    public function addToCart($productId, $quantity)
    {
        // Logic to add the product to the cart
        $this->cart->addToCart($productId, $quantity);
    }

    public function removeFromCart($productId)
    {
        // Logic to remove the product from the cart
        $this->cart->removeFromCart($productId);
    }

    public function updateQuantity($productId, $quantity)
    {
        // Logic to update the quantity of a product in the cart
        $this->cart->updateQuantity($productId, $quantity);
    }

    public function getCartItems()
    {
        // Logic to get the cart items
        return $this->cart->getCartItems();
    }

    public function getTotal()
    {
        // Logic to get the total of the cart
        return $this->cart->getTotal();
    }
}
