# push-send-register [probably outdated]

Two small PHP scripts to register tokens into a database and to send push notifications to devices using Ionic Push Rest API and Webhooks (only for Android for now)

### Installation

Change the `config.php.dist` in `config.php` file to use your own settings.

Modify it to use your own database:

```
$db = new PDO("mysql:dbname=YOUR DATABASE NAME;host=YOUR HOSTNAME", "YOUR USERNAME", "YOUR PASSWORD");
```

and Ionic App:

```
$app_id = "YOUR_APP_ID";
$ionic_private_key = "YOUR_PRIVATE_KEY";
```

### Usage

##### Registering Tokens

To register tokens add Ionic's Webhook to your app:

```
ionic push webhook_url http://yourdomain.com/register.php
```

##### Sending Push Notifications

You can use it in your browser by simply going to `/send.php` and filling the form.
You can also use it via the URL thanks to a GET request:

```
http://yourdomain.com/send.php?message=HelloWorld!
```

That way you can use it in your code!
