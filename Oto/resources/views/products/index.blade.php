<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>

    <form method="GET" action="{{ route('products.index') }}">
        <label for="filterBrand">Lọc theo hãng xe:</label>
        <select name="filterBrand" id="filterBrand">
            <option value="">Tất cả</option>
            <option value="Toyota">Toyota</option>
            <option value="BMW">BMW</option>
            <option value="Honda">Honda</option>
            <option value="Ford">Ford</option>
        </select>

        <label for="filterYear">Lọc theo năm sản xuất:</label>
        <select name="filterYear" id="filterYear">
            <option value="">Tất cả</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <!-- Thêm các năm khác ở đây -->
        </select>

        <label for="filterPrice">Lọc theo giá bán:</label>
        <select name="filterPrice" id="filterPrice">
            <option value="">Tất cả</option>
            <option value="0-500000000">Dưới 500 triệu</option>
            <option value="500000000-1000000000">500 triệu - 1 tỷ</option>
            <option value="1000000000-2000000000">1 tỷ - 2 tỷ</option>
            <!-- Thêm các phạm vi giá khác ở đây -->
        </select>

        <label for="filterType">Lọc theo loại xe:</label>
        <select name="filterType" id="filterType">
            <option value="">Tất cả</option>
            <option value="Sedan">Sedan</option>
            <option value="Hatchback">Hatchback</option>
            <option value="SUV">SUV</option>
            <!-- Thêm các loại xe khác ở đây -->
        </select>

        <button type="submit" id="filterButton">Lọc</button>
    </form>

    <!-- Hiển thị danh sách sản phẩm sau lọc -->
    <div class="container">
        <div class="row" id="items">
            @foreach($products as $product)
            <div class="col-md-3" data-brand="{{ $product->hang_xe }}" data-year="{{ $product->nam_san_xuat }}" data-price="{{ $product->gia_ban }}" data-type="{{ $product->kieu_dang }}">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" data-src="" alt="Hình thu nhỏ [100%x225]" style="height: 225px; width: 100%; display: block;" src="http://localhost/Oto/storage/app/public/{{ $product->anh }}" alt="Hình ảnh {{ $product->ten_xe }}" data-holder-rendered="true">
                    <div class="card-body">
                        <p class="card-text">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ $product->ten_xe }}</font>
                                <br>
                                <span>Năm Sản Xuất: {{ $product->nam_san_xuat }}</span>
                                <br>
                                <span>Động Cơ: {{ $product->dong_co }}-{{ $product->so_km }}Km</span>
                                <br>
                                <span>Giá Bán: {{ $product->gia_ban }}</span>
                                <br>
                                <span>Nơi bán: {{ $product->noi_ban }}<br>Ngày bán: {{ $product->ngay_ban }}</span>
                            </font>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">
                                            <a href="{{ route('product.show', ['id' => $product->id]) }}" style="text-decoration:none; color: black;">Xem Chi Tiết</a>
                                        </font>
                                    </font>
                                </button>
                                <form action="{{ route('cart.add', $product) }}" method="post">
                                    @csrf
                                    <button type="submit" class="add-to-cart" data-id="{{ $product->id }}" data-title="{{ $product->ten_xe }}" data-price="{{ $product->gia_ban }}" data-image="http://localhost/Oto/storage/app/public/{{ $product->anh }}" style="padding: 7px; "><span class="gg-shopping-bag"></span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- JavaScript để xử lý lọc -->
    <script type="text/javascript">
    document.getElementById("filterButton").addEventListener("click", function () {
        const selectedBrand = document.getElementById("filterBrand").value;
        const selectedYear = document.getElementById("filterYear").value;
        const selectedPrice = document.getElementById("filterPrice").value;
        const selectedType = document.getElementById("filterType").value;

        const products = document.querySelectorAll(".col-md-3");

        products.forEach(product => {
            const productBrand = product.getAttribute("data-brand");
            const productYear = product.getAttribute("data-year");
            const productPrice = product.getAttribute("data-price");
            const productType = product.getAttribute("data-type");

            const showBrand = selectedBrand === "" || selectedBrand === productBrand;
            const showYear = selectedYear === "" || selectedYear === productYear;
            const showPrice = selectedPrice === "" || checkPrice(selectedPrice, productPrice);
            const showType = selectedType === "" || selectedType === productType;

            if (showBrand && showYear && showPrice && showType) {
                product.style.display = "block"; // Hiển thị sản phẩm
            } else {
                product.style.display = "none"; // Ẩn sản phẩm
            }
        });
    });

    // Hàm kiểm tra phạm vi giá
    function checkPrice(selectedPrice, productPrice) {
        const [min, max] = selectedPrice.split("-");
        if (min && max) {
            return parseInt(productPrice) >= parseInt(min) && parseInt(productPrice) <= parseInt(max);
        } else if (min) {
            return parseInt(productPrice) >= parseInt(min);
        }
        return false;
    }
</script>

</body>
</html>
