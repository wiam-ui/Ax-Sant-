<?php

namespace App\Console\Commands;

use App\Mail\RendezvousMail;
use App\Models\RendezVous;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAppointmentReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-appointment-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $appointments = RendezVous::whereDate('date', now()->addDay()->toDateString())->with('patient.user')->get();
        if ($appointments->isEmpty()) {
            $this->info('No appointments found for tomorrow.');
            return;
        }
        // foreach ($appointments as $appointment) {
        //     // dd($appointment);
        //     Mail::to($appointment->patient->user->email)->send(new RendezvousMail());
        // }
        foreach ($appointments as $appointment) {
            $details = [
                'patientName' => $appointment->patient->user->name,
                'date' => \Carbon\Carbon::parse($appointment->date)->format('d/m/Y'),
                'heure' => \Carbon\Carbon::parse($appointment->heure)->format('H:i'),
            ];

            Mail::to($appointment->patient->user->email)->send(new RendezvousMail($details));
        }

        $this->info('Reminders sent successfully.');
    }
}
