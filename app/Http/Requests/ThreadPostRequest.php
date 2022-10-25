<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadPostRequest extends FormRequest
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
          'title' => 'required|max:255',
          'message' => 'required',
          'visibility' => 'required|string',
          'type' => 'required|string',
          'end_date' => 'nullable',
          'end_time_hour' => 'nullable|string',
          'end_time_minute' => 'nullable|string',
          'end_time_meridiem' => 'nullable|string',
        ];
    }
}
