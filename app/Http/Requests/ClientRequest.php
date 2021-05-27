<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
        $codUnique = isset($this->client->id)
            ? Rule::unique('clients', 'cod')->ignore($this->client->id)
            : Rule::unique('clients', 'cod');
        return [
            'name'    => 'required',
            'cod'     => 'required|numeric|max:9999999999|'.$codUnique,
            'city_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'Debe ingresar el nombre',
            'cod.required'     => 'Debe ingresar el codigo',
            'cod.numeric'      => 'El codigo debe ser numerico',
            'cod.unique'       => 'El codigo ya esta asignado a otra ciudad',
            'cod.max'          => 'El codigo no puede ser mayor a 9999999999',
            'city_id.required' => 'Seleccione una ciudad',
        ];
    }
}
