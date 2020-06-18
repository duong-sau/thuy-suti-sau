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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get("index",['as'=>'trang-chu','uses'=>'PageController@getIndex']);
Route::get("/",['as'=>'trang-chu','uses'=>'PageController@getIndex']);
Route::post("/",['as'=>'trang-chu','uses'=>'PageController@getIndex']);
Route::get("loaisanpham/{type}",['as'=>'loai-san-pham','uses'=>'PageController@getloaisp']);

Route::get("chitietsanpham/{id}",['as'=>'chi-tiet-san-pham','uses'=>'PageController@getchitiet']);
Route::post("chitietsanpham/{id}",['as'=>'chi-tiet-san-pham','uses'=>'PageController@postbinhluan']);

Route::get("login",['as'=>'dang-nhap','uses'=>'PageController@getdangnhap']);
Route::post("login",['as'=>'dang-nhap','uses'=>'PageController@postdangnhap']);

Route::get('dang-xuat',['as'=>'logout','uses'=>'PageController@postLogout']);

Route::get("search",['as'=>'search','uses'=>'PageController@getSearch']);


//gio hang
Route::group(['prefix'=>'cart'],function(){
	Route::get('add/{id}','ShoppingCartController@getAddCart');
	Route::get('show','ShoppingCartController@getShowCart');
	Route::get('delete/{id}','ShoppingCartController@getDeleteCart');
	Route::get('update','ShoppingCartController@getUpdateCart');
	Route::post('show','ShoppingCartController@postCompleted')->name('sendmail');
});
Route::get('complete','ShoppingCartController@getComplete');




//quan li khach hang
Route::get("khachhang",['as'=>'ds-kh','uses'=>'KhachHangController@getds_kh']);


//quan li user
Route::get("dangky",['as'=>'dang-ky','uses'=>'PageController@getdangky']);
Route::post("dangky",['as'=>'dang-ky','uses'=>'PageController@postdangky']);

Route::get("taikhoan",['as'=>'ds-tk','uses'=>'UsersController@getds_tk']);

// Route::post("suatk/{id}",[
// 	'as'=>'post-sua-tk',
// 	'uses'=>'UsersController@postSua'
// ]);

//quan li nhan vien



//quan li hoa don ban
Route::get("hoadon_ban",['as'=>'ds-hd-ban','uses'=>'BillBanController@getds_hd']);

Route::get("chitiet_ban/{id}",'BillBanController@getct_hd');

Route::get("duyet/{id}",'BillBanController@duyet');

//pdf
