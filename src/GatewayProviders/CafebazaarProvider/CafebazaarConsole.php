<?php

namespace PaymentService\GatewayProviders\CafebazaarProvider;

use Illuminate\Console\Command;

class CafebazaarConsole extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Cafebazaar {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cafebazaar console commands';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $action = $this->argument('action');
        $client_id = config('payment.cafebazaar.client_id');
        $redirect_uri = config('payment.cafebazaar.redirect_uri');
        if ($action == 'code') {
            echo "Visit this and grant access\n";
            echo "https://pardakht.cafebazaar.ir/devapi/v2/auth/authorize/?response_type=code&access_type=offline&redirect_uri=$redirect_uri&client_id=$client_id\n";
        }
    }
}
