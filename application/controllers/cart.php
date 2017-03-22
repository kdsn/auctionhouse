<?php
if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (Token::check($_POST['token']))
    {

        if (isset ($_REQUEST['add']))
        {
            Cart::addToCart($_REQUEST['add']);
        }
        if (isset ($_REQUEST['sub']))
        {
            Cart::removeFromCart($_REQUEST['sub']);
        }

        $i = 0;
        $total = 0;
        foreach ($_SESSION['cart'] as $cart)
        {
            $item = QB::table('PRODUCT')->where('id', $cart['item_id'])->get();

            $display[$i] = [
                'item_id' => $cart['item_id'],
                'item_name' => $item[0]->title,
                'item_price' => $item[0]->price,
                'quantity' => $cart['quantity'],

            ];
            $i++;
            $total += ($item[0]->price * $cart['quantity']);
        }

        $_token = Token::generate();

        echo $twig->render('cart.view.php', array(
            'user'      => $user,
            'cart'      => $display,
            'total'     => $total,
            'token' => $_token
        ));

    }
    else
    {
        Redirect::to('403');
    }
}
else
{
    $i = 0;
    $total = 0;
    foreach ($_SESSION['cart'] as $cart)
    {
        $item = QB::table('PRODUCT')->where('id', $cart['item_id'])->get();

        $display[$i] = [
            'item_id' => $cart['item_id'],
            'item_name' => $item[0]->title,
            'item_price' => $item[0]->price,
            'quantity' => $cart['quantity'],

        ];
        $i++;
        $total += ($item[0]->price * $cart['quantity']);
    }

    $_token = Token::generate();

    echo $twig->render('cart.view.php', array(
        'user'      => $user,
        'cart'      => $display,
        'total'     => $total,
        'token' => $_token
    ));
}