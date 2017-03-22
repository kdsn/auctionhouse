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

        $_token = Token::generate();

        $product = QB::table('PRODUCT')->where('slug', $_REQUEST['p'])->get();
        if ( ! $product)
        {
            Redirect::to('404');
        }

        Cart::addToCart($product[0]->id);

        $product_image = QB::table('PRODUCT_IMAGE')->where('product_id', $product[0]->id)->get();

        echo $twig->render('product.view.php', array(
            'user'      => $user,
            'product'  => $product,
            'images' => $product_image,
            'lowstock' => Shop::hasLowStock(),
            'outofstock' => Shop::outOfStock(),
            'instock' => Shop::inStock(),
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
    if (isset ($_REQUEST['p']))
    {
        $_token = Token::generate();

        $product = QB::table('PRODUCT')->where('slug', $_REQUEST['p'])->get();
        if ( ! $product)
        {
            Redirect::to('404');
        }

        $product_image = QB::table('PRODUCT_IMAGE')->where('product_id', $product[0]->id)->get();

        echo $twig->render('product.view.php', array(
            'user'      => $user,
            'product'  => $product,
            'images' => $product_image,
            'lowstock' => Shop::hasLowStock(),
            'outofstock' => Shop::outOfStock(),
            'instock' => Shop::inStock(),
            'token' => $_token

        ));
    }
    elseif (isset ($_REQUEST['l']))
    {
        $products = QB::table('PRODUCT')->where('category_id', $_REQUEST['l'])->get();

        foreach ($products as $product) {
            $product_image = QB::table('PRODUCT_IMAGE')->where('product_id', $product->id)->get();

            if (isset ($product_image[0]->image))
            {
                $product->image = $product_image[0]->image;
            }
            else
            {
                $product->image = "https://placeholdit.imgix.net/~text?txtsize=33&txt=" . $product->slug . "&w=350&h=350";
            }
        }

        echo $twig->render('products.view.php', array(
            'user'      => $user,
            'products'  => $products,
            'images' => $product_image
        ));
    }
}