<?php

namespace App\Console\Commands;

use App\Mail\PatientTestResult;
use App\Models\TestResult;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class ImmediateDelivery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pcr:immediate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail immediately to patients';

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
        $patients = TestResult::where('created_at', '=', Carbon::today())
        ->where('patient_type', '=', 'Immediate')
        ->get();

        foreach ($patients as $mailData)
        {
            Mail::to(Crypt::decryptString($mailData->patient_email))->send(new PatientTestResult($mailData));
        }

        $this->info('Successfully sent schedule test result');
    }
}
