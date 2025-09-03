<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 - 웹프로그래밍 실습</title>
    <style>
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
            max-width: 1000px;
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
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        
        .board-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
        }
        
        .write-btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .write-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .board-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .board-table th,
        .board-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .board-table th {
            background: #f8f9fa;
            font-weight: bold;
            color: #333;
        }
        
        .board-table tr:hover {
            background: #f8f9fa;
        }
        
        .title-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        
        .title-link:hover {
            text-decoration: underline;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        
        .pagination a,
        .pagination span {
            padding: 10px 15px;
            margin: 0 5px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #667eea;
            border-radius: 5px;
        }
        
        .pagination .active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }
        
        .pagination a:hover {
            background: #f8f9fa;
        }
        
        .empty-message {
            text-align: center;
            padding: 50px;
            color: #666;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 게시판</h1>
            <p>웹프로그래밍 실습을 위한 게시판입니다</p>
            <div class="nav-links">
                <a href="/">메인으로</a>
                <a href="/home">홈으로</a>
                <a href="{{ route('register') }}">회원가입</a>
            </div>
        </div>
        
        <div class="content">
            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="board-header">
                <h2>게시글 목록</h2>
                <a href="{{ route('board.create') }}" class="write-btn">✏️ 글쓰기</a>
            </div>
            
            @if($posts->count() > 0)
                <table class="board-table">
                    <thead>
                        <tr>
                            <th width="10%">번호</th>
                            <th width="50%">제목</th>
                            <th width="15%">작성자</th>
                            <th width="15%">작성일</th>
                            <th width="10%">조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>
                                    <a href="{{ route('board.show', $post->id) }}" class="title-link">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td>{{ $post->author }}</td>
                                <td>{{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</td>
                                <td>{{ $post->views }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="pagination">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="empty-message">
                    <p>아직 게시글이 없습니다.</p>
                    <p>첫 번째 게시글을 작성해보세요!</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
