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
        if (isset ($_SESSION['cart']))
        {
            $i = 0;
            $total = 0;
            foreach ($_SESSION['cart'] as $cart)
            {
                $item = QB::table('PRODUCT')->where('id', $cart['item_id'])->get();
                $i++;
                $total += ($item[0]->price * $cart['quantity']);
            }

        }

        if (isset($_REQUEST['alt-adr']))
        {
            // Tilføj validering

                 $f_name  = filter_var(trim($_POST['alt_f_name']), FILTER_SANITIZE_STRING);
             $l_name  = filter_var(trim($_POST['alt_l_name']), FILTER_SANITIZE_STRING);
             $address  = filter_var(trim($_POST['alt_address']), FILTER_SANITIZE_STRING);
               $zip  = filter_var(trim($_POST['alt_zip']), FILTER_SANITIZE_NUMBER_INT);
               $city  = filter_var(trim($_POST['alt_city']), FILTER_SANITIZE_STRING);

        }
        else
        {
            // Tilføj validering
               $f_name  = filter_var(trim($_POST['f_name']), FILTER_SANITIZE_STRING);
                $l_name  = filter_var(trim($_POST['l_name']), FILTER_SANITIZE_STRING);
                $address  = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
                 $zip  = filter_var(trim($_POST['zip']), FILTER_SANITIZE_NUMBER_INT);
                 $city  = filter_var(trim($_POST['city']), FILTER_SANITIZE_STRING);
        }

         $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

        $data = array(
            'customer_user_id' => User::userData()->id,
            'is_paid'       => 0,
            'order_status'  => 'pending',
            'total'           => $total
        );

        QB::table('ORDER')->insert($data);

             $oid = QB::table('ORDER')->select('id')->orderBy('created_at', 'DESC')->limit(1)->get();
             $oid = $oid[0]->id;

        $data = array(
            'order_id'  =>  $oid,
            'address'       => $address,
            'zip'           => $zip,
            'city'          => $city
        );

        QB::table('ADDRESS')->insert($data);

        $data = array(
            'order_id'      =>  $oid,
            'user_id'       => User::userData()->id,
            'first_name'           => $f_name,
            'last_name'          => $l_name,
            'email'          => $email
        );

        QB::table('CUSTOMER')->insert($data);

        $i = 0;
        foreach ($_SESSION['cart'] as $cart)
        {
            $item = QB::table('PRODUCT')->where('id', $cart['item_id'])->get();
            $i++;
            $total += ($item[0]->price * $cart['quantity']);

            $data = array(
                'order_id'  =>  $oid,
                'price'       => $item[0]->price,
                'product_id'  => $cart['item_id'],
                'quantity'    => $cart['quantity']
            );

            QB::table('ORDER_PIECE')->insert($data);
            Cart::emptyCart();
        }

        echo $twig->render('checkout.view.php', array(
            'user'      => $user,
            'msg'      => "Tak for din ordre, du sendes nu til betalings gatewayen. (DEMO SLUT)"
        ));

    }
    else
    {
        Redirect::to('403');
    }
}
else
{
    if (isset ($_SESSION['cart']))
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


        echo $twig->render('checkout.view.php', array(
            'user'      => $user,
            'user_info' => User::userInfo(),
            'total'     => $total,
            'token' => $_token
        ));
    }
    else
    {
        echo $twig->render('checkout.view.php', array(
            'user'      => $user,
            'msg'      => "Kurven er tom"
        ));
    }

}