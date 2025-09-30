<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EdoardoTincani;
use App\Rules\ReCaptcha;


class MailController extends Controller

{
    /**
     * Get a validator for an incoming request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name_surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'g-recaptcha-response' => ['required', new ReCaptcha]

        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMail(Request $request)
    {
        $this->validator($request->all())->validate();

        Mail::to(env('MAIL_TO', 'edoardo.site@gmail.com'))->send(new EdoardoTincani($request->all()));

        return back()->with('success', __('app.mail.success'));
    }
}
