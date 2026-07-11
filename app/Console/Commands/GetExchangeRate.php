<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;

class GetExchangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange:eur';

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
        $response = Http::get('https://open.er-api.com/v6/latest/RSD');

        if (!$response->successful()) {
            $this->error('API nije dostupan ili ga nema trenutno!');
            return Command::FAILURE;
        }

        $data = $response->json();

        $eur = round(1 / $data['rates']['EUR'], 2);
        $usd = round(1 / $data['rates']['USD'], 2);

        $this->info('==========================');
        $this->info('Exchange Rates');
        $this->info('==========================');
        $this->line('Date: '.$data['time_last_update_utc']);
        $this->line('');
        $this->line("1 EUR = {$eur} RSD");
        $this->line("1 USD = {$usd} RSD");

        return Command::SUCCESS;
    }
}
