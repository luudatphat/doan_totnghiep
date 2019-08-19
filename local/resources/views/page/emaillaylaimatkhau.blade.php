@foreach( $tennguoidung as $value)

<p>Xin chào bạn có tên đăng nhập là :{{$value->username}}  và email : {{$nguoidung['email']}}. </p>
@endforeach
<p>Nhấn <a href="{{$matkhau}}">vào đây </a>để đến trang đổi mật khẩu</p>