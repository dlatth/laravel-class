<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class BoardTest extends TestCase
{
    use RefreshDatabase;

    public function test_board_index_page_can_be_rendered()
    {
        $response = $this->get('/board');
        $response->assertStatus(200);
        $response->assertSee('게시판');
    }

    public function test_board_create_page_can_be_rendered()
    {
        $response = $this->get('/board/create');
        $response->assertStatus(200);
        $response->assertSee('게시글 작성');
    }

    public function test_new_post_can_be_created()
    {
        $response = $this->post('/board', [
            'title' => '테스트 게시글',
            'content' => '테스트 내용입니다.',
            'author' => '테스트 작성자'
        ]);

        $response->assertRedirect('/board');
        
        $this->assertDatabaseHas('board_posts', [
            'title' => '테스트 게시글',
            'content' => '테스트 내용입니다.',
            'author' => '테스트 작성자'
        ]);
    }

    public function test_validation_errors_for_invalid_post_data()
    {
        $response = $this->post('/board', [
            'title' => '',
            'content' => '',
            'author' => ''
        ]);

        $response->assertSessionHasErrors(['title', 'content', 'author']);
    }

    public function test_post_show_page_can_be_rendered()
    {
        // 먼저 게시글 생성
        $this->post('/board', [
            'title' => '테스트 게시글',
            'content' => '테스트 내용입니다.',
            'author' => '테스트 작성자'
        ]);

        // 생성된 게시글의 실제 ID 조회
        $post = DB::table('board_posts')->where('title', '테스트 게시글')->first();
        
        if ($post) {
            // 생성된 게시글 조회
            $response = $this->get('/board/' . $post->id);
            $response->assertStatus(200);
            $response->assertSee('테스트 게시글');
            $response->assertSee('테스트 내용입니다.');
        } else {
            $this->fail('게시글이 생성되지 않았습니다.');
        }
    }
}
