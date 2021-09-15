<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare;

interface SocialShareProviderInterface
{

	public function getId(): string;

	public function share(UrlToShare $share): LinkShareResult;

}
