<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\LinkShareResult;
use WebChemistry\SocialShare\SocialShareProviderInterface;
use WebChemistry\SocialShare\UrlToShare;

final class WhatsAppProvider implements SocialShareProviderInterface
{

	public function getId(): string
	{
		return 'whatsApp';
	}

	public function share(UrlToShare $share): LinkShareResult
	{
		$url = new Url();
		$url->setQueryParameter('text', $share->getUrl());

		return new LinkShareResult(sprintf('whatsapp://send?%s', $url->getQuery()), 'WhatsApp', 'whatsApp');
	}

}
