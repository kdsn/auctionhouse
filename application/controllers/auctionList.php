<?php
if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}

$data = Auction::getLatestAuctions();

foreach ($data as $auction){
    $auction->start_price = getCorrectMoneyFormat($auction->start_price);
}

echo $twig->render('auctionList.view.php', array(
    'user'      => $user,
    'data'      => $data
));