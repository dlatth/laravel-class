<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>웹프로그래밍 실습 - 영진전문대학교</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background: rgba(255, 255, 255, 0.95);
            padding: 20px 0;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        h1 {
            text-align: center;
            color: #333;
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        
        .subtitle {
            text-align: center;
            color: #666;
            font-size: 1.2em;
        }
        
        .main-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .card {
            background: rgba(255, 255, 255, 0.95);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .card h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 1.4em;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
        }
        
        .card p {
            color: #666;
            margin-bottom: 15px;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .features {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .features h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 2em;
        }
        
        .feature-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        
        .feature-item i {
            font-size: 1.5em;
            color: #667eea;
            margin-right: 15px;
        }
        
        footer {
            text-align: center;
            color: white;
            margin-top: 40px;
            padding: 20px;
        }
        
        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
            }
            
            h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>🌐 웹프로그래밍 실습</h1>
            <p class="subtitle">영진전문대학교 - Laravel 기반 웹 애플리케이션</p>
        </header>
        
        <div class="main-content">
            <div class="card">
                <h3>📝 회원가입</h3>
                <p>새로운 사용자 계정을 생성하고 관리할 수 있습니다.</p>
                <a href="{{ route('register') }}" class="btn">회원가입 하기</a>
            </div>
            
            <div class="card">
                <h3>🏠 홈페이지</h3>
                <p>메인 홈페이지로 이동하여 다양한 기능을 확인해보세요.</p>
                <a href="/home" class="btn">홈으로 이동</a>
            </div>
            
            <div class="card">
                <h3>🔧 개발 도구</h3>
                <p>Laravel Sail을 사용한 Docker 기반 개발 환경입니다.</p>
                <a href="#" class="btn" onclick="showDevInfo()">개발 정보</a>
            </div>
        </div>
        
        <div class="features">
            <h2>✨ 주요 기능</h2>
            <div class="feature-list">
                <div class="feature-item">
                    <i>🚀</i>
                    <div>
                        <strong>빠른 개발</strong><br>
                        <small>Laravel 프레임워크로 빠른 웹 개발</small>
                    </div>
                </div>
                <div class="feature-item">
                    <i>🐳</i>
                    <div>
                        <strong>Docker 지원</strong><br>
                        <small>Laravel Sail로 간편한 환경 설정</small>
                    </div>
                </div>
                <div class="feature-item">
                    <i>📱</i>
                    <div>
                        <strong>반응형 디자인</strong><br>
                        <small>모든 디바이스에서 최적화된 화면</small>
                    </div>
                </div>
                <div class="feature-item">
                    <i>🔒</i>
                    <div>
                        <strong>보안 기능</strong><br>
                        <small>CSRF 보호, 비밀번호 해싱 등</small>
                    </div>
                </div>
            </div>
        </div>
        
        <footer>
            <p>&copy; 2024 영진전문대학교 웹프로그래밍 실습</p>
        </footer>
    </div>
    
    <script>
        function showDevInfo() {
            alert('개발 환경 정보:\n\n' +
                  '• Laravel 11.x\n' +
                  '• PHP 8.2+\n' +
                  '• MySQL 8.0\n' +
                  '• Docker + Laravel Sail\n' +
                  '• Tailwind CSS\n\n' +
                  '테스트 실행: ./vendor/bin/sail test');
        }
        
        // 페이지 로드 시 애니메이션 효과
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'all 0.6s ease';
                    
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                }, index * 200);
            });
        });
    </script>
</body>
</html>
