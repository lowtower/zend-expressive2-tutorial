# Preface

This tutorial is based on [Ralf Eggert's tutorial zend-expressive](https://github.com/RalfEggert/zend-expressive-tutorial).
Most of the hard work has been done by `Ralf Eggert`.
This tutorial tries to adjust and extend his tutorial to work with
`zend-expressive v2`, which is also used in the current `zend-expressive-skeleton`.

# Part 1: Setup the application

This tutorial provides an introduction to Expressive, and building
[PSR-7](http://www.php-fig.org/psr/psr-7/) middleware applications. You will
build a simple database driven application step-by-step, which you can then use
as a starting point for your own applications.

## Create a new project with the installer

To begin, we will create a new project by using
[Composer](https://getcomposer.org).

> ### Get Composer
>
> If you haven't already, install Composer, per the instructions
> [on their website](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx).

Please run the following command:

```bash
$ composer create-project zendframework/zend-expressive-skeleton zend-expressive2-tutorial
```

The installer will prompt you with several questions, asking you
to choose packages to install. These include the following:

- `What type of installation would you like?`
for the tutorial, please choose `3` (modular) for a full modular skeleton.
- `Which container do you want to use for dependency injection?`
please choose `3` (the default selection), for zend-servicemanager.
- `Which router do you want to use?`
please choose `2` (the default selection), for FastRoute.
- `Which template engine do you want to use?`
please choose `3`, for Zend View.
- `Which error handler do you want to use during development?`
Please choose `1` (the default selection), for Whoops.

The output on your screen should look like this:

![Zend\Expressive installer](images/installer.png)

Once complete, enter the project directory:

```bash
$ cd zend-expressive2-tutorial
```


You can now startup PHP's [built-in web server](http://php.net/manual/en/features.commandline.webserver.php);
the Expressive skeleton provides a short-cut for it via Composer:

```bash
$ composer serve
```

> Server timeout
>
> By default composer will terminate with a `ProcessTimedOutException` after
> 300 seconds (5 minutes). If you want it to run longer, you can alter the timeout
> via the `COMPOSER_PROCESS_TIMEOUT` environment variable:
>
> ```bash
> $ export COMPOSER_PROCESS_TIMEOUT=86400
> $ composer serve
> $ # or
> $ COMPOSER_PROCESS_TIMEOUT=86400 composer serve
> ```

This starts up a web server on localhost port 8080; browse to
[http://localhost:8080/](http://localhost:8080/) to see if your
application responds correctly!

![Screenshot after installation](images/screen-after-installation.png)

## The component installer and the config aggregator

To ease the installation of other Zend Framework components, the `Zend\ComponentInstaller`
and the `Zend\ConfigAggregator are already part of the zend-expressive-skeleton.

The `Zend\ComponentInstaller` is a plugin for the Composer which helps you
to activate the configuration provided by `ConfigProvider` classes in Zend
Framework components. When you require new components it activates them
for you. Read more at the official
[`Zend\ComponentInstaller` documentation](https://docs.zendframework.com/zend-component-installer/).

The `Zend\ConfigAggregator` is a lightweight library for
collecting and merging configuration from different sources. It is designed
for `Zend\Expressive` applications, but it can work with any PHP project.
It is the successor of mtymek's `Zend\Expressive\ConfigManager`.

If you browse to [http://localhost:8080/](http://localhost:8080/) again
your application should still work.

## Compare with example repository branch `part1`

You can easily compare your code with the example repository when looking
at the branch `part1`. If you want you can even clone it and have a deeper
look.

```bash
$ git clone https://github.com/lowtower/zend-expressive2-tutorial.git
$ cd zend-expressive2-tutorial
$ git checkout -b part1 origin/part1
```

Or view it online:

- [https://github.com/lowtower/zend-expressive2-tutorial/tree/part1](https://github.com/lowtower/zend-expressive2-tutorial/tree/part1_skeleton)

**Attention:** Just a last note regarding the `composer.json` file in your project. The
versions in your `require` section could differ from the versions in the
`require` section of the repository. Versions get updated frequently and
this tutorial and the corresponding code will not be updated for every
version of every component. The updates will be done if there are bigger
changes like new major versions for any component.
