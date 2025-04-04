<?php

namespace App\Console\Commands;

use App\Mail\HourlyReportMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendHourlyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-hourly-report';

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
        Mail::to('example@example.com')->send(new HourlyReportMail());
        $this->info('Hourly email sent successfully.');
    }
}
