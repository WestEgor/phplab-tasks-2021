<?php

namespace src\strings;

use strings\StringsInterface;

/**
 * Class Strings
 * @package src\strings
 */
class Strings implements StringsInterface
{

    /**
     * Implementing StringsInterface
     *
     * @param string $input
     * @return string
     */
    public function snakeCaseToCamelCase(string $input): string
    {
        $expStr = preg_split('/[_]/', $input);
        $newStr = $expStr[0];
        for ($i = 1; $i < count($expStr); ++$i) {
            $newStr .= ucwords($expStr[$i]);
        }
        return $newStr;
    }

    /**
     * Implementing StringsInterface
     *
     * @param string $input
     * @return string
     */
    public function mirrorMultibyteString(string $input): string
    {
        //split string by space
        $splittedString = mb_split('\\s+', $input);
        $reverserString = '';
        foreach ($splittedString as $value) {
            //reverse each single string
            $reverserString .= $this->strReverseCyrillic($value) . ' ';
        }
        return trim($reverserString);
    }

    /**
     * Reverse word with utf-8 encoding
     *
     * @param string $inputString
     * @return string
     */
    public function strReverseCyrillic(string $inputString): string
    {
        $reverseString = '';
        for ($i = mb_strlen($inputString) - 1; $i >= 0; $i--) {
            $reverseString .= mb_substr($inputString, $i, 1);
        }
        return $reverseString;
    }

    /**
     * Implementing StringsInterface
     *
     * @param string $noun
     * @return string
     */
    public function getBrandName(string $noun): string
    {
        // get length of word
        $nounLength = strlen($noun);
        // if 1 letter and last letter not same
        if ($noun[0] !== $noun[$nounLength - 1]) {
            return 'The ' . ucwords($noun);
        }
        //capitalize first letter concatenate with word without 1st letter
        return ucwords($noun) . substr($noun, 1, $nounLength);
    }
}
