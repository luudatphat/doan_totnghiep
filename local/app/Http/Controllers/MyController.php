<?php
namespace App\Http\Controllers;
use DB , Mail;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Cart ;
use App\Models\Sanpham;
use App\Models\Hoadon;
use App\Models\Chitiethoadon;
use App\Models\Thongso;
use App\Models\Tsdienthoai;
use App\Models\Tslaptop;
use App\Models\Tsmypham;
use App\Models\Hinhanh;
use App\Models\Hang;
use App\Models\Nguoidung;
use App\Models\loai;
use App\Models\Binhluan;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Socialite;
class MyController extends Controller
{
    public function getIndex()
    {

        // $data['khuyenmai'] = Sanpham::where('khuyenmai','>',0)->where('trangthai',1)->where('duyet',1)->inRandomOrder()->limit(3)->get();
        // $data['sanpham'] = Sanpham::where('trangthai',1)->where('duyet',1)->orderBy('soluongmua', 'desc')->limit(10)->get();
    	return view('page.trangchu');
    }
    public function getloaisanpham($id)
    {
        $soluong = Sanpham::where('idloai',$id);
        $sanpham = Sanpham::where('idloai',$id)->where('trangthai',1)->where('duyet',1)->orderBy('gia')->paginate(9);
    	// $sanpham = DB::table('sanpham')->select('id','idloai','ten','gia','avatar')->where('idloai',$id)->get();
    	return view('page.loaisanpham',compact('sanpham','soluong','id'));
    }
    public function gethangsanpham($id)
    {
        $soluong = Sanpham::where('idhang',$id);
    	$sanpham = Sanpham::where('idhang',$id)->where('trangthai',1)->where('duyet',1)->orderBy('gia')->paginate(9);
    	return view('page.loaisanpham',compact('sanpham','soluong'));
    }
    public function getchitietsanpham($id)
    {
         $data['binhluan'] = Binhluan::where('idsanpham',$id)->get();
        $sanpham = DB::table('sanpham')->where('id',$id)->where('trangthai',1)->where('duyet',1)->get();
       if(count($sanpham)>0)
        {
            foreach($sanpham as $sp)
            {
                $loai = $sp->idloai;
            }
            $sanphamcl = Sanpham::where('idloai',$loai)->inRandomOrder()->where('trangthai',1)->where('duyet',1)->limit(3)->get();
            return view('page.chitietsanpham',compact('sanpham','sanphamcl'),$data);
        }
        return view('page.chitietsanpham');
    }
    public function gettimkiem(Request $req)
    {
    	if(isset($req->key))
            $req->key = $req->key;
        else
            $req->key = '';
        $soluong = Sanpham::where('ten','like','%'.$req->key.'%')->where('trangthai',1)->where('duyet',1);
        $ten = Sanpham::where('ten','like','%'.$req->key.'%')->where('trangthai',1)->where('duyet',1)->paginate(9);
        $ma = Sanpham::where('ma','like',$req->key)->where('trangthai',1)->where('duyet',1)->first();
        $loai = DB::table('loai')->select('loai.id','loai.ten')->DISTINCT()->join('sanpham','loai.id','=','sanpham.idloai')->where('sanpham.ten','like','%'.$req->key.'%')->where('sanpham.trangthai',1)->where('sanpham.duyet',1)->get();
        $shop = DB::table('nguoidung')->where('tenshop','like','%'.$req->key.'%')->get();
        return view('page.timkiem',compact('ten','shop','loai','soluong','ma'));


    }
    public function gettimkiemloai(Request $req , $id)
    {
    	if(isset($req->key))
    		$name = $req->key;
    	else
            $name = '';
    	$loai = DB::table('loai')->select('id','ten')->where('id',$id)->get();
        $ten = Sanpham::where('ten','like','%'.$name.'%')->where('trangthai',1)->where('duyet',1)->where('idloai',$id)->orderBy('gia')->paginate(9);
    	return view('page.loctimkiem',compact('ten','loai'));
    }

    public function getloctimkiem(Request $req , $id){
        
        if(isset($req->key))
    		$ten = $req->key;
    	else
    		$ten = '';
        if(isset($req->giamin))
    		$giamin = $req->giamin ;
    	else
            $giamin = 0;
        if(isset($req->giamax))
    		$giamax = $req->giamax;
    	else
            $giamax = 99999999999;
        $ten = Sanpham::where('ten','like','%'.$ten.'%')->where('idloai',$id)->where('trangthai',1)->where('duyet',1)->where('gia','>=',$giamin)->where('gia','<=',$giamax)->orderBy('gia')->paginate(9);

        return view('page.loctimkiem',compact('ten'));
    }
     //hàm đăng ký 
    
