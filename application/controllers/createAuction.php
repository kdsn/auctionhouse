<?php

if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}

function exitOnError($msg){

    echo $msg;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $auction_id = null;

    if(!empty($_POST['auction_id'])){
        $auction_id = $_POST['auction_id'];
    }

    /*
    $title = $_POST['title'];
    $start_price = $_POST['start_price'];
    $bid_jump = $_POST['bid_jump'];
    $auction_end_date = $_POST['auction_end_date'];
    $description = $_POST['description'];
*/


    $validate = new Validate();
    $validation = $validate->check(
        $_POST, [
        'title' => [
            'name' => 'Titel',
            'required' => true,
            'min' => 6,
            'max' => 64
        ],
        'description' => [
            'name' => 'Beskrivelse',
            'required' => true,
            'min' => 6
        ],
        'start_price' => [
            'name' => 'Start Pris',
            'required' => true,
            'numeric' => true
        ],
        'bid_jump' => [
            'name' => 'Minimuns bud tillæg',
            'required' => true,
            'numeric' => true
        ],
        'auction_end_date' => [
            'name' => 'Afslutningsdato',
            'required' => true,
            'datetime' => "m/d/Y"
        ]
    ]);

    $title = $_POST['title'];
    $start_price = $_POST['start_price'];
    $bid_jump = $_POST['bid_jump'];
    $auction_end_date = DateTime::createFromFormat('m/d/Y', $_POST['auction_end_date']);
    $description = $_POST['description'];

    if ($validation->passed())
    {

        if(is_null($auction_id)){
           // New auction
            $insertId = QB::table('AUCTION')->insert(array(
                'title' =>  $title,
                'start_price' => $start_price,
                'jump_price' => $bid_jump,
                'auction_end_date' => $auction_end_date->format("Y-m-d"),
                'description' => $description,
                'owner_user_id' => User::id()
            ));

        }else{
            // update auction
            QB::table('AUCTION')->where('id','=', $auction_id)->update(array(
                'title' =>  $title,
                'start_price' => $start_price,
                'jump_price' => $bid_jump,
                'auction_end_date' => $auction_end_date->format("Y-m-d"),
                'description' => $description
            ));



        }

        Redirect::to('auktioner');

    }
    else
    {

        echo $twig->render('admin.createauction.view.php', array(
            'errors' => $validation->errors(),
            'user'      => $user,
            'title' => $title,
            'auction_id' => $auction_id,
            'start_price' => $start_price,
            'bid_jump' => $bid_jump,
            'auction_end_date' => $auction_end_date->format("m/d/Y"),
            'desc' => $description
        ));

    }



}else{

    $auction_id = null;

    if(isset($_GET['auction_id'])){
        $auction_id = $_GET['auction_id'];
        $data = Auction::getAuction($auction_id);

        $data[0]->auction_end_date = DateTime::createFromFormat('Y-m-d H:i:s',$data[0]->auction_end_date);

        echo $twig->render('admin.createauction.view.php', array(
            'user'      => $user,
            'start_price'      => $data[0]->start_price,
            'start_price_formatted' => getCorrectMoneyFormat($data[0]->start_price),
            'bid_jump' => $data[0]->jump_price,
            'auction_end_date' => $data[0]->auction_end_date->format('m/d/Y'),
            'desc' => $data[0]->description,
            'title' => $data[0]->title,
            'auction_id' => $auction_id,
        ));
    }else{
        echo $twig->render('admin.createauction.view.php', array(
            'user'      => $user
        ));
    }

}
