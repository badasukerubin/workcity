<?php

namespace WorkCity\Listeners;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Request;
use WorkCity\LoginActivity;

class LogPasswordReset
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PasswordReset  $event
     * @return void
     */
    public function handle(PasswordReset $event)
    {
        //
        $word = 'admin';
        $word2 = 'coordinator';
        $url = Request::fullUrl();
        $url = explode('/', $url);
        $url = array_flip($url);
        if (isset($url[$word])){
            $sub = 'Administrator';
        }elseif (isset($url[$word2])){
            $sub = 'Coordinator';
        }else{
            $sub = 'User';
        }
        LoginActivity::create([
            'subject' => $sub.' '.$user = empty(Request::input('email'))?(Request::input('username').' attempted to login'):Request::input('email').' tried resetting h/her password',
            'url' => Request::fullUrl(),
            'method' => Request::method(),
            'user_id' => 1,
            'p_id' => 'logged out user',
            'user_agent' => Request::header('User-Agent'),
            'ip_address' => Request::ip()
        ]);
    }
}
