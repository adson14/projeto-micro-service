<?php

	namespace Tests\Unit\Domain\Entity;

	use Core\Domain\Entity\Category;
	use Core\Domain\Exception\EntityValidationException;
	use PHPUnit\Framework\TestCase;
	use Ramsey\Uuid\Uuid;

	class CategoryUnitTest extends TestCase
	{
		public function testAttributes()
		{
			$category = new Category(
				name: 'New Category',
				description: 'Description of the new category',
				isActive: true
			);
			$this->assertNotEmpty($category->createAt());
			$this->assertNotEmpty($category->id());
			$this->assertInstanceOf(Category::class, $category);
			$this->assertEquals('New Category', $category->name);
			$this->assertEquals('Description of the new category', $category->description);
			$this->assertTrue(true, $category->isActive);

		}

		public function testActive()
		{
			$category = new Category(
				name: 'New Category',
				isActive: false
			);

			$this->assertFalse($category->isActive);
			$category->activate();
			$this->assertTrue($category->isActive);
		}

		public function testDisabled()
		{
			$category = new Category(
				name: 'New Category'
			);

			$this->assertTrue($category->isActive);
			$category->disable();
			$this->assertFalse($category->isActive);
		}

		public function testUpdate()
		{
			$uuid = (string) Uuid::uuid4()->toString();

			$category = new Category(
				name: 'New Category',
				id: $uuid,
				description: 'Description of the new category',
				isActive: true,
				createdAt: '2022-01-01 00:00:00'
			);

			$category->update(
				name: 'Updated Category',
				description: 'Updated description of the new category'
			);

			$this->assertEquals($uuid, $category->id());
			$this->assertEquals('Updated Category', $category->name);
			$this->assertEquals('Updated description of the new category', $category->description);
		}

		public function testExceptionName()
		{

			try{
				$category = new Category(
					name: 'Ne'
				);
				$this->assertTrue(false);
			} catch(\Exception $exception){
				$this->assertInstanceOf(EntityValidationException::class, $exception);
			}

		}

		public function testExceptionDescription()
		{

			try{
				new Category(
					name: 'New',
					description: random_bytes(99999)
				);
				$this->assertTrue(false);
			} catch(\Exception $exception){
				$this->assertInstanceOf(EntityValidationException::class, $exception);
			}

		}
	}
