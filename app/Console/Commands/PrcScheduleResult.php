<?php

namespace App\Console\Commands;

use App\Mail\PatientTestResult;
use App\Models\TestResult;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class PrcScheduleResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prc:result';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respectively send an exclusive prc test result.';

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
        //return 0;
        //$patients = TestResult::all();
        $patients = TestResult::where('result_timer', '<=', Carbon::now()->subHours(6)->toDateTimeString())
        ->where('patient_type', '=', 'Express')
        ->get();

        foreach ($patients as $mailData)
        {
            //$findEmail = $mailData->patient_email;

            //$email = ();

            Mail::to(Crypt::decryptString($mailData->patient_email))->send(new PatientTestResult($mailData));
        }

        $this->info('Successfully sent schedule test result');
    }
}
