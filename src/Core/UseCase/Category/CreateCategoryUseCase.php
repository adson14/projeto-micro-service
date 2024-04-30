<?php

	namespace Core\UseCase\Category;

	use Core\Domain\Entity\Category;
	use Core\Domain\Repository\CategoryRepositoryInterface;

	class CreateCategoryUseCase
	{
		protected  $repository;
		public function __construct(CategoryRepositoryInterface $repository)
		{
				$this->repository = $repository;
		}

		public function execute()
		{
			$category = new Category(
				'123',
			);
			$newCategory = $this->repository->insert($category);
		}

	}