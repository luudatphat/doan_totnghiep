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

Route::get('/',[
	'as'=>'trang-chu',
	'uses'=>'MyController@getIndex'
]);
Route::group(['prefix' => 'loaisanpham'], function () {
	Route::get('',[
		'uses'=>'MyController@getIndex'
	]);
	Route::get('/{id}',[
		'as'=>'loaisanpham',
		'uses'=>'MyController@getloaisanpham'
		]);
	Route::get('/{id}/oderby',[
		'as'=>'loaisanpham',
		'uses'=>'MyController@getloaisanpham'
		]);
	
});
Route::group(['prefix' => 'hangsanpham'], function () {
	Route::get('',[
		'uses'=>'MyController@getIndex'
	]);
	Route::get('/{id}',[
		'as'=>'hangsanpham',
		'uses'=>'MyController@gethangsanpham'
		]);
});
Route::group(['prefix' => 'timkiem'], function(){
	Route::get('',[
	'as'=>'timkiem',
	'uses'=>'MyController@gettimkiem'
	]);
	Route::get('/{id}',[
	'as' => 'timkiemloai',
	'uses' => 'MyController@gettimkiemloai'
	]);
	
});
Route::group(['prefix' => 'loctimkiem'], function(){
	
	Route::get('/{id}',[
		'as'=>'loctimkiem',
		'uses'=>'MyController@getloctimkiem'
	]);
	
});
Route::get('loctimkiem',[
	'as'=>'loctimkiem',
	'uses'=>'MyController@getloctimkiem'
]);

// Đăng Ký 
Route::get('register',[
	'as'=>'register',
	'uses'=>'MyController@getRegister'
]);
Route::post('register',[
	'as'=>'register',
	'uses'=>'MyController@postRegister'
]);
// Đăng nhập
Route::get('login',[
	'as'=>'login',
	'uses'=>'MyController@getLogin'
]);
Route::post('login',[
	'as'=>'login',
	'uses'=>'MyController@postLogin'
]);
//Đăng Xuất
Route::get('logout',[
	'as'=>'logout',
	'uses'=>'MyController@getLogout'
]);
//Thông tin sửa đổi
Route::get('information',[
	'as'=>'information',
	'uses'=>'MyController@getInformation'
]);
Route::post('information',[
	'as'=>'information',
	'uses'=>'MyController@postInformation'
]);

Route::get('chitietsanpham/{id}',[
	'as' => 'chitietsanpham',
	'uses'=>'MyController@getchitietsanpham'
]);

// Gio hang
Route::get('giohang/{id}',[
		'as'=>'giohang',
		'uses'=>'MyController@getGiohang'
]);
// view gio hang
Route::get('viewgiohang',[

	'as'=>'viewgiohang',
	'uses'=>'MyController@getViewgoihang'
]);
// Xóa giỏ hàng
Route::get('deletecart/{id}',[
	'as'=>'deletecart',
	'uses'=>'MyController@getDeletecart'
]);
// Cập nhật giỏ hàng
Route::get('updatecart',[
	'as'=>'updatecart',
	'uses'=>'MyController@getUpdatecart'
]);
// view thanh toan 
Route::get('paycart/{id}',[
	'as'=>'paycart',
	'uses'=>'MyController@getPaycart'
]);
// Thanh toán giỏ hàng
Route::post('paycart',[
	'as'=>'paycart',
	'uses'=>'MyController@postPaycart'
]);
// xem hoa don cua nguoi dung 
Route::get('hoadon',[
	'as'=>'hoadon',
	'uses'=>'MyController@getHoadon'
]);
//Kênh người bán
Route::get('kenhnguoiban',[
	'as' => 'kenhnguoiban',
	'uses' => 'MyController@getkenhnguoiban'
]);
// Các đơn hàng
Route::get('donhang/{id}',[
	'as' => 'donhang',
	'uses' => 'MyController@getDonhang'
]);
// Xoa don hang
Route::get('deletedonhang/{id}',[
	'as' => 'deletedonhang',
	'uses' => 'MyController@getDeletedonhang'
]);
Route::get('deletedonhangchushop/{id}',[
	'as' => 'deletedonhangchushop',
	'uses' => 'MyController@getDeletedonhangchushop'
]);
// Cap nhat gio hang
Route::post('updatedonhang',[
	'as' => 'updatedonhang',
	'uses' => 'MyController@postUpdatedonhang'
]);
// View san pham don hang
Route::get('viewsanphamdonhang/{id}',[
	'as' => 'viewsanphamdonhang',
	'uses' => 'MyController@getViewsanphamdonhang'
]);
// View nguoi dat don hang
Route::get('viewnguoidatdonhang/{id}',[
	'as' => 'viewnguoidatdonhang',
	'uses' => 'MyController@getViewnguoidatdonhang'
]);
// Dang ban san pham dangbansanpham
Route::get('dangbansanpham',[
	'as' => 'dangbansanpham',
	'uses' => 'MyController@getDangbansanpham'
]);
//  xu ly dang san pham dien thoai laptop mypham
Route::post('dangbansanpham',[
	'as'=>'dangbansanpham',
	'uses'=>'MyController@postDangbansanpham'
]);
// tim kiem trong don hang
Route::get('timkiemdonhang',[
	'as'=>'timkiemdonhang',
	'uses'=>'MyController@getTimkiemdonhang'
]);
// xem sắp xếp tình trạng
Route::get('giaohangtinhtrang/{id}',[
	'as'=>'giaohangtinhtrang',
	'uses'=>'MyController@getGiaohangtinhtrang'
]);

