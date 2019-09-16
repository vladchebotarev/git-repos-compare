# Compare 2 GitHub Repositories

This application will help you to compare two GitHub Repositories.

Based on Laravel 6.

## Requirements

PHP >= 7.1.3

Composer

## Quick Installation

    git clone https://github.com/vladchebotarev/git-repos-compare

    cd git-repos-compare
    
    composer install --no-dev

    cp .env.example .env
    
    php artisan key:generate
    
    php artisan serve


## Web Usage

You can use the application in your browser after you deploy it using
    
    php artisan serve

Standard URL: http://127.0.0.1:8000

## API Documentation

#### Compare 2 repositories

    POST /api/compare

Request Example

    curl -X POST http://127.0.0.1:8000/api/compare -H "Content-Type: application/json" -d '{"repo1": "https://github.com/GrahamCampbell/Laravel-GitHub", "repo2": "https://github.com/GrahamCampbell/Laravel-GitHub"}' 

Response Example

    HTTP/1.1 200 OK
    Host: 127.0.0.1:8000
    Date: Mon, 16 Sep 2019 13:36:30 +0000
    Connection: close
    X-Powered-By: PHP/7.2.12
    Cache-Control: no-cache, private
    Date: Mon, 16 Sep 2019 13:36:30 GMT
    Content-Type: application/json
    X-RateLimit-Limit: 60
    X-RateLimit-Remaining: 59
    
        {
            "repo1": {
                "full_name": "GrahamCampbell\/Laravel-GitHub",
                "language": "PHP",
                "forks": 72,
                "stars": 336,
                "watchers": 336,
                "pushed_at": "2019-08-26T19:05:38Z",
                "open_pull_request": 0,
                "closed_pull_request": 42
            },
            "repo2": {
                "full_name": "GrahamCampbell\/Laravel-GitHub",
                "language": "PHP",
                "forks": 72,
                "stars": 336,
                "watchers": 336,
                "pushed_at": "2019-08-26T19:05:38Z",
                "open_pull_request": 0,
                "closed_pull_request": 42
            }
        }

## License
The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
