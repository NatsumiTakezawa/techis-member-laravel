<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <!-- バリデーションエラーの表示 -->
      @include('common.errors')

      <!-- 会員登録画面   -->
      <h1>会員登録</h1>
      <form class="" action="{{ route('members.index') }}" method="post">
        {{ csrf_field() }}
        <input type="text" id="name" name="name" placeholder="名前" size="30"><span>{{ $errors->first('name') }}</span><br />
        <input type="text" id="phone" name="phone" placeholder="電話番号" size="30"><span>{{ $errors->first('phone') }}</span><br />
        <input type="text" id="email" name="email" placeholder="メールアドレス" size="30"><span>{{ $errors->first('email') }}</span><br />
        <button type="submit" name="action" value="send">登録</button>
    </form>
  </body>
</html>