<?php


namespace App\Utils;


class Utils
{
    public static function removeNullOrEmptyElementInArray(array $array) {
        return array_filter($array, fn($value) => !is_null($value) && $value !== '');
    }
}
