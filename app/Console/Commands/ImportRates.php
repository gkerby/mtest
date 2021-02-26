<?php

namespace App\Console\Commands;

use App\Services\Contracts\ImportServiceContract;
use App\Services\Contracts\RateFetcherContract;
use Illuminate\Console\Command;

class ImportRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * @var ImportServiceContract
     */
    private $databaseRatesService;
    /**
     * @var RateFetcherContract
     */
    private $ratesFetcher;

    public function __construct(RateFetcherContract $ratesFetcher, ImportServiceContract $databaseRatesService)
    {
        parent::__construct();
        $this->databaseRatesService = $databaseRatesService;
        $this->ratesFetcher = $ratesFetcher;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->databaseRatesService->importToDatabase($this->ratesFetcher->fetchRates());
        return 0;
    }
}
