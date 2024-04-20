<?php

	namespace Core\Domain\Entity;

	use Core\Domain\Entity\Traits\MagicMethod;

	class Category
	{
		use MagicMethod;
		public function __construct(
			protected string $name,
			protected string $id = '',
			protected string $description = '',
			protected bool   $isActive = true
		)
		{

		}


	}