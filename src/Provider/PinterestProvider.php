<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\LinkShareResult;
use WebChemistry\SocialShare\UrlToShare;
use WebChemistry\SocialShare\SocialShareProviderInterface;

final class PinterestProvider implements SocialShareProviderInterface
{

	public function getId(): string
	{
		return 'pinterest';
	}

	private function createUrl(): Url
	{
		return new Url('https://pinterest.com/pin/create/button');
	}

	public function share(UrlToShare $share): LinkShareResult
	{
		return new LinkShareResult(
			$this->createUrl()
				->setQueryParameter('url', $share->getUrl())
				->setQueryParameter('description', $share->getText())
				->getAbsoluteUrl(),
			'Pinterest',
			'pinterest'
		);
	}

}
