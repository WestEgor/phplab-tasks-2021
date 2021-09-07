<?php

namespace arrays;

class Arrays implements ArraysInterface
{

    public function repeatArrayValues(array $input): array
    {
        $repeatedArray = [];
        for ($i = 0; $i < count($input); $i++) {
            // fill array of duplicated values, from start index 0 to value
            $duplicatedArray = array_fill(0, $input[$i], $input[$i]);
            for ($j = 0; $j < count($duplicatedArray); $j++) {
                //rewriting values
                $repeatedArray[] = $duplicatedArray[$j];
            }
        }
        return $repeatedArray;
    }

    public function getUniqueValue(array $input): int
    {
        $newArr = array_count_values($input);
        $newArr = $this->removeDuplicates($newArr);
        return empty($newArr) ? 0 : min($newArr);
    }

    private function removeDuplicates(array $input): array
    {
        $newArr = [];
        foreach ($input as $key => $value) {
            if ($value === 1) {
                $newArr[] = $key;
            }
        }
        return $newArr;
    }


    public function groupByTag(array $input): array
    {
        $tagArray = [];
        foreach ($input as $array) {
            foreach ($array['tags'] as $tag) {
                $tagArray[$tag][] = $array['name'];
            }
        }
        return $tagArray;
    }
}