<?php

	namespace Unit\UseCase\Category;

	use Core\Domain\Entity\Category;
	use Core\Domain\Repository\CategoryRepositoryInterface;
	use Core\UseCase\Category\CreateCategoryUseCase;
	use Core\UseCase\Dto\Category\CategoryCreateInputDto;
	use Core\UseCase\Dto\Category\CategoryCreateOutputDto;
	use PHPUnit\Framework\TestCase;
	use Mockery;
	use Ramsey\Uuid\Uuid;

	class CreateCategoryUseCaseUnitTest extends TestCase
	{
		public function testCreateNewCategory()
		{
			$uuid = (string) Uuid::uuid4()->toString();
			$categoryName = 'Category Name';
			$this->mockEntity = Mockery::mock(Category::class, [
				$categoryName,
				$uuid,
			]);

			$this->mockEntity->shouldReceive('id')->andReturn($uuid);


			$this->mockRepository = Mockery::mock(\stdClass::class,CategoryRepositoryInterface::class);
			$this->mockRepository->shouldReceive('insert')->andReturn($this->mockEntity);


			$this->mockDtoInput = Mockery::mock(CategoryCreateInputDto::class, [
				$categoryName
			]);



			$useCase = new CreateCategoryUseCase($this->mockRepository);
			$responseUseCase =  $useCase->execute($this->mockDtoInput );
			$this->assertInstanceOf(CategoryCreateOutputDto::class, $responseUseCase);
			Mockery::close();
		}
	}