<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * 게시판 기능을 담당하는 컨트롤러 클래스
 * 
 * 컨트롤러란?
 * - 사용자의 요청(HTTP 요청)을 받아서 처리하는 클래스
 * - 라라벨의 MVC 패턴에서 'C'(Controller) 역할
 * - 사용자가 웹페이지를 요청하면, 라우터가 이 컨트롤러의 메서드를 호출
 * 
 * 이 클래스는 게시글 목록보기, 글쓰기, 글저장, 글보기 기능을 제공
 */
class BoardController extends Controller
{
    /**
     * 게시글 목록을 보여주는 메서드
     * 
     * 사용자가 /board 경로로 접속하면 이 메서드가 실행됨
     * 
     * @return \Illuminate\View\View 게시글 목록 뷰를 반환
     */
    public function index()
    {
        // DB::table() - 데이터베이스의 특정 테이블에 직접 접근
        // board_posts 테이블에서 모든 게시글을 가져옴
        $posts = DB::table('board_posts')
            ->orderBy('created_at', 'desc')  // 최신 글이 위에 오도록 정렬
            ->paginate(10);                  // 한 페이지당 10개씩 표시 (페이지네이션)
            
        // view() - resources/views 폴더의 blade 템플릿 파일을 렌더링
        // compact('posts') - $posts 변수를 뷰로 전달
        // board.index는 resources/views/board/index.blade.php 파일을 의미
        return view('board.index', compact('posts'));
    }
    
    /**
     * 게시글 작성 폼을 보여주는 메서드
     * 
     * 사용자가 /board/create 경로로 접속하면 이 메서드가 실행됨
     * 
     * @return \Illuminate\View\View 게시글 작성 폼 뷰를 반환
     */
    public function create()
    {
        // board.create는 resources/views/board/create.blade.php 파일을 의미
        return view('board.create');
    }
    
    /**
     * 게시글을 저장하는 메서드
     * 
     * 사용자가 게시글 작성 폼을 제출하면 이 메서드가 실행됨
     * 
     * @param Request $request 사용자가 입력한 데이터를 담고 있는 객체
     * @return \Illuminate\Http\RedirectResponse 게시판 목록으로 리다이렉트
     */
    public function store(Request $request)
    {
        // validate() - 사용자 입력 데이터의 유효성을 검사
        // required: 필수 입력 항목, max: 최대 글자 수 제한
        $request->validate([
            'title' => 'required|max:200',    // 제목은 필수, 최대 200자
            'content' => 'required',          // 내용은 필수
            'author' => 'required|max:100'    // 작성자는 필수, 최대 100자
        ]);
        
        // DB::table()->insert() - 데이터베이스에 새 레코드(게시글) 추가
        DB::table('board_posts')->insert([
            'title' => $request->title,       // $request->title: 폼에서 입력한 제목
            'content' => $request->content,   // $request->content: 폼에서 입력한 내용
            'author' => $request->author,     // $request->author: 폼에서 입력한 작성자
            'created_at' => now(),            // 현재 시간을 생성일시로 설정
            'updated_at' => now()             // 현재 시간을 수정일시로 설정
        ]);
        
        // redirect()->route() - 특정 라우트로 페이지 이동
        // with() - 세션에 임시 메시지 저장 (성공 메시지 등)
        // board.index는 /board 경로를 의미
        return redirect()->route('board.index')->with('success', '게시글이 성공적으로 작성되었습니다!');
    }
    
    /**
     * 특정 게시글을 보여주는 메서드
     * 
     * 사용자가 /board/{id} 경로로 접속하면 이 메서드가 실행됨
     * {id}는 URL의 동적 부분으로, 게시글의 고유 번호
     * 
     * @param int $id 게시글의 고유 번호
     * @return \Illuminate\View\View 게시글 상세보기 뷰를 반환
     */
    public function show($id)
    {
        // DB::table()->where()->first() - 특정 조건에 맞는 첫 번째 레코드 조회
        // where('id', $id): id 컬럼이 $id와 일치하는 게시글 찾기
        $post = DB::table('board_posts')->where('id', $id)->first();
        
        // 게시글이 존재하지 않으면 404 에러 페이지 표시
        if (!$post) {
            abort(404);
        }
        
        // board.show는 resources/views/board/show.blade.php 파일을 의미
        // compact('post') - $post 변수를 뷰로 전달
        return view('board.show', compact('post'));
    }
}
