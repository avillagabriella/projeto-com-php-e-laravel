<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;


class UserTest extends TestCase
{
    /**
     *test 
     *
     * 
     */

    public function testCheck_if_user_columns_is_correct()
    {
        $user = new User;

        $expected = [
            'id',
            'name',
            'email',
            'password',
            'phone_number',
            'birth_date',
            'document_id',
        ];
        $arrayCompared = array_diff($expected, $user->getFillable());

        $this->assertEquals(0, count($arrayCompared));
        $this->assertTrue(true);
    }
    /*
    */
}
