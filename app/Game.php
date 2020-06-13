<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{   
    //function to increase scores
    public function score(int $team) : Game
    {
        $prop = "score_${team}";
        $this->$prop += 1;
        $this->save();
        return $this;
    }

    //function to return winner
    public function winner() : string
    {
        if ($this->score_1 > $this->score_2 && $this->complete) {
            return "1";
        } else if ($this->score_2 > $this->score_1 && $this->complete) {
            return "2";
        } else {
            return "incomplete";
        }
    }
}
