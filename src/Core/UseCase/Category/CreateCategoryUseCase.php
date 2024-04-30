<?php

	namespace Core\UseCase\Category;

	use Core\Domain\Entity\Category;
	use Core\Domain\Repository\CategoryRepositoryInterface;
	use Core\UseCase\Dto\Category\CategoryCreateInputDto;
	use Core\UseCase\Dto\Category\CategoryCreateOutputDto;

	class CreateCategoryUseCase
	{
		protected  $repository;
		public function __construct(CategoryRepositoryInterface $repository)
		{
				$this->repository = $repository;
		}

		public function execute(CategoryCreateInputDto $categoryCreateInputDto) : CategoryCreateOutputDto
		{
			$category = new Category(
				$categoryCreateInputDto->name,
				'',
				$categoryCreateInputDto->description,
				$categoryCreateInputDto->isActive
			);

			$newCategory = $this->repository->insert($category);

			return new CategoryCreateOutputDto(
				id: $newCategory->id(),
				name: $newCategory->name,
				description: $newCategory->description,
				is_active: $newCategory->isActive,
				created_at: $newCategory->createdAt
			);
		}

	}