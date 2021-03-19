## Projectku 
- Aplikasi Data Perpustakaan
	
#### Create Project

open command line(terminal)
if you using **laradock**
```bash
$ cd laradock/
$ docker-compose up -d nginx mysql phpmyadmin redis workspace
```  

aktivate workspace : 
```bash
$ docker-compose exec workspace bash
```  

on your workspace : 

```bash
root@04f8fe1a3732:/var/www# composer create-project laravel/laravel=6.0 projectku --prefer-dist
root@04f8fe1a3732:/var/www# cd projectku/ cp .env.example .env
```  

open directory **projectku/** on text editor, edit file **.env** setting database config in **.env** file.  
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=projectku
DB_USERNAME=root
DB_PASSWORD=root
```  

back to terminal still in workspace bash : 

```bash
root@04f8fe1a3732:/var/www# php artisan make:migration create_books_table --create=books
```  
and access migration directory, or look at this <a href="https://github.com/codesyariah122/projectku/tree/master/projectku/database/migrations" target="_blank">here</a>

back to terminal and workspace bash :  **migrate** now

```bash
root@04f8fe1a3732:/var/www/projectku# php artisan migrate
```  
create controller : 

```bash
root@04f8fe1a3732:/var/www/projectku# php artisan make:controller BooksController --resources --model=Book
```  
for controller, look at this <a href="https://github.com/codesyariah122/projectku/blob/master/projectku/app/Http/Controllers/BooksController.php" target="_blank"> here </a> 

back to text editor and open **routes/web.php** look at this : <a href="https://github.com/codesyariah122/projectku/blob/master/projectku/routes/web.php" target="_blank">here</a>  

back again at terminal ( workspace bash ) :  

```bash
root@04f8fe1a3732:/var/www/projectku# php artisan route:list
```  
look at this terminal ***route list output*** details : 
```bash
+--------+-----------+-------------------+---------------+----------------------------------------------+--------------+
| Domain | Method    | URI               | Name          | Action                                       | Middleware   |
+--------+-----------+-------------------+---------------+----------------------------------------------+--------------+
|        | GET|HEAD  | /                 |               | Closure                                      | web          |
|        | GET|HEAD  | api/user          |               | Closure                                      | api,auth:api |
|        | GET|HEAD  | books             | books.index   | App\Http\Controllers\BooksController@index   | web          |
|        | POST      | books             | books.store   | App\Http\Controllers\BooksController@store   | web          |
|        | GET|HEAD  | books/create      | books.create  | App\Http\Controllers\BooksController@create  | web          |
|        | GET|HEAD  | books/{book}      | books.show    | App\Http\Controllers\BooksController@show    | web          |
|        | PUT|PATCH | books/{book}      | books.update  | App\Http\Controllers\BooksController@update  | web          |
|        | DELETE    | books/{book}      | books.destroy | App\Http\Controllers\BooksController@destroy | web          |
|        | GET|HEAD  | books/{book}/edit | books.edit    | App\Http\Controllers\BooksController@edit    | web          |
|        | GET|HEAD  | hallo             |               | App\Http\Controllers\TestController@index    | web          |
+--------+-----------+-------------------+---------------+----------------------------------------------+--------------+  
```  

next create view in directory **resources/views/**  ***create new directory for views*** 

```bash
root@04f8fe1a3732:/var/www/projectku# cd resources/views/

root@04f8fe1a3732:/var/www/projectku/resources/views#  mkdir -p books/
```  

and in books directory create new file for views others are : 
<a href="https://github.com/codesyariah122/projectku/tree/master/projectku/resources/views/books" taget="_blank"> here </a> 

ok finish , open in your browser 
http://projectku.com/books
