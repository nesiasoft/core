# Core ☀️

|     | Status |
| --- | --- |
| Release | [![Latest Stable Version](https://poser.pugx.org/nesiasoft/core/v/stable)](https://packagist.org/packages/nesiasoft/core) [![Total Downloads](https://poser.pugx.org/nesiasoft/core/downloads)](https://packagist.org/packages/nesiasoft/core) [![License](https://poser.pugx.org/nesiasoft/core/license)](https://packagist.org/packages/nesiasoft/core) |
| Code Quality | [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nesiasoft/core/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nesiasoft/core/?branch=master) [![codecov](https://codecov.io/gh/nesiasoft/core/branch/master/graph/badge.svg)](https://codecov.io/gh/nesiasoft/core) [![Maintainability](https://api.codeclimate.com/v1/badges/2d79eb5daabbf3fcc4d1/maintainability)](https://codeclimate.com/github/nesiasoft/core/maintainability) |
| Development | [![Build Status](https://travis-ci.org/nesiasoft/core.svg?branch=master)](https://travis-ci.org/nesiasoft/core) [![CircleCI](https://circleci.com/gh/nesiasoft/core.svg?style=shield)](https://circleci.com/gh/nesiasoft/core) [![Test Coverage](https://api.codeclimate.com/v1/badges/2d79eb5daabbf3fcc4d1/test_coverage)](https://codeclimate.com/github/nesiasoft/core/test_coverage) |

---

## Description

Core of the Nesiasoft softwares.

This package will install these following entities:

### One-to-One polymorph entities

1. Description
1. Note

### One-to-Many polymorph entities

1. Acronym
1. Approval
1. Bookmark
1. Comment
1. Document
1. Email
1. Fax
1. Phone
1. URL

## Installation

This package can be installed via composer:

```bash
composer require nesiasoft/core
```

The package will automatically register a service provider.

You need to publish all config files and migrations, then migrate:

```bash
php artisan core:publish

php artisan migrate
```

## Usage

This package has no direct use but to become foundation for Nesiasoft softwares.

### Testing

```bash
composer test
```

## Roadmap

All planning goes to [Roadmap](ROADMAP.md) file.

## Contributing [![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/nesiasoft/core/issues)

1. Send PR
1. Please do not take it personal if your PR got rejected

## Changelog

Notable changes are documented in [Changelog](CHANGELOG.md) file.

## License

The MIT License (MIT). Please see [License](LICENSE.md) file for more information.
