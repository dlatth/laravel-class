<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>홈페이지</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .nav-links {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }
        .nav-links a {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            min-width: 120px;
        }
        .nav-links a:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .success-message {
            color: #28a745;
            background-color: #d4edda;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        .feature-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        .feature-card h3 {
            color: #333;
            margin-bottom: 10px;
        }
        .feature-card p {
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>안녕하세요! 👋</h1>
        <p>Laravel 홈페이지에 오신 것을 환영합니다.</p>
        
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="feature-grid">
            <div class="feature-card">
                <h3>🚀 Laravel 프레임워크</h3>
                <p>현대적인 PHP 웹 프레임워크로 빠른 개발이 가능합니다.</p>
            </div>
            <div class="feature-card">
                <h3>🐳 Docker 환경</h3>
                <p>Laravel Sail을 통한 간편한 개발 환경 설정</p>
            </div>
            <div class="feature-card">
                <h3>📱 반응형 디자인</h3>
                <p>모든 디바이스에서 최적화된 사용자 경험</p>
            </div>
            <div class="feature-card">
                <h3>🔒 보안 기능</h3>
                <p>CSRF 보호, 비밀번호 해싱 등 보안 기능 제공</p>
            </div>
        </div>
        
        <div class="nav-links">
            <a href="{{ route('register') }}">👤 회원가입</a>
            <a href="{{ route('board.index') }}">📋 게시판</a>
            <a href="/">🏠 메인으로</a>
        </div>
    </div>
</body>
</html>
