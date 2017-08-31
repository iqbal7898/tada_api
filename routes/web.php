<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => '11',
        'redirect_uri' => 'http://localhost:8080/callback',
        'response_type' => 'code',
        'scope' => 'offline_access',
    ]);

    return redirect('http://localhost:8080/oauth/authorize?'.$query);
});

Route::get('/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://localhost:8080/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '11',
            'client_secret' => '0cF9B7SGHjKhNDKpRr4uXTK37EpF4MTVnW1EBXgd',
            'redirect_uri' => 'http://localhost:8080/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});

Route::get('/user/{user}', function (App\user $user) { 
    return $user->email;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Route::group(['prefix'=>'egift'],function(){
// 	Route::post('/listallgift', function()  {

// 		$body = [	
// 				    'aa'  => 'bb',
// 				    'cc' => 'dd'
// 		    	];
// 		return response($body, 200);
// 	});

// 	Route::post('/purchasenewgift', function() {
// 		$body = [	
// 				    'aa1'  => 'bb1',
// 				    'cc1' => 'dd1'
// 	    	];
// 		return response()->json([
// 		    'name' => 'Abigail',
// 		    'state' => 'CA'
// 		]);
// 	});
// });
Route::group(['middleware' => ['web']], function () {
	Route::group(['prefix'=>'egift'],function(){
		Route::post('/listallgift', [
			'uses' => 'Egift@listallgift',
			'as' => 'egift.listallgift'
			]);
		Route::post('/purchasenewgift', [
			'uses' => 'Egift@purchasenewgift',
			'as' => 'egift.purchasenewgift'
			]);
		 Route::get('/getdetailorder/{order_number}', [
			'uses' => 'Egift@getdetailorder',
			'as' => 'egift.getdetailorder'
			]);
	});
});