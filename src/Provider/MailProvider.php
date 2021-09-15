<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\LinkShareResult;
use WebChemistry\SocialShare\UrlToShare;
use WebChemistry\SocialShare\SocialShareProviderInterface;

final class MailProvider implements SocialShareProviderInterface
{

	public function getId(): string
	{
		return 'mail';
	}

	public function share(UrlToShare $share): LinkShareResult
	{
		$email = $share->getEmail() ?? 'info@example.com';
		$url = new Url();
		$url->setQueryParameter('subject', $share->getTitle());
		$url->setQueryParameter('body', $share->getUrl() . ($share->getText() ? ' ' . $share->getText() : ''));

		return new LinkShareResult(sprintf('mailto:%s?&%s', $email, $url->getQuery()), 'Email', 'email');
	}

}
