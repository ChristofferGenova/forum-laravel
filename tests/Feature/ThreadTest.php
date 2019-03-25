<?php

namespace Tests\Feature;

use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    public function testActionIndexOnController()
    {
        $user = factory(\App\User::class)->create();
        $this->seed('ThreadsTableSeeder');

        $threads = Thread::orderBy('updated_at', 'desc')->paginate();

        $response = $this->actingAs($user)
            ->json('GET','/threads');
        $response->assertStatus(200)
            ->assertJsonFragment([$threads->toArray()['data']]);
    }

    public function testActionStoreOnController()
    {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)
            ->json('POST','/threads',
                ['title' => 'Meu primeiro tópico',
                'body' => 'Exemplo de tópico criado via POST']);
        $thread =  Thread::find(1);
        $response->assertStatus(200)
            ->assertJsonFragment(['created' => 'success'])
            ->assertJsonFragment([$thread->toArray()]);
    }

    public function testActionUpdateOnController()
    {
        $user = factory(\App\User::class)->create();
        $thread = factory(\App\Thread::class)->create(
            [
                'user_id' => $user->id
            ]
        );

        $response = $this->actingAs($user)
            ->json('PUT','/threads/'. $thread->id,
                ['title' => 'Meu primeiro atualizado',
                'body' => 'Exemplo de tópico atualizado']);

        $thread->title = 'Meu primeiro atualizado';
        $thread->body = 'Exemplo de tópico atualizado';

        $response->assertStatus(302);
        $this->assertEquals(Thread::find(1)->toArray(), $thread->toArray());
    }
}
