<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class SearchImgsController extends Controller
{
    public function search($dest){
        $pixabay_endpoint = "https://pixabay.com/api/";
        $pixabay_key = "27406439-9539ca5d15db4ae55b6c56b83";
        $text = urlencode($dest);
        $curl = curl_init();
        $api_url = $pixabay_endpoint . "?key=" . $pixabay_key . "&q=" . $text . "&orientation=horizontal" ;
        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        print_r($result);
    }
}
?>