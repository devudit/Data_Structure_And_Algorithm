<?php

class Solution
{
    private $hashset = [];

    public function checkDuplicateOne(array $nums): bool
    {
        foreach ($nums as $val) {
            if (isset($this->hashset[$val])) {
                return TRUE;
            } else {
                $this->hashset[$val] = TRUE;
            }
        }
        return FALSE;
    }


    public static function checkDuplicateTwo(array $nums): bool
    {
        return count($nums) !== count(array_unique($nums));
    }
}


# echo Solution::checkDuplicateTwo([1, 2, 3, 1]) ? "true" : "false";

$sol = new Solution();
echo $sol->checkDuplicateOne([1, 2, 3, 1]) ? "true" : "false";

