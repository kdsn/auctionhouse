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
                header("location: /auktion?auction_id=".$_POST['auction_id']);
           }
        }

    }

}else{
    if(isset($_GET['auction_id'])){
        $data = Auction::getAuction($_GET['auction_id']);

        $images = Auction::getImages($_GET['auction_id']);

        echo $twig->render('auction.view.php', array(
            'user'      => $user,
            'start_price'      => $data[0]->start_price,
            'start_price_formatted' => getCorrectMoneyFormat($data[0]->start_price),
            'minimum_bid_price' => ($data[0]->start_price + $data[0]->jump_price),
            'jump_price' => $data[0]->jump_price,
            'auction_end_date' => $data[0]->auction_end_date,
            'desc' => $data[0]->description,
            'title' => $data[0]->title,
            'auction_id' => $data[0]->id,
            'images' => $images,
            'primary_image' => $images[0]->image
        ));
    }else{
        echo $twig->render('error/404.view.php', array(
            'user'      => $user
        ));
    }
}

