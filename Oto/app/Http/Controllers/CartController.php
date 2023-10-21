<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        $cart = session('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get();

        return view('cart.index', compact('cart', 'products'));
    }
    
    public function addToCart(Product $product)
    {
        $cart = session('cart', []);
        $productId = $product->id;

        if (array_key_exists($productId, $cart)) {
            $cart[$productId]++;
        } else {
            $cart[$productId] = 1;
        }

        session(['cart' => $cart]);

        return redirect()->route('cart.index');
    }

    public function removeFromCart(Product $product)
    {
        $cart = session('cart', []);
        $productId = $product->id;

        if (array_key_exists($productId, $cart)) {
            unset($cart[$productId]);
        }

        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xóa.');
    }

    public function checkout()
    {
        $cart = session('cart', []);
        $total = 0;
        $products = [];

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);

            if ($product) {
                $total += $product->gia_ban * $quantity;
                $products[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                ];
            }
        }

        return view('cart.checkout', compact('products', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $cart = session('cart', []);

        $order = new Order();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->dia_chi = $request->input('dia_chi');
        $order->ghi_chu = $request->input('ghi_chu');
        $order->save();

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);

            if ($product) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $product->id;
                $orderDetail->quantity = $quantity;
                $orderDetail->price = $product->gia_ban;
                $orderDetail->save();
            }
        }

        session(['cart' => []]);

        return redirect()->route('cart.index')->with('success', 'Đơn hàng đã được tạo thành công.');
    }
}
