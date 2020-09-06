<?php

namespace App\Http\View\Composers;

use App\Models\Contact;
use Illuminate\View\View;

class ContactComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $contact;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->contact = Contact::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('contact', $this->contact);
    }
}