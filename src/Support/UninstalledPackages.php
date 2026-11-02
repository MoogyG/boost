<?php

declare(strict_types=1);

namespace Laravel\Boost\Support;

class UninstalledPackages
{
    /** @var array<int, string> */
    protected array $packages = [];

    public function record(string $package): void
    {
        if (! in_array($package, $this->packages, true)) {
            $this->packages[] = $package;
        }
    }

    public function isEmpty(): bool
    {
        return $this->packages === [];
    }

    /**
     * @return array<int, string>
     */
    public function all(): array
    {
        return $this->packages;
    }

    public function flush(): void
    {
        $this->packages = [];
    }
}
