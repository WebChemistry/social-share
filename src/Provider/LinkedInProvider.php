<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\LinkShareResult;
use WebChemistry\SocialShare\UrlToShare;
use WebChemistry\SocialShare\SocialShareProviderInterface;

final class LinkedInProvider implements SocialShareProviderInterface
{

	public function getId(): string
	{
		return 'linkedIn';
	}

	private function createUrl(): Url
	{
		return new Url('https://www.linkedin.com/shareArticle?mini=true');
	}

	public function share(UrlToShare $share): LinkShareResult
	{
		return new LinkShareResult(
			$this->createUrl()
				->setQueryParameter('url', $share->getUrl())
				->setQueryParameter('summary', $share->getText())
				->setQueryParameter('title', $share->getTitle())
				->getAbsoluteUrl(),
			'LinkedIn',
			'linkedIn'
		);
	}

}
