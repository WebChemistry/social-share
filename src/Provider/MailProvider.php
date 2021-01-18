<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare\Provider;

use Nette\Http\Url;
use WebChemistry\SocialShare\UrlToShare;
use WebChemistry\SocialShare\SocialShareProviderInterface;

final class MailProvider implements SocialShareProviderInterface
{

	public function getName(): string
	{
		return 'mail';
	}

	public function share(UrlToShare $share): string
	{
		$email = $share->getEmail() ?? 'info@example.com';
		$url = new Url();
		$url->setQueryParameter('subject', $share->getTitle());
		$url->setQueryParameter('body', $share->getUrl() . ($share->getText() ? ' ' . $share->getText() : ''));

		return sprintf('mailto:%s?&%s', $email, $url->getQuery());
	}

}
