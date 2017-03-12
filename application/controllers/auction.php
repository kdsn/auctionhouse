<?php
if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}

if(isset($_GET['auction_id'])){
    $data = Auction::getAuction($_GET['auction_id']);

    foreach ($data as $auction){
        $auction->start_price = getCorrectMoneyFormat($auction->start_price);
    }

    echo $twig->render('auction.view.php', array(
        'user'      => $user,
        'data'      => $data
    ));
}else{
    echo $twig->render('error/404.view.php', array(
        'user'      => $user
    ));
}