<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\UrlToShare;
use WebChemistry\SocialShare\SocialShareProviderInterface;

final class PinterestProvider implements SocialShareProviderInterface
{

	public function getName(): string
	{
		return 'pinterest';
	}

	private function createUrl(): Url
	{
		return new Url('https://pinterest.com/pin/create/button');
	}

	public function share(UrlToShare $share): string
	{
		return $this->createUrl()
			->setQueryParameter('url', $share->getUrl())
			->setQueryParameter('description', $share->getText())
			->getAbsoluteUrl();
	}

}
