<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Bridge App</h1>
    <br>
</p>

Based on «Yii 2 Basic Project Template» and is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects with admin panel.

## Installation:

Create project via composer by running following command:

```bash
$ composer create-project naffiq/yii2-app-bridge MY_APP_NAME
```

Create `config/local.php` (you may copy `config/mode_stage.php` for example) and configure your local environment DB.

Then run migrations with single command:

```bash
$ ./vendor/bin/bridge-install
```

## Testing:

The app is ready to test and has example test for `2amigos/yii2-usuario` user model with fixture included.
Run tests with:

```bash
$ ./vendor/bin/codecept
```
