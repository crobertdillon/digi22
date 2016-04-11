<?php
/**
 * Created by PhpStorm.
 * User: crobertdillon
 * Date: 4/7/16
 * Time: 2:36 PM
 */
namespace App\Controller\Component;

use Cake\Controller\Component;

use Services_Twilio;


class TwilioComponent extends Component
{
    private $sid = "AC61033a32490cf9486ce6247da9a0dcb2";
    private $token = "fa35f5ac5f5f45ad77586b375a4e323b";
    private $numbr = "631-387-4229";

    public function sendSms($send,$mess) {
        $client = new Services_Twilio($this->sid, $this->token);
        $sms = $client->account->messages->create(array(
            "From" => $this->numbr,
            "To" => $send,
            "Body" => $mess,
        ));
        $messerr = "";
        $messret = "Sent message {$sms->sid}";
        $messwork = $sms->status;
        if($sms->errormessage) {
            $messerr = $sms->errormessage;
        }
        $retval = array(
            "retval" => $messret,
            "status" => $messwork,
            "err" => $messerr
        );
        return $retval;
    }

}