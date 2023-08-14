const img = document.querySelectorAll(".produto_img");

img.forEach(item => {
  let height = item.clientHeight;
  let width = item.clientWidth;

  (height > width) ? item.classList.add("h-100") : item.classList.add("w-100");
});