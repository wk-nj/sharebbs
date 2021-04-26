<?php

namespace App\Http\Requests;

class TopicRequest extends Request
{
    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
                // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required|max:50|min:2',
                    'body' => 'required|min:8',
                    'category_id' => 'required',
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            }
        }
    }

    public function messages()
    {
        return [
            'title.required' => '标题为必填',
            'title.min' => '标题最少为2个字符',
            'title.max' => '标题最多为50个字符',
            'body.required' => '内容为必填字段',
            'body.min' => '内容最小为3个字符',
        ];
    }
}
