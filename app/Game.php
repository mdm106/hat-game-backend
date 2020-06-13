<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{   

    protected $fillable = ["team_1", "team_2", "score_1", "score_2", "complete"];

    protected $attributes = [
        "score_1" => 0,
        "score_2" => 0,
        "complete" => false,
    ];
    //function to increase scores
    public function score(int $team) : Game
    {
        $prop = "score_${team}";
        $this->$prop += 1;
        $this->save();
        return $this;
    }

    public function completeGame(bool $finish) : Game
    {
        $this->complete =$finish;
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
