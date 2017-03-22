<?php

class Payment
{
    public static function btToken()
    {
        $token = ['token' => Braintree_ClientToken::generate()];
        return json_encode($token);
    }

}