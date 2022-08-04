<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Merchandise;


class MerchandiseTest extends TestCase
{
    /**
     *test 
     *
     * 
     */

    public function testCheck_if_merchandise_columns_is_correct()
    {
        $merchandise = new Merchandise();

        $expected = [
            'name',
            'description',
            'amount',
            'supplier',
            'barcode',
            'weight',
            'cost_price',
            'sale_price',
            'main_photo',
        ];
        $arrayCompared = array_diff($expected, $merchandise->getFillable());

        $this->assertEquals(0, count($arrayCompared));
        $this->assertTrue(true);
    }
    /*
    */
}