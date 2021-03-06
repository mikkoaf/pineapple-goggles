<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TextMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: ie. if user owns the person_id, they are authorized
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
            'person_id' => 'required|integer',
            // TODO: check format
            'message_sent' => 'date',
            'limit' => 'integer'
        ];
    }
}
