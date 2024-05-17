<?php

namespace datnguyen\cart\Interfaces;

interface CartRepositoryInterface
{
    public function addToCart($productId, $quantity);

    public function removeFromCart($productId);

    public function updateQuantity($productId, $quantity);

    public function getCartItems();

    public function getTotal();
}
