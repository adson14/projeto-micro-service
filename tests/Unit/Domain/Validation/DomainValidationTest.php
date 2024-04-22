<?php

	namespace Tests\Unit\Domain\Validation;

	use Core\Domain\Exception\EntityValidationException;
	use Core\Domain\Validation\DomainValidation;
	use PHPUnit\Framework\TestCase;

	class DomainValidationTest extends TestCase
	{
		public function testNotNull(){

			try{
				$value = '';
				DomainValidation::notNull($value);
				$this->assertTrue(false);
			} catch(\Exception $exception) {
				$this->assertInstanceOf(EntityValidationException::class, $exception);
			}
		}

		public function testNotNullCustomMessageException()
		{
			try{
				$value = '';
				DomainValidation::notNull($value,'Custom message exception');
				$this->assertTrue(false);
			} catch(\Exception $exception) {
				$this->assertInstanceOf(EntityValidationException::class, $exception,'Custom message exception');
			}
		}

		public function testStrtMaxLength(){
			try{
				$value = 'Test test';
				DomainValidation::strMaxLength($value, 5);
				$this->assertTrue(false);
			} catch(\Exception $exception) {
				$this->assertInstanceOf(EntityValidationException::class, $exception);
			}
		}

		public function testStrtMinLength(){
			try{
				$value = 'Te';
				DomainValidation::strMinLength($value, 3);
				$this->assertTrue(false);
			} catch(\Exception $exception) {
				$this->assertInstanceOf(EntityValidationException::class, $exception);
			}
		}
	}