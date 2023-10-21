<!DOCTYPE html>
<html>
<head>
    <title>Đơn hàng đã đặt (Trang Quản trị)</title>
</head>
<body>
<h1>Search Products</h1>
    
    <form action="{{ route('search') }}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Search for products...">
        <button type="submit">Search</button>
    </form>

    <ul>
        @forelse ($products as $product)
            <li>
                <a href="{{ route('product.show', $product->id) }}">{{ $product->ten_xe }}</a>
            </li>
        @empty
        
        @endforelse
    </ul>
</body>
</html>
