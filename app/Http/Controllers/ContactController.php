<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mail\StoreRequest;
use App\Mail\ContactMail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('contact.contact');
    }

    /**
     * @param StoreRequest $storeRequest
     * @return RedirectResponse
     */
    public function send(StoreRequest $storeRequest): RedirectResponse
    {
        Mail::to('bucker.lviv@gmail.com')->send(new ContactMail($storeRequest->validated()));
        return redirect()->route('home');
    }
}
