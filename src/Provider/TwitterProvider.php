<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\LinkShareResult;
use WebChemistry\SocialShare\UrlToShare;
use WebChemistry\SocialShare\SocialShareProviderInterface;

final class TwitterProvider implements SocialShareProviderInterface
{

	public function getId(): string
	{
		return 'twitter';
	}

	private function createUrl(): Url
	{
		return new Url('https://twitter.com/intent/tweet');
	}

	public function share(UrlToShare $share): LinkShareResult
	{
		return new LinkShareResult(
			$this->createUrl()
				->setQueryParameter('url', $share->getUrl())
				->setQueryParameter('text', $share->getText())
				->getAbsoluteUrl(),
			'Twitter',
			'twitter'
		);
	}

}
