<!DOCTYPE html>
<html lang="ja">
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
            <h2>ブログ記事一覧</h2>
            <form action="{{route('blog.create')}}" method="GET">
                <input type="submit" value= "新規投稿" class="top-create-button">
            </form>
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
            <table>
                <tr>
                    <th>記事番号</th>
                    <th>タイトル</th>
                    <th>更新日</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog->id}}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->updated_at}}</td>
                        <td>
                            <form action="{{route('blog.detail',['blog'=>$blog->id])}}" method="GET">
                                <button type="submit" class="detail-button">詳細</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('blog.delete',['blog'=>$blog->id])}}" method="POST">
                                @csrf
                                <button type="submit" class="delete-button">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
</body>
</html>



