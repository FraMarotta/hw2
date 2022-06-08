<?php
    use Illuminate\Database\Eloquent\Model;

    class Favorite extends Model{
        public $timestamps = false;
        
        public function users(){
            return $this->belongsTo("User");
        }
    }
?>