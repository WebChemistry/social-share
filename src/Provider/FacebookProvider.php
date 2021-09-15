<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\LinkShareResult;
use WebChemistry\SocialShare\UrlToShare;
use WebChemistry\SocialShare\SocialShareProviderInterface;

final class FacebookProvider implements SocialShareProviderInterface
{

	public function getId(): string
	{
		return 'facebook';
	}

	private function createUrl(): Url
	{
		return new Url('https://www.facebook.com/sharer/sharer.php');
	}

	public function share(UrlToShare $share): LinkShareResult
	{
		return new LinkShareResult(
			$this->createUrl()
				->setQueryParameter('u', $share->getUrl())
				->getAbsoluteUrl(),
			'Facebook',
			'facebook'
		);
	}

}
