<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare;

class UrlToShare
{

	private string $url;

	private ?string $title = null;

	private ?string $text = null;

	private ?string $email = null;

	public function __construct(string $url)
	{
		$this->url = $url;
	}

	public function getUrl(): string
	{
		return $this->url;
	}

	public function getText(): ?string
	{
		return $this->text;
	}

	public function getTitle(): ?string
	{
		return $this->title;
	}

	public function getEmail(): ?string
	{
		return $this->email;
	}

}
