<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\ReservationReminder;
use Illuminate\Support\Facades\Mail;
use App\Models\Reservation;
use App\Models\User;

class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:send-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reservation reminders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reservations = Reservation::whereDate('date', now()->format('Y-m-d'))->get();

        if ($reservations->isNotEmpty()) {
        foreach ($reservations as $reservation) {
            $userEmail = $reservation->user->email;
            Mail::to($userEmail)->send(new ReservationReminder($reservation));
        }

        $this->info('Reservation reminders sent successfully.');
    } else {
        $this->info('No reservations for today.');
    }
    }
}