    public function getRegister()
    {
         if(Auth::check())
        {
            return view('page.trangchu');
        }
        else
        {
        return view('page.register');
         }
    }
    public function postRegister(Request $request)
    {

        $pattern = '/^[A-Za-z0-9]{3,30}$/';
        $pattern1 = '/^([^\!@#$%^&*()_]+){1,31}$/';
        $pattern2 = '/^[0]\d{8,9}$/';
        $subject = $request->username;
        $subject1=$request->ten;
        $subject2 = $request->sdt;
        $errousername=[
            'username'=>'Chỉ được nhập tên không dấu , không có dấu cách , Có thể chứa số và chữ In hoa',];
            $erroten=['ten'=>'Không được viết kí hiệu đặc biệt',];
            $errosdt=[ 'sdt'=>'Số bắt đầu bằng 0 và chỉ được 10 số',];     
            $rules=[
                'email'=>'required|unique:nguoidung,email|email',
                'password'=>'required_with:password_confirm|same:password_confirm|min:3|max:20', 
                'password_confirm'=>'between:3,20', 
                'username'=>'required|unique:nguoidung,username|min:5|max:50',
                'sdt'=>'required|digits_between:9,10|unique:nguoidung,sdt',
                'ten'=>'required|min:5|max:20',
                'myFile'=>'required|image',
        ];
        $messages=[
            'email.required'=>'Vui lòng nhập email',
            'email.unique'=>'Vui lòng nhập Email khác , vì bị trùng Email',
            'email.email'=>'Không đúng định dạng email',
            'password.required_with'=>'Vui lòng nhập mật khẩu với mật khẩu xác nhận',
            'password.same'=>'Mật khẩu với mật khẩu xác nhận không trùng nhau',
            'password.min'=>'Mật khẩu ít nhất 3 ký tự',
            'password.max'=>'Mật khẩu chỉ tối đa 20 ký tự',
            'password_confirm.between'=>'Mật khẩu xác nhận từ 3 đến 20 ký tự',
            'username.required'=>'Vui lòng nhập họ tên',
            'username.unique'=>'Vui lòng nhập Tên đăng nhập khác , vì bị trùng tên đăng nhập',
            'username.min'=>'Tên đăng nhập ít nhất 5 kí tự',
            'username.max'=>'Tên đăng nhập tối đa 50 kí tự',
            'sdt.required'=>'Vui lòng nhập số điện thoại',
            'sdt.digits_between'=>'Phải là 10 số ',
            'sdt.unique'=>'Số điện thoại này đã được sử dụng',
            'ten.required'=>'Vui lòng nhập tên',
            'ten.min'=>'Họ và tên ít nhất 5 kí tự',
            'ten.max'=>'Họ và tên ít nhất 20 kí tự',
            'myFile.required'=>'Vui lòng chọn hình .',
            'myFile.image'=>'Không đúng định dạng .' ,                   
        ];
        $validator =  Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){ 
        return redirect()->back()->withErrors($validator)->withInput($request->all());

        }else{

                if (preg_match($pattern, $subject)==false) {
                    return redirect()->back()->withErrors($errousername)->withInput();
                }elseif (preg_match($pattern1, $subject1)==false) {
                    return redirect()->back()->withErrors($erroten)->withInput();
                }
                elseif (preg_match($pattern2, $subject2)==false) {
                    return redirect()->back()->withErrors($errosdt)->withInput();
                }
                else{
                                  if($request->hasFile('myFile'))
                                  {
                                        $file = $request->file('myFile');
                                        $filename = $request->username.'_'.$file->getClientOriginalName('myFile');
                                        $file->move('images/user',$filename);
                                  }
                                $a = DB::table('nguoidung')->select('tenshop')->where('tenshop',$request->username)->get();
                                  if(count($a)>0)
                                  {
                                         $nguoidung = [
                                        'username'=>$request->username,
                                        'password'=>bcrypt($request->password),
                                        'ten'=>$request->ten,
                                        'sdt'=>$request->sdt,
                                        'email'=>$request->email,
                                        'tenshop'=>$request->username.rand(),
                                        'avatar'=>$filename ,
                                        ];             
                                        DB::table('nguoidung')->insert($nguoidung); 
                                 }
                                else
                                {
                                       $nguoidung = [
                                        'username'=>$request->username,
                                        'password'=>bcrypt($request->password),
                                        'ten'=>$request->ten,
                                        'sdt'=>$request->sdt,
                                        'email'=>$request->email,
                                        'tenshop'=>$request->username,
                                        'avatar'=>$filename ,
                                         ];             
                                        DB::table('nguoidung')->insert($nguoidung); 
                               }

                               $data['nguoidung'] = $request->all();
                               $email = $request->email;
                    
                               Mail::send('page.emaildangky', $data,function($msg) use ($email) {
                                $msg->from('datphat23101997@gmail.com','Lưu đat phát');
                                $msg->to($email,$email);
                                $msg->subject('Đăng ký thành viên TIPE');
                                 });

                                    
                            return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
                     }
            }
    }
    // Hàm đăng nhập
    public function getLogin()
    {
        if(Auth::check())
        {
            return view('page.trangchu');
        }
        else
        {
        return view('page.login');
         }
    }
    public function postLogin(Request $request)
    {
       
        $rules=[
            'username'=>'required|min:5|max:50',
            'password'=>'required|min:3|max:20',
        ];
        $messages=[
            'username.required'=>' Vui lòng nhập Tên đăng nhập',
            'username.min'=>'Tên đăng nhập ít nhất 5 kí tự',
            'username.max'=>'Tên đăng nhập tối đa 50 kí tự',
            'password.required'=>'vui lòng nhập password',
            'password.min'=>'password dài 3 kí tự',
            'password.max'=>'password không dài hơn 20 kí tự',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        else
        {
            if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password]))
            {
                return redirect()->intended('/');
            }
            else
            {
               return redirect()->back()->with('err','Email hoặc password chưa đúng');
            }
        }
    }
    // hàm Đăng xuất
    public function getLogout()
    {
        Auth::logout();
        Cart::destroy();
        return redirect()->intended('/');

    }
    // Hàm thông tin khách hàng
    public function getInformation()
    {
        return view('page.information');
    }
    public function postInformation(Request $request)
    {
        $rules=[
            'email'=>'required|email',
            'username'=>'required|min:5|max:50',
            'sdt'=>'required|digits_between:9,10|regex:/^[0]\d{8,9}$/',
             'ten'=>'required|min:5|max:20|regex:/^([^\!@#$%^&*()_]+){1,31}$/',
             'tenshop'=>'required|min:5|max:50',
              'myFile'=>'image',
            
        ];
        $messages=[
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'username.required'=>'Vui lòng nhập họ tên',
            'username.unique'=>'Vui lòng nhập Tên đăng nhập khác , vì bị trùng tên đăng nhập',
            'username.min'=>'Tên đăng nhập ít nhất 5 kí tự',
            'username.max'=>'Tên đăng nhập tối đa 50 kí tự',
            'sdt.required'=>'Vui lòng nhập số điện thoại',
           'sdt.digits_between'=>'Phải là 10 số ',
           'sdt.regex'=>'Số đầu là 0',
            'ten.required'=>'Vui lòng nhập tên',
            'ten.min'=>'Họ và tên ít nhất 5 kí tự',
            'ten.max'=>'Họ và tên ít nhất 20 kí tự', 
            'ten.regex'=>' không được viết kí hiệu đặc biệt',
            'tenshop.required'=>'Vui lòng nhập tên Shop',
            'tenshop.min'=>'Tên Shop ít nhất 5 kí tự',
            'tenshop.max'=>'Tên Shop tối đa 50 kí tự',
            'myFile.image'=>'Không đúng định dạng .' ,                   
                    
        ];
          $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        else
            {
                $tenshop = Auth::user()->tenshop; 
                $avatar = Auth::user()->avatar;
                $sdt = Auth::user()->sdt;
                $kiemtratenshop = DB::table('nguoidung')->where('tenshop',$request->tenshop)->get();
                $kiemtrasdt = DB::table('nguoidung')->where('sdt',$request->sdt)->get();
           
                if($request->hasFile('myFile'))
                {
                    $file = $request->file('myFile');
                                              
                    $filename = $request->username.'_'.$file->getClientOriginalName('myFile');

                   
                    $exitavatar = 'images/user/'.$avatar;

                    if(file_exists($exitavatar))
                    {
                        unlink('images/user/'.$avatar);
                      
                    }               
                     $file->move('images/user',$filename);  
                    $username= Auth::user()->username;
                     $array = [ 'avatar'=>$filename , ];
                     DB::table('nguoidung') ->where('username', $username)->update($array);


                }  

                if(count($kiemtrasdt)>0)
                {
                    if($sdt!=$request->sdt)
                    {
                         return redirect()->back()->with('erro','Trùng SDT  , vui lòng chọn SDT khác'); 
                    }

                } 
                else
                {
                    $username= Auth::user()->username;
                    $array = [
                        'sdt'=>$request->sdt,
                    ];
                    DB::table('nguoidung') ->where('username', $username)->update($array);
                }                

                if(count($kiemtratenshop)>0)
                {
                        if($tenshop==$request->tenshop)
                        {
                            
                            $username= Auth::user()->username;
                            $array = [
                                'ten'=>$request->ten,
                                // 'sdt'=>$request->sdt,
                                'tenshop'=>$request->tenshop,                               
                            ];
                            DB::table('nguoidung') ->where('username', $username)->update($array);
                            // return redirect()->back()->with('thanhcong','update thanh cong');
                        }
                        else
                        {
                            return redirect()->back()->with('erro','Trùng tên shop , vui lòng chọn tên khác'); 
                        }
                }
                else
                {
                    $username= Auth::user()->username;
                    $array = [                                 
                        'ten'=>$request->ten,
                        // 'sdt'=>$request->sdt,                                      
                        'tenshop'=>$request->tenshop,                       
                    ];
                        DB::table('nguoidung') ->where('username', $username)->update($array);
                        // return redirect()->back()->with('thanhcong','update thanh cong');
                }  
                return redirect()->back()->with('thanhcong','update thanh cong');            
             }
    }
    //Lấy gio hàng
    public function getGiohang($id)
    {
        $kiemtra = Sanpham::where('id',$id)->where('duyet',1)->where('trangthai',1)->first();
        if($kiemtra)
        {
            $product = Sanpham::find($id);
            $giasp = $product->gia;

            if( $giasp>20000000)
            {
                $thue = $giasp*0.0045;
            }
            elseif( 10000000<$giasp && $giasp <= 20000000)
            {
                $thue = $giasp*0.0043;
            }
            elseif( 5000000<$giasp && $giasp<=10000000)
            {
                $thue = $giasp*0.004;
            }
            else
            {
               $thue = $giasp*0.003;
           }

            if(Auth::check())
            {
                if($product->khuyenmai>0)
                {
                    Cart::add(['id' => $id, 'name' => $product->ten, 'qty' => 1, 'price' => $product->giakm, 'weight' =>0,  'options' => ['img' => $product->avatar,'idnguoidung'=>$product->idnguoidung ,'masanpham'=> $product->ma,'thue'=>$thue,'pricechuakm'=>$product->gia,'khuyenmai'=>$product->khuyenmai,'ship'=>30000]]);
                }
                else
                {
                    Cart::add(['id' => $id, 'name' => $product->ten, 'qty' => 1, 'price' => $product->gia,  'weight' =>0, 'options' => ['img' => $product->avatar,'idnguoidung'=>$product->idnguoidung ,'masanpham'=> $product->ma,'thue'=>$thue,'pricechuakm'=>$product->gia,'khuyenmai'=>$product->khuyenmai,'ship'=>30000]]);
                }

             

              return redirect()->route('viewgiohang');         
            }
             else
            {
                 return view('page.login');
            }     
    }
        else
        {
            return redirect()->intended('/');
        }
    }
    //Hiện thị giỏ hàng
    public function getViewgoihang()
    {
            if(Auth::check())
            {  
                    if(Cart::count()>=1)
                    {

                       $cart = Cart::content();
                       foreach($cart as $value)
                       {
                        $ship[] =  $value->options->ship;
                        }
                    $congtongship = array_sum($ship);
                    $data['congtongship'] =$congtongship;
                }

                $data['subtotal'] = Cart::subtotal();
                $data['items'] = Cart::content();

                return view('page.cart',$data);

            }
            else
            {
                return view('page.login');
            }   
    }
    //Xóa giỏ hàng
    public function getDeletecart($id)
    {
        if($id=='all')
        {
            Cart::destroy();
        }
        else
        {
             Cart::remove($id);
        }
        return back();
    }
    // Cập nhật giỏ hàng
    public function getUpdatecart(Request $request)
    {
        Cart::update($request->rowId,$request->qty);
    }
    // View thanh toan
       public function getPaycart($id)
    {

             $a = Auth::user()->id;
             $data['iop'] = Hoadon::where('idnguoidung',$a)->latest()->take(1)->get();
              $data['cart'] = Cart::content();
              $data['total'] = Cart::total();
              $data['subtotal'] = Cart::subtotal();
              if(Cart::count()>=1)
              { 
                 $cart = Cart::content();
                 foreach($cart as $value)
                 {
                    $tongthue[] = $value->options->thue*$value->qty;
                    $ship[] =  $value->options->ship;
                }

                $congtongthue = array_sum($tongthue);
                $congtongship = array_sum($ship);

                $data['congtongthue'] =$congtongthue;
                $data['congtongship'] = $congtongship;
                $data['hinhthucgiao'] = $id;
                 Cart::destroy();
                 return view('page.pay',$data);
             }
             else
             {
               return redirect()->intended('/');
            }

    }
    //Thanh toán giỏ hàng
    public function postPaycart(Request $request)
    {
    
         $rules=[
            'email'=>'required|email',
            'sdt'=>'required|digits_between:9,10|regex:/^[0]\d{8,9}$/',
             'ten'=>'required|min:5|max:20|regex:/^([^\!@#$%^&*()_]+){1,31}$/',
             'sonha'=>'required|between:1,20|regex:/^\d([^!@#$%^&*()_]+){0,31}$/',
             'tenduong'=>'required|between:6,100|regex:/^Đường([^\!@#$%^&*()_]+){1,31}$/',
             'phuong'=>'required|between:7,100|regex:/^Phường([^\!@#$%^&*()_]+){1,31}$/',
             'diachi'=>'required|between:5,100|regex:/^Quận([^\!@#$%^&*()_]+){1,31}$/',
             'tinhthanh'=>'required|between:5,20|regex:/^([^\!@#$%^&*()_\d]+){1,31}$/',          
        ];
        $messages=[
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'sdt.required'=>'Vui lòng nhập số điện thoại',
            'sdt.digits_between'=>'Phải là 10 số ',
            'sdt.regex'=>'Số đầu là 0',
            'ten.required'=>'Vui lòng nhập tên',
            'ten.min'=>'Họ và tên ít nhất 5 kí tự',
            'ten.max'=>'Họ và tên nhiều nhất 20 kí tự', 
            'ten.regex'=>' không được viết kí hiệu đặc biệt',   
            'sonha.required'=>'Vui lòng nhập số nhà (VD 11 hoặc 11/7A)',
            'sonha.between'=>'Số nhà có độ dài kí tự từ 1 đến 20 ',
            'sonha.between'=>'Số nhà có độ dài kí tự từ 1 đến 20 ',
            'sonha.regex'=>'Chỉ được viết số đầu tiên và dấu "/" không được có kí hiệu đặc biệt',
            'tenduong.required'=>'Vui lòng nhập tên đường',
            'tenduong.between'=>'Tên đường có độ dài kí tự từ 6 đến 100 ',
            'tenduong.regex'=>' Phải có chữ " Đường " ở đầu và không được có kí hiệu đặc biệt',
            'phuong.required'=>'Vui lòng nhập phường', 
            'phuong.between'=>'Phường có độ dài kí tự từ 7 đến 100 ',
            'phuong.regex'=>'Phải có chữ " Phường " mới đến phần nhập Vd( Phường 1 ) và không được có kí hiệu đặc biệt',
            'diachi.required'=>'Vui lòng nhập quận VD ( Quận 1 hoặc Quận bình thạnh) ', 
            'diachi.between'=>'Quận có độ dài kí tự từ 5 đến 100 ',
            'diachi.regex'=>'Phải có chữ " Quận " mới đến phần nhập Vd( Quận 1 ) và không được có kí hiệu đặc biệt',
            'tinhthanh.required'=>'Vui lòng nhập Tỉnh thành', 
            'tinhthanh.between'=>'Tên đường có độ dài kí tự từ 5 đến 20 ',
            'tinhthanh.regex'=>'Không được có kí hiệu đặc biệt và số',                
        ];
       
          $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
             return response()->json([
                    'error' => true,
                    'message' => $validator->errors()
                ], 200);

        }
        else
        {   
            $data['subtotal'] = Cart::subtotal();
            $data['info'] = $request->all();
            $data['cart'] = Cart::content();
             $data['total'] = Cart::total();
            if(Cart::count()>0)
            { 


               $cart = Cart::content();
               foreach($cart as $value)
               {

                    $tongthue[] = $value->options->thue*$value->qty;
                    $ship[] =  $value->options->ship;

                 }

                $congtongthue = array_sum($tongthue);
                $congtongship = array_sum($ship);

                $data['congtongthue'] =$congtongthue;
                $data['congtongship'] = $congtongship;
                $data['hinhthucgiao'] = $request->phigiao;
            }
             // gửi email
             $email = $request->email;
              Mail::send('page.email', $data,function($msg) use ($email) {
                    $msg->from('datphat23101997@gmail.com','Lưu đat phát');
                    $msg->to($email,$email);
                    $msg->subject('Xác nhận hóa đơn mua hàng');

                });


              // Save vao hoa don
            $idnguoidung = Auth::user()->id;

            $hoadon = new Hoadon;     
            $hoadon->ma=rand();
            $hoadon->idnguoidung=Auth::user()->id;
            $hoadon->tennguoidung=Auth::user()->ten;
            $hoadon->trangthai=0;
            $hoadon->xuly=0;
            $hoadon->tennguoidat=$request->ten;
            $hoadon->dienthoai=$request->sdt;
            $hoadon->email=$email;              
            $hoadon->diachi=$request->sonha." ".$request->tenduong." ".$request->phuong." ".$request->diachi." ".",".$request->tinhthanh;
            $hoadon->tongtienchuathue=$data['subtotal'];
            if($request->phigiao==0)
            {   
                $hoadon->phiship=$data['congtongship'] ;
                $hoadon->hinhthucgiao=0;
                $hoadon->ngaydukiengiao=Carbon::now()->addDays(7); 
                $hoadon->tongtien=$data['subtotal']+$data['congtongship'];
            }
            else
            {
                $hoadon->phiship=$data['congtongship']*3;
                $hoadon->hinhthucgiao=1;
                $hoadon->ngaydukiengiao=Carbon::now()->addDays(3);
                $hoadon->tongtien=$data['subtotal']+($data['congtongship']*3); 
            }
            $hoadon->thue=$data['congtongthue']; 
            $hoadon->save();


            $data = Cart::content();

                foreach ($data as $key => $value) {
                    $chitiethoadon = new Chitiethoadon;

                    $chitiethoadon->idhoadon = $hoadon->id;
                    $chitiethoadon->idsanpham = $value->id;
                    $chitiethoadon->idnguoiban = $value->options->idnguoidung;
                    $chitiethoadon->soluong = $value->qty;
                    $chitiethoadon->gia = $value->price;
                    $chitiethoadon->tensanpham = $value->name;
                    $chitiethoadon->avatar = $value->options->img;
                    $chitiethoadon->masanpham = $value->options->masanpham;
                    $chitiethoadon->phidichvu=$value->options->thue*$value->qty; 
                    $chitiethoadon-> save();
                    
                    $sanpham = Sanpham::find($value->id);
                    $sanpham->soluongmua = $sanpham->soluongmua+$value->qty;
                    $sanpham->save();  
                }               
        }
    }
 // hoa don nguoi dung
   function getHoadon()
    {
       $idnguoidung = Auth::user()->id;
       $data['iop'] = Hoadon::where('idnguoidung',$idnguoidung)->get();
       return view('page.hoadoninformation',$data);

    }   
