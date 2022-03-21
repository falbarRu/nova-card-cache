# nova-card-cache, [Packagist](https://packagist.org/packages/falbar/nova-card-cache), [Nova packages](https://novapackages.com/packages/falbar/nova-card-cache)

## Install

Install it using composer : 

```bash
composer require falbar/nova-card-cache
```

## Usage

Add the card tools to your `NovaServiceProvider`:

```php
use Falbar\NovaCardCache\NovaCardCache;

protected function cards()
{
    return [
        NovaCardCache::make(),
        ...
    ];
}
```
