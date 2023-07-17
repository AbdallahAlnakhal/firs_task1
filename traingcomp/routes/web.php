<?php
use App\Http\Controllers\API\ApiPostController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [FormsController::class, 'hellow']);
Route::get('/login', [LoginController::class, 'login']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/index', [FormsController::class, 'form1'])->name('index');

    Route::post('form1', [FormsController::class, 'form1_data'])->name('form1_data');

    Route::get('/edit/{id}', [FormsController::class, 'edit'])->name('edit');



    Route::match(['get', 'head', 'post', 'put'], '/show_data', [ShowController::class, 'show_data1'])->name('show');

    Route::delete('/posts/{post}', [FormsController::class, 'destroy'])->name('destroy');
    Route::post('/submit', [FormsController::class, 'submitForm'])->name('submit');




    Route::get('/showpo', [ShowController::class, 'showp'])->name('showpo');

    Route::get('/createpo', [ShowController::class, 'create'])->name('create');

    Route::post('/createpost_data', [ShowController::class, 'store'])->name('createpost_data');
    Route::match(['PUT', 'POST'], '/update/{id}', [ShowController::class, 'update'])->name('update_post');


    Route::get('/update/{id}', [ShowController::class, 'edit'])->name('edit_post');

//    Route::put('/update/{id}', [ShowController::class, 'update'])->name('update_post');
    Route::put('/update/{userId}/{postId}', [ShowController::class, 'update'])->name('update_post');

    Route::delete('/deletepost/{post}', [ShowController::class, 'destroy'])->name('destroy_post');
});

Route::post('/createpost_data/{user}', [ShowController::class, 'store'])->name('store_post');
Route::put('/update/{id}', [FormsController::class, 'update'])->name('update');

















//Create a new route in Laravel that responds to a GET request and displays a simple "Hello, World!" message.   (done)
//
//Create a new view using Blade templating engine that displays a form with input fields for name and email.    (done)
//
//Implement form validation for the name and email fields in your form. Display appropriate error messages if the inputs are not valid.  (done)
//
//Create a controller that handles form submission. When the form is submitted, save the name and email to a database table using Eloquent ORM.  (done)
//
//Create a new route that displays a list of all the submitted form data from the database.  (done)
//
//Implement authentication in your application using Laravel's built-in authentication system. Create routes, views, and controllers for user registration, login, and logout.  (done)
//
//Create a middleware that checks if a user is authenticated before allowing access to certain routes. Apply this middleware to a route and test if it correctly restricts access for unauthenticated users.
//
//Implement a one-to-many relationship between two models in your application. For example, you can have a User model and a Post model, where a user can have multiple posts. Create routes and controllers to create and display the user's posts.
//
//Implement an API endpoint in Laravel that returns JSON data. Test the endpoint using a tool like Postman or cURL.


//Create a new route in Laravel that responds to a GET request and displays a simple "Hello, World!" message.   (done)
//
//Create a new view using Blade templating engine that displays a form with input fields for name and email.    (done)
//
//Implement form validation for the name and email fields in your form. Display appropriate error messages if the inputs are not valid.  (done)
//
//Create a controller that handles form submission. When the form is submitted, save the name and email to a database table using Eloquent ORM.  (done)
//
//Create a new route that displays a list of all the submitted form data from the database.  (done)
//
//Implement authentication in your application using Laravel's built-in authentication system. Create routes, views, and controllers for user registration, login, and logout.  (done)
//
//Create a middleware that checks if a user is authenticated before allowing access to certain routes. Apply this middleware to a route and test if it correctly restricts access for unauthenticated users.
//
//Implement a one-to-many relationship between two models in your application. For example, you can have a User model and a Post model, where a user can have multiple posts. Create routes and controllers to create and display the user's posts.
//
//Implement an API endpoint in Laravel that returns JSON data. Test the endpoint using a tool like Postman or cURL.
//
