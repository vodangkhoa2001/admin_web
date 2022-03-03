<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Cpu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\SanPham;
use App\Models\DongSanPham;
use App\Models\NhaSanXuat;
use App\Models\MauSac;
use App\Models\Ram;
use App\Models\ManHinh;
use App\Models\CardDoHoa;
use App\Models\OCung;

class SanPhamController extends Controller
{
    //chạy lệnh này để hiện ảnh: php artisan storage:link
    // protected function fixImage(SanPham $sanPham){
    //     if(Storage::disk('public')->exists($sanPham->HinhAnh)){
    //         $sanPham->HinhAnh = Storage::url($sanPham->HinhAnh);
    //     }else {
    //         $sanPham->HinhAnh= '/img/no_image_placeholder.png';
    //     }
    // }
    public function index(){
        $lstSanPham = SanPham::all();
        //$lstDongSanPham = DongSanPham::all();
        // foreach($lstSanPham as $sanPham){ 
        //     $this -> fixImage($sanPham);
        // }
        return view('component.product.list_product',compact('lstSanPham'));
    }
    public function detail($id){
        $detailProduct = SanPham::find($id);
        return view('component.product.show_detail_product',['sanPham'=>$detailProduct]);
    }
    public function show(SanPham $sanPham){
        //$this->fiximage($sanPham);
        $lstDongSanPham = DongSanPham::all();
        $lstNhaSanXuat = NhaSanXuat::all();
        return view('component.product.show_product',['sanPham'=>$sanPham,'lstDongSanPham'=>$lstDongSanPham,'lstNhaSanXuat'=>$lstNhaSanXuat]);
    }
    public function edit(SanPham $sanPham){
        //$this->fiximage($sanPham);
        $lstDongSanPham = DongSanPham::all();
        $lstNhaSanXuat = NhaSanXuat::all();
        $lstMauSac = MauSac::all();
        $lstRAM = Ram::all();
        $lstCPU = Cpu::all();
        $lstManHinh = ManHinh::all();
        $lstCardDoHoa = CardDoHoa::all();
        $lstOCung = OCung::all();
        //return view('component/product/edit_product',['sanPham'=>$sanPham,'lstLoai'=>$lstLoai]);
        return view('component.product.edit_product',['sanPham'=>$sanPham,'lstDongSanPham'=>$lstDongSanPham,'lstNhaSanXuat'=>$lstNhaSanXuat,'lstMauSac'=>$lstMauSac,'lstRAM'=>$lstRAM,'lstManHinh'=>$lstManHinh,'lstCardDoHoa'=>$lstCardDoHoa,'lstOCung'=>$lstOCung,'lstCPU'=>$lstCPU,]);
    }
    public function update(Request $request, SanPham $sanPham){
        // if($request->hasFile('HinhAnh')){
        //     $sanPham->HinhAnh=$request->file('HinhAnh')->store('product/images/'.$sanPham->id,'public');
        // }
        if($request->hasFile('hinhanh')){
            $newImg = $request->file('hinhanh')->getClientOriginalName();
            $request->hinhanh->storeAs('product/images', $newImg);
            $sanPham->HinhAnh = $newImg;
        }
        $sanPham->fill([
            'TenSanPham'=>$request->input('tensanpham'),
            'GiaNhap'=>$request->input('gianhap'),
            'GiaBan'=>$request->input('giaban'),
            'SoLuong'=>$request->input('soluong'),
            'MaNhaSanXuat'=>$request->input('nhasanxuat'),
            'MaDongSanPham'=>$request->input('dongsanpham'),
            'MaMau'=>$request->input('mausac'),
            'MaRam'=>$request->input('ram'),
            'MaOCung'=>$request->input('ocung'),
            'MaManHinh'=>$request->input('manhinh'),
            'MaCardDoHoa'=>$request->input('carddohoa'),
            'MaCPU'=>$request->input('cpu'),
            'MoTa'=>$request->input('mota'),
            'TrangThai'=>$request->input('active'),
        ]);
        $sanPham->save();
        return Redirect::route('sanPham.show',['sanPham'=>$sanPham]);
    }
    public function create(){
        $lstDongSanPham= DongSanPham::all();
        $lstNhaSanXuat = NhaSanXuat::all();
        $lstMauSac = MauSac::all();
        $lstRAM = Ram::all();
        $lstCPU = Cpu::all();
        $lstManHinh = ManHinh::all();
        $lstCardDoHoa = CardDoHoa::all();
        $lstOCung = OCung::all();
        $countAllProducts = SanPham::all()->count() + 1;
        $chuoiID = $countAllProducts;
        if ($countAllProducts > 99)
            $chuoiID = $countAllProducts;

        if ($countAllProducts > 9)
            $chuoiID = '0' . $countAllProducts;
        else
            $chuoiID = '00' . $countAllProducts;

        $originalId = $chuoiID;
        $finalId = 'SP_' . $originalId;
        //return view('component/product/create_product',['lstLoai'=>$lstLoai]);
        return view('component.product.create_product',['lstDongSanPham'=>$lstDongSanPham,'lstNhaSanXuat'=>$lstNhaSanXuat,'finalId'=> $finalId,'lstMauSac'=>$lstMauSac,'lstRAM'=>$lstRAM,'lstManHinh'=>$lstManHinh,'lstCardDoHoa'=>$lstCardDoHoa,'lstOCung'=>$lstOCung,'lstCPU'=>$lstCPU]);
    }
    public function store(Request $request){
        // $validateData = $request->validate([
        //     'TenSanPham'=>['required','unique:san_phams,ten_san_pham','max:255'],//unique không được trùng
        //     'MoTa'=>['required'],
        //     'SoLuong'=>['required','numeric','integer','min:0'],
        //     'GiaNhap'=>['required','numeric','integer','min:0'],
        //     'GiaBan'=>['required','numeric','integer','min:0'],
        //     'DongSanPham'=>['required','numeric','integer'],
        //     'NhaSanXuat'=>['required','numeric','integer'],
        //     'HinhAnh'=>['required','mimetypes:image/*','integer','max:2000'],//hoặc image/png,jpg
        // ]);

        $sanPham= new SanPham;
        $sanPham->id = $request->id;
        $sanPham->TenSanPham = $request->tensanpham;
        $sanPham->MoTa = $request->mota;
        $sanPham->SoLuong = $request->soluong;
        $sanPham->GiaNhap = $request->gianhap;
        $sanPham->GiaBan = $request->giaban;
        $sanPham->MaDongSanPham = $request->dongsanpham;
        $sanPham->MaNhaSanXuat = $request->nhasanxuat;
        $sanPham->MaMau = $request->mausac;
        $sanPham->MaManHinh = $request->manhinh;
        $sanPham->MaOCung = $request->ocung;
        $sanPham->MaCardDoHoa = $request->carddohoa;
        $sanPham->MaCPU = $request->cpu;
        $sanPham->MaRam = $request->ram;
        $sanPham->TrangThai = $request->active;
        $nameImg = $request->file('hinhanh')->getClientOriginalName();
        $request->hinhanh->storeAs('product/images', $nameImg);
        $sanPham->HinhAnh = $nameImg;
        // $sanPham ->fill([
        //     'id'=>$request->input('id'),
        //     'TenSanPham'=>$request->input('tensanpham'),
        //     'MoTa'=>$request->input('mota'),
        //     'SoLuong'=>$request->input('soluong'),
        //     'GiaNhap'=>$request->input('gianhap'),
        //     'GiaBan'=>$request->input('giaban'),
        //     'MaDongSanPham'=>$request->input('dongsanpham'),
        //     'MaNhaSanXuat'=>$request->input('nhasanxuat'),
        //     // 'HinhAnh'=> $request->file('HinhAnh')->getClientOriginalName(),
        //     // $sanPham->HinhAnh = $nameImg,
        //     // $request->HinhAnh->storeAs('admin/images', $nameImg),
        //     $nameImg = $request->file('hinhanh')->getClientOriginalName(),
        //     'HinhAnh'=>$nameImg,
        //     $request->hinhanh->storeAs('product/images', $nameImg),
        // ]);
        $sanPham->save();
        return Redirect::route('sanPham.show',['sanPham'=>$sanPham])->with('message', 'Sản phẩm được tạo thành công với ID: ' . $sanPham->id);
    }
    public function destroy(SanPham $sanPham){
        $sanPham ->delete();
        return Redirect::route('sanPham.index');
    }
    // public function findProductDetailByProduct($masp){
    //     $sp = DB::table('SanPham')->join('ChiTietSanPham', 'SanPham.id','=','ChiTietSanPham.MaSanPham')->where('SanPham.id',$masp)->select('SanPham.*','ChiTietSanPham.*')->first();
    //     //dd($sp);
    //     return view('component.product.product_detail.show_detail',compact('sp'));
    // }

}
