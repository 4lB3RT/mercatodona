<?php declare(strict_types=1);

namespace Mercadona\Domain\Category;

abstract class IntegerId
{
    public function __construct(
        private readonly int $value
    ) {
    }

    public function value(): int
    {
        return $this->value;
    }
}
