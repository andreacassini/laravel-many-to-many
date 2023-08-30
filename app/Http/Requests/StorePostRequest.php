<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'cover_image' => 'image',
            'type_id' => 'required|exists:type,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo deve essere lungo al massimo :max caratteri',
            'cover_image.image'  => 'Il file caricato deve essere un file immagine',
            'type_id.required' => 'Devi selezionare un campo',
            'type_id.exists' => 'Tipo selezionato non valido',
        ];
    }
}
