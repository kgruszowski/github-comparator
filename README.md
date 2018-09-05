# github-comparator

[![Build Status](https://travis-ci.com/kgruszowski/github-comparator.svg?branch=master)](https://travis-ci.com/kgruszowski/github-comparator)

##### Simple Github projects comparision app

#### API documentation:
https://app.swaggerhub.com/apis/kgruszowski/github-comparator/1.0.0

#### Installation
* assuming you have installed **PHP > 7.0** and **composer** installed globally
* enter main directory and run **composer install**
* run **bin/console server:run**
* app will be accessible via 127.0.0.7:8000 

#### Solution description
The application is written with help of Symfony 3 Framework and [FOSRestBundle](https://github.com/FriendsOfSymfony/FOSRestBundle) due to REST support.
I've decided to use [php-github-api](https://github.com/KnpLabs/php-github-api) to access Github Api, but wrap it with my own abstraction, to adding new Version Control System API's in future.
As far as good practice concerned I use PHPUnit to write Unit Tests, PHP Messdetector to ensure code quality and Travis-CI to support Continuous Integration process.

At the beginning I've planned use User and Repository to compare two repositories. User to compare reliability of repo owner and Repository to compare basic stats like number of stars, watchers, last commit date etc.
Unfortunately due to time shortage, I've implemented only Repository metrics comparison. I've also planned to use Behat as a framework to write functional tests, but I've focused only on unit tests of key components.

#### Next steps
Next steps that could be considered to develop app
* dockerize application
* use cache (e.g. Redis) to lower network overhead
* add functional tests using e.g. Behat
