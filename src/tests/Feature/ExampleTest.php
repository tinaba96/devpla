<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

<<<<<<< HEAD
<<<<<<< Updated upstream
        $response->assertStatus(302);
        #$response->assertStatus(200);
=======
<<<<<<< HEAD
=======
>>>>>>> Stashed changes
        $response->assertStatus(302);  // ステータスコードを変更
=======
        $response->assertStatus(302);
        #$response->assertStatus(200);
>>>>>>> origin/inaba
<<<<<<< Updated upstream
>>>>>>> 491dbf6c07bdbf9b543422a22ca247e2b2154f7f
=======
>>>>>>> Stashed changes
    }
}
