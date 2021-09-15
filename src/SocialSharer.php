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
	 * @return LinkShareResult[]
	 */
	public function share(UrlToShare $share, ?array $providers = null): array
	{
		$links = [];
		foreach ($this->providers as $provider) {
			if ($providers === null || in_array($provider->getId(), $providers, true)) {
				$links[$provider->getId()] = $provider->share($share);
			}
		}

		return $links;
	}

	public function shareOne(UrlToShare $share, string $providerClass): LinkShareResult
	{
		if (!isset($this->providers[$providerClass])) {
			throw new InvalidArgumentException(sprintf('Provider %s not exists, please register it', $providerClass));
		}

		return $this->providers[$providerClass]->share($share);
	}

	public function shareOneById(UrlToShare $share, string $id): LinkShareResult
	{
		foreach ($this->providers as $provider) {
			if ($provider->getId() === $id) {
				return $provider->share($share);
			}
		}

		throw new InvalidArgumentException(sprintf('Share provider with id %s not found.', $id));
	}

	private function addProvider(SocialShareProviderInterface $provider): self
	{
		$this->providers[get_class($provider)] = $provider;

		return $this;
	}

}
