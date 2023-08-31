const img = document.querySelectorAll(".produto_img");

img.forEach(item => {
  let height = item.clientHeight;
  let width = item.clientWidth;

  (height > width) ? item.classList.add("h-100") : item.classList.add("w-100");
});

const cardInner = document.querySelectorAll(".inner");

cardInner.forEach(element => {
  const cardTitle = document.querySelector(".content_card-produto>h3");
  const cardText  = document.querySelector(".content_card-produto>p");

  let lengthTitle = cardTitle.innerText;
  let lengthText = cardText.innerText;

  if(lengthTitle.length > 16) {
    element.classList.add("aumentarCard");
  } else if(lengthText.length > 16) {
    element.classList.add("aumentarCard");
  }
});