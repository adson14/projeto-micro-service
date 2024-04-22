<?php

	namespace Core\Domain\Repository;

	use Core\Domain\Entity\Category;

	interface CategoryRepositoryInterface
	{
		public function insert( Category $category): Category;

		public function findById(string $uuid): ?Category;

		public function findAll(string $filters = '', $orderBy = 'name', $direction = 'ASC'): array;

		public function paginate(string $filters = '', $orderBy = 'name', $direction = 'ASC', $page = 1, $itemsPerPage = 20): array;

		public function update(Category $category): Category;

		public function delete(string $uuid): bool;

	}