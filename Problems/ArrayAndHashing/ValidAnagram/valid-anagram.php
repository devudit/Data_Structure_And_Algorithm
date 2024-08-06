<?php

class Solution
{
    public static function anagramOne(string $s, string $t): bool
    {
        if (strlen($s) !== strlen($t)) {
            return FALSE;
        }

        $countS = $countT = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $countS[$s[$i]] = ($countS[$s[$i]] ?? 0) + 1;
            $countT[$t[$i]] = ($countT[$t[$i]] ?? 0) + 1;
        }

        return $countS == $countT;
    }

    public static function anagramTwo(string $s, string $t): bool
    {
        if (strlen($s) !== strlen($t)) {
            return FALSE;
        }

        return array_count_values(str_split($s)) == array_count_values(str_split($t));
    }
}

# echo Solution::anagramOne("racecar","carrace") ? "true" : "false";

echo Solution::anagramTwo("racecar","carrace") ? "true" : "false";