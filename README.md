<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Bridge App</h1>
    <br>
</p>

Based on «Yii 2 Basic Project Template» and is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects with admin panel.

## Installation

Create project via composer by running following command:

```bash
$ composer create-project yii2-bridge/app MY_APP_NAME
```

Create `config/local.php` (you may copy `config/example.local.php` for example) and configure your local environment DB.

```bash
$ cp config/example.local.php config/local.php
```

> Note: `local.php` is registered in `.gitignore` to prevent config collisions between developers 

Then run migrations with single command:

```bash
$ ./vendor/bin/bridge-install
```

## Usage

With fresh installation you will have [http://localhost:8008/admin/](http://localhost:8008/admin/) (assuming you run `php yii serve`) 
which is yii2-bridge. Add your sub-modules for creating admin sections. More docs at [Yii2 Bridge Wiki](https://github.com/yii2-bridge/app/wiki) (in progress)

## Users

Yii2 Bridge utilizes [yii2-usuario](https://github.com/2amigos/yii2-usuario) under the hood, which takes user management to new level. Create your first user with CLI command:

```bash
$ php yii user/create <email> <username> <password> <role> // role should be admin for your first user
```

Read [Usuario docs](http://yii2-usuario.readthedocs.io/en/latest/) for further details.

## Environment

You can pre-configure application for different environments and switch them easily. Change your config for different modes in these files:

- `config/local.php` — Local development. This file overwrites all configuration defined in your `main.php` or `mode_*.php` files;
- `config/mode_stage.php` — Staging (development) server;
- `config/mode_prod.php` — Production server;
- `config/mode_test.php` — Configuration for tests (used by codeception);

Then switch easily between them by creating `mode.php` file with mode name:

> Example of `config/mode.php`:
```php
prod
```

> Note: `mode.php` is registered in `.gitignore` to prevent config collisions between environments. You have to create it manually or with [deployer](https://deployer.org) job once in every project environment.

Refer to [janisto/yii2-environment](https://github.com/janisto/yii2-environment) for further details.

## Testing

The app is ready to test and has example test for `2amigos/yii2-usuario` user model with fixture included.
Run tests with:

```bash
$ ./vendor/bin/codecept
```
