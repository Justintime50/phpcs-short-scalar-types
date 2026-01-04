<?php

namespace ShortTypes\Sniffs\Commenting;

// PHPCS runtime will provide these classes, ignore static analysis errors for undefined types.
use PHP_CodeSniffer\Files\File; // @phpstan-ignore-line
use PHP_CodeSniffer\Sniffs\Sniff; // @phpstan-ignore-line

class ShortScalarTypesSniff implements Sniff
{
    private const LONG_TO_SHORT = [
        'boolean' => 'bool',
        'integer' => 'int',
        'double'  => 'float',
        'real'    => 'float',
    ];

    public function register()
    {
        return [T_COMMENT, T_DOC_COMMENT];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $content = $tokens[$stackPtr]['content'];
        foreach (self::LONG_TO_SHORT as $long => $short) {
            if (preg_match('/\\b' . $long . '\\b/i', $content)) {
                $fix = $phpcsFile->addFixableError(
                    "Use short scalar type '$short' instead of '$long' in comments.",
                    $stackPtr,
                    'LongScalarType'
                );
                if ($fix) {
                    $newContent = preg_replace('/\\b' . $long . '\\b/i', $short, $content);
                    $phpcsFile->fixer->replaceToken($stackPtr, $newContent);
                }
            }
        }
    }
}
