<?php
if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}



if (User::permissions('admin'))
{

    $data = Auction::getLatestAuctions();

    foreach ($data as $auction) {
        $auction->start_price = getCorrectMoneyFormat($auction->start_price);
    }

    echo $twig->render('admin.auctionList.view.php', array(
        'user' => $user,
        'data' => $data
    ));
}else {


    $data = Auction::getLatestAuctions();

    foreach ($data as $auction) {
        $auction->start_price = getCorrectMoneyFormat($auction->start_price);

        $desc = $auction->description;

        if (strlen($desc) > 180) {
            $desc = substr($desc, 0, 180);
            $desc .= "...";
            $auction->description = $desc;
        }

        $auction->image = Auction::getImages($auction->id)[0]->image;
    }

    echo $twig->render('auctionList.view.php', array(
        'user' => $user,
        'data' => $data
    ));
}