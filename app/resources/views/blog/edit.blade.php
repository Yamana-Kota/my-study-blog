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
            <h2>ブログ編集フォーム</h2>
            @if (session('succeed_status'))
                <div class="error">
                    {{ session('succeed_status') }}
                </div>
            @endif
            @if (session('failed_status'))
                <div class="error">
                    {{ session('failed_status') }}
                </div>
            @endif
            {{ Form::open([
            'route' => ['blog.update', $blog->id],
            'method' => 'post',
            'files' => true
             ]) }}
                <div class="form-group">
                    <label for="title">タイトル</label>
                    {{Form::text('title', $blog->title, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    <label for="title">画像</label>
                    {{ Form::file('image', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    <label for="content">本文</label>
                    {{ Form::textarea('content', $blog->content, ['class' => 'form-control']) }}
                </div>

                <div class="button-container">
                    <a href="{{ route('blog.detail', ['blog' => $blog->id]) }}" class="back-button">キャンセル</a>
                    {{ Form::submit('✉更新する', ['class' => 'update-button']) }}
                </div>

            {{ Form::close() }}
        </div>
    </section>
</body>
</html>
