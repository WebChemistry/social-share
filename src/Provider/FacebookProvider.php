<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\UrlToShare;
use WebChemistry\SocialShare\SocialShareProviderInterface;

final class FacebookProvider implements SocialShareProviderInterface
{

	public function getName(): string
	{
		return 'facebook';
	}

	private function createUrl(): Url
	{
		return new Url('https://www.facebook.com/sharer/sharer.php');
	}

	public function share(UrlToShare $share): string
	{
		return $this->createUrl()
			->setQueryParameter('u', $share->getUrl())
			->getAbsoluteUrl();
	}

}
