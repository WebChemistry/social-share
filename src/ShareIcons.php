<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare;

final class ShareIcons
{

	private string $fontAwesome;

	public function __construct(
		string $fontAwesome,
	)
	{
		$this->fontAwesome = $fontAwesome;
	}

	public function getFontAwesome(): string
	{
		return $this->fontAwesome;
	}

}
