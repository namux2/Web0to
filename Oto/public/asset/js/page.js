function convertPriceToNumber(priceText) {
var price = 0;
  var billion = 0;
  var million = 0;
  if (priceText.includes('tỷ')) {
    var priceParts = priceText.match(/\d+/g);

    if (priceParts) {
      if (priceParts.length >= 1) {
        billion = parseFloat(priceParts[0]);
      }
      if (priceParts.length >= 2) {
        million = parseFloat(priceParts[1]);
      }
    }
    price = billion * 1000000000 + million * 1000000;
  } else if (priceText.includes('triệu')) {
    price = parseFloat(priceText) * 1000000;
  } else {
    price = parseFloat(priceText);
  }

  return price;
}

const itemsPerPage = 24;

const itemsContainer = document.getElementById('items');
const originalItems = Array.from(itemsContainer.getElementsByClassName('col-md-3'));
let filteredItems = originalItems;

// Tính tổng số trang dựa trên số lượng phần tử phù hợp
const totalPages = Math.ceil(filteredItems.length / itemsPerPage);

// Xóa tất cả các nút phân trang hiện tại
const paginationContainer = document.querySelector('.pagination');
paginationContainer.innerHTML = '';

// Tạo nút phân trang cho từng trang
for (let i = 1; i <= totalPages; i++) {
  const li = document.createElement('li');
  li.classList.add('page-item');
  const link = document.createElement('a');
  link.classList.add('page-link');
  link.href = '#';
  link.textContent = i;
  li.appendChild(link);
  paginationContainer.appendChild(li);
}

// Hiển thị trang đầu tiên
showPage(1);

// Thêm sự kiện click cho các nút phân trang
paginationContainer.addEventListener('click', function(event) {
  event.preventDefault();

  if (event.target.classList.contains('page-link')) {
    const pageNumber = parseInt(event.target.textContent);
    showPage(pageNumber);
  }
});

// Thêm sự kiện click cho nút lọc
const filterButton = document.getElementById('filterButton');
filterButton.addEventListener('click', function() {
  const brand = document.getElementById('filterBrand').value;
  const location = document.getElementById('filterLocation').value;
  const year = document.getElementById('filterYear').value;
  const transmission = document.getElementById('filterTransmission').value;
  const mileage = document.getElementById('filterMileage').value;
  const price = document.getElementById('filterPrice').value;
  const type = document.getElementById('filterType').value;

  // Lọc và cập nhật danh sách phần tử phù hợp
  filteredItems = originalItems.filter(function(item) {
    const productBrand = item.getAttribute('data-brand');
    const productLocation = item.getAttribute('data-location');
    const productYear = item.getAttribute('data-year');
    const productTransmission = item.getAttribute('data-transmission');
    const productMileage = item.getAttribute('data-mileage');
    const productPriceText = item.getAttribute('data-price'); // Lấy giá tiền dưới dạng văn bản
    const productPrice = convertPriceToNumber(productPriceText); // Chuyển đổi giá tiền thành số
    const productType = item.getAttribute('data-type');

    const shouldDisplay =
      (brand === '' || brand === 'all' || productBrand === brand) &&
      (location === '' || location === 'all' || productLocation === location) &&
      (year === '' || year === 'all' || productYear === year) &&
      (transmission === '' || transmission === 'all' || productTransmission === transmission) &&
      (mileage === '' || mileage === 'all' || productMileage <= mileage) &&
      (price === '' || price === 'all' || (productPrice !== null && isPriceInRange(productPrice, price))) &&
      (type === '' || type === 'all' || productType === type);

    return shouldDisplay;
  });

  // Tính tổng số trang mới dựa trên số lượng phần tử phù hợp
  const newTotalPages = Math.ceil(filteredItems.length / itemsPerPage);

  // Xóa tất cả các nút phân trang hiện tại
  paginationContainer.innerHTML = '';

  // Tạo nút phân trang cho từng trang mới
  for (let i = 1; i <= newTotalPages; i++) {
    const li = document.createElement('li');
    li.classList.add('page-item');
    const link = document.createElement('a');
    link.classList.add('page-link');
    link.href = '#';
    link.textContent = i;
    li.appendChild(link);
    paginationContainer.appendChild(li);
  }

  // Hiển thị trang đầu tiên sau khi đã lọc
  showPage(1);
});

// Hàm hiển thị các phần tử của trang được chọn
function showPage(pageNumber) {
  const startIndex = (pageNumber - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;

  // Ẩn tất cả các phần tử
  originalItems.forEach(function(item) {
    item.style.display = 'none';
  });

  // Hiển thị các phần tử của trang được chọn
  const itemsToShow = filteredItems.slice(startIndex, endIndex);
  itemsToShow.forEach(function(item) {
    item.style.display = 'block';
  });
}

function isPriceInRange(productPrice, selectedPrice) {
  if (selectedPrice === '0-500000000') {
    return productPrice < 500000000;
  } else if (selectedPrice === '500000000-1000000000') {
    return productPrice >= 500000000 && productPrice < 1000000000;
  } else if (selectedPrice === '1000000000-2000000000') {
    return productPrice >= 1000000000 && productPrice < 2000000000;
  } else if (selectedPrice === '2000000000-5000000000') {
    return productPrice >= 2000000000 && productPrice < 5000000000;
  } else if (selectedPrice === '5000000000') {
    return productPrice >= 5000000000;
  }
  return true; // Tất cả các giá trị khác sẽ hiển thị
}
