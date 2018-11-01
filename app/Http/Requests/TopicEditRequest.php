<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicEditRequest extends FormRequest
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
            'topic_name' => 'min:3|max:255',
            'content.*' => 'required|min:3',
            'answer.*' => 'required',
            'correct_ans.*' => 'required|min:1',
            'explain.*' => '',
        ];
    }
}
