<p>お問い合わせを受け付けました。</p>

<p>――――――――――――――――――――――――――――――</p>
<p><strong>お名前：</strong> {{ $data['name'] }}</p>
<p><strong>メール：</strong> {{ $data['email'] }}</p>
<p><strong>内容：</strong><br>{{ nl2br(e($data['message'])) }}</p>
<p>――――――――――――――――――――――――――――――</p>
