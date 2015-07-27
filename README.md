# push-send-register
Two small PHP scripts to register tokens into a database and to send push notifications to devices using Ionic Push Rest API and Webhooks

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

You can use it in your browser by simply going to `/send.php` and filling the form.
You can also use it via the URL thanks to a GET request:

```
http://yourdomain.com/send.php?message=HelloWorld!
```

That way you can use it in your code!