<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => (int) $this->id,
            "team_1" => (string) $this->team_1,
            "team_2" => (string) $this->team_2,
            "score_1" => (int) $this->score_1,
            "score_2" => (int) $this->score_2,
            "complete" => (bool) $this->complete,
            "winner" => (string) $this->winner(),
        ];
}
}
