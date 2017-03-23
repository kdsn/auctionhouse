<?php

class Shop
{
    public function stock($pid = '')
    {
        if (isset($pid) && $pid != '')
        {
            $stock = QB::table('PRODUCT')->select('stock_amount')->where('id', $pid)->get();
            return $stock[0]->stock_amount;
        }
        else
        {
            $stock = QB::table('PRODUCT')->select('stock_amount')->where('slug', $_REQUEST['p'])->get();
            return $stock[0]->stock_amount;
        }
    }

    public function hasLowStock()
    {
        if (Shop::outOfStock())
        {
            return false;
        }

        return (bool) (Shop::stock() <= 5);
    }

    public function outOfStock()
    {
        return Shop::stock() === 0;
    }

    public function inStock()
    {
        return Shop::stock() >= 1;
    }

    public function hasStock($quantity)
    {
        return Shop::stock() >= $quantity;
    }
}