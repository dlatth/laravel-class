<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 작성 - 웹프로그래밍 실습</title>
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
            max-width: 800px;
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
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
            font-size: 16px;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .form-group textarea {
            min-height: 200px;
            resize: vertical;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }
        
        .btn {
            padding: 15px 30px;
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
        
        .character-count {
            text-align: right;
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✏️ 게시글 작성</h1>
            <p>새로운 게시글을 작성해보세요</p>
            <div class="nav-links">
                <a href="{{ route('board.index') }}">게시판으로</a>
                <a href="/">메인으로</a>
                <a href="/home">홈으로</a>
            </div>
        </div>
        
        <div class="content">
            <form method="POST" action="{{ route('board.store') }}">
                @csrf
                
                <div class="form-group">
                    <label for="title">제목 *</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" 
                           placeholder="게시글 제목을 입력하세요" required maxlength="200">
                    @error('title')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    <div class="character-count">
                        <span id="title-count">0</span>/200
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="author">작성자 *</label>
                    <input type="text" id="author" name="author" value="{{ old('author') }}" 
                           placeholder="작성자 이름을 입력하세요" required maxlength="100">
                    @error('author')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="content">내용 *</label>
                    <textarea id="content" name="content" placeholder="게시글 내용을 입력하세요" required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">📝 게시글 등록</button>
                    <a href="{{ route('board.index') }}" class="btn btn-secondary">❌ 취소</a>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // 제목 글자 수 카운트
        const titleInput = document.getElementById('title');
        const titleCount = document.getElementById('title-count');
        
        titleInput.addEventListener('input', function() {
            titleCount.textContent = this.value.length;
        });
        
        // 폼 제출 시 확인
        document.querySelector('form').addEventListener('submit', function(e) {
            const title = titleInput.value.trim();
            const author = document.getElementById('author').value.trim();
            const content = document.getElementById('content').value.trim();
            
            if (!title || !author || !content) {
                e.preventDefault();
                alert('모든 필수 항목을 입력해주세요.');
                return false;
            }
        });
    </script>
</body>
</html>
