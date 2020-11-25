<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class WelcomeController extends Controller
{

    public static function encode_personal_link()
    {
        $yourPassbaseLink = "https://verify.passbase.com/mathias";

        $hash_map = array(
            'prefill_attributes' => array(
                'email' => 'testuser+34567865456@passbase.com',
                'country' => 'de'
            ),
        );

        $encodedAttributes = base64_encode(json_encode($hash_map));
        $encodedLink = $yourPassbaseLink."?p=".$encodedAttributes;
        return $encodedLink;
    }
}
