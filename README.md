# jeffer8a/laravel-mailchimp-newsletter
A minimal service provider to set up and use the Mailchimp APi v2 PHP library in Laravel v5.*

For Laravel v4 check https://packagist.org/packages/hugofirth/mailchimp


## How it works
This package contains a service provider, which binds an instance of an initialized Mailchimp client to the IoC-container.

You recieve the Mailchimp client through depencency injection already set up with your own API key.

## Install

```json
"require": {
    "jeffer8a/laravel-mailchimp-newsletter": "0.1.*",
}
```

## Provider

Go to ```config/app.php``` and edit the ```providers``` array

```php
'providers' => [
	Jeff\Mailchimp\MailchimpServiceProvider::class,
]
```

## Publish files

```
php artisan vendor:publish --provider="Jeff\Mailchimp\MailchimpServiceProvider" --tag=all
```

config     ```config/mailchimp.php```
views      ```resources/views/newsletter```
request    ```Http/Requests/NewsletterRequest.php```
controller ```Http/Controllers/NewsletterController.php```

## Config

```php
MAILCHIMP_API_KEY=
MAILCHIMP_LIST_ID=
```

## Routing

Add the follow to your routes file

```
Route::post('subscribe', [
    'as'    => 'subscribe',
    'uses'  => 'NewsletterController@subscribe'
]);
```

