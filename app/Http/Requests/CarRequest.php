<?php

namespace App\Http\Requests;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarRequest extends FormRequest
{

    public function rules()
    {
        $unique = Rule::unique('cars');
        /** @var Car $car */
        if ($car = $this->route('car'))
            $unique->ignoreModel($car);
        return [
            'name' => [
                'required', 'string', 'max:255'
            ],
            'model' => [
                'required', 'string', 'max:255',$unique
            ],
            'color'=>[
                'required', 'string', 'max:255'
            ],
            'speed'=>[
                'required', 'between:0,999.99',//max 1000
            ],
            'power'=>[
                'required', 'between:0,9999.99',//max 10000
            ],
        ];
    }
}
