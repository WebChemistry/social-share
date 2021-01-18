<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\UrlToShare;
use WebChemistry\SocialShare\SocialShareProviderInterface;

final class TwitterProvider implements SocialShareProviderInterface
{

	public function getName(): string
	{
		return 'twitter';
	}

	private function createUrl(): Url
	{
		return new Url('https://twitter.com/intent/tweet');
	}

	public function share(UrlToShare $share): string
	{
		return $this->createUrl()
			->setQueryParameter('url', $share->getUrl())
			->setQueryParameter('text', $share->getText())
			->getAbsoluteUrl();
	}

}
