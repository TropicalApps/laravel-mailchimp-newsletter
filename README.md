# tropicalapps/laravel-mailchimp-newsletter

Simple laravel 5.* mailchimp newsletter subscription box.

This package is based in the "https://github.com/skovmand/mailchimp-laravel#mand/mailchimp-laravel" package.

## Install

```json
"require": {
    "tropicalapps/laravel-mailchimp-newsletter": "0.1.*",
}
```

## Provider

Go to ```config/app.php``` and edit the ```providers``` array

```php
'providers' => [
	TropicalApps\Mailchimp\MailchimpServiceProvider::class,
]
```

## Publish files

```
php artisan vendor:publish --provider="TropicalApps\Mailchimp\MailchimpServiceProvider" --tag=all
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

