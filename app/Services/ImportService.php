<?php

namespace App\Services;

use App\Entities\RateEntityContract;
use App\Rate;
use App\Repositories\RateRepositoryContract;
use App\Services\Contracts\ImportServiceContract;
use Illuminate\Support\Carbon;

class ImportService implements ImportServiceContract
{
    public function importToDatabase(RateRepositoryContract $repo, \Carbon\Carbon $importedAt = null): void
    {
        Rate::unguard();

        try {
            $importedAt = $importedAt ?: Carbon::now();

            /** @var RateEntityContract $rateEntity */
            foreach ($repo as $rateEntity) {
                $rateModel = new Rate(
                    [
                        'currency' => $rateEntity->getCurrency(),
                        '_15m' => $rateEntity->get15m(),
                        'last' => $rateEntity->getLast(),
                        'buy' => $rateEntity->getBuy(),
                        'sell' => $rateEntity->getSell(),
                        'symbol' => $rateEntity->getSymbol(),
                        'imported_at' => $importedAt,
                    ]
                );

                $rateModel->save();
            }
        } finally {
            Rate::reguard();
        }
    }
}
