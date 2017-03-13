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
       return QB::table('AUCTION')->select('*')->where('id','=',$auction_id)->limit(1)->get();
    }

    public static function makeBid($auction_id, $bid_price){

        $auction = self::getAuction($auction_id);

        if($bid_price < ($auction[0]->start_price + $auction[0]->jump_price)){

            return false;

        }else{

            return true;

        }



    }


}