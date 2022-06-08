<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use User as User;
use Favorite as Favorite;
use Illuminate\Contracts\Session\Session;

class FavoritesController extends Controller
{

    private function search_image($meta){
        $pixabay_endpoint = "https://pixabay.com/api/";
        $pixabay_key = "27406439-9539ca5d15db4ae55b6c56b83";
        $meta = strtoupper( $meta );
        $text = urlencode($meta);
        $curl = curl_init();
        $api_url = $pixabay_endpoint . "?key=" . $pixabay_key . "&q=" . $text . "&orientation=horizontal";
        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $json = json_decode($result, true); //json->array
        curl_close($curl);
        return $json['hits'][0]['webformatURL'];
    }
    public function addFavorites($dest){
        //ho username in session('Username')
        //ho meta in $dest
        $user = User::where('Username', session('Username'))->first();
        //print_r($user->id); // qui ho user_id
        $meta = new Favorite();
        $meta->user_id = $user->id;
        $meta->destination = $dest;
        $meta->save();
        if($meta){
            return view('logged_home')->with('user', session('Username'));
        }
    }
    public function fetchFavorites(){
        $jsonArray = array();
        if(session('Username')) $usr = session('Username');
        else return ;
        $user = User::where('Username', $usr)->first();
        $favorites = Favorite::select('Destination')->where('user_id', $user->id)->get();
        $destination = $favorites->toArray();
        //$destination[0]['Destination'] qui ho le città 0..1..2..lenght
        foreach($destination as $dest){
            $url = $this->search_image($dest['Destination']);
            $jsonArray[] = (array('meta' => $dest['Destination'], 'picture' => $url));
        }return $jsonArray;
   }

   public function deleteFavorites($dest){
        $user = User::where('Username', session('Username'))->first();
        $meta = Favorite::where('user_id', $user->id)->where('Destination', $dest)->first();
        $meta->delete();
   }

   public function checkFavorites($dest){ 
        //se sarà già presente passerò in fav = 1, e toglierò il bottone
        $user = User::where('Username', session('Username'))->first();
        $meta = Favorite::where('user_id', $user->id)->where('Destination', $dest)->first();
        if($meta) $isPresent = 1; 
        else $isPresent = 0;
        return view('search')->with('meta', $dest)->with('isPresent', $isPresent);
   }
}
?>