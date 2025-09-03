<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BoardController;

/**
 * 웹 애플리케이션의 모든 라우트(URL 경로)를 정의하는 파일
 * 
 * 라우트란?
 * - 사용자가 브라우저에서 특정 URL로 접속했을 때 어떤 기능을 실행할지 정의
 * - URL과 컨트롤러의 메서드를 연결하는 역할
 * - 예: /board로 접속하면 BoardController의 index() 메서드 실행
 */

// 메인 페이지 라우트
Route::get('/', function () {
    // '/' 경로(루트 경로)로 접속하면 welcome.blade.php 뷰를 표시
    return view('welcome');
});

// 홈 페이지 라우트
Route::get('/home', function () {
    // '/home' 경로로 접속하면 home.blade.php 뷰를 표시
    return view('home');
});

/**
 * 회원가입 관련 라우트
 * 
 * Route::get() - GET 요청 처리 (페이지 표시)
 * Route::post() - POST 요청 처리 (폼 제출 데이터 처리)
 * 
 * [RegisterController::class, 'showRegistrationForm'] - RegisterController 클래스의 showRegistrationForm 메서드 실행
 * ->name('register') - 이 라우트에 'register'라는 이름 부여 (route('register')로 참조 가능)
 */
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

/**
 * 게시판 관련 라우트
 * 
 * BoardController의 각 메서드와 URL을 연결
 * 
 * /board (GET) - 게시글 목록 보기 (BoardController@index)
 * /board/create (GET) - 게시글 작성 폼 (BoardController@create)  
 * /board (POST) - 게시글 저장 (BoardController@store)
 * /board/{id} (GET) - 특정 게시글 보기 (BoardController@show)
 * 
 * {id}는 동적 파라미터로, 실제 게시글 번호가 들어감 (예: /board/1, /board/5)
 */
Route::get('/board', [BoardController::class, 'index'])->name('board.index');
Route::get('/board/create', [BoardController::class, 'create'])->name('board.create');
Route::post('/board', [BoardController::class, 'store'])->name('board.store');
Route::get('/board/{id}', [BoardController::class, 'show'])->name('board.show');
