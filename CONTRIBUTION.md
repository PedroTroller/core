Contribution Guide
==================

This document describes some points about contribution process for Gaufrette packages.

The project is maintained by KNPLabs company and an hord of [contributors](https://github.com/Gaufrette/core/graphs/contributors).

Pull-requests
-------------

If you wants to fix or enhance somthing, you can create a pull request.

If your create a pull request to fix an issue, prefix your pull request title with `[FIX]`.
If your create a pull request to add a feature, prefix your pull request title with `[FEATURE]`.
If your create a pull request to refactore a part of the code, prefix your pull request title with `[REFACTORING]`.

Coding standard
---------------

Please, run php-cs-fixer before to submit a pull request.

`./bin/php-cs-fixer fix`

Tests
-----

Please, before to submit a pull request, run tests. Add new one if needed and fix failures.

Phpspec : `./bin/phpspec`
If you works on an adapter : `./bin/test-suite run MyNamespace/AdapterFactory`
