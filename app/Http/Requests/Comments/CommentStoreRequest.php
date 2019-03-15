<?php

namespace App\Http\Requests\Comments;

use App\Http\Requests\BaseRequest;

class CommentStoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment_id' => 'nullable|integer|exists:comments,id',
            'reply_to_user_id' => 'nullable|integer|exists:users,id',
            'text' => 'required|string|max:512',
        ];
    }
}
