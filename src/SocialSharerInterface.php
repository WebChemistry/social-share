<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare;

interface SocialSharerInterface
{

	/**
	 * @param string[]|null $providers
	 * @return LinkShareResult[]
	 */
	public function share(UrlToShare $share, ?array $providers = null): array;

	public function shareOne(UrlToShare $share, string $providerClass): LinkShareResult;

	public function shareOneById(UrlToShare $share, string $id): LinkShareResult;

}
