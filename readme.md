## How to install

1) Open command line. Go the project directory and run composer install  
2) Check env file for Database configurations and make sure that you are using the same DB name as it is 
provided in the env file. After that run php artisan migrate --seed.

3) Optional. You can run unit test for making sure that everything working precisely. For unit testing run the following command in the project path ./vendor/bin/phpunit.

## Usage

'Translate tool' provides you to be able to translate word from one language to another. You are able to select the languages. To use the API you have to send GET request to the following URL: 

?source_language={selected_language}&target_language={selected_language}&word={word}

and you will get the following response:

{

 "data": {

  "word": $word,

  "source": $sourceLang,

  "target": $targetLang,

  "result": $translation

 },
 "errors": {

 }

}

where 

$word - is the word which you want to translate

$sourceLang - is the language from which you want to translate

$targetLang - is the language to which you want to translate
  
$translation - is the result of translated $word based on $sourceLang and $targetLang 

errors - in case of you have failed to do the validation you will get the error message. 

## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
