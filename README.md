SmsBiuras.lt API Package
=========================
Package that helps integrate [www.smsbiuras.lt][sms-biuras] API into Laravel framework based system.

## Installation

Install package using Composer:
`composer require adumskis/smsbiuras-api `

Add `SmsBiurasServiceProvider` to `providers` list in `config/app.php`:
```
Adumskis\SmsBiuras\Providers\SmsBiurasServiceProvider
```
Publish `sms_biuras.php` config file:
`php artisan vendor:publish --provider="Adumskis\SmsBiuras\Providers\SmsBiurasServiceProvider" --tag=config`

Set username and password variables in `.env` file:
```
SMSBIURAS_USERNAME=[username]
SMSBIURAS_PASSWORD=[password]
```
    
## Usage

All method should be called from `SmsBiuras` facade:
```
use Adumskis\SmsBiuras\Facade\SmsBiuras;
```   
### Sending SMS

Easiest way to send SMS is to use `send($message, $to, $from = null, $options = [])` method:
```
/**
 * @param string $message
 *   SMS message content
 * @param string $to
 *   SMS message receiver phone number (format 370XXXXXXXX)
 * @param string|null $from
 *   Sender of SMS
 * @param array $options
 *   Additional options
 * @return mixed
 * @throws \Exception
 */
public function send($message, $to, $from = null, $options = [])
```

Example:
```
$smsId = SmsBiuras::send('Hello world!', '37069000000', 'Support', $options);
```

#### Options (NOT TESTED)

Sending SMS can handle few options:
`validityperiod` - period in minutes that message will be valid if receiver is unavailable.
`sendtime` - period in seconds to delay SMS sending.
`flash` - show message instantly for receiver.

### Gettings messages report

```
/**
 * Get one or more SMS status
 *
 * @param array $parameters
 * @return array
 * @throws \Exception
 */
public function report($parameters = [])
```

Return sent messages id, status, sent date and done date. By default it will return array with all sent messages. To filter messages can be used `id`, `from`, `to` parameters.

Example:
```
$report = SmsBiuras::report(['id' => 1234]);
```
[sms-biuras]: https://www.smsbiuras.lt/
