<?php

print('Example 1: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]'. PHP_EOL);
print('Result: '. sumEvenValues([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]). PHP_EOL );
print('---'. PHP_EOL);

print('Example 2: [2, 4, 6, 8, 10]'. PHP_EOL);
print('Result: '. sumEvenValues([2, 4, 6, 8, 10]). PHP_EOL );
print('---'. PHP_EOL);

print('Example 2: [2, 4, 6, 8, randomWord]'. PHP_EOL);
print('Result: '. sumEvenValues([2, 4, 6, 8, 'randomWord']). PHP_EOL );
print('---'. PHP_EOL);


function sumEvenValues(array $integers): int {
    $sum = 0;
    foreach ($integers as $int) {
        if (is_numeric($int) && $int % 2 == 0) {
            $sum += $int;
        }
        
        if (!is_numeric($int))
        {
            print('Invalid input: '. $int. PHP_EOL);
        }
    }

    return $sum;
}