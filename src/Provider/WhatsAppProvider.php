<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\SocialShareProviderInterface;
use WebChemistry\SocialShare\UrlToShare;

final class WhatsAppProvider implements SocialShareProviderInterface
{

	public function getName(): string
	{
		return 'whatsApp';
	}

	public function share(UrlToShare $share): string
	{
		$url = new Url();
		$url->setQueryParameter('text', $share->getUrl());

		return sprintf('whatsapp://send?%s', $url->getQuery());
	}

}
