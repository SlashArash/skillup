# SkillUp Event Management System
It's a simple project to make management of skillup event easier. 
Feel free to call its developer dummy!

## Installation

* Go to the project directory.

* Install dependencies with [composer](https://getcomposer.org/) (PHP Package Manager).
```
compser instsll
```
* Rename `.env.example` to `.env`

* Change MySQL configuration in `.env` file in root directory.

* Create tables and migrate the database.
```
php artisan migrate
```

* Serve the project with laravel built-in web server to run project on localhost.
```
php artisan serve
```
* Open your web browser and go to [localhost:8000](http://localhost:8000/)