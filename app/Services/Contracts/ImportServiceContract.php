<?php

namespace App\Services\Contracts;

use App\Repositories\RateRepositoryContract;
use Carbon\Carbon;
use Illuminate\Support\Collection;

interface ImportServiceContract
{
    public function importToDatabase(RateRepositoryContract $repo, Carbon $importedAt = null): void;
}
