<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class displayStocksProducts extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required'
        ];
    }
}
