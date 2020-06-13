<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "team_1" => ["required", "string", "max:50"],
            "team_2" => ["required", "string", "max:50"],
            "score_1" => ["required", "integer", "min:0"],
            "score_2" => ["required", "integer", "min:0"],
            "complete" => ["required", "bool"],
        ];
    }
}
