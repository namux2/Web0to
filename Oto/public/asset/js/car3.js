// Lắng nghe sự kiện click trên nút "Thêm vào giỏ hàng"
var addToCartButtons = document.getElementsByClassName('add-to-cart');
for (var i = 0; i < addToCartButtons.length; i++) {
  var button = addToCartButtons[i];
  button.addEventListener('click', addToCartClicked);
}

// Lắng nghe sự kiện click trên nút "Giỏ hàng"
var cartButton = document.getElementById('cart');
cartButton.addEventListener('click', openCartModal);

// Lắng nghe sự kiện click trên nút đóng modal
var closeButton = document.getElementsByClassName('close')[0];
closeButton.addEventListener('click', closeCartModal);

// Lắng nghe sự kiện click trên nút đóng modal (footer)
var closeFooterButton = document.getElementsByClassName('close-footer')[0];
closeFooterButton.addEventListener('click', closeCartModal);

// Lắng nghe sự kiện click trên nút "Thanh Toán"
var orderButton = document.getElementsByClassName('order')[0];
orderButton.addEventListener('click', placeOrder);

// Hàm xử lý sự kiện khi nút "Thêm vào giỏ hàng" được click
function addToCartClicked(event) {
  var button = event.currentTarget;
  var productId = button.getAttribute('data-id');
  var productTitle = button.getAttribute('data-title');
  var productPriceText = button.getAttribute('data-price');
  var productImage = button.getAttribute('data-image');

  // Sử dụng hàm chuyển đổi giá thành số
  var productPrice = convertPriceToNumber(productPriceText);

  addItemToCart(productId, productTitle, productPrice, productImage);
  updateCartTotal();
}

// Hàm thêm sản phẩm vào giỏ hàng
function addItemToCart(productId, title, price, image) {
  var cartRow = document.createElement('div');
  cartRow.classList.add('cart-row');
  cartRow.setAttribute('data-id', productId); // Thêm thuộc tính data-id vào cartRow

  var cartItems = document.getElementsByClassName('cart-items')[0];
  var cartItemNames = cartItems.getElementsByClassName('cart-item-title');
  for (var i = 0; i < cartItemNames.length; i++) {
    if (cartItemNames[i].innerText === title) {
      alert('Sản phẩm đã có trong giỏ hàng!');
      return;
    }
  }

  var cartRowContents = `
    <div class="cart-item cart-column">
      <img class="cart-item-image" src="${image}" width="100" height="100">
      <span class="cart-item-title">${title}</span>
    </div>
    <span class="cart-price cart-column" style="display:contents;">${price} VND</span>
    <div class="cart-quantity cart-column">
      <input class="cart-quantity-input" type="number" value="1">
      <button class="btn btn-danger" type="button">Xóa</button>
    </div>`;
  cartRow.innerHTML = cartRowContents;
  cartItems.append(cartRow);

  cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem);
  cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged);

  alert('Sản phẩm đã được thêm vào giỏ hàng!');
  updateCartTotal();
}

// Hàm cập nhật tổng giá trị của giỏ hàng
function updateCartTotal() {
  var cartItemContainer = document.getElementsByClassName('cart-items')[0];
  var cartRows = cartItemContainer.getElementsByClassName('cart-row');
  var total = 0;
  for (var i = 0; i < cartRows.length; i++) {
    var cartRow = cartRows[i];
    var priceElement = cartRow.getElementsByClassName('cart-price')[0];
    var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0];
    var priceText = priceElement.innerText;

    // Sử dụng regex để loại bỏ tất cả ký tự không phải là số hoặc dấu phẩy và chuyển đổi thành số
    var priceValue = parseFloat(priceText.replace(/[^0-9,.]/g, '').replace(',', ''));

    var quantity = quantityElement.value;
    total += priceValue * quantity;
  }

  // total giờ sẽ là tổng giá trị số học của giỏ hàng
  document.getElementsByClassName('cart-total-price')[0].innerText = total;
}

// Hàm xử lý sự kiện khi nút "Xóa" được click
function removeCartItem(event) {
  var buttonClicked = event.target;
  buttonClicked.parentElement.parentElement.remove();
  updateCartTotal();
}

// Hàm xử lý sự kiện khi số lượng sản phẩm thay đổi
function quantityChanged(event) {
  var input = event.target;
  if (isNaN(input.value) || input.value <= 0) {
    input.value = 1;
  }
  updateCartTotal();
}

// Hàm mở modal giỏ hàng
function openCartModal() {
  var modal = document.getElementById('myModal');
  modal.style.display = 'block';
}

// Hàm đóng modal giỏ hàng
function closeCartModal() {
  var modal = document.getElementById('myModal');
  modal.style.display = 'none';
}

// Hàm xử lý sự kiện khi nút "Thanh Toán" được click
function placeOrder() {
  var cartItems = document.getElementsByClassName('cart-items')[0];
  while (cartItems.hasChildNodes()) {
    cartItems.removeChild(cartItems.firstChild);
  }
  updateCartTotal();
  alert('Cảm ơn bạn đã đặt hàng! Đơn hàng của bạn đã được gửi đi.');
}

// Hàm chuyển đổi giá từ chuỗi chữ thành số
function convertPriceToNumber(priceText) {
  var billion = 0;
  var million = 0;

  // Tách và lấy các phần tử số từ văn bản
  var priceParts = priceText.match(/\d+/g);

  if (priceParts) {
    if (priceParts.length >= 1) {
      billion = parseFloat(priceParts[0]);
    }
    if (priceParts.length >= 2) {
      million = parseFloat(priceParts[1]);
    }
  }

  // Chuyển đổi thành số
  var price = billion * 1000000000 + million * 1000000;

  return price;
}
