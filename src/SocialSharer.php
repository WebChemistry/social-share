<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare;

use InvalidArgumentException;

final class SocialSharer implements SocialSharerInterface
{

	/** @var SocialShareProviderInterface[] */
	private array $providers = [];

	/**
	 * @param SocialShareProviderInterface[] $providers
	 */
	public function __construct(array $providers = [])
	{
		foreach ($providers as $provider) {
			$this->addProvider($provider);
		}
	}

	/**
	 * @return string[]
	 */
	public function share(UrlToShare $share): array
	{
		$links = [];
		foreach ($this->providers as $provider) {
			$links[$provider->getName()] = $provider->share($share);
		}

		return $links;
	}

	public function shareOne(UrlToShare $share, string $providerClass): string
	{
		if (!isset($this->providers[$providerClass])) {
			throw new InvalidArgumentException(sprintf('Provider %s not exists, please register it', $providerClass));
		}

		return $this->providers[$providerClass]->share($share);
	}

	private function addProvider(SocialShareProviderInterface $provider): self
	{
		$this->providers[get_class($provider)] = $provider;

		return $this;
	}

}
