# Laravel My Template

* [マルチ認証](#マルチ認証)
* Logging :ToDo
* SPA(Vue + Vuetify + FontAwesome + Inertia) :ToDo


## マルチ認証
* `/admin`へアクセスした場合とそれ以外のルートへアクセスした時で使用するセッションや`view`の`resource_path`などを変更。
* `resources/common`は`admin`でも`user`でも使用するようなリソースを入れる。
* `config/viewadmin.php`の`paths`で`resources/common/views`を2番目に指定することで`resouces/admin/views`や`resouces/user/views`に見つからなかった場合に`resources/common/views`を探すようになり、共通画面や必要に応じて上書きなどがやりやすくなる。
* `config/*.php`を認証の数だけ用意し、`AppServiceProvider`で`request()->is('pattern*')`によるルート判定を行い、`config('view')`や'config('session')`の内容を上書きすることで非常に強力にセッションの分離ができる

### 認証を増やす場合(認証:shopを増やす場合)
複製する`config/*.php`ファイルなどは他に環境によって分けたいものがあれば追加で複製してOK  
増やしたら`AppServiceProvider`の`request()->is`の分岐も忘れずに修正する。
* `app/Http/Controllers/Shop`を作成(必要に応じて`User`や`Admin`をコピー)
* `app/Http/Requests/Shop`を作成(必要に応じて`User`や`Admin`をコピー)
* `app/Models/ShopUser.php`を作成(必要に応じて`User`や`Admin`をコピー)
* `app/Providers/AppServiceProvider.php`を修正
* `config/auth.php`, `config/session.php`, `config/view.php`をそれぞれ複製して`config/authshop.php`, `config/sessionshop.php`, `config/viewshop.php`を作成
* `database/migrations/2014_10_12_000000_create_users_table.php`を複製して`2014_10_12_000000_create_shop_users_table.php`
* `routes/shop.php`を作成
* `app/Providers/RouteServiceProvider.php`を修正
* `public/shop-public`を作成して`css`,`js`,`img`フォルダをそれぞれ作成
* `resources/shop`フォルダを作成して`css`, `js`, `views`フォルダをそれぞれ作成
* `webpack.mix.js`を修正
* `storage/framework/shop`フォルダを作成(sessionタイプでfileを使用するなら)
* `.env`と`.env.example`を修正して`SESSION_COOKIE_SHOP`などの設定値を作る(`config`ファイルで読み込むやつ)
