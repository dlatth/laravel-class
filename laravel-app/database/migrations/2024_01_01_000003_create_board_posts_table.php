<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 게시글 테이블을 생성하는 마이그레이션 클래스
 * 
 * 마이그레이션이란?
 * - 데이터베이스의 구조를 정의하고 관리하는 파일
 * - 데이터베이스 테이블을 생성, 수정, 삭제할 수 있음
 * - 버전 관리가 가능하여 팀원들과 데이터베이스 구조를 공유할 수 있음
 * 
 * 이 파일은 board_posts 테이블을 생성하여 게시글을 저장할 수 있게 함
 */
return new class extends Migration
{
    /**
     * 마이그레이션을 실행할 때 호출되는 메서드
     * 
     * php artisan migrate 명령어를 실행하면 이 메서드가 실행됨
     * 데이터베이스에 board_posts 테이블을 생성
     */
    public function up(): void
    {
        // Schema::create() - 새로운 테이블을 생성
        // 'board_posts' - 생성할 테이블의 이름
        Schema::create('board_posts', function (Blueprint $table) {
            // $table->id() - 자동 증가하는 기본키(Primary Key) 컬럼 생성
            // id 컬럼은 각 게시글을 고유하게 식별하는 번호
            $table->id();
            
            // $table->string('title') - 제목을 저장하는 VARCHAR 컬럼 생성
            // 기본적으로 255자까지 저장 가능
            $table->string('title');
            
            // $table->text('content') - 내용을 저장하는 TEXT 컬럼 생성
            // 긴 텍스트를 저장할 수 있음 (제한 없음)
            $table->text('content');
            
            // $table->string('author') - 작성자를 저장하는 VARCHAR 컬럼 생성
            $table->string('author');
            
            // $table->integer('views') - 조회수를 저장하는 INT 컬럼 생성
            // ->default(0) - 기본값을 0으로 설정
            $table->integer('views')->default(0);
            
            // $table->timestamps() - created_at과 updated_at 컬럼을 자동 생성
            // created_at: 게시글이 작성된 시간
            // updated_at: 게시글이 마지막으로 수정된 시간
            $table->timestamps();
        });
    }

    /**
     * 마이그레이션을 되돌릴 때 호출되는 메서드
     * 
     * php artisan migrate:rollback 명령어를 실행하면 이 메서드가 실행됨
     * board_posts 테이블을 삭제
     */
    public function down(): void
    {
        // Schema::dropIfExists() - 테이블이 존재하면 삭제
        Schema::dropIfExists('board_posts');
    }
};
