# Getting Started

## Description
The ACL Package for Laravel provides an easy way to manage roles and permissions.

## Installation

You can install the package via Composer:

```bash
composer require codersgarden/roleassign:dev-main
```

After installation, add the service provider to your `boostrap/provider.php` file (if you are not using auto-discovery):


```php
'providers' => [
    // Other service providers...
    Codersgarden\RoleAssign\RoleServiceProvider::class,
];
```

## Requirements

- **PHP**: >=7.3
- **Laravel**: 8.x, 9.x, 10.x, 11.x
- **Dependencies**:
  - guzzlehttp/guzzle: ^7.0
  - "illuminate/http": "^7.0|^8.0|^9.0|^10.0|^11.0"

### Development Dependencies

- mockery/mockery: ^1.0
- orchestra/testbench: ^6.0
- phpunit/phpunit: ^9.0

---

## Configuration

To customize configuration values, publish the package's configuration file using the following command:

```bash
php artisan vendor:publish --provider="Codersgarden\RoleAssign\RoleServiceProvider" --tag="config"
```

This will create a `config/custom.php` file in your Laravel application where you can set your configuration options:

### `config/custom.php`

```php
return [
    'acl_users' => env('ACL_USERS', ''),
];
```

### Setting Environment Variables

You should add the following environment variables to your `.env` file to configure your LexOffice API settings:

```env
ACL_USERS=['admin@yopmail.com','manager@yopmail.com']

```



### Use Route 


This route is used for the ACL dashboard.


```env
route('roles.index')

```



