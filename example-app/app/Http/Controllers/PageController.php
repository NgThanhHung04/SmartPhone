<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Product;
use App\Models\Cart;

use Hash;
use App\Models\User;
use Sesstion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function getIndex()
    {
         $slide = Slide::all();
         //$new_product = Product::where('news', 1)->paginate(4);
         $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(8);
    
        // // You can remove this line as it's unreachable due to the return statement above
        //  dd($new_product);
    
        return view('page.trangchu', compact('slide', 'sanpham_khuyenmai'));
        
    }
    

    public function getLoaiSp(Request $type)
    {
        //$sp_theoloai = Product::all();
        $sp_theoloai = Product::where('id_type', $type -> id_type)->get();
        return view('page.loai_sanpham', compact('sp_theoloai'));
    }
    
    public function getChitiet(Request $req){
        $sanpham = Product::where('id', $req->id)->first();
        if ($sanpham === null) {
            // Xử lý khi không tìm thấy sản phẩm, ví dụ: hiển thị thông báo lỗi hoặc chuyển hướng người dùng đến trang khác
            abort(404);
        }
        
        return view('page.chitiet_sanpham', compact('sanpham'));
    }

    public function getLienhe(){
        return view('page.lienhe');
    }
    public function getGioiThieu(){
        return view('page.gioithieu');
    }

    // public function getAddToCart(Request $req, $id){
    //     $product = Product::find($id);
    //     $oldCart = Session('cart')?Session::get('cart'):null;
    //     $cart = new Cart($oldCart);
    //     $cart->add($product, $id);
    //     $req->session()->put('cart', $cart);
    //     return redirect()->back();
    //     }



    public function getLogin(){
        return view('page.dangnhap');
    }

    public function getRegister(){
        return view('page.dangki');
    }
    // public function postRegister(Request $req){
    //     $this->validate($req, [
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:6|max:20',
    //         'fullname' => 'required',
    //         're_password' => 'required|same:password'
    //     ], [
    //         'email.required' => 'Vui lòng nhập email',
    //         'email.email' => 'Không đúng định dạng email',
    //         'email.unique' => 'Email đã có người sử dụng',
    //         'password.required' => 'Vui lòng nhập password',
    //         're_password.same' => 'Mật khẩu không giống nhau',
    //         'password.min' => 'Mật khẩu ít nhất có 6 kí tự'
    //     ]);
    
    //     $user = new User();
    //     $user->full_name = $req->fullname;
    //     $user->email = $req->email;
    //     $user->password = Hash::make($req->password);
    //     $user->phone = $req->phone;
    //     $user->address = $req->address;
    //     $user->save();
    
    //     return redirect()->back()->with('thanhcong', 'Tạo tài khoản thành công!!');
    // }

   
}
