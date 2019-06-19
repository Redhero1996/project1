<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\Topic\TopicRepositoryInterface;

class TopicEditRequest extends FormRequest
{
    protected $topic;
    public function __construct(TopicRepositoryInterface $topic)
    {
        $this->topic = $topic;
    }
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
            'answer' => '',
            'correct_ans' => '',
            'explain.*.*' => '',
        ];
        $topic_id = $this->request->get('id');
        if ($topic_id != null) {
            $topic = $this->topic->findById($topic_id);
            foreach ($topic->questions as $key => $question) {
                $rules["correct_ans.$question->id"] = 'required';
            }
        } else {
            $rules['topic_name'] = 'required|min:3|max:255';
        }
        return $rules;
    }

    public function messages()
    {
        $topic_id = $this->request->get('id');
        $messages = [];
        if ($topic_id != null) {
            $topic = $this->topic->findById($topic_id);
            foreach ($topic->questions as $key => $question) {
                $messages["correct_ans.$question->id.required"] = __('translate.request_correct_ans');
            }
        } else {
            $messages['topic_name.required'] = __('validation.required');
            $messages['topic_name.min'] =  __('validation.min');
            $messages['topic_name.max'] =  __('validation.max');
        }
        return $messages;
    }
}