// trang giới thiệu
Route::get('gioithieu',[
	'as'=>'gioithieu',
	'uses'=>'MyController@getGioithieu'
]);
//QUY DINH
Route::get('quydinh',[
	'as'=>'quydinh',
	'uses'=>'MyController@getQuydinh'
]);

//Danh sách sản phẩm của ng bán
Route::get('danhsachsp/{id}',[
	'as' => 'danhsachsp',
	'uses' => 'MyController@getdanhsachsp'
]);
Route::get('danhsachspcd/{id}',[
	'as' => 'danhsachsp',
	'uses' => 'MyController@getdanhsachspcd'
]);
Route::get('xoasp/{id}',[
	'as' => 'xoasp',
	'uses' => 'MyController@getxoasp'
]);

Route::get('suasp/{id}',[
	'as' => 'suasp',
	'uses' => 'MyController@getsuasp'
]);

Route::post('update/{id}',[
	'as' => 'updatesp',
	'uses' => 'MyController@getupdate'
]);

Route::get('lienhe',[
	'as' => 'lienhe',
	'uses' => 'MyController@getlienhe'
]);
// ADMIN
Route::get('/loginadmin',[
	'as'=>'loginadmin',
	'uses'=>'MyController@getLoginadmin'
]);
Route::post('/loginadmin',[
	'as'=>'loginadmin',
	'uses'=>'MyController@postLoginadmin'
]);
Route::get('/indexAdmin',[
	'as'=>'indexAdmin',
	'uses'=>'MyController@getIndexAdmin'
]);
// logout admin
Route::get('logoutadmin',[
	'as'=>'logoutadmin',
	'uses'=>'MyController@getLogoutAdmin'
]);
//update đơn hàng
Route::post('updatehoadonAdmin',[
	'as'=>'updatehoadonAdmin',
	'uses'=>'MyController@postUpdatehoadonAdmin'
]);
//deletehoadonAdmin
Route::get('deletehoadonAdmin/{id}',[
	'as'=>'deletehoadonAdmin',
	'uses'=>'MyController@getDeletehoadonAdmin'
]);
//indexsanphamAdmin
Route::get('indexsanphamAdmin',[
	'as'=>'indexsanphamAdmin',
	'uses'=>'MyController@getIndexsanphamAdmin'
]);
Route::get('thongke/{id}',[
	'as' => 'thongke',
	'uses' => 'MyController@getthongke'
]);
Route::post('doanhthu/{id}',[
	'as' => 'doanhthu',
	'uses' => 'MyController@getdoanhthu'
]);
Route::get('duyetsp/{id}',[
	'as' =>'duyetsp',
	'uses' => 'MyController@getduyetsp'
]);
// Đon đặt hàng Information
Route::get('dondathanginformation/{id}',[
	'as' =>'dondathanginformation',
	'uses' => 'MyController@getDondathanginformation'
]);
// Ten nguoi dat Information
Route::get('tennguoidatinformation/{id}',[
	'as' =>'tennguoidatinformation',
	'uses' => 'MyController@getTennguoidatinformation'
]);
//Admin quản lý user quanlyuseradmmin
Route::get('quanlyuseradmin',[
	'as' =>'quanlyuseradmin',
	'uses' => 'MyController@getQuanlyuseradmin'
]);
// tìm kiếm quanlyuseradmmin
Route::get('timkiemuseradmin',[
	'as' =>'timkiemuseradmin',
	'uses' => 'MyController@getTimkiemuseradmin'
]);
// danh mục admin danhmucadmin
Route::get('danhmucadmin',[
	'as' =>'danhmucadmin',
	'uses' => 'MyController@getDanhmucadmin'
]);
//Them danh muc admin themdanhmucadmin
Route::post('danhmucadmin',[
	'as' =>'danhmucadmin',
	'uses' => 'MyController@postDanhmucadmin'
]);
// sửa danh muc admin Editdanhmucadmin
Route::get('Editdanhmucadmin/{id}',[
	'as' =>'Editdanhmucadmin',
	'uses' => 'MyController@getEditdanhmucadmin'
]);
Route::post('Editdanhmucadmin',[
	'as' =>'Editdanhmucadmin',
	'uses' => 'MyController@postEditdanhmucadmin'
]);
// xóa danh muc Deletedanhmucadmin
Route::get('Deletedanhmucadmin/{id}',[
	'as' =>'Deletedanhmucadmin',
	'uses' => 'MyController@getDeletedanhmucadmin'
]);
//

