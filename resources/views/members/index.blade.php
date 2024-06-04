<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSSを当てたいときはビートで書く。その後ターミナルでnpm run dev を入力すると自動で同期してくれる -->
    @vite(['resources/css/app.css'])
    <title>会員一覧画面</title>
    
</head>
<body>
<div class="index-container">
  <div class="header">
<a href="{{ route('members.create') }}" class="create-link"> >>登録 </a>
  </div>
<table border="1" style="border-collapse: collapse" class="user-table">
  <thead>
    <tr>
      <th>名前</th>
      <th>電話番号</th>
      <th>メールアドレス</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($members as $member)
    <tr>
      <td>{{ $member->name }}</td>
      <td>{{ $member->phone }}</td>
      <td>{{ $member->email }}</td>
      <td><a href="{{ route('members.edit', ['id' => $member->id]) }}" class="edit-link"> >>編集 </a></td>
      <!-- <td> >>編集 ({{ route('members.edit', ['id' => $member->id]) }})</td> -->
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</body>
</html>