// Kenh nguoi ban 
    public function getkenhnguoiban()
    {
        return view('page.kenhnguoiban');
    }
//  Don hang  
     public function getDonhang($id)
    {       
        $data['iop']=  DB::table('nguoidung')->where('id',$id)->get();
        return view('page.donhang',$data);
    }
// xoa don hang
     public function getDeletedonhang($id)
    {
       $hoadon = Hoadon::find($id);
       $email = $hoadon['email'];  

       $data['chitiethoadon']= DB::table('chitiethoadon')->where('idhoadon',$id)->get();
       $data['hoadon'] = DB::table('hoadon')->where('id',$id)->get();
       
               Mail::send('page.emailhuydonhangkhachhang', $data,function($msg) use ($email)
               {
                    $msg->from('datphat23101997@gmail.com','Lưu đat phát');
                    $msg->to($email,$email);
                    $msg->subject('Hủy hóa đơn mua hàng');
                 });
        
       
       $hoadon->trangthai=3;
       $hoadon->xuly=3;
       $hoadon->save();
        return redirect()->back()->with('delete_category','Hủy thành công ');     
    }
        public function getDeletedonhangchushop($id)
    {
         $chitiethoadon = Chitiethoadon::where('idhoadon',$id)->get();

            foreach ($chitiethoadon as  $value)
            {
                $nguoidung = Nguoidung::where('id',$value->idnguoiban)->get();
                foreach ($nguoidung as $key => $valuee) 
                {
                    $email=$valuee->email;
                    $data['chitiethoadon'] =  DB::table('chitiethoadon')->where('idhoadon',$id)->where('idsanpham',$value->idsanpham)->where('idnguoiban',$value->idnguoiban)->get();
                    Mail::send('page.emailchushophuydonhang', $data,function($msg) use ($email) {
                        $msg->from('datphat23101997@gmail.com','Lưu đat phát');
                        $msg->to($email,$email);
                        $msg->subject('Người nhận không lấy hàng');
                    });
                }  
            }
               $hoadon = Hoadon::find($id); 
       $hoadon->trangthai=3;
       $hoadon->xuly=3;
       $hoadon->save();
        return redirect()->back()->with('delete_category','Hủy thành công ');     
    }
 // Cập nhật giở hàng   
      public function postUpdatedonhang(Request $request)
    {
        if($request->trangthai == 0)
        {
             return redirect()->back()->with('trangthai0','Vui lòng chọn trạng thái cập nhật'); 
        }
        else
        {
             DB::table('hoadon') ->where('id', $request->idhoadon)->update(['trangthai' => $request->trangthai] );
             $hoadon = Hoadon::find($request->idhoadon);
             $hoadon->updated_at=Carbon::now();
             $hoadon->save();
   
             return redirect()->back()->with('trangthai','Cập nhật thành công');
         }
    }
 //  View san pham don hang
       public function getViewsanphamdonhang($id)
    {
        $a['iop']=  DB::table('chitiethoadon')->where('idhoadon',$id)->get();
         return view('page.viewsanphamdonhang',$a);
    }
    // View nguoi dat don hang
       public function getViewnguoidatdonhang($id)
    {
         $a['iop'] = Hoadon::find($id);
        return view('page.viewnguoidatdonhang',$a);
    }
