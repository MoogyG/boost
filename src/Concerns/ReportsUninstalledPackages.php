<?php

declare(strict_types=1);

namespace Laravel\Boost\Concerns;

use Illuminate\Support\Str;
use Laravel\Boost\Support\UninstalledPackages;

trait ReportsUninstalledPackages
{
    protected function reportUninstalledPackages(): void
    {
        $packages = app(UninstalledPackages::class)->all();

        if ($packages === []) {
            return;
        }

        $this->newLine();
        $this->warn(sprintf(
            'Kept existing skills unchanged because %d locked %s %s not installed: %s. Install your dependencies and run boost:update again.',
            count($packages),
            Str::plural('package', $packages),
            count($packages) === 1 ? 'is' : 'are',
            implode(', ', $packages),
        ));
    }
}
