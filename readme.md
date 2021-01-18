## Usage

### Standalone usage

```php
use WebChemistry\SocialShare\Provider\FacebookProvider;
use WebChemistry\SocialShare\Provider\LinkedInProvider;
use WebChemistry\SocialShare\SocialSharer;use WebChemistry\SocialShare\UrlToShare;

$sharer = new SocialSharer([
	new FacebookProvider(),
	new LinkedInProvider(),
]);

$sharer->share(new UrlToShare('https://example.com'));
```

### Nette
```yaml
extensions:
	socialShare: WebChemistry\SocialShare\DI\SocialShareExtension
```

### Nette configuration
```yaml
socialShare:
	facebook: true # default
	linkedIn: true # default
	mail: true # default
	messenger: true # default
	pinterest: true # default
	twitter: true # default
	whatsApp: true # default
```

### Nette inject

```php

use WebChemistry\SocialShare\SocialSharerInterface;
use WebChemistry\SocialShare\UrlToShare;

class Service {

	public function __construct(SocialSharerInterface $sharer) {
		$sharer->share(new UrlToShare('https://example.com'));
	}

}
```
