# データエンジニアカタパルト Phase01 課題

## 挑戦した課題（どちらかに ✅）

[] 初級
[✅] 上級

## 実装した内容

- 実装した内容を書いてください．
・ユーザーのアイコン設定機能を実装。
・Mypageの実装。
・Mypageにおいて、ログインユーザーの名前、アイコン、アイコンを作るためのお絵かき機能を実装。
・Index画面において、投稿ユーザーのアイコン、名前を表示させた。
・Index画面において、投稿の下に返信フォームを追加し、親ツイートの下に返信を表示させた。

## デプロイ先の URL または画面収録したファイル名

laragram.mp4

## 使い方

実装した機能の使い方を記述してください．画面収録で提出する場合は，ここに書いた内容に従って収録してください．

１．アカウントを作成
２．Mypageにてアイコンを描き、アイコンの登録。
３．Createでツイートを作成
４．Indexでツイート一覧を見る。
５．返信する。

## 工夫した点

- 工夫した点を書いてください（必須）．


ユーザーが自分の描いた絵でアイコンを作成できるようにしたこと。さらに返信機能をつけることでユーザー同士の

繋がりを促進した。手書きのアイコンには愛着と個性が出るので、人それぞれユニークなアイコンになって面白いと

思った。

## 苦戦した点

- 苦戦した点を書いてください（必須）．課題の内容に限らず，Phase01 全体を振り返っての内容でも OK です．


アイコンの実装がなかなか手間取った。まず、画像を直接DBに保存するのではなく、画像は公開ディレクトリに保存

しておいて画像パスのみをDBに保存するという知識を手に入れた。それにあたることをネットで調べるがネットは手

取り足取り教えてくれる訳ではないので、いろんなサイトをハシゴしながら、chatgptに聞きまくりながら何時間か

かけて完成。

Tailwind cssも厄介だった。よくわからない理由で枠の色などの変更が適用されず、結局styleで指定したので、未

だによくわかってない。