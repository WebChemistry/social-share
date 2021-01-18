<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\UrlToShare;
use WebChemistry\SocialShare\SocialShareProviderInterface;

final class LinkedInProvider implements SocialShareProviderInterface
{

	public function getName(): string
	{
		return 'linkedIn';
	}

	private function createUrl(): Url
	{
		return new Url('https://www.linkedin.com/shareArticle?mini=true');
	}

	public function share(UrlToShare $share): string
	{
		return $this->createUrl()
			->setQueryParameter('url', $share->getUrl())
			->setQueryParameter('summary', $share->getText())
			->setQueryParameter('title', $share->getTitle())
			->getAbsoluteUrl();
	}

}
