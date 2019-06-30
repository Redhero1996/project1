<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Http\Request;

class HandleCreateTopicRequest extends FormRequest
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
        $request = $this->request->get('number_quest');
        $rules = [
            'name' => 'required|min:3|max:255',
            'content' => 'required|max:255',
            'answer.*' => 'required',
            'correct_ans' => '',
            'explain.*' => '',
        ];
        for($i = 1; $i<=(int)$request; $i++) {
            $rules["correct_ans.$i"] =  'required';
        }
        return $rules;
    }

    public function messages()
    {
        $request = $this->request->get('number_quest');
        $messages['topic_name.required'] = __('validation.required');
        $messages['topic_name.min'] = __('validation.min');
        $messages['topic_name.max'] = __('validation.max');
        for($i = 1; $i<=(int)$request; $i++) {
            $messages["correct_ans.$i.required"] =  __('translate.request_correct_ans');
        }
        return $messages;
    }
}
