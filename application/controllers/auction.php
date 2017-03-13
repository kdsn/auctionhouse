<?php
if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['action']) && isset($_POST['bid']) && isset($_POST['auction_id'])){

        if($_POST['action'] == 'bid'){
           if(Auction::makeBid($_POST['auction_id'],$_POST['bid'])){
                echo "success";
           }
        }

    }

}else{
    if(isset($_GET['auction_id'])){
        $data = Auction::getAuction($_GET['auction_id']);

        echo $twig->render('auction.view.php', array(
            'user'      => $user,
            'start_price'      => $data[0]->start_price,
            'start_price_formatted' => getCorrectMoneyFormat($data[0]->start_price),
            'minimum_bid_price' => ($data[0]->start_price + $data[0]->jump_price),
            'jump_price' => $data[0]->jump_price,
            'auction_end_date' => $data[0]->auction_end_date,
            'desc' => $data[0]->description,
            'title' => $data[0]->title,
            'auction_id' => $data[0]->id
        ));
    }else{
        echo $twig->render('error/404.view.php', array(
            'user'      => $user
        ));
    }
}

