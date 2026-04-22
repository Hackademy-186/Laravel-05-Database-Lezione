<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'subtitle' => 'required|min:3',
            'cover' => 'required|image',
            'body' => 'required',
        ];
    }


    public function messages(): array
    {
        return [
            'title.required' => 'Devi inserire il titolo',
            'title.min' => 'Il titolo deve essere di almeno 3 caratteri',
            'subtitle.required' => 'Devi inserire il sottotitolo',
            'subtitle.min' => 'Il sottotitolo deve essere di almeno 3 caratteri',
            'body.required' => 'Devi inserire il corpo del testo',
            'cover.required' => 'Devi inserire la copertina dell\'articolo',
            'cover.image' => 'Il file deve essere un\'immagine',
        ];
    }
}
