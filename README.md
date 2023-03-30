# Norway vat format validator

![Code Coverage Badge](./badge.svg)

This component provides Norway vat number format validator.

Implementation of interface **rocketfellows\CountryVatFormatValidatorInterface\CountryVatFormatValidatorInterface**

Depends on https://github.com/rocketfellows/country-vat-format-validator-interface

## Vat number validation description

The technical construction of the number specifies a modulus 11 check digit at the end.
The weighting factors are 3, 2, 7, 6, 5, 4, 3, 2 calculated from the first digit.
The digits are thus multiplied by the weighting factors and the product sum divided by 11. The leftover
from the division is subtracted by 11 and the result becomes the MOD11 checksum digit.

## Installation

```shell
composer require rocketfellows/no-vat-format-validator
```

## Usage example

Valid Norway vat number (valid expected format and checksum digit):

```php
$validator = new NOVatFormatValidator();
$validator->isValid('NO234154877MVA');
$validator->isValid('NO234154877');
$validator->isValid('234154877MVA');
$validator->isValid('234154877');
```

Returns:

```shell
true
true
true
true
```

Invalid Norway vat number (invalid format or checksum digit):

```php
$validator = new NOVatFormatValidator();
$validator->isValid('DE234154877MVA'); // invalid format
$validator->isValid('DE234154877'); // invalid format
$validator->isValid('NO234154879MVA'); // invalid checksum digit
$validator->isValid('NO234154879'); // invalid checksum digit
$validator->isValid('234154879'); // invalid checksum digit
$validator->isValid('');
```

```shell
false
false
false
false
false
false
```

## Contributing

Welcome to pull requests. If there is a major changes, first please open an issue for discussion.

Please make sure to update tests as appropriate.
