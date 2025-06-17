<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>★ブログアプリ★</title>
    <link rel="stylesheet" href="{{asset('css/app.css?20250612')}}">
</head>
<body>
    <header>
        <h1>★ブログアプリ★</h1>
    </header>
    <section class="container">
        <div class="balance">
            <h2>ブログ投稿フォーム</h2>
            {{ Form::open([
                'route' => 'blog.store',
                'method' => 'post',
                'files' => true
            ]) }}
                <div class="form-group">
                    <label for="title">タイトル</label>
                    {{Form::text('title', old('title'), ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    <label for="title">画像</label>
                    {{ Form::file('image', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    <label for="content">本文</label>
                    {{ Form::textarea('content', old('content'), ['class' => 'form-control']) }}
                </div>

                <div class="button-container">
                    <a href="{{ route('blog.index') }}" class="cancel-button">キャンセル</a>
                    {{ Form::submit('✉投稿する', ['class' => 'store-button']) }}
                </div>

            {{ Form::close() }}
        </div>
    </section>
</body>
</html>
