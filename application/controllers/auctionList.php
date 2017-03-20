<?php
if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}



if (User::permissions('admin') || User::permissions('staff'))
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

    $data = null;

    if(!isset($_GET['search'])){
        $data = Auction::getLatestAuctions();
    }else{
        $data = Auction::getLatestFromSearch($_GET['search']);
    }


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