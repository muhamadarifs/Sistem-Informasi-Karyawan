<?php

namespace App\Providers;

use App\Models\LeaveBalance;
use App\Observers\LeaveBalanceObserver;
use Illuminate\Auth\Events\Registered;
use App\Events\UserCreated;
use App\Listeners\CreateLeaveBalance;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserCreated::class => [
            CreateLeaveBalance::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        LeaveBalance::observe(LeaveBalanceObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
