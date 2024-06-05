<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaintRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'taxi_id' => 'required|exists:taxis,id',
            'color_id' => 'required|numeric',
        ];
    }
}
