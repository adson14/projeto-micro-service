<?php

	namespace Core\Domain\ValueObject;

	use Ramsey\Uuid\Exception\InvalidArgumentException;
	use Ramsey\Uuid\Uuid as id;
	class Uuid
	{
		public function  __construct(protected string $uuid)
		{
			$this->ensureIsValid($this->uuid);
		}

		public static function random() :self
		{
			return new self(id::uuid4()->toString());
		}

		public function __toString() :string
		{
			return $this->uuid;
		}

		private function ensureIsValid(string $uuid)
		{
			if(!id::isValid($uuid))
				throw new InvalidArgumentException('Invalid UUID');
		}
	}