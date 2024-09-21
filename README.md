【進捗状況】

・新規登録→データ格納OK （DBファイル名：tabifrie_user）

・既存ユーザログインOK

・ログアウト動作確認OK

【行き詰っている点】2024/9/21updated

<plan.php>

・(行43-53)「エリア」によって、「国」の選択肢が自動的に展開されるようにしたいのですが、例えばエリアで北米を選択されたら、「国」のオプションに「カナダ」と「アメリカ」だけ表示されます。ネットで調べた方法をチャレンジして書いてうまくいきましたが(行67-91)、PHP POSTでデータを受け取れません。(行77,86)value追加してみましたが、作動しないのでコメントアウトにしています。これの解決方法、またはほかに簡単な方法がもしあれば、を教えていただけますか？

・このやり方で、keyが英文字にしかできなくて、選択肢を日本語にしたいので、方法がありますか？（dListのkeyを変数にしてみたりしましたがうまくいきませんでした。）

・(行57-58)date型のバリューを受け取って、格納する方法を教えていただけますか？




【アプリ企画】

１，アプリ名：旅ふれ
    一人旅の楽しさを保ちながら、費用シェアと孤独感を解消するトラベル相棒マッチングサービス

２，原体験：一人旅行の課題
    ・一人旅行者は、通常のペアプランを利用できず、旅行コストが高くなる。
    ・友達との都合・目的地希望が合わないため、一人旅行をする際に適切な旅行仲間を見つけるのが難しい。
    ・旅行先で一人で入れないレストランがあ

３，ターゲットユーザー
    ・費用シェアで旅行のコストを抑えたい人
        一人でドミトリーに住みたくないが、費用をシェアして旅行費用を削減したい人に最適なサービス。
    ・新しい友達を作りたい
        先で新しい友達を作りたい人にとって機会を提供。
    ・一人で入れないレストランに行きたい人
        一人で入れないレストランに行きたい人にとって、旅ともサービスは共に食事を楽しめる相手を提供。

４，サービス概要
    ・費用シェアで旅行コストを削減：一人旅を楽しみたい人向けに、宿泊代や飛行機代のペア買いで費用を削減し、お得な旅行に
    ・マッチング機能：アンケート方式で旅の目的地や費用、飲食の好みを聞き出し、プロファイルにデータを保存
    ・ペア成立：マッチング度70％以上のペアに通知を届けて、チャットで気になるところを確認し、双方とも合意すればペア成立

５，開発言語
    PHP、JSC、HTML、CSS
