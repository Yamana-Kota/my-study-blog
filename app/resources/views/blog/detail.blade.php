<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>★ブログアプリ★</title>
    <meta http-equiv="X-UA-Compatible" content="IE=ed">
    <link rel="stylesheet" href="{{asset('css/app.css?20250612')}}">
</head>
<body>
<header>
    <h1>★ブログアプリ★</h1>
</header>
    <section class="container">
        <div class="balance">
            <h2>{{ $blog->title }}</h2>
            <span>作成日：{{ $blog->created_at }}</span>
            <span>更新日：{{ $blog->updated_at }}</span>
            <div class="image-container">
                <img src="{{ asset('storage/' . $blog->img_url) }}">
            </div>
            <p>{{ $blog->content }}</p>
            <div class="button-container">
                <form action="{{route('blog.index')}}" method="GET">
                    <button type="submit" class="back-button">一覧へ</button>
                </form>
                <form action="{{route('blog.edit',['blog'=>$blog->id])}}" method="GET">
                    @csrf
                    <button type="submit" class="edit-button">🖊編集</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
