<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    public function testAttributes()
    {
        $category = new Category(
						id: '1',
            name: 'New Category',
            description: 'Description of the new category',
            isActive: true
        );

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals('New Category', $category->name);
        $this->assertEquals('Description of the new category', $category->description);
        $this->assertEquals(true, $category->isActive);

    }
}
