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

    if(isset($_POST['image_id'])){

        QB::table('AUCTION_IMAGE')->where('id','=', $_POST['image_id'])->delete();

    }

}

