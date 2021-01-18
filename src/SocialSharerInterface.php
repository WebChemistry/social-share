<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare;

interface SocialSharerInterface
{

	/**
	 * @return string[]
	 */
	public function share(UrlToShare $share): array;

	public function shareOne(UrlToShare $share, string $providerClass): string;

}
