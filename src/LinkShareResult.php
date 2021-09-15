<?php declare(strict_types = 1);

namespace WebChemistry\SocialShare;

final class LinkShareResult
{

	private string $link;

	private string $name;

	private string $id;

	public function __construct(string $link, string $name, string $id)
	{
		$this->link = $link;
		$this->name = $name;
		$this->id = $id;
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function getLink(): string
	{
		return $this->link;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function __toString(): string
	{
		return $this->link;
	}

}
