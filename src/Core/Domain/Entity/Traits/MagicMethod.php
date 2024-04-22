<?php

	namespace Core\Domain\Entity\Traits;

	use Mockery\Exception;

	trait MagicMethod
	{

		public function __get($prop)
		{
			if (isset($this->{$prop}))
				return $this->{$prop};

			$className = get_class($this);

			throw new Exception("Prop {$prop} not found in {$className}");
		}

		public function id() : string
		{
			return (string) $this->id;
		}

		public function createAt() : string
		{
			return $this->createdAt->format('Y-m-d H:i:s');
		}
	}