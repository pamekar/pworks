<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;
use Tests\TestCase;

class CommentsTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * Test store comments cuccess
     *
     * @return void
     */
    public function testStoreCommentsSucceeded()
    {
        $user = User::factory()->create();

        $response = $this->post('/comments', [
            'id' => $user->id,
            'comment' => Str::random(),
            'password' => '720DF6C2482218518FA20FDC52D4DED7ECC043AB'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test store comments cuccess
     *
     * @return void
     */
    public function testStoreCommentsUserNotFound()
    {
        $latestUser = User::query()->max('id');
        $response = $this->post('/comments', [
            'id' => $latestUser + 1,
            'comment' => Str::random(),
            'password' => '720DF6C2482218518FA20FDC52D4DED7ECC043AB'
        ]);

        $response->assertNotFound();
    }

    /**
     * Test store comments cuccess
     *
     * @return void
     */
    public function testStoreCommentsPasswordMismatch()
    {
        $latestUser = User::query()->max('id');
        $response = $this->post('/comments', [
            'id' => $latestUser + 1,
            'comment' => Str::random(),
            'password' => Str::random() . "miss"
        ]);

        $response->assertUnauthorized();
    }
}
