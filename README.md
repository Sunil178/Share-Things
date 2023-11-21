# Share text and files. Built with Lumen

## Steps to add web authentication like laravel
1.  composer require illuminate/session
2.  composer require illuminate/cookie
3.  mkdir -p storage/framework/sessions
4.  Exclude `storage/framework/sessions` directory from `.gitignore`
5.  Copy `config/session.php` and `config/auth.php` from laravel to lumen project
6.  Remove direct `password*` related keys from `config/auth.php`
7.  Uncomment all the lines from `bootstrap/app.php`
8.  Register and bind service providers
    ```php
    $app->singleton(Illuminate\Session\SessionManager::class, function () use ($app) {
        return $app->loadComponent('session', Illuminate\Session\SessionServiceProvider::class, 'session');
    });

    $app->singleton('session.store', function () use ($app) {
        return $app->loadComponent('session', Illuminate\Session\SessionServiceProvider::class, 'session.store');
    });

    $app->singleton('cookie', function () use ($app) {
        return $app->loadComponent('session', Illuminate\Cookie\CookieServiceProvider::class, 'cookie');
    });

    $app->bind(Illuminate\Contracts\Cookie\QueueingFactory::class, 'cookie');
    ```
9.  Register middleware
    ```php
    $app->middleware([
        \Illuminate\Session\Middleware\StartSession::class,
    ]);
    ```
10. Use `Auth::login()` for login auth
    ```php
    $user = User::where('token', $request->token)->first();
    if ($user) {
        Auth::login($user);
    }
    ```

## Link storage to public access
```bash
ln -s /home/neosoft/Workspace/share-things/storage/app/public /home/neosoft/Workspace/share-things/public/storage
```

## Enable blade view error showings
Add this line inside `render` function of `app/Exceptions/Handler.php` php file before `return` statement
```php
if (env('APP_DEBUG')) {
    dd($exception);
}
```