// View dang ban san pham
         public function getDangbansanpham()
    {
        $data['dienthoai'] = DB::table('hang')->where('idloai',1)->get();
       $data['laptop'] = DB::table('hang')->where('idloai',2)->get();
       $data['mypham'] = DB::table('hang')->where('idloai',3)->get();
        return view('page.viewdangbansanpham',$data);
    }
    //  xu ly dang san pham dien thoai
 public function postDangbansanpham(Request $request)
    {
                            $hang =$request->optionsRadios;
                            if($hang==1)
                            {
                              $rules=[
                                        
                                        'inputTen'=>'required|between:1,50|regex:/^([^\!@#$%^&*_]+){1,31}$/',
                                        'inputAvatar'=>'required',
                                        'inputGia'=>'required|between:5,10',
                                        'inputMota'=>'required|between:1,500',
                                        'image'=>'required',                                              
                                        'inputCameratruoc'=>'required|between:1,10',
                                        'inputCamerasau'=>'required|between:1,10',
                                        'inputBonho'=>'required|between:1,10',
                                    ];
                                    $messages=[
                                       
                                        'inputTen.required'=>' Vui lòng nhập Tên sản phẩm',
                                        'inputTen.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 50 kí tự',
                                        'inputTen.regex'=>' Không kí hiệu đặc biệt',
                                        'inputAvatar.required'=>' Vui lòng nhập giá',
                                        'inputGia.required'=>' Vui lòng nhập Giá',
                                         'inputGia.between'=>' Nhập ít nhất 5 số và nhiều nhất 10 số',

                                        'inputMota.required'=>' Vui lòng nhập mô tả',
                                        'inputMota.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 500 kí tự',
                                        'inputCameratruoc.required'=>' Vui lòng nhập thông số camera trước',
                                        'inputCameratruoc.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 10 kí tự',

                                        'inputCamerasau.required'=>' Vui lòng nhập thông số camera sau',
                                        'inputCamerasau.between'=>'Nhập ít nhất 1 kí tự và nhiều nhất 10 kí tự',

                                        'inputBonho.required'=>' Vui lòng nhập dung lượng bộ nhớ',
                                        'inputBonho.between'=>'Nhập ít nhất 1 kí tự và nhiều nhất 10 kí tự',

                                        'image.required'=>' Vui lòng chọn ảnh',
                                    ];
                                    $validator = Validator::make($request->all(),$rules,$messages);
                                    if($validator->fails())
                                    {
                                        return redirect()->back()->withErrors($validator)->withInput($request->all());
                                    }
                                    else
                                    {
                                        if(isset($request->inputGiaKM))
                                        {
                                            $giakm = $request->inputGia*(100-$request->inputGiaKM)/100;
                                        }    
                                        else
                                        {
                                            $giakm=$request->inputGia;
                                        }
                                            
                                        if($request->hasFile('inputAvatar'))
                                        {
                                            $file = $request->file('inputAvatar');
                                            $filename = Auth::user()->id.'_'.$file->getClientOriginalName('inputAvatar');
                                            $file->move('images/sanpham',$filename);
                                        }

                                        $sanpham = new Sanpham;
                                        $sanpham->ten=$request->inputTen;
                                        $sanpham->avatar=$filename;
                                        $sanpham->gia=$request->inputGia;
                                        $sanpham->giakm=$giakm;
                                        if(isset($request->inputGiaKM))
                                        {
                                             $sanpham->khuyenmai=$request->inputGiaKM;
                                        }
                                        else
                                        {
                                            $sanpham->khuyenmai=0;
                                        }
                                        $sanpham->mota=$request->inputMota;
                                        $sanpham->idnguoidung=Auth::user()->id;
                                        $sanpham->idloai=$request->optionsRadios;
                                        $sanpham->idhang=$request->trangthai;
                                        $sanpham->save();

                                        $sanpham->ma=$sanpham->id.'_'.Auth::user()->id;
                                        $sanpham->save();



                                        $thongso = new Thongso;
                                        $thongso->idloai=$request->optionsRadios;
                                        $thongso->idsanpham=$sanpham->id;
                                        $thongso->save();

                                        $tsdienthoai = new Tsdienthoai;
                                        $tsdienthoai->idthongso=$thongso->id;
                                        $tsdienthoai->cameratruoc=$request->inputCameratruoc;
                                        $tsdienthoai->camerasau=$request->inputCamerasau;
                                        $tsdienthoai->bonhotrong=$request->inputBonho;
                                        $tsdienthoai->save();

                                        if($request->hasFile('image')) {
                                            foreach($request->file('image') as $image) {
                                                $filenameWithExt = $image->getClientOriginalName();

                                                $filename = Auth::user()->id.'_'.$filenameWithExt;

                                                $image->move('images/sanpham', $filename);

                                                $hinhanh = new Hinhanh;
                                                $hinhanh->img=$filename;
                                                $hinhanh->idsanpham=$sanpham->id;
                                                $hinhanh->save();

                                            }
                                        }


                                        return redirect()->back()->with('thanhcong','Đăng bán thành công');
                                    }
                        }
                        else if ($hang==2)
                        {
                          $rules=[
                                    
                                      'inputTen'=>'required|between:1,50|regex:/^([^\!@#$%^&*_]+){1,31}$/',

                                    'inputAvatar'=>'required',

                                    'inputGia'=>'required|between:1,10',
                                    'inputMota'=>'required|between:1,500',
                                    'image'=>'required',

                                    'inputHedieuhanh'=>'required|between:1,50|regex:/^([^\!@#$%^&*()_]+){1,31}$/',
                                    'inputCpu'=>'required|between:1,50|regex:/^([^\!@#$%^&*()_]+){1,31}$/',
                                    'inputRam'=>'required|between:1,10',
                                    'inputOcung'=>'required|between:1,10',
                                    'inputManhinh'=>'required|between:1,10',
                                    'inputDohoa'=>'required|between:1,50|regex:/^([^\!@#$%^&*()_]+){1,31}$/',
                                    'inputPin'=>'required|between:1,10',
                                    'inputTrongluong'=>'required|between:1,10',

                                ];
                                $messages=[
                                
                                 'inputTen.required'=>' Vui lòng nhập Tên sản phẩm',
                                 'inputTen.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 50 kí tự',
                                 'inputTen.regex'=>' Không kí hiệu đặc biệt',

                                    'inputAvatar.required'=>' Vui lòng chọn ảnh',

                                    'inputGia.required'=>' Vui lòng nhập giá',
                                    'inputGia.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 10 số',

                                    'inputMota.required'=>' Vui lòng nhập mô tả',
                                    'inputMota.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 500 kí tự',

                                    'inputHedieuhanh.required'=>' Vui lòng nhập hệ điều hành',
                                    'inputHedieuhanh.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 50 kí tự',
                                    'inputHedieuhanh.regex'=>' Không kí hiệu đặc biệt',

                                    'inputCpu.required'=>' Vui lòng nhập tên cpu',
                                    'inputCpu.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 50 kí tự',
                                    'inputCpu.regex'=>' Không kí hiệu đặc biệt',

                                    'inputRam.required'=>' Vui lòng nhập dung lượng ram',
                                    'inputRam.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 10 kí tự',

                                    'inputOcung.required'=>' Vui lòng nhập dung lượng ổ cứng',
                                    'inputOcung.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 10 kí tự',

                                    'inputManhinh.required'=>' Vui lòng nhập kích thước màn hình',
                                    'inputManhinh.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 10 kí tự',

                                    'inputDohoa.required'=>' Vui lòng nhập têm đồ họa',
                                    'inputDohoa.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 50 kí tự',
                                    'inputDohoa.regex'=>' Không kí hiệu đặc biệt',

                                    'inputPin.required'=>' Vui lòng nhập pin',
                                    'inputTen.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 10 kí tự',

                                    'inputTrongluong.required'=>' Vui lòng nhập trọng lượng',
                                    'inputTrongluong.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 10 kí tự',

                                       'image.required'=>' Vui lòng chọn ảnh',


                                ];
                                $validator = Validator::make($request->all(),$rules,$messages);
                                if($validator->fails())
                                {

                                    return redirect()->back()->withErrors($validator)->withInput($request->all());
                                }
                                else
                                {
                                          if(isset($request->inputGiaKM))
                                          {
                                            $giakm = $request->inputGia*(100-$request->inputGiaKM)/100;
                                        }    
                                        else
                                        {
                                            $giakm=$request->inputGia;
                                        }

                                   if($request->hasFile('inputAvatar'))
                                   {
                                        $file = $request->file('inputAvatar');
                                        $filename = Auth::user()->id.'_'.$file->getClientOriginalName('inputAvatar');
                                        $file->move('images/sanpham',$filename);
                                    }

                                    $sanpham = new Sanpham;
                             
                                    $sanpham->ten=$request->inputTen;
                                    $sanpham->avatar=$filename;
                                    $sanpham->gia=$request->inputGia;
                                    $sanpham->giakm=$giakm;
                                    if(isset($request->inputGiaKM))
                                    {
                                       $sanpham->khuyenmai=$request->inputGiaKM;
                                   }
                                   else
                                   {
                                    $sanpham->khuyenmai=0;
                                    }
                                    $sanpham->mota=$request->inputMota;
                                    $sanpham->idnguoidung=Auth::user()->id;
                                    $sanpham->idloai=$request->optionsRadios;
                                    $sanpham->idhang=$request->trangthailaptop;
                                    $sanpham->save();

                                    $sanpham->ma=$sanpham->id.'_'.Auth::user()->id;
                                    $sanpham->save();


                                    $thongso = new Thongso;
                                    $thongso->idloai=$request->optionsRadios;
                                    $thongso->idsanpham=$sanpham->id;
                                    $thongso->save();

                                    $tslaptop = new Tslaptop;
                                    $tslaptop->idthongso=$thongso->id;
                                    $tslaptop->hedieuhanh=$request->inputHedieuhanh;
                                    $tslaptop->cpu=$request->inputCpu;
                                    $tslaptop->ram=$request->inputRam;
                                    $tslaptop->ocung=$request->inputOcung;
                                    $tslaptop->manhinh=$request->inputManhinh;
                                    $tslaptop->carddohoa=$request->inputDohoa;
                                    $tslaptop->pin=$request->inputPin;
                                    $tslaptop->trongluong=$request->inputTrongluong;

                                    $tslaptop->save();

                                    if($request->hasFile('image'))
                                    {
                                        foreach($request->file('image') as $image)
                                        {
                                            $filenameWithExt = $image->getClientOriginalName();

                                            $filename = Auth::user()->id.'_'.$filenameWithExt;

                                            $image->move('images/sanpham', $filename);

                                            $hinhanh = new Hinhanh;
                                            $hinhanh->img=$filename;
                                            $hinhanh->idsanpham=$sanpham->id;
                                            $hinhanh->save();

                                        }
                                    }


                                    return redirect()->back()->with('thanhcong','Đăng bán thành công');
                                }
                    }else
                    {
                              $rules=[

                                'inputTen'=>'required|between:1,50|regex:/^([^\!@#$%^&*_]+){1,31}$/',
                                'inputAvatar'=>'required',
                                'inputGia'=>'required|between:1,10',
                                'inputMota'=>'required|between:1,500',
                                'image'=>'required',
                                // 'inputThuonghieu'=>'required',
                                'inputXuatxu'=>'required|between:1,50|regex:/^([^\!@#$%^&*()_\d]+){1,31}$/',
                                'inputTrongluongmp'=>'required|between:1,10',
                            ];
                            $messages=[
                      

                                 'inputTen.required'=>' Vui lòng nhập Tên sản phẩm',
                                 'inputTen.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 50 kí tự',
                                 'inputTen.regex'=>' Không kí hiệu đặc biệt',

                                'inputAvatar.required'=>' Vui lòng chọn ảnh',

                                  'inputGia.required'=>' Vui lòng nhập giá',
                                    'inputGia.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 10 số',

                                    'inputMota.required'=>' Vui lòng nhập mô tả',
                                    'inputMota.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 500 kí tự',

                                // 'inputThuonghieu.required'=>' Vui lòng nhập ',

                                'inputXuatxu.required'=>' Vui lòng nhập Xuất xứ',
                                  'inputXuatxu.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 50 kí tự',
                                 'inputXuatxu.regex'=>' Không kí hiệu đặc biệt và không được có số',


                                'inputTrongluongmp.required'=>' Vui lòng nhập trọng lượng',
                                'inputTrongluongmp.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 10 kí tự',

                                'image.required'=>' Vui lòng chọn ảnh',

                            ];
                            $validator = Validator::make($request->all(),$rules,$messages);
                            if($validator->fails())
                            {
                                return redirect()->back()->withErrors($validator)->withInput($request->all());
                            }
                            else
                            {
                                     if(isset($request->inputGiaKM))
                                     {
                                        $giakm = $request->inputGia*(100-$request->inputGiaKM)/100;
                                    }    
                                    else
                                    {
                                        $giakm=$request->inputGia;
                                    }

                               if($request->hasFile('inputAvatar'))
                               {
                                    $file = $request->file('inputAvatar');
                                    $filename = Auth::user()->id.'_'.$file->getClientOriginalName('inputAvatar');
                                    $file->move('images/sanpham',$filename);
                                }

                                $sanpham = new Sanpham;
                           
                                $sanpham->ten=$request->inputTen;
                                $sanpham->avatar=$filename;
                                $sanpham->gia=$request->inputGia;
                                $sanpham->giakm=$giakm;
                                if(isset($request->inputGiaKM))
                                {
                                   $sanpham->khuyenmai=$request->inputGiaKM;
                               }
                               else
                               {
                                $sanpham->khuyenmai=0;
                                 }
                                $sanpham->mota=$request->inputMota;
                                $sanpham->idnguoidung=Auth::user()->id;
                                $sanpham->idloai=$request->optionsRadios;
                                $sanpham->idhang=$request->trangthaimypham;
                                $sanpham->save();
                                $sanpham->ma=$sanpham->id.'_'.Auth::user()->id;
                               
                                $sanpham->save();

                                $thongso = new Thongso;
                                $thongso->idloai=$request->optionsRadios;
                                $thongso->idsanpham=$sanpham->id;
                                $thongso->save();

                                $tsmypham = new Tsmypham;
                                $tsmypham->idthongso=$thongso->id;
                                // $tsmypham->thuonghieu=$request->inputThuonghieu;
                                $tsmypham->xuatxu=$request->inputXuatxu;
                                $tsmypham->trongluong=$request->inputTrongluongmp;
                                $tsmypham->save();

                                if($request->hasFile('image'))
                                {
                                    foreach($request->file('image') as $image)
                                     {
                                        $filenameWithExt = $image->getClientOriginalName();
                                        $filename = Auth::user()->id.'_'.$filenameWithExt;
                                        $image->move('images/sanpham', $filename);
                                        $hinhanh = new Hinhanh;
                                        $hinhanh->img=$filename;
                                        $hinhanh->idsanpham=$sanpham->id;
                                        $hinhanh->save();

                                    }
                                }


                                     return redirect()->back()->with('thanhcong','Đăng bán thành công');
                            }
                    }
    }

      public function getTimkiemdonhang(Request $request)
    {
        $idnguoiban = Auth::user()->id;
        $data['donhang'] = Hoadon::where('id',$request->key)->where('idnguoiban',$idnguoiban)->orWhere('tennguoidat','like','%'.$request->key.'%')->where('idnguoiban',$idnguoiban)->paginate(2);
        return view('page.timkiemdonhang',$data);
    }

      public function getGiaohangtinhtrang($id)
     {
                  $idnguoiban = Auth::user()->id;
                   $hoadon = Hoadon::where('trangthai',$id)->where('idnguoiban', $idnguoiban)->get()->toArray();
                   if(count($hoadon)>0)
                   {
                  
                   ?>
                   <table class="table table-hover" >
                       <thead>
                           <tr>
                                   <th scope="col">Số hóa đơn</th>
                                   <th scope="col">Tên người đặt</th>
                                   <th scope="col">Giá chưa tính thuể</th>
                                   <th scope="col">Thuế</th>
                                   <th scope="col">Tổng tiền</th>
                                   <th scope="col">Trang thái</th>
                                  

                           </tr>
                       </thead>
                       <tbody >
                                 <?php
                                 foreach($hoadon as $value) 
                                 {
                                    ?>

                                    <tr>
                                        <th scope="row" name="idhoadon"><a href=" <?php echo route('viewsanphamdonhang',$value['id']) ?> "><?php echo $value['id'] ; ?></th></a>
                                        <td><a href=" <?php echo route('viewnguoidatdonhang',$value['id']) ?> "><?php echo $value['tennguoidat']; ?></td></a>
                                        <td><?php echo $value['tongtienchuathue'] ; ?></td>
                                        <td><?php echo $value['thue'];?></td>
                                        <td><?php echo $value['tongtien']; ?></td>
                                        <?php if ($value['trangthai']==0 ){  
                                                    if($value['xuly']==0){ ?>
                                                         <td>Chưa giao(đơn hàng chưa xử lý)</td>
                                                     <?php }else{?>
                                                         <td>Chưa giao(đơn hàng đã xử lý)</td>
                                                     <?php } ?>
                                        <?php }else if($value['trangthai']==1){ ?>
                                            <td>Đang giao</td>
                                        <?php }else {?>
                                            <td>Giao</td>
                                        <?php }?>
                                    </td>                           
                                </tr>   


                                <?php
                            }
                                 ?>
                         </tbody>                
                    </table>
                    <?php
                }else{ ?>
                    <div class="row">
                      <div class="col-md-6"><h2>Không có </h2></div>

                  </div>
              <?php   }
            
     }
     function getGioithieu()
     {
        return view('page.gioithieu');
     }
     function getQuydinh()
     {
        return view('page.quydinh');
     }
	public function getdanhsachsp($id)
    {
        $sanpham = Sanpham::where('idnguoidung',$id)->where('trangthai',1)->where('duyet',1)->paginate(12);
        $flag=1;
        return view('page.danhsachspban',compact('sanpham','flag'));
    }
    public function getdanhsachspcd($id)
    {
        $sanpham = Sanpham::where('idnguoidung',$id)->where('trangthai',1)->where('duyet',0)->paginate(12);
        $flag=0;
        return view('page.danhsachspban',compact('sanpham','flag'));
    }
    public function getxoasp($id)
    {
        // $avatar = DB::table('sanpham')->select('avatar')->where('id',$id)->get();
        // if(isset($avatar))
        // {    foreach($avatar as $v)
        //     {   
        //         // echo $v->avatar;
        //         // exit;
        //         unlink('images/sanpham/'.$v->avatar);
        //     }
        // }

        // $hinhanh = DB::table('hinhanh')->select('img')->where('idsanpham',$id)->get();
        // if(isset($hinhanh))
        // {    foreach($hinhanh as $ha)
        //     {
        //         unlink('images/sanpham/'.$ha->img);
        //     }
        // }
        DB::table('sanpham')->where('id',$id)->update(['trangthai' => 0]);
        $thongbao = " Xóa thành công ";
        return view('page.kenhnguoiban', compact('thongbao'));
    }
    public function getxoaspad($id)
    {
        DB::table('sanpham')->where('id',$id)->update(['trangthai' => 0]);
        $sanpham = Sanpham::where('duyet',0)->where('trangthai',1)->get();
        $thongbao = " Xóa thành công ";
        return view('page.Indexsanphamadmin', compact('thongbao','sanpham'));
    }

    public function getsuasp($id)
    {
        
        $sanpham = DB::table('sanpham')->where('id',$id)->where('idnguoidung',Auth::user()->id)->get();
        if(count($sanpham)>0)
        {
            return view('page.suasp',compact('sanpham'));
        }
        else
            $thongbao = "Không có sản phẩm này";
            return view('page.404',compact('thongbao'));
    }

    public function getupdate(Request $req,$id)
    {
          $sanpham = DB::table('sanpham')->where('id',$id)->first();

            $rules=[                
                'tensanpham'=>'required|between:1,50|regex:/^([^\!@#$%^&*_]+){1,31}$/',
                'gia'=>'required|between:1,10',
                'mota'=>'required|between:1,10000',                                              

            ];
            $messages=[
            
                'tensanpham.required'=>' Vui lòng nhập Tên sản phẩm',
                'tensanpham.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 50 kí tự',
                'tensanpham.regex'=>' Không kí hiệu đặc biệt',
                'gia.required'=>' Vui lòng nhập Giá',
                'gia.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 10 số',
                'mota.required'=>' Vui lòng nhập mô tả',
                'mota.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 10000 kí tự',

            ];
            $validator = Validator::make($req->all(),$rules,$messages);
            // dd($validator);
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput($req->all());
            }
            else
            { 
                
                
                    if(isset($req->khuyenmai))
                        {
                            $giakm = $req->gia*(100-$req->khuyenmai)/100;
                        }    
                    else
                        {
                            $giakm=$req->gia;
                        }
                        
                        
                    $sanpham1 = [
                    'ten'=>$req->tensanpham,
                    'gia'=>$req->gia,
                    'mota'=>$req->mota,
                    'khuyenmai' => $req->khuyenmai,
                    'giakm' => $giakm,
                    'duyet' => 0,                             
                ];
                
                if($req->tensanpham!=$sanpham->ten||$req->gia!=$sanpham->gia||
                strcmp(trim($sanpham->mota),trim($req->mota))!=0||$req->khuyenmai!=$sanpham->khuyenmai||$sanpham->giakm!=$giakm)
                {
                    DB::table('sanpham') ->where('id', $id)->update($sanpham1);
                }
                $loai = DB::table('sanpham')->select('idloai')->where('id',$id)->first();
                
                $anh = DB::table('hinhanh')->where('idsanpham',$id)->get();
                
                
                    
                    if($loai->idloai == 1)
                    {

                        $rules2=[                
                            'cameratruoc'=>'required|between:0,999|numeric',
                            'camerasau'=>'required|between:0,999|numeric',
                            'dungluong'=>'required|between:0,999|numeric',                                             
                
                        ];
                        $messages2=[
                        
                            'cameratruoc.required'=>' Vui lòng nhập thông số camera trước',
                            'cameratruoc.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 3 kí tự',
                            'cameratruoc.numeric'=>' Vui lòng nhập số',
                            'camerasau.required'=>' Vui lòng nhập thông số camera sau',
                            'camerasau.between'=>'Nhập ít nhất 1 kí tự và nhiều nhất 3 kí tự',
                            'camerasau.numeric'=>' Vui lòng nhập số',
                            'dungluong.required'=>' Vui lòng nhập dung lượng bộ nhớ',
                            'dungluong.between'=>'Nhập ít nhất 1 kí tự và nhiều nhất 3 kí tự',
                            'dungluong.numeric'=>' Vui lòng nhập số',
                        ];
                        $validator2 = Validator::make($req->all(),$rules2,$messages2);
                        // dd($validator);
                        if($validator2->fails())
                        {
                            return redirect()->back()->withErrors($validator2)->withInput($req->all());
                        }
                        else
                        {
                            $thongso = [
                                'cameratruoc'=>$req->cameratruoc,
                                'camerasau'=>$req->camerasau,
                                'bonhotrong'=>$req->dungluong,
                                
                            ];
                            $chinhsua = DB::table('thongso')->join('tsdienthoai','thongso.id','tsdienthoai.idthongso')->where('idsanpham',$id)->first();
                            
                            if($chinhsua->cameratruoc!=$req->cameratruoc||$chinhsua->camerasau!=$req->camerasau||
                            $chinhsua->bonhotrong!=$req->dungluong)
                            {
                                
                                DB::table('thongso')->join('tsdienthoai','thongso.id','tsdienthoai.idthongso')->where('idsanpham',$id)->update($thongso);
                                
                                DB::table('sanpham')->where('id',$id)->update(['duyet'=>0]);
                            }
                        }
                    }
                    if($loai->idloai == 2 )
                    {
                        $rules2=[                
                            'hedieuhanh'=>'required|between:1,50|regex:/^([^\!@#$%^&*()_]+){1,31}$/',
                            'cpu'=>'required|between:1,50|regex:/^([^\!@#$%^&*()_]+){1,31}$/',
                            'ram'=>'required|between:1,3',
                            'ocung'=>'required|between:1,4',
                            'manhinh'=>'required|between:1,3',
                            'carddohoa'=>'required|between:1,50|regex:/^([^\!@#$%^&*()_]+){1,31}$/',
                            'pin'=>'required|between:1,3',
                            'trongluong'=>'required|between:1,3',

                        ];
                        $messages2=[
                        
                            'hedieuhanh.required'=>' Vui lòng nhập hệ điều hành',
                            'hedieuhanh.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 50 kí tự',
                            'hedieuhanh.regex'=>' Không kí hiệu đặc biệt',
                            'cpu.required'=>' Vui lòng nhập tên cpu',
                            'cpu.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 50 kí tự',
                            'cpu.regex'=>' Không kí hiệu đặc biệt',
                            'ram.required'=>' Vui lòng nhập dung lượng ram',
                            'ram.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 3 kí tự',
                            'ocung.required'=>' Vui lòng nhập dung lượng ổ cứng',
                            'ocung.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 4 kí tự',
                            'manhinh.required'=>' Vui lòng nhập kích thước màn hình',
                            'manhinh.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 3 kí tự',
                            'carddohoa.required'=>' Vui lòng nhập têm đồ họa',
                            'carddohoa.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 50 kí tự',
                            'carddohoa.regex'=>' Không kí hiệu đặc biệt',
                            'pin.required'=>' Vui lòng nhập pin',
                            'trongluong.required'=>' Vui lòng nhập trọng lượng',
                            'trongluong.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 3 kí tự',
                
                        ];
                        $validator2 = Validator::make($req->all(),$rules2,$messages2);
                        // dd($validator);
                        if($validator2->fails())
                        {
                            return redirect()->back()->withErrors($validator2)->withInput($req->all());
                        }
                        else
                        {
                            $thongso = [
                                'hedieuhanh'=>$req->hedieuhanh,
                                'cpu'=>$req->cpu,
                                'ram'=>$req->ram,
                                'ocung'=>$req->ocung,
                                'manhinh'=>$req->manhinh,
                                'carddohoa'=>$req->carddohoa,
                                'pin'=>$req->pin,
                                'trongluong'=>$req->trongluong,
                                
                            ];
                            $chinhsua = DB::table('thongso')->join('tslaptop','thongso.id','tslaptop.idthongso')->where('idsanpham',$id)->first();
                            
                            
                            if(strcmp($chinhsua->hedieuhanh,$req->hedieuhanh)!=0||
                                strcmp($chinhsua->cpu,$req->cpu)!=0||
                                strcmp($chinhsua->ram,$req->ram)!=0||
                                strcmp($chinhsua->ocung,$req->ocung)!=0||
                                strcmp($chinhsua->carddohoa,$req->carddohoa)!=0||
                                strcmp($chinhsua->pin,$req->pin)!=0||
                                strcmp($chinhsua->trongluong,$req->trongluong)!=0||
                                strcmp($chinhsua->manhinh,$req->manhinh)!=0
                            )
                            { 
                                // echo 'có thay đổi';
                                // die();
                                DB::table('thongso')->join('tslaptop','thongso.id','tslaptop.idthongso')->where('idsanpham',$id)->update($thongso);
                                DB::table('sanpham')->where('id',$id)->update(['duyet'=>0]);
                            }
                            
                        }
                    }
                    if($loai->idloai == 3 )
                        {
                            $rules2=[                
                                'xuatxu'=>'required|between:1,50|regex:/^([^\!@#$%^&*()_\d]+){1,31}$/',
                                'trongluong'=>'required|between:1,3',
                            ];
                            $messages2=[
                                'xuatxu.required'=>' Vui lòng nhập Xuất xứ',
                                'xuatxu.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 50 kí tự',
                                'xuatxu.regex'=>' Không kí hiệu đặc biệt và không được có số',
                                'trongluong.required'=>' Vui lòng nhập trọng lượng',
                                'trongluong.between'=>' Nhập ít nhất 1 kí tự và nhiều nhất 3 kí tự',
                            ];
                            $validator2 = Validator::make($req->all(),$rules2,$messages2);
                            // dd($validator);
                            if($validator2->fails())
                            {
                                return redirect()->back()->withErrors($validator2)->withInput($req->all());
                            }
                            else
                            {
                                $thongso = [
                                'xuatxu'=>$req->xuatxu,
                                'trongluong'=>$req->trongluong,
                                'duyet'=>0
                                ];
                                $chinhsua = DB::table('thongso')->join('tsmypham','thongso.id','tsmypham.idthongso')->where('idsanpham',$id)->first();
                                if($chinhsua->xuatxu!=$req->xuatxu||$chinhsua->trongluong!=$req->trongluong)
                                {
                                    DB::table('thongso')->join('tsmypham','thongso.id','tsmypham.idthongso')->where('idsanpham',$id)->update($thongso);
                                    DB::table('sanpham')->where('id',$id)->update(['duyet'=>0]);

                                }
                            }
                    }
                
                $thongbao = " Chỉnh sửa thành công ";
                return view('page.kenhnguoiban',compact('thongbao'));
            }
        
    }
	public function getthongke()
    {
        return view('page.thongke');
    }

    public function getlienhe()
    {
        return view('page.lienhe');
        // Lưu Đạt Phát
    }
    
    //admin
       public function getLoginadmin()
    {
        return view('page.loginAdmin');
    }
    //
       public function postLoginadmin(Request $request)
    {
         $rules=[
            'username'=>'required|min:5|max:50',
            'password'=>'required|min:3|max:20',
        ];
        $messages=[
            'username.required'=>' Vui lòng nhập Tên đăng nhập',
            'username.min'=>'Tên đăng nhập ít nhất 5 kí tự',
            'username.max'=>'Tên đăng nhập tối đa 50 kí tự',
            'password.required'=>'vui lòng nhập password',
            'password.min'=>'password dài 3 kí tự',
            'password.max'=>'password không dài hơn 20 kí tự',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        else
        {
            if(Auth::guard('admins')->attempt(['username'=>$request->username, 'password'=>$request->password]))
            {
                 return redirect()->route('indexAdmin');
            }
            else
            {
               return redirect()->back()->with('err','Username hoặc password chưa đúng');
            }
        }
    }
    // Trang chủ getTrangchuadmin 
     public function getIndexAdmin(Request $request)
    {       
    
        if(Auth::guard('admins')->check())
        {
            $hoadon =Hoadon::orderBy('id','DESC');
            if($request->giaohangtinhtrang){
                $giaohangtinhtrang = $request->giaohangtinhtrang;
                switch ($giaohangtinhtrang) {
                    case 'chuagiao':
                    $hoadon->where('trangthai',0)->where('xuly',1)->orderBy('id','DESC');
                    break;
                    case 'danggiao':
                    $hoadon->where('trangthai',1)->orderBy('id','DESC');
                    break;
                    case 'giao':
                    $hoadon->where('trangthai',2)->orderBy('id','DESC');
                    break;
                    case 'chuaxuly':
                    $hoadon->where('xuly',0)->orderBy('id','DESC');
                    break;
                    case 'huy':
                    $hoadon->where('trangthai',3)->orderBy('id','DESC');
                    break;
                    default:
                    $hoadon;
                    break;
                }
            }
            if($request->key)
            {

              $hoadon->where('ma',$request->key);
            }
            $data['query'] = $request->query();
            $data['hoadon'] = $hoadon->paginate(25); 
            return view('page.indexAdmin',$data);

        }
        else
        {
           return redirect()->route('loginadmin');
        }
    
   
    }
    // Thoát trang admin
        public function getLogoutAdmin()
    {
        Auth::guard('admins')->logout();
       return redirect()->route('loginadmin');
    }
    //postUpdatehoadonAdmin
     public function postUpdatehoadonAdmin(Request $request)
    {
      if($request->xuly==0)
      {
         return redirect()->back()->with('sai','Vui lòng chọn tình trạng giao hàng khác');
      }
      else
        {   
            $chitiethoadon = Chitiethoadon::where('idhoadon',$request->idhoadon)->get();

            foreach ($chitiethoadon as  $value)
            {
                $nguoidung = Nguoidung::where('id',$value->idnguoiban)->get();
                foreach ($nguoidung as $key => $valuee) 
                {
                    $email=$valuee->email;
                    $data['chitiethoadon'] =  DB::table('chitiethoadon')->where('idhoadon',$request->idhoadon)->where('idsanpham',$value->idsanpham)->where('idnguoiban',$value->idnguoiban)->get();
                    Mail::send('page.emailchushop', $data,function($msg) use ($email) {
                        $msg->from('datphat23101997@gmail.com','Lưu đat phát');
                        $msg->to($email,$email);
                        $msg->subject('Sản phẩm được đặt hàng');
                    });
                }  
            }
           $data = $request->all();  
           Hoadon::where('id',$data['idhoadon'])->update(['xuly'=>$data['xuly']]);
            return redirect()->back()->with('dung','Xử lý thành công');
       }
    }

    public function getDeletehoadonAdmin($id)
    {
         Hoadon::where('id',$id)->delete();
         return redirect()->back()->with('getDeletehoadonAdmin','xoa thanh cong');
    }
    public function getthongkead()
    {
        return view('page.thongkead');
    }
    public function getdoanhthu(Request $req ,$id)
    {
        if(isset($req->form) && isset($req->to))
        {
            if($req->form>$req->to)
            {
                $thongbao = "Không có dữ liệu cho ngày thống kê vừa nhập";
                return view('page.doanhthu',compact('thongbao'));
            }
            $form = $req->form;
            $to = $req->to;

             $hoadon = DB::table('hoadon')->join('chitiethoadon', 'hoadon.id', '=', 'chitiethoadon.idhoadon')->where('chitiethoadon.idnguoiban',$id)->where('hoadon.trangthai',3)->where('hoadon.updated_at','>=',$req->form)->where('hoadon.updated_at','<=',$req->to)->get();

            // $hoadon = DB::table('hoadon')->where('idnguoiban',$id)->where('trangthai',2)->where('updated_at','>=',$req->form)->where('updated_at','<=',$req->to)->get();
            return view('page.doanhthu',compact('hoadon','form','to'));
        }
        else
        {
            $thongbao = "Không có dữ liệu cho ngày thống kê vừa nhập";
            return view('page.doanhthu',compact('thongbao'));
        }
    }
    public function getdoanhthuad(Request $req)
    {
        if(isset($req->form) && isset($req->to))
        {
            if($req->form>$req->to)
            {
                $thongbao = "Không có dữ liệu cho ngày thống kê vừa nhập";
                return view('page.doanhthuad',compact('thongbao'));
            }
            $form = $req->form;
            $to = $req->to;
            $hoadon = DB::table('hoadon')->where('trangthai',2)->where('updated_at','>=',$req->form)->where('updated_at','<=',$req->to)->get();
            return view('page.doanhthuad',compact('hoadon','form','to'));
        }
        else
        {
            $thongbao = "Không có dữ liệu cho ngày thống kê vừa nhập";
            return view('page.doanhthuad',compact('thongbao'));
        }
    }
 public function getIndexsanphamAdmin()
    {
         $sanpham = Sanpham::where('duyet',0)->where('trangthai',1)->get();
         return view('page.IndexsanphamAdmin',compact('sanpham'));
    }
    public function getduyetsp($id)
    {
        
        DB::table('sanpham')->where('id',$id)->update(['duyet'=>1]);
        $sanpham = Sanpham::where('duyet',0)->get();
        $thongbao = 'Duyệt thành công';
         return view('page.IndexsanphamAdmin',compact('sanpham','thongbao'));
    }
// Đon đặt hàng Information
       function getDondathanginformation($id)
    {    
        $kiemtra = Hoadon::where('id',$id)->where('idnguoidung',Auth::user()->id)->first();
        if($kiemtra)
        {
            $data['chitiethoadon'] = Chitiethoadon::where('idhoadon',$id)->get();
            return view('page.Dondathanginformation',$data);
        }
        else
        {
            return redirect()->intended('/');
        }
    }   
// Ten nguoi dat Information
       function getTennguoidatinformation($id)
    {
        $kiemtra = Hoadon::where('id',$id)->where('idnguoidung',Auth::user()->id)->first();
        if($kiemtra)
        {
            $data['nguoidat'] = Hoadon::where('id',$id)->get();
            return view('page.Tennguoidatinformation',$data);
        }
        else
        {
            return redirect()->intended('/');
        }
    } 
//Admin quản lý user
      function getQuanlyuseradmin(Request $request)
    {
      $nguoidung =DB::table('nguoidung')->orderBy('id','ASC');
 
           if($request->key)
           {

              $nguoidung->where('id',$request->key)->orWhere('ten','like','%'.$request->key.'%');
          }
        $data['nguoidung'] =   $nguoidung->get();
        // $data['nguoidung'] =  DB::table('nguoidung')->get();
        return view('page.Quanlyuseradmin',$data);
    } 
// tìm kiem admin user getTimkiemuseradmin

 public function getTimkiemuseradmin(Request $request)
    {
        
        $data['nguoidung'] =  Nguoidung::where('id',$request->key)->orWhere('ten','like','%'.$request->key.'%')->paginate(2);
        return view('page.Timkiemuseradmin',$data);
    }
    // Danh mục admin
     public function getDanhmucadmin(Request $request)
    {
          $hang = Hang::orderBy('id','ASC')->where('trangthai',0); 
        if($request->giaohangtinhtrang){
            $giaohangtinhtrang = $request->giaohangtinhtrang;
            switch ($giaohangtinhtrang) {
                case 'dienthoai':
                $hang->where('idloai',1);
                break;
                case 'laptop':
                $hang->where('idloai',2);
                break;
                case 'mypham':
                $hang->where('idloai',3);
                break;
                default:
                $hang;
                break;
            }
        }
   
        
     
       $data['loai'] = Loai::get();
       $data['hang'] = $hang->get();
        return view('page.danhmucadmin',$data);
    }
    public function postDanhmucadmin(Request $request)
    {
        
       $rules=[
            'name'=>'required|min:5|max:50||regex:/^([^\!@#$%^&*()_]+){1,31}$/',
        
        ];
        $messages=[
            'name.required'=>' Vui lòng nhập danh mục',
            'name.min'=>'Danh mục ít nhất 5 kí tự',
            'name.max'=>'Danh mục tối đa 50 kí tự', 
            'name.unique'=>'Danh mục đã tồn tại',
            'name.regex'=>'Danh mục không viết kí hiệu đặt biệt',

        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        else
        {
            $kiemtra = DB::table('hang')->where('ten',$request->name)->get();
            $tenhang= json_decode($kiemtra,true);
                if(!empty($tenhang))
                {
                         if($tenhang[0]['trangthai']==1)
                         {
                            $idhang = $tenhang[0]['id'];
                            $update = Hang::find($idhang);
                            $update->trangthai = 0;
                            $update->save();
                            return redirect()->back()->with('dung','Thêm danh mục thành công');
                        }
                        else
                        {
                            return redirect()->back()->with('sai','Tên danh mục đã có');
                        }
                }
                else
                {
                    $hang = new Hang;
                    $hang->idloai=$request->trangthai;
                    $hang->ma=$request->name;
                    $hang->ten=$request->name;
                    $hang->save();
                    return redirect()->back()->with('dung','Thêm danh mục thành công');
                }

           

        }
    }
// sửa danh muc admin
public function getEditdanhmucadmin($id)
    {
        $data['loai'] = Loai::get();
         $data['hang'] = Hang::where('id',$id)->get();
        return view('page.Editdanhmucadmin',$data);   
    }
public function postEditdanhmucadmin(Request $request)
    {
        $rules=[
            'name'=>'required|min:5|max:10|regex:/^([^\!@#$%^&*()_]+){1,31}$/',
        
        ];
        $messages=[
            'name.required'=>' Vui lòng nhập danh mục',
            'name.min'=>'Danh mục ít nhất 5 kí tự',
            'name.max'=>'Danh mục tối đa 10 kí tự', 
           
            'name.regex'=>'Danh mục không viết kí hiệu đặt biệt',

        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        else
        {
            
            $hang = Hang::find($request->id);
            $kiemtratendanhmuc =  DB::table('hang')->where('ten',$request->name)->get();
             if(count($kiemtratendanhmuc)>0)
                {
                     if($hang->ten==$request->name)
                        {
                            $hang->ma=$request->name;
                            $hang->ten=$request->name;
                            $hang->idloai=$request->trangthai;
                            $hang->save();
                        }
                        else
                        {
                             return redirect()->back()->with('sai','Tên danh mục đã tồn tại');
                        }
                }
            else
            {
               $hang->ma=$request->name;
               $hang->ten=$request->name;
                $hang->idloai=$request->trangthai;
               $hang->save();
            }

          
           
            return redirect()->back()->with('dung','Sửa danh mục thành công');

        }
    }
// xóa danh muc admin getDeletedanhmucadmin
    public function getDeletedanhmucadmin($id)
    {
      $sanpham = Sanpham::where('idhang',$id)->get();
      if(count($sanpham)>0)
      {
       return redirect()->back()->with('khongxoa','Đã tồn tại sản phẩm trong danh mục không được xóa');
      }
      else{
        $hang = Hang::find($id);
        $hang->trangthai=1;
        $hang->save();
          return redirect()->back()->with('xoaduoc','xóa danh mục thành công');

      }
    }
    public function getchitiethoadonad($id)
    {
        $cthd = DB::table('chitiethoadon')->where('idhoadon',$id)->get();
        $mahd = DB::table('hoadon')->select('ma')->where('id',$id)->get();
        return view('page.chitiethoadonad',compact('cthd','mahd'));
    }
    // Đổi mật khẩu information Getdoimkinformatiom-Postdoimkinformatiom
     public function Getdoimkinformatiom()
    {

        return view('page.Getdoimkinformatiom');
    }
        public function Postdoimkinformatiom(Request $request)
    {
        
     $rules=[
            'password_old'=>'required|between:3,20',
//'min:6|required_with:password_confirmation|same:password_confirmation',
            'password'=>'required_with:password_confirm|same:password_confirm|between:3,20',
            'password_confirm'=>'between:3,20',           
        ];
        $messages=[
            'password_old.required'=>'Vui lòng nhập mật khẩu cũ',
            'password_old.between'=>'Vui lòng mật khẩu cũ có kí tự từ 3 đến 20',
            'password.required_with'=>'Vui lòng nhập mật khẩu mới và xác nhận mật khẩu',
            'password.same'=>'Mật khẩu mới và xác nhận trong không trùng',
            'password.between'=>'Vui lòng mật khẩu  có kí tự từ 3 đến 20',
            'password_confirm.between'=>'Vui lòng xác nhận mật khẩu có kí tự từ 3 đến 20',                    
        ];
          $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        else
        {
            
            if ( Hash::check($request->password_old,Auth::user()->password) )
            {
               $nguoidung = Nguoidung::find(Auth::user()->id);

               $nguoidung->password=bcrypt($request->password);

               $nguoidung->save();

               return redirect()->back()->with('dung','Cập nhật mật khẩu thành công ');
            }
            else{
                 return redirect()->back()->with('sai','mặt khẩu cũ không đúng ');
            }
        }
    }
    // Lưu bình luận của thành viên
    public function Postbinhluan(Request $request)
    {
       
             $binhluan = new Binhluan;
             $binhluan->idsanpham=$request->idsanpham;
            $binhluan->tensanpham=$request->tensanpham;
             $binhluan->idnguoidung=Auth::user()->id;
             $binhluan->tennguoidung=Auth::user()->ten;
             $binhluan->binhluan=$request->binhluan;
             $binhluan->danhgia=$request->rating;

             $binhluan->save();
             return redirect()->back()->with('dung','Gủi bình luận thành công ');
    }
// Trang đánh giá trong trang admin
public function GetdanhgiaAdmin()
    {
            $data['binhluan'] = Binhluan::paginate(25);
             
             return view('page.danhgiaAdmin',$data) ;
    }
public function getDeletedanhgiaAdmin($id)
    {
          $binhluan = Binhluan::find($id);
          $binhluan->delete();
          return redirect()->back()->with('dung','Xóa bình luận thành công ');

    }
public function getbigsale()
    {
        $soluong = Sanpham::where('khuyenmai','>=',1);
        $sanpham = Sanpham::where('khuyenmai','>=',1)->where('trangthai',1)->where('duyet',1)->orderBy('khuyenmai','desc')->paginate(12);
        return view('page.bigsale',compact('sanpham','soluong'));
    }
public function getduyettatca()
    {
        DB::table('sanpham')->where('duyet',0)->update(['duyet'=>1]);
        $thongbao = 'Đã duyệt tất cả sản phẩm';
        return view('page.IndexsanphamAdmin',compact('thongbao'));
    }
public function getchitietspad($id)
    {
        $sanpham = DB::table('sanpham')->where('id',$id)->get();
        return view('page.chitietspad',compact('sanpham'));    
    }
public function getsanphamshop($id)
    {
        $shop = Nguoidung::where('id',$id)->first();
        $soluong = Sanpham::where('idnguoidung',$id);
        $sanpham = Sanpham::where('idnguoidung',$id)->paginate(12);
        return view('page.sanphamshop',compact('sanpham','soluong','shop'));
    }
public function getdangkyshop()
    {
        return view('page.dangkyshop');
    }
public function postdangkyshop(Request $req)
    {
        $pattern = '/^[0]\d{8,9}$/';
        $cmnd = $req->socmnd;

        $rules=[
            'socmnd'=>'required|unique:nguoidung,cmnd|digits_between:9,10',
            'anhcmnd'=>'required|image',
        ];
        $messages=[
            'socmnd.required'=>'Vui lòng nhập số chứng minh nhân dân',
            'socmnd.digits_between'=>'Số chứng minh nhân dân phải 9 hoặc 10',
            'socmnd.unique'=>'Số cmnd này đã tồn tại',
            'anhcmnd.required'=>'Vui lòng chọn hình',
            'anhcmnd.image'=>'Không đúng định dạng hình .' ,
        ];
        $validator =  Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){ 
            return redirect()->back()->withErrors($validator)->withInput($req->all());
        }
        else
        {
            $file = $req->file('anhcmnd');
            $filename= Auth::user()->id.'_'.$file->getClientOriginalName('anhcmnd');
            $file->move('images/nguoidung',$filename);
            $update=[
                'cmnd'=>$cmnd,
                'anhcmnd'=>$filename,
                'shop'=>2,
            ];
            DB::table('nguoidung')->where('id',Auth::user()->id)->update($update);
            $thongbao="Đã đăng kí thành công , vui lòng bạn chờ đợi admin duyệt xin cám ơn";
            return view('page.dangkyshop',compact('thongbao'));
        }
    }
public function getduyettv($id)
    {
        DB::table('nguoidung')->where('id',$id)->update(['shop'=>1]);
        $thongbao="duyệt thành công";
        $nguoidung =  DB::table('nguoidung')->where('shop',2)->paginate(3);
        return redirect()->back()->with('thanhcong','Duyệt đăng kí shop thành công');
    }
public function getxoatv($id)
    {
        DB::table('nguoidung')->where('id',$id)->update(['shop'=>0]);
        $nguoidung =  DB::table('nguoidung')->where('shop',2)->paginate(3);
        $thongbao="xóa thành công";
        return view('page.Quanlyuseradmin',compact('thongbao','nguoidung'));
    }
public function getchitiettv($id)
    {
        $nguoidung=Nguoidung::where('id',$id)->first();
        return view('page.chitiettv',compact('nguoidung'));
    }
// getQuenmatkhau
public function getQuenmatkhau()
    {
        if(Auth::check())
        {
            return redirect()->route('trang-chu');
        }
        else{
            return view('page.Quenmatkhau');
        }
    }  
    public function postQuenmatkhau(Request $request)
    {
   

     $rules=[
      
            'email'=>'email|between:3,100',           
        ];
        $messages=[
     
            'email.email'=>'Vui lòng nhập đúng định dang email',
            'email.between'=>'Vui lòng xác nhận mật khẩu có kí tự từ 3 đến 100',                   
        ];
          $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        else
        {
           
            $kiemtra = Nguoidung::where('email',$request->email)->first();

            $kiemtrataikhoangoogle = Nguoidung::where('email',$request->email)->where('social','google')->first();
            if($kiemtrataikhoangoogle)
            {
                return redirect()->back()->with('sai',' email đăng nhập bằng google không có mật khẩu trong TIPE');
            }
            else
            {
                if(!$kiemtra)
                {
                    return redirect()->back()->with('sai',' email không tồn tại');
                }
                else
                {
                    $thoigian =  Carbon::now() ;
                   
                    $arrayName = array('email' => $request->email ,'rand' =>rand() ,); 
                    $mahoa = base64_encode(json_encode($arrayName));
                   
                    $kiemtra->madoimatkhau = $mahoa;
                    $kiemtra->thoigianquydinh = $thoigian;
                    $kiemtra->save();

                    $email = $request->email;
                    $data['tennguoidung'] = DB::table('nguoidung')->where('email',$request->email)->get();
                    $data['nguoidung'] = $request->all();
                    $data['matkhau'] = route('laylaimatkhau',[$mahoa]);
                    Mail::send('page.emaillaylaimatkhau', $data,function($msg) use ($email) {
                        $msg->from('datphat23101997@gmail.com','Lưu đat phát');
                        $msg->to($email,$email);
                        $msg->subject('Lấy lại mật khẩu');
                    });
                   return redirect()->back()->with('dung','Vui lòng kiểm tra email');
                }
            }
           
        }
        
    }  
    public function getLaylaimatkhau($id)
    {
         if(Auth::check())
        {
            return redirect()->route('trang-chu');
        }
        else{

      
             $matkhau = json_decode(base64_decode($id));

             if (!isset($matkhau)) 
             {
                
                return redirect()->route('quenmatkhau')->with('sai','Vui lòng kiểm tra đường dẫn');
            }
            else
            {
                            $email = $matkhau->email;
                     
                         $kiemtra =  Nguoidung::where('email',$email)->first();

                        
                        if( $kiemtra['madoimatkhau'] == ""  )
                        {

                                return redirect()->route('trang-chu');
                            
                        }else
                        {
                            $xacthuc =  json_decode(base64_decode($kiemtra['madoimatkhau']));
                             if($xacthuc->rand == $matkhau->rand )
                             {
                       
                                if(!$kiemtra)
                                {
                                    return redirect()->route('quenmatkhau')->with('sai','Không đúng tên đăng nhập');
                                }
                                else
                                {

                                  $thoigian = Carbon::now();
                                  $sosanh= $thoigian->diffInSeconds($kiemtra['thoigianquydinh']);  
                                  if($sosanh>59)
                                  {
                                    
                                    return redirect()->route('quenmatkhau')->with('quathoigian','Quá thời gian đổi mật khẩu');
                                  }
                                  else
                                  {
                                    $data['id'] = $id;
                                    return view('page.laymatkhau',$data);
                                  }
                              }
                          }
                          else
                          {
                             return redirect()->route('trang-chu');
                          }
                      }
            } 
        }               
    }  
    //postLaylaimatkhau
public function postLaylaimatkhau(Request $request)
        {

            $rules=[
             
                'password'=>'required_with:password_confirm|same:password_confirm|between:3,20',
                'password_confirm'=>'between:3,20',           
            ];
            $messages=[
                
                'password.required_with'=>'Vui lòng nhập mật khẩu mới và xác nhận mật khẩu',
                'password.same'=>'Mật khẩu mới và xác nhận trong không trùng',
                'password.between'=>'Vui lòng mật khẩu  có kí tự từ 3 đến 20',
                'password_confirm.between'=>'Vui lòng xác nhận mật khẩu có kí tự từ 3 đến 20',                    
            ];
            $validator = Validator::make($request->all(),$rules,$messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
            else
            {
                $id =  $request->id;
                $matkhau = json_decode(base64_decode($id));echo "<br>";
                $email = $matkhau->email;
                $kiemtra =  Nguoidung::where('email',$email)->first();
                $kiemtra->madoimatkhau = "";
                $kiemtra->password =bcrypt($request->password);
                $kiemtra->save();
                return redirect()->route('login')->with('dung','Thay đổi thành công, hãy đăng nhập ngay');
               
                
            }

        }  
/////////////google
public function redirectrgoogle()
    {
        return Socialite::driver('google')->redirect();

    }
    public function Callbackgoogle()
    {
        $user = Socialite::driver('google')->user();
        // dd($user);
        $google = 'google';
          $nguoidungfb = Nguoidung::where('social_id',$user->id)->where('social',$google)->first();

            if($nguoidungfb)
            {
               if(Auth::attempt(['username'=>$user->id,'password'=>$user->id ,'social'=>$google]))
               {
                return redirect()->intended('/');
                }
            }
            else
            {
               $kiemtraemail = Nguoidung::where('email',$user->email)->first();
               if($kiemtraemail)
               {
                //return redirect()->back()->with('err','Email đã có người sử dụng ');
                 return redirect()->route('login')->with('err','Email đã có người sử dụng ');
                // echo "string";
               }
               else
               {
                $kiemtratendangnhap = Nguoidung::where('username',$user->email)->first();
                    if($kiemtratendangnhap)
                    {
                        // return redirect()->back()->with('err','Tài khoản đã có người sử dụng ');
                        return redirect()->route('login')->with('err','Tài khoản đã có người sử dụng ');
                    }
                    else
                    {
                       $themnguoidung = New nguoidung;

                       $themnguoidung->username = $user->id;
                       $themnguoidung->password = bcrypt($user->id);
                       $themnguoidung->ten = $user->name;
                        $themnguoidung->email = $user->email;
                        $a = DB::table('nguoidung')->select('tenshop')->where('tenshop', $user->name)->get();
                        if(count($a)>0)
                        {
                             $themnguoidung->tenshop = $user->email.rand();
                        }
                        else
                        {
                             $themnguoidung->tenshop = $user->email.rand();
                        }
                        $themnguoidung->avatar = 'abc.jpg';
                        $themnguoidung->social = $google;
                        $themnguoidung->social_id = $user->id;
                        $themnguoidung->save();

                        if(Auth::attempt(['username'=>$user->id,'password'=>$user->id ,'social'=>$google]))
                        {
                            return redirect()->intended('/');
                        }
            
                    }
               }
            }


    }        



}
