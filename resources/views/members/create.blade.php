<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    @vite(['resources/css/app.css'])
    <title>会員登録画面</title>
  </head>
  <body>
      <!-- バリデーションエラーの表示 -->
      @include('common.errors')

      <!-- 会員登録画面   -->
      <div class="create-container">
      <h1>会員登録</h1>
      <form class="create-form" action="{{ route('members.index') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
        <input type="text" id="name" name="name" placeholder="名前" size="30"><span>{{ $errors->first('name') }}</span><br />
        </div>
        <div class="form-group">
        <input type="text" id="phone" name="phone" placeholder="電話番号" size="30"><span>{{ $errors->first('phone') }}</span><br />
        </div>
        <div class="form-group">
        <input type="text" id="email" name="email" placeholder="メールアドレス" size="30"><span>{{ $errors->first('email') }}</span><br />
        </div>
        <div class="form-group">
        <button type="submit" name="action" value="send" class="submit-button">登録</button>
        </div>
      </form>
      </div>
  </body>
</html>