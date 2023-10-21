$(() => {

  let currentIndex = 0;
  const mainImg = $('#main-img');

  // Xử lý sự kiện khi nhấp vào ảnh nhỏ trong các đoạn văn bản <p>
  $('p img').click(function() {
    // Lấy đường dẫn ảnh được nhấp vào
    let imgPath = $(this).attr('src');
    // Thay đổi đường dẫn ảnh chính
    mainImg.attr('src', imgPath);
    // Cập nhật chỉ số ảnh hiện tại
    currentIndex = images.indexOf(imgPath);
  });
});