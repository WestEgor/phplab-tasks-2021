<?php

namespace basics;

/**
 * Class Basics
 * @package basics
 */
class Basics implements BasicsInterface
{

    /**
     * @var BasicsValidator $validator
     */
    private $validator;

    /**
     * Basics constructor.
     * @param BasicsValidator $validator
     */
    public function __construct(BasicsValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Implementing BasicsInterface
     *
     * @param int $minute
     * @return string
     */
    public function getMinuteQuarter(int $minute): string
    {
        $this->validator->isMinutesException($minute);

        if ($minute === 0) {
            return 'fourth';
        }

        $quarterArray = [
            0 => 'first',
            1 => 'second',
            2 => 'third',
            3 => 'fourth'
        ];

        // 15 - quarter delimiter
        // 1 - quarter rounding
        $quarter = ceil($minute / 15) - 1;

        return $quarterArray[$quarter];
    }

    /**
     * Implementing BasicsInterface
     *
     * @param int $year
     * @return bool
     */
    public function isLeapYear(int $year): bool
    {
        $this->validator->isYearException($year);

        /*
         * if (year is not divisible by 4) then (it is a common year)
         * else if (year is not divisible by 100) then (it is a leap year)
         * else if (year is not divisible by 400) then (it is a common year)
         * else (it is a leap year)
        */
        if ($year % 4 !== 0) {
            return false;
        } elseif ($year % 100 !== 0) {
            return true;
        } elseif ($year % 400 !== 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Implementing BasicsInterface
     *
     * @param string $input
     * @return bool
     */
    public function isSumEqual(string $input): bool
    {
        $this->validator->isValidStringException($input);

        $inputStringSize = strlen($input);
        $half = $inputStringSize / 2;
        $leftSideCounter = 0;
        $rightSideCounter = 0;
        for ($i = 0; $i < $half; $i++) {
            $leftSideCounter += (int)$input[$i];
            // -1 due of array indices
            $rightSideCounter += (int)$input[$inputStringSize - $i - 1];
        }
        return $leftSideCounter === $rightSideCounter;
    }
}
