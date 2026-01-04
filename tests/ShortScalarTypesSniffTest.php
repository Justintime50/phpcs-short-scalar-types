<?php

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

class ShortScalarTypesSniffTest extends AbstractSniffUnitTest
{
    protected function getErrorList()
    {
        // TODO: This test isn't actually run yet
        return [
            5 => 1, // Line 5: @param integer
            6 => 1, // Line 6: @param boolean
            7 => 1, // Line 7: @return boolean
            10 => 1, // Line 10: integer in comment
            11 => 1, // Line 11: boolean in comment
            13 => 1, // Line 13: @var integer
            14 => 1, // Line 14: @var boolean
        ];
    }

    protected function getWarningList()
    {
        return [];
    }
}
