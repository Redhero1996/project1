<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Topic;

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
        $rules = [
            // 'topic_name' => '',
            // 'content' => '',
            'answer' => '',
            'correct_ans' => '',
            'explain.*.*' => '',
        ];
        $name = $this->request->get('topic_name');
        if ($name != null && strlen($name) >=3 && strlen($name) <= 255) {
            $topic = Topic::where('name', $name)->get();
            foreach ($topic[0]->questions as $key => $question) {
                // $rules["content"] = 'required|min:3';
                $rules["correct_ans.$question->id"] = 'required';
            }
        } else {
            $rules['topic_name'] = 'required|min:3|max:255';
        }
        return $rules;
    }

    public function messages()
    {
        $name = $this->request->get('topic_name');
        $messages = [];
        if (($name != null) && (strlen($name) >=3) && (strlen($name) <= 255)) {
            $topic = Topic::where('name', $name)->get();
            foreach ($topic[0]->questions as $key => $question) {
                // $messages["content.required"] = __('Nội dung câu hỏi không được bỏ trống');
                // $messages["content.min"] = __('Nội dung câu hỏi cần tối thiểu 3 ký tự');
                $messages["correct_ans.$question->id.required"] = __('Có câu hỏi chưa có đáp án đúng');
            }
        } else {
            $messages['topic_name.required'] = __('Topic không được bỏ trống');
            $messages['topic_name.min'] =  __('Topic phải tối tiểu 3 ký tự');
            $messages['topic_name.max'] =  __('Topic tối đa 255 ký tự');
        }    
        return $messages;
    }
}
