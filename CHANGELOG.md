# CHANGELOG

## v0.3.0 (2026-01-03)

- Matches more comment types and does so more accurately (only targeting `@var`, `@param`, and `@return` types)

## v0.2.1 (2026-01-03)

- Remove `double` and `real` types from erroring, focus the library on `integer` and `boolean` corrections. Double and real are valid words in comments

## v0.2.0 (2026-01-03)

- Swap `type` from `library` to `phpcodesniffer-standard` so it can be auto installed via `PHPCSStandards/composer-installer`

## v0.1.1 (2026-01-03)

- Corrects minimum pin of `php_codesniffer`

## v0.1.0 (2026-01-03)

- Initial release
  - Throws errors when using `boolean` or `integer` in any comments, enforces the use of shorter names `bool` and `int` to match actual types
  - Provides autofix capabilities
