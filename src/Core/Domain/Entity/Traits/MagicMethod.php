<?php

	namespace Core\Domain\Entity\Traits;

	use Mockery\Exception;

	trait MagicMethod
	{

		public function __get($prop)
		{
			if ($this->{$prop})
				return $this->{$prop};

			$className = get_class($this);

			throw new Exception("Prop {$prop} not found in {$className}");
		}
	}