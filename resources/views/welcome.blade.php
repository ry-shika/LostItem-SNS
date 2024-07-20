<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <!-- ページのタイトル -->
    <title>tablepage</title>
    </style>
</head>
<body>
</head>
<body>

<h1>Welcome to the Folders List</h1>


<!-- 成功メッセージの表示 -->
@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<!-- フォルダデータのテーブル -->
<table border="1">
    <thead>
        <tr>
            <!-- テーブルのヘッダー -->
            <th>ID</th>
            <th>Name</th>
            <th>Place</th>
            <th>Color</th>
            <th>Shape</th>
            <th>Time</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Comments</th>
            <th>Add Comment</th>
        </tr>
    </thead>
    <tbody>
        <!-- 各フォルダの情報をテーブルの行として表示 -->
        @foreach($folders as $folder)
        <tr>
            <!-- 各フォルダのプロパティを表示 -->
            <td>{{ $folder->id }}</td>
            <td>{{ $folder->name }}</td>
            <td>{{ $folder->place }}</td>
            <td>{{ $folder->color }}</td>
            <td>{{ $folder->shape }}</td>
            <td>{{ $folder->time }}</td>
            <td>{{ $folder->created_at }}</td>
            <td>{{ $folder->updated_at }}</td>
            <td>
                <!-- コメントを表示 -->
                @foreach($folder->comments as $comment)
                    <div>{{ $comment->comment }}</div>
                @endforeach
            </td>
            <td>
                <!-- コメント入力フォーム -->
                <form action="/comments" method="POST">
                    @csrf
                    <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                    <input type="text" name="comment" placeholder="Add a comment" required>
                    <button type="submit">Submit</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<form action="/postPage" >
    @csrf
    <button type="submit">Submit</button>
</form>

</body>
</html>