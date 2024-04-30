<?php

namespace Core\UseCase\Dto\Category;

class CategoryCreateOutputDto
{
	public function __construct(
		public string $id,
		public string $name,
		public string $description = '',
		public bool $is_active = true,
		public \DateTime $created_at = new \DateTime(),
	)
	{}
}