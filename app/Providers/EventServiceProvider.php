<?php

namespace WorkCity\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'WorkCity\Events\Event' => [
            'WorkCity\Listeners\EventListener',
        ],
        'Illuminate\Auth\Events\Login' => [
            'WorkCity\Listeners\LogSuccessfulLogin',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'WorkCity\Listeners\LogSuccessfulLogout',
        ],
        'Illuminate\Auth\Events\Attempting' => [
            'WorkCity\Listeners\LogAttempt',
        ],
        'Illuminate\Auth\Events\Authenticated' => [
            'WorkCity\Listeners\LogAuthenticated',
        ],
        'Illuminate\Auth\Events\Failed' => [
            'WorkCity\Listeners\LogFailed',
        ],
        'Illuminate\Auth\Events\Lockout' => [
            'WorkCity\Listeners\LogLocked',
        ],
        'Illuminate\Auth\Events\PasswordReset' => [
            'WorkCity\Listeners\LogPasswordReset',
        ],
        'Illuminate\Auth\Events\Registered' => [
            'WorkCity\Listeners\LogRegistered',
        ],
        'WorkCity\Events\UpdatedProfile' => [
            'WorkCity\Listeners\LogUpdatedProfile',
        ],
        'WorkCity\Events\Businessed' => [
            'WorkCity\Listeners\LogBusinessed',
        ],
        'WorkCity\Events\AddCoord' => [
            'WorkCity\Listeners\LogAddCoord',
        ],
        'WorkCity\Events\AddSchool' => [
            'WorkCity\Listeners\LogAddSchool',
        ],
        'WorkCity\Events\AddBank' => [
            'WorkCity\Listeners\LogAddBank',
        ],
        'WorkCity\Events\AddAdmin' => [
            'WorkCity\Listeners\LogAddAdmin',
        ],
        'WorkCity\Events\DelAdmin' => [
            'WorkCity\Listeners\LogDelAdmin',
        ],
        'WorkCity\Events\DelUser' => [
            'WorkCity\Listeners\LogDelUser',
        ],'WorkCity\Events\DelUUser' => [
            'WorkCity\Listeners\LogDelUUser',
        ],'WorkCity\Events\DelBank' => [
            'WorkCity\Listeners\LogDelBank',
        ],'WorkCity\Events\DelSchool' => [
            'WorkCity\Listeners\LogDelSchool',
        ],'WorkCity\Events\DelBus' => [
            'WorkCity\Listeners\LogDelBus',
        ],'WorkCity\Events\DelCoord' => [
            'WorkCity\Listeners\LogDelCoord',
        ],
        'WorkCity\Events\ADelAdmin' => [
            'WorkCity\Listeners\LogADelAdmin',
        ],
        'WorkCity\Events\ADelUser' => [
            'WorkCity\Listeners\LogADelUser',
        ],'WorkCity\Events\ADelUUser' => [
            'WorkCity\Listeners\LogADelUUser',
        ],'WorkCity\Events\ADelBank' => [
            'WorkCity\Listeners\LogADelBank',
        ],'WorkCity\Events\ADelSchool' => [
            'WorkCity\Listeners\LogADelSchool',
        ],'WorkCity\Events\ADelBus' => [
            'WorkCity\Listeners\LogADelBus',
        ],'WorkCity\Events\ADelCoord' => [
            'WorkCity\Listeners\LogADelCoord',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
