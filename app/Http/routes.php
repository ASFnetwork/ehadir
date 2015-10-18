<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Basic routing, ver can be use ( GET, POST, PUT/PATCH, DELETE)
//Route::get('test', 'TestController@index');
//Route::get('attendance', 'AttendanceController@index');
//Route::get('planner', 'PlannerController@index');
//Route::get('laporan', 'LaporanController@attendance');
Route::get('myauth/login', 'CustomAuth@getLogin');   
Route::post('myauth/login', 'CustomAuth@postLogin');  


//$user = User::where('email', Input::get('email'))->first();
//
//if( $user && $user->password == md5(Input::get('password')) )
//{
//    Auth::login($user); /// will log the user in for you
//
//    return Redirect::intended('dashboard');
//}
//else
//{
//   /// User not found or wrong password
//}


// Convert MD5 to bycrypt password - more secure, kena tambah sizs field
//$user = User::where('username', '=', Input::get('username'))->first();
//
//if(isset($user)) {
//    if($user->password == md5(Input::get('password'))) { // If their password is still MD5
//        $user->password = Hash::make(Input::get('password')); // Convert to new format
//        $user->save();
//        Auth::login(Input::get('username'));
//    }
//}



    if (Auth::check()) {
        echo "I'm logged in as " . Auth::user()->user_username . "<br />";
        echo "<a href='/logout'>Log out</a>";
		//$user=User::where('userid','=',Auth::user()->userid)->first();
        //Session::put('user',$user->Username);
        Session::put('user',Auth::user()->user_username);
        return redirect()->intended('/');

    } else {

//        echo "I'm NOT logged in<br />";
//        var_dump($_GET);
//        return redirect('/myauth/login');

//        return redirect()->route('myauth/login');
//        return view('home.index');
//        return redirect('myauth/login');
//        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/myauth/login';
//        die('cccccccccccccccccccc');
        echo "I'm NOT logged in<br />";


//        $user = User::where('user_username', '=', Input::get('username'))->first();
        $user =     App\Models\Staff::where('user_username', '=', 'rozilla')->first();

        if(isset($user)) {
//            if($user->password == md5(Input::get('password'))) { // If their password is still MD5
            if($user->user_pwd == md5('admin123')) { // If their password is still MD5
//                $user->password = Hash::make(Input::get('password')); // Convert to new format
                $user->user_pwd = Hash::make('admin123'); // Convert to new format
                $user->save();
//                Auth::login($user->user_username);
                Auth::attempt(array(
                    'user_username' => $user->user_username,
                    'password'  => $user->user_pwd
                ));
            } else {

                Auth::attempt(array(
                    'user_username' => $user->user_username,
                    'password'  => 'admin123'
                ));
            }
        }

//die(var_dump($user));
        //Auth::attempt(array(
        //    'user_username' => 'adabi',
        //    'password'  => 'hardpass'
        //));

            //'user_username' => 'rozilla',
            //'password'  => 'admin123'
            //'user_pwd'  => 'hardpass',

        if (Auth::check()) {
            echo "Now I'm logged in as " . Auth::user()->user_username . "<br />";
            echo "<a href='/myauth/logout'>Log out</a>";
			//$user=User::where('userid','=',Auth::user()->userid)->first();
	        //Session::put('user',$user->Username);
	        Session::put('user',Auth::user()->user_username);
        } else {
            echo "I'm still NOT logged in<br />";
        }
  

    Route::group(['middleware' => 'auth'], function () {
        // Controller routing
        // login url http://www.example.com/account/login
        // logout url http://www.example.com/account/logout
        // registration url http://www.example.com/account/register
        Route::controllers([
            'attendance' => 'AttendanceController',
            'planner' => 'PlannerController',
            'laporan' => 'LaporanController',
        ]);

        //A restful controller follows the standard blueprint for 
        //  a restful resource, which mainly consists of: 
        //VERB/Method   URI               Name            Action  
        //================================================================
        // GET|HEAD   staffs            staffs.index     App\Http\Controllers\StaffController@index   
        // GET|HEAD   staffs/create     staffs.create    App\Http\Controllers\StaffController@create  
        // POST       staffs            staffs.store     App\Http\Controllers\StaffController@store   
        // GET|HEAD   staffs/{id}       staffs.show      App\Http\Controllers\StaffController@show    
        // GET|HEAD   staffs/{id}/edit  staffs.edit      App\Http\Controllers\StaffController@edit    
        // PUT        staffs/{id}       staffs.update    App\Http\Controllers\StaffController@update  
        // PATCH      staffs/{id}                        App\Http\Controllers\StaffController@update  
        // DELETE     staffs/{id}       staffs.destroy   App\Http\Controllers\StaffController@destroy     

        Route::resource('staffs','StaffController');

        Route::get('myauth/logout', 'CustomAuth@postLogin');  


    });

// Basic routing
// Route without controller & model - direct return view
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return redirect('/attendance');
});


