<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1> 会員編集 会員ID: {{ $member->id }} </h1>
   <!-- urlで各場合にはweb.phpのルートに記述した左側を、routeで書く場合には右側のnameで指定したコードで書く -->
    <form class="" action="{{ route('members.update') }}" method="post">
      {{csrf_field()}}
      <input type="text" id="name" name="name" value="{{ $member->name }}" size="30"><span>{{ $errors->first('name') }}</span><br />
      <input type="text" id="phone" name="phone" value="{{ $member->phone }}" size="30"><span>{{ $errors->first('phone') }}</span><br />
      <input type="text" id="email" name="email" value="{{ $member->email }}" size="30"><span>{{ $errors->first('email') }}</span><br />

      <!-- 編集ボタン -->
      <input type="hidden" value="{{ $member->id }}" name="id">
      <button type="submit" id="members-edit-{{$member->id}}"  name="action" value="send">編集</button>
      </form>

      <!-- 削除ボタン -->
      <form action="{{ route('members.destroy', ['id' => $member->id]) }}" method="post">
      

      {{csrf_field()}}
      {{ method_field('DELETE') }}
      <button type="submit" id="members-destroy-{{$member->id}}" name="action" value="send">削除</button>
    </form>
  </body>
</html>