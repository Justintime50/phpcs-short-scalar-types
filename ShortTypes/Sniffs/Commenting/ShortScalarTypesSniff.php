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
    ];

    public function register()
    {
        return [
            T_COMMENT,
            T_DOC_COMMENT,
            T_DOC_COMMENT_OPEN_TAG,
            T_DOC_COMMENT_TAG,
            T_DOC_COMMENT_STRING,
        ];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $content = $tokens[$stackPtr]['content'];

        // Check for scalar types in both comments and doc comments (docstrings)
        foreach (self::LONG_TO_SHORT as $long => $short) {
            // Match in @param, @return, @var, etc. in doc comments
            if (preg_match('/@(param|return|var)\s+' . $long . '\b/i', $content) || preg_match('/\b' . $long . '\b/i', $content)) {
                $fix = $phpcsFile->addFixableError(
                    "Use short scalar type '$short' instead of '$long' in comments.",
                    $stackPtr,
                    'LongScalarType'
                );
                if ($fix) {
                    // Replace only the type in doc comments, not variable names or other text
                    $newContent = preg_replace('/@(param|return|var)\s+' . $long . '\b/i', '@$1 ' . $short, $content);
                    $newContent = preg_replace('/\b' . $long . '\b/i', $short, $newContent);
                    $phpcsFile->fixer->replaceToken($stackPtr, $newContent);
                }
            }
        }
    }
}
