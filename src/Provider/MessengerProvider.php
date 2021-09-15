<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\LinkShareResult;
use WebChemistry\SocialShare\UrlToShare;
use WebChemistry\SocialShare\SocialShareProviderInterface;

final class MessengerProvider implements SocialShareProviderInterface
{

	public function getId(): string
	{
		return 'messenger';
	}

	public function share(UrlToShare $share): LinkShareResult
	{
		$url = new Url();
		$url->setQueryParameter('link', $share->getUrl());

		return new LinkShareResult(sprintf('fb-messenger://share/?%s', $url->getQuery()), 'Messenger', 'messenger');
	}

}
