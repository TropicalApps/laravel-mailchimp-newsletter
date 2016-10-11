<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\SubscriptionRequest;

class NewsletterController extends Controller
{
    protected $mailchimp;
    protected $listId;

    /**
     * Pull the Mailchimp-instance from the IoC-container.
     */
    public function __construct(\Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
        $this->listId = config('mailchimp.list-id');
    }

    /**
     * Access the mailchimp lists API
     * for more info check https://apidocs.mailchimp.com/api/2.0/lists/subscribe.php
     */
    public function subscribe(SubscriptionRequest $request)
    {
        try {
            $this->mailchimp
                ->lists
                ->subscribe(
                    $this->listId,
                    ['email' => $request->email]
                );

            $this->loadResponse($request, [
                'status'            => 'success',
                'response_message'  => config('mailchimp.messages.success')
            ]);

        } catch (\Mailchimp_List_AlreadySubscribed $e) {
            $this->loadResponse($request, [
                'status'            => 'info',
                'response_message'  => $e->getMessage()
            ]);
        } catch (\Mailchimp_Error $e) {
            $this->loadResponse($request, [
                'status'            => 'warning',
                'response_message'  => $e->getMessage()
            ]);
        }

        return redirect()->back();
    }

    /**
     * Load response messages into the current session
     *
     * @param  array  $messages ['messae_key'=> 'message_value', ...]
     *
     * @return void
     */
    private function loadResponse(Request $request, $messages = array())
    {
        collect($messages)->each(function ($value, $key) use ($request) {
            $request->session()->flash($key, $value);
        });
    }
}
