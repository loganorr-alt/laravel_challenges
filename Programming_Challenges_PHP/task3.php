<?php

print(findSecondHighestInteger([10, 20, 30, -40, 50, 1, 2, 3]). PHP_EOL);
print(findSecondHighestInteger([10, 20, 30, -40, 50, 1, 2, 322]). PHP_EOL);
print(findSecondHighestInteger([10]). PHP_EOL);
print(findSecondHighestInteger([]). PHP_EOL);
print(findSecondHighestInteger(['not an integer', 'neither', 0, 3]). PHP_EOL);
print(findSecondHighestInteger(['201', '15','69','122','50','200']). PHP_EOL);
print(findSecondHighestInteger(['2101','205', '15','69','122','50','200']). PHP_EOL);

function findSecondHighestInteger(array $integers): int {
    if (count($integers) < 2) {
        return 0;
    }

    // initialize the first and second max to the smallest possible integer
    // it's tempting to set this to 0, but that would break if the highest integer is negative (or if the highest integer is < 0)
    $firstMax = PHP_INT_MIN;
    $secondMax = $firstMax;

    foreach ($integers as $int) {
        //filter out invalid inputs
        if (!is_numeric($int)) {
            continue;
        }

        if ($int > $firstMax) {
            $secondMax = $firstMax;
            $firstMax = $int;
        }
        else if ($int > $secondMax && $int != $firstMax) {
            $secondMax = $int;
        }
    }

    return $secondMax;
}