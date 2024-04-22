<?php

	namespace Core\Domain\Entity;

	use Core\Domain\Entity\Traits\MagicMethod;
	use Core\Domain\Validation\DomainValidation;
	use Core\Domain\ValueObject\Uuid;
	use DateTime;
	class Category
	{
		use MagicMethod;
		public function __construct(
			protected string $name,
			protected Uuid|string $id = '',
			protected string $description = '',
			protected bool   $isActive = true,
			protected DateTime | string $createdAt =''
		)
		{
			$this->id = $this->id ? new Uuid($this->id) : Uuid::random();
			$this->createdAt = $this->createdAt ? new DateTime($this->createdAt) : new DateTime();
			$this->validate();
		}

		public function activate() : void
		{
			$this->isActive = true;
		}

		public function disable() : void
		{
			$this->isActive = false;
		}

		public function update(string $name, string $description = '')
		{
			$this->validate();
			$this->name = $name;
			$this->description = $description ?? $this->description;
		}

		public function validate()
		{
			DomainValidation::strMaxLength($this->name, 30);
			DomainValidation::strMinLength($this->name, 3);

			if(!empty($this->description)){
				DomainValidation::strMinLength($this->description, 5);
				DomainValidation::strMaxLength($this->description, 255);
			}
		}

	}