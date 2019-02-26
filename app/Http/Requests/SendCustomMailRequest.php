<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;


class SendCustomMailRequest extends FormRequest
{
  /**
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * @return array
   */
  public function rules()
  {
    return [
      'subject' => 'required',
      'senderEmail' => 'required|email',
      'recipient' => 'required|email',
      'senderName' => 'required',
      'content' => 'required',
    ];
  }
}
