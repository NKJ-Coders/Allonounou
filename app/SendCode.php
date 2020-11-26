<?php
namespace App;
class SendCode{

    public static function sendCode($phone){
        $code = rand(1111,9999);
        // $nexmo=App("Nexmo\CLient");
        // $nexmo->message()->send([
        //     'to'   => '+237'.(int)$phone,
        //     'from' => 'Nobysoft',
        //     'text' => 'Verify code: '.$code
        // ]);
        return $code;
    }

}
