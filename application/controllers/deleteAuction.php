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
    QB::table('AUCTION')->where('id', '=', $_GET['auction_id'])->delete();
}

header("location: /auktioner");