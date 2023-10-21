function searchProducts() {
  var searchText = document.querySelector('.search-input').value.toLowerCase();
  var category = document.querySelector('.category-select').value;
  var products = document.querySelectorAll('.card');
  var searchResultsList = document.querySelector('.search-results-list');
  var searchDropdown = document.querySelector('.search-dropdown');

  searchResultsList.innerHTML = '';
  searchDropdown.classList.remove('active');

  var searchCount = 0;
  var hasSearchText = searchText.trim() !== '';

  for (var i = 0; i < products.length; i++) {
    var product = products[i];
    var title = product.querySelector('.card-text font:first-child font:first-child').textContent.toLowerCase();
    var categoryValue = product.querySelector('.card-text span:last-child').textContent.toLowerCase();
    var addToCartElement = product.querySelector('.add-to-cart');
    
    if (addToCartElement) { // Kiểm tra nếu có phần tử add-to-cart
      var dataId = addToCartElement.getAttribute('data-id');

      var matchSearchText = title.indexOf(searchText) !== -1;
      var matchCategory = category === 'all' || categoryValue.indexOf(category) !== -1;

      if (hasSearchText && matchSearchText && matchCategory) {
        product.style.display = 'block';

        var listItem = document.createElement('li');
        var link = document.createElement('a');

        // Tạo URL dựa trên data-id và đường dẫn cố định
        link.href = 'http://127.0.0.1:8000/product/' + dataId;

        link.textContent = title;
        link.style.cursor = 'pointer';
        link.onclick = function() {
          window.location.href = this.href;
        };
        listItem.appendChild(link);
        searchResultsList.appendChild(listItem);

        searchCount++;
      }
    }
  }

  if (hasSearchText && searchCount > 0) {
    searchDropdown.classList.add('active');
  }
}
