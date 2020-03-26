# Instagram-API  ![compatible](https://img.shields.io/badge/PHP%207-Compatible-brightgreen.svg) 

This is a PHP library which emulates Instagram's Private API. This library is just a start with latest version functions. It has Login and create_friendships. But will be expanded in future

**Do you like this project? Support it by donating**

**socialAPIS**

- ![btc](https://raw.githubusercontent.com/reek/anti-adblock-killer/gh-pages/images/bitcoin.png) Bitcoin: 1E8er3aqZFdrXLtq755xBLN3Gzqjesz19t

----------
## Installation

You Need! 

1. Use PHP >= 7
2. [Enabled OpenSSL on PHP](https://www.php.net/manual/de/openssl.installation.php).

### Install this library
We use composer to distribute our code effectively and easily. If you do not already have composer installed, you can download and install it here [here](https://getcomposer.org/download/).

Once you have composer installed, you can do the following:
```sh
composer require socialAPIS/instagram-php

```

```sh
require __DIR__.'/../vendor/autoload.php';

$ig = new \InstagramFollowers\Instagram();
$loginResponse = $ig->login("username", "password");
```

#### _Warning about moving data to a different server_

_Composer checks your system's capabilities and selects libraries based on your **current** machine (where you are running the `composer` command). So if you run Composer on machine `A` to install this library, it will check machine `A`'s capabilities and will install libraries appropriate for that machine (such as installing the PHP 7+ versions of various libraries). If you then move your whole installation to machine `B` instead, it **will not work** unless machine `B` has the **exact** same capabilities (same or higher PHP version and PHP extensions)! Therefore, you should **always** run the Composer-command on your intended target machine instead of your local machine._

## Examples
//TODO

## Why did I make this API?

After trying of all on the internet instagram-php-private APIS to grow my instagram account, i needed to build something like this.

### What is Instagram?
According to [the company](https://instagram.com/about/faq/):

> "Instagram is a fun and quirky way to share your life with friends through a series of pictures. Snap a photo with your mobile phone, then choose a filter to transform the image into a memory to keep around forever. We're building Instagram to allow you to experience moments in your friends' lives through pictures as they happen. We imagine a world more connected through photos."

# License

In order help ensure fairness and sharing, this library is dual-licensed. Be
aware that _all_ usage, unless otherwise specified, is under the **RPL-1.5**
license!

- Reciprocal Public License 1.5 (RPL-1.5): https://opensource.org/licenses/RPL-1.5

You should read the _entire_ license; especially the `PREAMBLE` at the
beginning. In short, the word `reciprocal` means "giving something back in
return for what you are getting". It is _**not** a freeware license_. This
license _requires_ that you open-source _all_ of your own source code for _any_
project which uses this library! Creating and maintaining this library is
endless hard work for us. That's why there is _one_ simple requirement for you:
Give _something_ back to the world. Whether that's code _or_ financial support
for this project is entirely up to you, but _nothing else_ grants you _any_
right to use this library.

Furthermore, the library is _also_ available _to certain entities_ under a
modified version of the RPL-1.5, which has been modified to allow you to use the
library _without_ open-sourcing your own project. The modified license
(see [LICENSE_PREMIUM](https://github.com/socialAPIS/Instagram-API/blob/master/LICENSE_PREMIUM))
is granted to certain entities, at _our_ discretion, and for a _limited_ period
of time (unless otherwise agreed), pursuant to our terms. Currently, we are
granting this license to all
"[premium subscribers](https://github.com/socialAPIS/Instagram-API/issues/2655)" for
the duration of their subscriptions. You can become a premium subscriber by
either contributing substantial amounts of high-quality code, or by subscribing
for a fee. This licensing ensures fairness and stimulates the continued growth
of this library through both code contributions and the financial support it
needs.

You are not required to accept this License since you have not signed it,
however _nothing else_ grants you permission to _use_, copy, distribute, modify,
or create derivatives of either the Software (this library) or any Extensions
created by a Contributor. These actions are prohibited by law if you do not
accept this License. Therefore, by performing any of these actions You indicate
Your acceptance of this License and Your agreement to be bound by all its terms
and conditions. IF YOU DO NOT AGREE WITH ALL THE TERMS AND CONDITIONS OF THIS
LICENSE DO NOT USE, MODIFY, CREATE DERIVATIVES, OR DISTRIBUTE THE SOFTWARE. IF
IT IS IMPOSSIBLE FOR YOU TO COMPLY WITH ALL THE TERMS AND CONDITIONS OF THIS
LICENSE THEN YOU CAN NOT USE, MODIFY, CREATE DERIVATIVES, OR DISTRIBUTE THE
SOFTWARE.

# Terms and conditions

- You will NOT use this API for marketing purposes (spam, botting, harassment, massive bulk messaging...).
- We do NOT give support to anyone who wants to use this API to send spam or commit other crimes.
- We reserve the right to block any user of this repository that does not meet these conditions.

## Legal

This code is in no way affiliated with, authorized, maintained, sponsored or endorsed by Instagram or any of its affiliates or subsidiaries. This is an independent and unofficial API. Use at your own risk.
