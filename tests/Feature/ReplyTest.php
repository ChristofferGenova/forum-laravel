<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testListagemDeRespostasPorTopico()
    {
        $user = factory(\App\User::class)->create();
        $this->seed('RepliesTableSeeder');

        $replies = \App\Reply::where('thread_id', 3)->get();
        $response = $this->actingAs($user)->json('GET', '/replies/3');
        $response->assertStatus(200)->assertJson($replies->toArray());
    }

    public function testInclusaoDeNovaResposta()
    {
        $user = factory(\App\User::class)->create();
        $thread = factory(\App\Thread::class)->create();

        $response = $this->actingAs($user)
            ->json('POST', '/replies', [
                'body' => 'Postagem de resposta',
                'thread_id' => $thread->id
            ]);

        $reply = \App\Reply::find(1);
        $response->assertStatus(200)
            ->assertJson($reply->toArray());
    }
}
