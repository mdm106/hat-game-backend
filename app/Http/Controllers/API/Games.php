<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Game;

use App\Http\Requests\GameRequest;
use App\Http\Requests\GameScoreComplete;
use App\Http\Requests\GameScoreRequest;

use App\Http\Resources\API\GameResource;

class Games extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();

        return GameResource::collection($games);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get all the request data
        //returns an array of all the data the user sent
        $data = $request->all();

        $game = Game::create($data);

        //create category with data and store in DB and return it as JSON
        return new GameResource($game);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return new GameResource($game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function score(GameScoreRequest $request, Game $game)
    {
        if(!$game->complete) {
            $game->score($request->get("team"));
        }

        return new GameResource($game);
    }

    public function complete(GameScoreComplete $request, Game $game)
    {
        
        $game->completeGame($request->get("finish"));

        return new GameResource($game);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return response(null, 204);
    }
}
