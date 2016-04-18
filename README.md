Sabnzbd API  
===========

[![Build Status](https://travis-ci.org/benrowe/sabnzbd-api.svg?branch=master)](https://travis-ci.org/benrowe/sabnzbd-api)

A PHP wrapper for the sabnzbd api.

## Features

- coming soon

## Requirements

* PHP >= 5.4
* [Guzzle](https://github.com/guzzle/guzzle) library,
* (optional) [PHPUnit](https://phpunit.de) to run tests.


## Installation

Simply use composer to install the dependancy into your application.

    $ composer require benrowe/sabnzbd-api

## Basic Usage

    use Benrowe\Sabnzbd\Client;

    $client = new Client('127.0.0.1', 'Your API Key');
    $current = $client->current();
    var_dump($current);

## Contributing

Feel free to make any comments, file issues or make pull requests.

## License

`sabnzbd-api` is licensed under the MIT License - see the LICENSE file for details
