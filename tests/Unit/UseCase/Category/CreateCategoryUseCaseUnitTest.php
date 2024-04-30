<?php

	namespace Unit\UseCase\Category;

	use Core\Domain\Entity\Category;
	use Core\Domain\Repository\CategoryRepositoryInterface;
	use Core\UseCase\Category\CreateCategoryUseCase;
	use PHPUnit\Framework\TestCase;
	use Mockery;
	class CreateCategoryUseCaseUnitTest extends TestCase
	{
		public function testCreateNewCategory()
		{
			$categoryId = '123';
			$categoryName = 'Category Name';
			$this->mockEntity = Mockery::mock(Category::class, [
				'id' => $categoryId,
				'name' => $categoryName
			]);

			$this->mockRepository = Mockery::mock(\stdClass::class,CategoryRepositoryInterface::class);
			$this->mockRepository->shouldReceive('insert')->andReturn($this->mockEntity);
			$useCase = new CreateCategoryUseCase($this->mockRepository);
			$responseUseCase =  $useCase->execute();
			$this->assertTrue(true);
			Mockery::close();
		}
	}