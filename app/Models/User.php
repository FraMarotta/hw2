<?php
    use Illuminate\Database\Eloquent\Model;

    class User extends Model{
        public $timestamps = false;
        public function favorites(){
            return $this->hasMany("Favorite");
        }
    }
?>