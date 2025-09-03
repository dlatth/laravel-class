<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 
        Blade 템플릿 문법: {{ $post->title }}
        - $post는 BoardController에서 전달받은 게시글 데이터
        - $post->title은 게시글의 제목 필드
        - 이 값이 실제 HTML에 출력됨
    -->
    <title>{{ $post->title }} - 웹프로그래밍 실습</title>
    <style>
        /* CSS 스타일링 - 페이지의 외관을 담당 */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        
        .nav-links {
            margin-top: 20px;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            padding: 8px 16px;
            border: 2px solid white;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        
        .nav-links a:hover {
            background: white;
            color: #667eea;
        }
        
        .content {
            padding: 30px;
        }
        
        .post-header {
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .post-title {
            font-size: 2em;
            color: #333;
            margin-bottom: 15px;
        }
        
        .post-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #666;
            font-size: 14px;
        }
        
        .post-meta-left {
            display: flex;
            gap: 20px;
        }
        
        .post-meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .post-content {
            line-height: 1.8;
            color: #333;
            font-size: 16px;
            margin-bottom: 30px;
            white-space: pre-wrap;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .empty-content {
            text-align: center;
            padding: 50px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📖 게시글 보기</h1>
            <p>게시글의 자세한 내용을 확인하세요</p>
            <div class="nav-links">
                <!-- 
                    route() 함수: 라우트 이름을 사용하여 URL 생성
                    - route('board.index')는 /board 경로를 생성
                    - 라우트 이름은 web.php에서 정의됨
                -->
                <a href="{{ route('board.index') }}">게시판으로</a>
                <a href="/">메인으로</a>
                <a href="/home">홈으로</a>
            </div>
        </div>
        
        <div class="content">
            <div class="post-header">
                <!-- 
                    게시글 제목 출력
                    $post->title: BoardController에서 전달받은 게시글의 제목
                -->
                <h2 class="post-title">{{ $post->title }}</h2>
                <div class="post-meta">
                    <div class="post-meta-left">
                        <div class="post-meta-item">
                            <span>👤</span>
                            <!-- 
                                게시글 작성자 출력
                                $post->author: BoardController에서 전달받은 게시글의 작성자
                            -->
                            <span>{{ $post->author }}</span>
                        </div>
                        <div class="post-meta-item">
                            <span>📅</span>
                            <!-- 
                                게시글 작성일시 출력
                                \Carbon\Carbon::parse($post->created_at)->format('Y년 m월 d일 H:i')
                                - $post->created_at: 게시글이 생성된 시간 (데이터베이스에서 가져옴)
                                - Carbon::parse(): 문자열을 Carbon 객체로 변환
                                - format(): 원하는 형식으로 날짜 포맷팅
                                - Y년 m월 d일 H:i: 2024년 1월 15일 14:30 형식
                            -->
                            <span>{{ \Carbon\Carbon::parse($post->created_at)->format('Y년 m월 d일 H:i') }}</span>
                        </div>
                        <div class="post-meta-item">
                            <span>👁️</span>
                            <!-- 
                                게시글 조회수 출력
                                $post->views: BoardController에서 전달받은 게시글의 조회수
                            -->
                            <span>조회수: {{ $post->views }}</span>
                        </div>
                    </div>
                    <div class="post-meta-item">
                        <span>#</span>
                        <!-- 
                            게시글 고유 번호 출력
                            $post->id: BoardController에서 전달받은 게시글의 고유 ID
                        -->
                        <span>게시글 번호: {{ $post->id }}</span>
                    </div>
                </div>
            </div>
            
            <div class="post-content">
                <!-- 
                    @if @else @endif: Blade 템플릿의 조건문
                    - $post->content가 존재하면 내용을 출력
                    - 존재하지 않으면 "내용이 없습니다" 메시지 출력
                -->
                @if($post->content)
                    <!-- 
                        게시글 내용 출력
                        $post->content: BoardController에서 전달받은 게시글의 내용
                        white-space: pre-wrap CSS 속성으로 줄바꿈과 공백을 그대로 유지
                    -->
                    {{ $post->content }}
                @else
                    <div class="empty-content">
                        내용이 없습니다.
                    </div>
                @endif
            </div>
            
            <div class="button-group">
                <!-- 
                    게시판 목록으로 이동하는 버튼
                    route('board.index')는 /board 경로를 생성
                -->
                <a href="{{ route('board.index') }}" class="btn btn-primary">📋 목록으로</a>
                <!-- 
                    새 게시글 작성 페이지로 이동하는 버튼
                    route('board.create')는 /board/create 경로를 생성
                -->
                <a href="{{ route('board.create') }}" class="btn btn-secondary">✏️ 새 글쓰기</a>
            </div>
        </div>
    </div>
</body>
</html>
