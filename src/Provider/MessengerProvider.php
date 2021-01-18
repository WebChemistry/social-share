<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\UrlToShare;
use WebChemistry\SocialShare\SocialShareProviderInterface;

final class MessengerProvider implements SocialShareProviderInterface
{

	public function getName(): string
	{
		return 'messenger';
	}

	public function share(UrlToShare $share): string
	{
		$url = new Url();
		$url->setQueryParameter('link', $share->getUrl());

		return sprintf('fb-messenger://share/?%s', $url->getQuery());
	}

}
