# Enforce table immutability using Laravel Eloquent

[![Latest Version on Packagist](https://img.shields.io/packagist/v/m1guelpf/eloquent-immutable.svg?style=flat-square)](https://packagist.org/packages/m1guelpf/eloquent-immutable)
[![Total Downloads](https://img.shields.io/packagist/dt/m1guelpf/eloquent-immutable.svg?style=flat-square)](https://packagist.org/packages/m1guelpf/eloquent-immutable)

## Installation

You can install the package via composer:

```bash
composer require m1guelpf/eloquent-immutable
```

## Usage

To make a model immutable, you'll first need to add the immutable trait to it:
```php
use Illuminate\Database\Eloquent\Model;
use M1guelpf\EloquentImmutable\Immutable;

class YourModel extends Model {
    use Immutable;

    //
}
```

You can optionally enable an extra layer of security by storing a hash of the model's properties in your database. To do this, add a field to your migration, then toggle the fature in the model:
```php
// database/migrations/2014_10_12_000000_create_your_table.php
Schema::create('your_table', function (Blueprint $table) {
    $table->string('hash');

    //
});

// app/YourModel.php
class YourModel extends Model {
    $immutableCheck = true;

    //
}
```

We'll automatically check the hash matches when the model is retrieved.

## Limitations

Due to Laravel limitations, we cannot hook into mass updates or mass deletes.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email soy@miguelpiedrafita.com instead of using the issue tracker.

## Credits

- [Miguel Piedrafita](https://github.com/m1guelpf)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
