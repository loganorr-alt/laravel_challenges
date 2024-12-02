<?php

print('Is HelLo a palindrome? - '. (palindromeCheck('HelLo') ? 'Yes' : 'No'). PHP_EOL);

print('Is 123321 a palindrome? - '. (palindromeCheck('1234321') ? 'Yes' : 'No'). PHP_EOL);

print('Is \'\' (blank) a palindrome? - '. (palindromeCheck('') ? 'Yes' : 'No'). PHP_EOL);

print('Is \'a\' a palindrome? - '. (palindromeCheck('a') ? 'Yes' : 'No'). PHP_EOL);

print('Is \'Never odd or even\' a palindrome? - '. (palindromeIgnoreSpecialCharactersCheck('Never odd or even') ? 'Yes' : 'No'). PHP_EOL);

print('Is \'A man, a plan, a canal, Panama!\' a palindrome? - '. (palindromeIgnoreSpecialCharactersCheck('A man, a plan, a canal, Panama!') ? 'Yes' : 'No'). PHP_EOL);

print('Is \'THIS IS NOT A PALINDROME!!\' a palindrome? - '. (palindromeIgnoreSpecialCharactersCheck('THIS IS NOT A PALINDROME!!') ? 'Yes' : 'No'). PHP_EOL);

print('IS !@# a palindrome - '. (palindromeIgnoreSpecialCharactersCheck('!@#') ? 'Yes' : 'No'). PHP_EOL);

/**
 * Checks to see if a string is a palindrome
 * This is a naive approach. The most we do here is make everything lower case.
 * As a result, text that we traditionally consider to be palindomes, such as 'A man, a plan, a canal, Panama!' will return false
 * This will accept all characters - e.g white space and special characters, not just the alphabet and numbers
 */
function palindromeCheck(string $string): bool {
    // make our string lower case, so we can compare it easier
    $string = strtolower($string);
    $length = strlen($string);

    //a string with only one character or less is a palindrome
    if ($length == 0) {
        return false;
    }

    
    for ($i = 0 ; $i < $length / 2; $i++) {
        if ($string[$i] != $string[$length - $i - 1]) {
            return false;
        }
    }

    return true;
}

/**
 * Checks to see if a string is a palindrome
 * 
 * This will strip out special characters and white space first. e.g 'Never odd or even' will be treated as 'Neveroddoreven'
 * This approach is less naive than palindromeCheck but even so it's flawed.
 * 
 * I've taken uses a negative approach to check for special characters - only the english alphabet and numbers are kept.
 * As such there are some inherent flaws - other languages aren't supported, letters with accents.
 * This is a 'piece of string' problem, how far do you go to support all languages and special characters? 
 * Should ā be treated as a? ñ and n? (ñ is a separate letter in Spanish)
 * 
 */
function palindromeIgnoreSpecialCharactersCheck(string $string): bool {
    // make our string lower case, so we can compare it easier
    $string = preg_replace('/[^A-Za-z0-9]/', '', $string);

    // either the string was empty or it was only special characters
    if ($string === '') {
        return false;
    }

    return palindromeCheck($string);
}