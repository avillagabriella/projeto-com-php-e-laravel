<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Category;


class CategoryTest extends TestCase
{
    /**
     *test 
     *
     * 
     */
    public function testCheck_if_category_columns_is_correct()
    {
        $category = new Category();

        $expected = [
            'name',
        ];
        $arrayCompared = array_diff($expected, $category->getFillable());

        $this->assertEquals(0, count($arrayCompared));
        $this->assertTrue(true);
    }
}
