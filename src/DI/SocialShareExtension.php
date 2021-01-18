<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\DI;

use Nette\DI\CompilerExtension;
use Nette\Schema\Expect;
use Nette\Schema\Schema;
use WebChemistry\SocialShare\Provider\FacebookProvider;
use WebChemistry\SocialShare\Provider\LinkedInProvider;
use WebChemistry\SocialShare\Provider\MailProvider;
use WebChemistry\SocialShare\Provider\MessengerProvider;
use WebChemistry\SocialShare\Provider\PinterestProvider;
use WebChemistry\SocialShare\Provider\TwitterProvider;
use WebChemistry\SocialShare\Provider\WhatsAppProvider;
use WebChemistry\SocialShare\SocialShareProviderInterface;
use WebChemistry\SocialShare\SocialSharer;
use WebChemistry\SocialShare\SocialSharerInterface;

final class SocialShareExtension extends CompilerExtension
{

	private const PROVIDERS = [
		'facebook' => FacebookProvider::class,
		'linkedIn' => LinkedInProvider::class,
		'mail' => MailProvider::class,
		'messenger' => MessengerProvider::class,
		'pinterest' => PinterestProvider::class,
		'twitter' => TwitterProvider::class,
		'whatsApp' => WhatsAppProvider::class,
	];

	public function getConfigSchema(): Schema
	{
		return Expect::structure([
			'facebook' => Expect::bool(true),
			'linkedIn' => Expect::bool(true),
			'mail' => Expect::bool(true),
			'messenger' => Expect::bool(true),
			'pinterest' => Expect::bool(true),
			'twitter' => Expect::bool(true),
			'whatsApp' => Expect::bool(true),
		]);
	}

	public function loadConfiguration(): void
	{
		$builder = $this->getContainerBuilder();
		$config = $this->getConfig();

		foreach ($config as $name => $enabled) {
			if (!$enabled) {
				continue;
			}

			$builder->addDefinition($this->prefix('provider.' . $name))
				->setType(SocialShareProviderInterface::class)
				->setFactory(self::PROVIDERS[$name]);
		}

		$builder->addDefinition($this->prefix('sharer'))
			->setType(SocialSharerInterface::class)
			->setFactory(SocialSharer::class);
	}

}
