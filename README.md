# how authenticate with github  

https://youtu.be/vs2ninGqLBM

## Laravel social Auth (Github)

- composer create-project laravel/laravel laravel_github_auth
- composer require laravel/ui 
- php artisan ui bootstrap --auth
- npm install
- npm run dev 

#### install socialite package
- composer require laravel/socialite
- add Laravel\Socialite\SocialiteServiceProvider::class in providers array in config/app.php file
- add 'Socialite' => Laravel\Socialite\Facades\Socialite::class  in aliases array in config/app.php file

#### create new github 
- https://github.com/settings/apps

add client_id and secret in .env file  
- GITHUB_CLIENT_ID = 
- GITHUB_CLIENT_SECRET = 

- add driver data in config/service.php file
