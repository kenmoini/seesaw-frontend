<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      // TODO: Add authorization logic here
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
          'message' => 'required',
          'visibility' => 'required|string',
          'type' => 'required|string',
          
          'title' => 'nullable|max:255',
          'end_thread' => 'nullable',

          'end_date' => 'nullable',
          'end_time_hour' => 'nullable|string',
          'end_time_minute' => 'nullable|string',
          'end_time_meridiem' => 'nullable|string',
        ];
    }
}
