<?php

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

class ShortScalarTypesSniffTest extends AbstractSniffUnitTest
{
    protected function getErrorList()
    {
        return [
            3 => 1, // Line 3: long type in comment
            7 => 1, // Line 7: long type in comment
        ];
    }

    protected function getWarningList()
    {
        return [];
    }
}
