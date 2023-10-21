<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function indexAdmin()
    {
        $products = Product::paginate(11); 
    
        return view('admin.listproduct', compact('products'));
    }
    
    public function donHang()
    {
        $orders = Order::with('orderDetails.product')->get();
        return view('admin.donhang', compact('orders'));
    }
    public function deleteDonHang($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('admin.donhang')->with('error', 'Không tìm thấy đơn hàng.');
        }
        $order->delete();

        return redirect()->route('admin.donhang')->with('success', 'Đơn hàng đã được xóa thành công.');
    }
    public function editDonHang($id)
    {
        $order = Order::with('orderDetails.product')->find($id);

        if (!$order) {
            return redirect()->route('admin.donhang')->with('error', 'Không tìm thấy đơn hàng.');
        }

        return view('admin.editdonhang', compact('order'));
    }

    public function updateDonHang(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->route('admin.donhang')->with('error', 'Không tìm thấy đơn hàng.');
        }

        $order->update($request->all());

        foreach ($request->input('orderDetails', []) as $orderDetailId => $data) {
            $orderDetail = OrderDetail::find($orderDetailId);
            $orderDetail->update($data);
        }

        return redirect()->route('admin.donhang')->with('success', 'Đã cập nhật đơn hàng thành công.');
    }

    public function indexPublic()
    {
        $products = Product::orderBy('created_at', 'desc')->take(8)->get();
        return view('index', compact('products'));
    }
    public function danhmuc()
{
    $products = Product::all();

    return view('danhmuc', compact('products'));
}

public function show($id)
{
    // Lấy danh sách tất cả sản phẩm
    $products = Product::inRandomOrder()->take(4)->get();
    $product = Product::find($id);

    return view('chitiet', ['products' => $products, 'product' => $product]);
}


    
    public function create()
    {
        return view('admin.up_product');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ten_xe' => 'required',
            'hang_xe' => 'required',
            'nam_san_xuat' => 'required',
            'gia_ban' => 'required',
            'noi_ban' => 'required',
            'so_km' => 'required',
            'ngay_ban' => 'required|date',
            'mo_ta' => 'required',
            'dong_xe' => 'required',
            'nhien_lieu' => 'required',
            'xuat_xu' => 'required',
            'kieu_dang' => 'required',
            'so_cho' => 'required',
            'anh' => 'required|image|mimes:jpeg,png,jpg,gif',
            'chi_tiet_anh.*' => 'required|image|mimes:jpeg,png,jpg,gif',
            'dong_co' => 'required',

        ]);
        
        if ($request->hasFile('anh')) {
            $anh = $request->file('anh');
            $anhPath = $anh->store('uploads', 'public');
            $validatedData['anh'] = $anhPath;
        }
    
        if ($request->hasFile('chi_tiet_anh')) {
            $chiTietAnhPaths = [];
            foreach ($request->file('chi_tiet_anh') as $file) {
                $chiTietAnhPath = $file->store('uploads', 'public');
                $chiTietAnhPaths[] = $chiTietAnhPath;
            }
            $validatedData['chi_tiet_anh'] = json_encode($chiTietAnhPaths);
        }
    
        Product::create($validatedData);
    
        return redirect()->route('admin.products.index')->with('success', 'Thêm Thành Công Sản Phẩm.');
    }
    


    
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.editproduct', compact('product'));
    }

    public function update(Request $request, $id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect()->route('admin.products.index')->with('error', 'Không tìm thấy sản phẩm.');
    }

    $validatedData = $request->validate([
        'ten_xe' => 'required',
        'hang_xe' => 'required',
        'nam_san_xuat' => 'required',
        'gia_ban' => 'required',
        'noi_ban' => 'required',
        'so_km' => 'required',
        'ngay_ban' => 'required|date',
        'mo_ta' => 'required',
        'dong_xe' => 'required',
        'nhien_lieu' => 'required',
        'xuat_xu' => 'required',
        'kieu_dang' => 'required',
        'so_cho' => 'required',
        'dong_co' => 'required',
    ]);

    if ($request->hasFile('anh')) {
        $imagePath = $request->file('anh')->store('public/uploads');

        if ($imagePath) {
            $imageName = basename($imagePath);
            $validatedData['anh'] = 'uploads/' . $imageName;
        } else {
            return redirect()->route('admin.products.index')->with('error', 'Lỗi khi lưu ảnh.');
        }
    }

    if ($request->hasFile('chi_tiet_anh')) {
        $chiTietAnhPaths = [];
        foreach ($request->file('chi_tiet_anh') as $file) {
            $chiTietAnhPath = $file->store('public/uploads');

            if ($chiTietAnhPath) {
                $chiTietAnhPaths[] = 'uploads/' . basename($chiTietAnhPath);
            } else {
                return redirect()->route('admin.products.index')->with('error', 'Lỗi khi lưu chi tiết ảnh.');
            }
        }
        $validatedData['chi_tiet_anh'] = json_encode($chiTietAnhPaths);
    }

    $product->update($validatedData);

    return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}


    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Sản Phẩm Đã Xóa Thành Công .');
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $products = Product::query();
    
        if ($searchTerm) {
            $products->where('ten_xe', 'like', '%' . $searchTerm . '%');
        }
    
        $products = $products->get();
    
        if ($products->isNotEmpty()) {
            $firstProduct = $products->first();
            return redirect()->route('product.show', ['id' => $firstProduct->id]);
        } else {
            return back()->with('error', 'Không tìm thấy sản phẩm.');
        }
    }
    public function loc(Request $request)
    {
        $filterLocation = $request->input('filterLocation');
    
        $products = Product::query();
    
        if ($filterLocation) {
            $products->where('noi_ban', $filterLocation);
        }
    
        $products = $products->get();
    
        return view('danhmuc', [
            'products' => $products,
            'filterLocation' => $filterLocation,
        ]);
    }
    
    
}
