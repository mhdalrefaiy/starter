<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            //
            'name_ar'=>'required|max:100|regex:/^[a-zA-Z ]+$/',
            'name_en'=>'required|max:100|regex:/^[a-zA-Z ]+$/',
            'price'=>'required|numeric',
            'details_ar'=>'required',
            'details_en'=>'required',
        ];
    }

    public function messages(){
        return [
            'name_ar.required'=>__('messages.offer name_ar required'),
            'name_en.regex'=>__('messages.offer name_en h'),
            'name_en.required'=>__('messages.offer name_en required'),
            'price.numeric'=>__('messages.offer price numeric'),
            'price.required'=>__('messages.offer price required'),
            'details_ar.required'=>__('messages.offer details_ar required'),
            'details_en.required'=>__('messages.offer details_en required'),
        ];
    }


}
