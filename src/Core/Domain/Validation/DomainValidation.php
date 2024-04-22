<?php

	namespace Core\Domain\Validation;

	use Core\Domain\Exception\EntityValidationException;

	class DomainValidation
	{
		public static function notNull( string $value, string $message =  null )
		{
			if ( empty( $value ) )
				throw new EntityValidationException( $message ?? 'Field cannot be null' );
		}

		public static function strMaxLength( string $value,int $length=255, string $message =  null )
		{
			if ( strlen($value) > $length )
				throw new EntityValidationException( $message ?? 'The field must be less than '.$length.' characters' );
		}

		public static function strMinLength( string $value,int $length=3, string $message =  null )
		{
			if ( strlen($value) < $length )
				throw new EntityValidationException( $message ?? 'The field must be greater than '.$length.' characters' );
		}
	}