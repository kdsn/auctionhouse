<?php

class Cart
{

    public function addToCart ($pid)
    {
        //

        $wasFound = false;
        $i = 0;

        if ( ! Session::exists('cart'))
        {
            Session::put('cart', array(0 => array("item_id" => $pid, "quantity" => 1)));
        }
        else
        {
            foreach ($_SESSION["cart"] as $each_item) {
                $i++;
                while (list($key, $value) = each($each_item)) {
                    if ($key == "item_id" && $value == $pid) {
                        array_splice($_SESSION["cart"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
                        $wasFound = true;
                    }
                }
            }
            if ($wasFound == false)
            {
                Session::push('cart', array("item_id" => $pid, "quantity" => 1));
            }
        }
    }

    public function removeFromCart ($pid)
    {
        $i = 0;
        if (Session::count('cart') == 1 && $_SESSION["cart"][0]["quantity"] == 1)
        {
            Session::delete('cart');
        }
        else
        {
            foreach ($_SESSION["cart"] as $each_item)
            {
                $i++;
                while (list($key, $value) = each($each_item))
                {
                    if ($key == "item_id" && $value == $pid)
                    {
                        array_splice($_SESSION["cart"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] - 1)));

                        if ($_SESSION["cart"][$i-1]["quantity"] === 0)
                        {
                            unset($_SESSION["cart"][$i-1]);
                        }
                    }
                }
            }
        }
    }

    public function emptyCart()
    {
        Session::delete('cart');
    }

}