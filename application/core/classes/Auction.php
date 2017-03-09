<?php

/**
 * Created by PhpStorm.
 * User: morten
 * Date: 3/9/17
 * Time: 11:03 AM
 */
class Auction
{

    public static function getLatestAuctions(){
       return QB::table('AUCTION')->select('*')->orderBy('created_at', 'ASC')->get();
    }

    public static function getAuction($auction_id){
       return QB::table('AUCTION')->select('*')->where('id','=',$auction_id)->limit(1);
    }

}