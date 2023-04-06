# Craft Twig Ruleset

In the effort to automate as much style checking as possible, twig files would ideally not be missed in a Craft CMS project.

There is a [good package](https://github.com/friendsoftwig/twigcs) for this, but it misses Craft conventions on a couple points.

- camelCase variable names, instead of snake_case
- use of the fairly ubiquitous [empty coalesce operator](https://plugins.craftcms.com/empty-coalesce) from Andrew Welch

The ruleset provided here maintains the official ruleset, with the exception of addressing the two issues above. I am happy to consider further modifications requests / PR's if it can be demonstrated that they would be warranted by the Craft community.

## Usage

### Install

`composer require --dev acalvino4/craft-twig-ruleset`

### Configure

```php
<?php

// .twig_cs.php in project root

declare(strict_types=1);

use Acalvino4\CraftTwigRuleset\CraftRuleset;
use FriendsOfTwig\Twigcs\Config\Config;
use FriendsOfTwig\Twigcs\Finder\TemplateFinder;

return Config::create()
    ->addFinder(TemplateFinder::create()->in('templates'))
    ->setRuleSet(CraftRuleset::class)
;
```

This config format is straight from [twigcs](https://github.com/friendsoftwig/twigcs#file-based-configuration), so any customizations or alternatives file names noted there will work as well. The only unique thing here is use of `CraftRuleset`.

### Run

`./vendor/bin/twigcs`

Alternatively, add a composer script that calls `twigcs`, and/or use an IDE extension like [Twigcs Linter](https://marketplace.visualstudio.com/items?itemName=cerzat43.twigcs).
