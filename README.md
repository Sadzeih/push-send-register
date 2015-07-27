# push-send-register
Two small PHP scripts to register tokens into a database and to send push notifications to devices using Ionic Push Rest API and Webhooks

### Usage

Change the `config.php` file to use your own settings.

```
$db = new PDO("mysql:dbname=YOUR DATABASE NAME;host=YOUR HOSTNAME", "YOUR USERNAME", "YOUR PASSWORD");
```

and modify it to use your Google Messenger Cloud id and API key

```
$app_id = "YOUR_APP_ID";
$ionic_private_key = "YOUR_PRIVATE_KEY";
```

Once that's done, you should be able to use it as you wish.
