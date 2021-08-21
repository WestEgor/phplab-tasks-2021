<?php

namespace basics;

use InvalidArgumentException;

/**
 * Class BasicsValidator
 * @package basics
 */
class BasicsValidator implements BasicsValidatorInterface
{

    /**
     * Implementing BasicsValidatorInterface
     *
     * @param int $minute
     */
    public function isMinutesException(int $minute): void
    {
        if ($minute < 0 || $minute > 59) {
            throw new InvalidArgumentException('Minute cannot be negative or greater then 60!');
        }
    }

    /**
     * Implementing BasicsValidatorInterface
     *
     * @param int $year
     */
    public function isYearException(int $year): void
    {
        if ($year < 1900) {
            throw new InvalidArgumentException('Year cannot be less then 1900!');
        }
    }

    /**
     * Implementing BasicsValidatorInterface
     *
     * @param string $input
     */
    public function isValidStringException(string $input): void
    {
        if (strlen($input) !== 6) {
           throw new InvalidArgumentException('Input size cannot be greater then 6!');
        }
    }
}