// Basic routing
// Route without controller & model - direct return view
Route::get('index', function () {
		$grid = array();
		return view('home.index', ['grid' => $grid]);
});

// Basic routing
// Route without controller & model - direct return view
Route::get('dashboard', function () {
		$grid = array();
		return view('home.dashboard', ['grid' => $grid]);
});













//----- DATA GRID EXMAPLE -------------//
/*Route::get(‘dashboard’, function () {
require_once(public_path() .”/phpGrid/conf.php”);

$dg = new C_DataGrid(“SELECT * FROM orders”, “orderNumber”, “orders”);
$dg->enable_edit(“INLINE”, “CRUD”);
$dg->enable_autowidth(true)->enable_autoheight(true);
$dg->set_theme(‘cobalt-flat’);
$dg->display(false);

$grid = $dg -> get_display(true); // do not include required javascript libraries until later with with display_script_includeonce method.
return view(‘dashboard’, [‘grid’ => $grid]);
});
*/
//----- End of DATA GRID EXMAPLE -------------//



//----- ROUTING EXAMPLE -------------//
// Example 1
// login url http://www.example.com/account/login
// logout url http://www.example.com/account/logout
// registration url http://www.example.com/account/register
/*
Route::controllers([
    'account' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
 
// Example 2
// login url http://www.example.com/login
// logout url http://www.example.com/logout
// registration url http://www.example.com/register
Route::controllers([
    '' => 'Auth\AuthController', 
    'password' => 'Auth\PasswordController',
]);
 
// Example 3
// redefine all routes
Route::get('example/register', 'Auth\AuthController@getRegister');
Route::post('example/register', 'Auth\AuthController@postRegister');
Route::get('example/login', 'Auth\AuthController@getLogin');
Route::post('example/login', 'Auth\AuthController@postLogin');
Route::get('example/logout', 'Auth\AuthController@getLogout');
Route::get('example/email', 'Auth\PasswordController@getEmail');
Route::post('example/email', 'Auth\PasswordController@postEmail');
Route::get('example/reset/{code}', 'Auth\PasswordController@getReset');
Route::post('example/reset', 'Auth\PasswordController@postReset');
//----- END OF ROUTING EXAMPLE -------------//
*/

//----- LOGIN & AUTHENTICATION TEST -------------//
/*Route::get('/', function () {

    if (Auth::check()) {
        echo "I'm logged in as " . Auth::user()->user_username . "<br />";
        echo "<a href='/logout'>Log out</a>";
    } else {
        echo "I'm NOT logged in<br />";


        Auth::attempt(array(
            'user_username' => 'adabi',
            'password'  => 'hardpass'
        ));
            //'user_pwd'  => 'hardpass',

        if (Auth::check()) {
            echo "Now I'm logged in as " . Auth::user()->user_username . "<br />";
            echo "<a href='/logout'>Log out</a>";
        } else {
            echo "I'm still NOT logged in<br />";
        }
    }


});


Route::get('/logout', function () {
    Auth::logout();
    return "You have been logged out";
});


Route::get('/db', function () {

//    if (!Schema::hasTable('users')) {
//    if (!Schema::hasTable('user')) {
    if (!Schema::hasTable('myuser')) {
        Schema::create('myuser', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('user_username', 60)->unique();
            $table->string('user_pwd', 256);
            $table->rememberToken();
            $table->timestamps();
        });
    }

//        DB::table('users')->insert(
//        DB::table('user')->insert(
        DB::table('myuser')->insert(
            [
                [
//                    'user_name' => 'adabi',
//                    'passwd'    => Hash::make('hardpass'),
                    'user_username' => 'adabi',
                    'user_pwd'    => Hash::make('hardpass'),
                    
                ]
            ]
        );
    echo "User has been created";

    echo "Table user has been created";
});
*/
//----- END OF LOGIN & AUTHENTICATION TEST -------------//


  }
define('ADMIN_PAGINATION', 50);
define('SESSION_TIMEZONE', 'Asia/Kuala_Lumpur');