Route::get('xoaspad/{id}',[
	'as' => 'xoaspad',
	'uses' => 'MyController@getxoaspad'
]);
Route::get('thongkead',[
	'as' => 'thongkead',
	'uses' => 'MyController@getthongkead'
]);
Route::post('doanhthuad',[
	'as' => 'doanhthu',
	'uses' => 'MyController@getdoanhthuad'
]);
Route::get('chitiethoadonad/{id}',[
	'as' => 'chitiethoadonad',
	'uses' => 'MyController@getchitiethoadonad'
]);

//đổi mặt khẩu người dùng 
Route::get('doimkinformatiom',[
	'as' => 'doimkinformatiom',
	'uses' => 'MyController@Getdoimkinformatiom'
]);
Route::post('doimkinformatiom',[
	'as' => 'doimkinformatiom',
	'uses' => 'MyController@Postdoimkinformatiom'
]);
// Bình luận
Route::post('binhluan',[
	'as' => 'binhluan',
	'uses' => 'MyController@Postbinhluan'
]);
// Đánh giá trong admin
Route::get('danhgiaAdmin',[
	'as' => 'danhgiaAdmin',
	'uses' => 'MyController@GetdanhgiaAdmin'
]);
Route::get('DeletedanhgiaAdmin/{id}',[
	'as' => 'DeletedanhgiaAdmin',
	'uses' => 'MyController@getDeletedanhgiaAdmin'
]);
Route::get('bigsale',[
	'as' => 'bigsale',
	'uses' => 'MyController@getbigsale'
]);
Route::get('duyettatca',[
	'as' => 'duyettatca',
	'uses' => 'MyController@getduyettatca'
]);
Route::get('chitietspad/{id}',[
	'as' => 'chitietspad',
	'uses' => 'MyController@getchitietspad'
]);
Route::get('sanphamshop/{id}',[
	'as' => 'sanphamshop',
	'uses' => 'MyController@getsanphamshop'
]);
Route::get('dangkyshop',[
	'as' => 'dangkyshop',
	'uses' => 'MyController@getdangkyshop'
]);
Route::post('dangkyshop',[
	'as' => 'dangkyshop',
	'uses' => 'MyController@postdangkyshop'
]);
Route::get('duyettv/{id}',[
	'as' => 'duyettv',
	'uses' => 'MyController@getduyettv'
]);
Route::get('xoatv/{id}',[
	'as' => 'xoatv',
	'uses' => 'MyController@getxoatv'
]);
Route::get('chitiettv/{id}',[
	'as' => 'chitiettv',
	'uses' => 'MyController@getchitiettv'
]);
//view mật khẩu
Route::get('quenmatkhau',[
	'as' => 'quenmatkhau',
	'uses' => 'MyController@getQuenmatkhau'
]);
Route::post('quenmatkhau',[
	'as' => 'quenmatkhau',
	'uses' => 'MyController@postQuenmatkhau'
]);
//laylaimatkhau
Route::get('laylaimatkhau/{id}',[
	'as' => 'laylaimatkhau',
	'uses' => 'MyController@getLaylaimatkhau'
]);
Route::post('laylai-matkhau',[
	'as' => 'laylai-matkhau',
	'uses' => 'MyController@postLaylaimatkhau'
]);
//google
Route::get('google',[
	'as' => 'google',
	'uses' => 'MyController@redirectrgoogle'
]);
Route::get('google/callback',[
	'as' => 'google/callback',
	'uses' => 'MyController@Callbackgoogle'
]);