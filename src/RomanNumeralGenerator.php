<?php

namespace Larowlan\RomanNumeral;

/**
 * Defines a class for generating roman numerals from integers.
 */
class RomanNumeralGenerator {

    private $main_romans = array(
        1000=> 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90  => 'XC',
        50  => 'L',
        40  => 'XL',
        10  => 'X',
        9   => 'IX',
        5   => 'V',
        4   => 'IV',
        1   => 'I',
    );

    /**
     * Generates a roman numeral from an integer.
     *
     * @param int $number
     *   Integer to convert.
     * @param bool $lowerCase
     *   (optional) Pass TRUE to convert to lowercase. Defaults to FALSE.
     *
     * @return string
     *   Roman numeral representing the passed integer.
     */
    public function generate(int $number, bool $lowerCase = FALSE) : string {
        // there is no 0 in roman numbers
        // also 3999 is the maximum number we can represent
        if ($number < 1 || $number > 3999)
            return "Not allowed number: ".$number;

        $ret = "";

        foreach($this->main_romans as $arabic_value => $roman_value) {
            while ($number >= $arabic_value) {
                $ret .= $roman_value;
                $number -= $arabic_value;
            }
        }

        if ($lowerCase)
            $ret = strtolower($ret);

        return $ret;
    }

}
