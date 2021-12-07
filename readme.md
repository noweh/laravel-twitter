# Twitter API V2 for Laravel


[![Badge Twitter](https://img.shields.io/endpoint?url=https%3A%2F%2Ftwbadges.glitch.me%2Fbadges%2Fv2)](https://developer.twitter.com/en/docs/twitter-api)
![Laravel](https://img.shields.io/badge/Laravel-v6/7/8-828cb7.svg?style=flat-square&logo=Laravel&color=FF2D20)
![PHP](https://img.shields.io/badge/PHP-v7.4-828cb7.svg?style=flat-square)
[![Run Tests](https://github.com/noweh/twitter-api-v2-php/actions/workflows/run-tests.yml/badge.svg)](https://github.com/noweh/twitter-api-v2-php/actions/workflows/run-tests.yml)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](licence.md)

A Laravel Wrapper for the Twitter REST API V2 endpoints.

This package is an extension of [noweh/twitter-api-v2-php](https://github.com/noweh/twitter-api-v2-php), for a simplified integration in Laravel with the Facades.

## Installation
First you need to add the component to your composer.json
```
composer require noweh/laravel-twitter
```
Update your packages with *composer update* or install with *composer install*.

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

### Laravel without auto-discovery

    Noweh\Twitter\TwitterServiceProvider::class,

To use the facade, add this in app.php:

    'Twitter' => Noweh\Twitter\TwitterFacade::class,

### Service Provider
After updating composer, add the ServiceProvider to the providers array in config/app.php

## Configuration file

Next, you must migrate config :

    php artisan vendor:publish --provider="Noweh\Twitter\TwitterServiceProvider"

And add your settings in the new file created in `config/twitter.php`.

### To search specific tweets

Example:

    use Twitter;

    $return = Twitter::tweetSearch()
        ->showMetrics()
        ->addFilterOnLocales(['fr', 'en'])
        ->addFilterOnKeywordOrPhrase(['avengers', 'assemble'], \Noweh\TwitterApi\Client::OPERATORS['AND'])
        ->showUserDetails()
        ->performRequest()
    ;

### To find Twitter Users
`findByIdOrUsername()` expects either an array, or a string.

You can specify the search mode as a second parameter (`\Noweh\TwitterApi\Client::MODES['USERNAME']` OR `\Noweh\TwitterApi\Client::MODES['ID']`)

Example:

    use Twitter;
    
    $return = Twitter::userSearch()
        ->findByIdOrUsername('twitterdev', \Noweh\TwitterApi\Client::MODES['USERNAME'])
        ->performRequest()
    ;

### To Post a new Tweet

Example:

    use Twitter;

    $return = Twitter::tweet()->performRequest('POST', ['text' => 'This is a test....']);

### To Retweet

Example:

    $return = Twitter::retweet()->performRequest('POST', ['tweet_id' => $tweet->id]);