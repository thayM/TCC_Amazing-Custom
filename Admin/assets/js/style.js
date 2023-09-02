// MODAIS -- add blur e overflow
function addStyle() {
  body.classList.add("overflow");
  header.classList.add("blur");
  main.classList.add("blur");
}

function removeStyle() {
  body.classList.remove("overflow");
  header.classList.remove("blur");
  main.classList.remove("blur");
}

// CARD MODELO
const img = document.querySelectorAll(".produto_img");

img.forEach(item => {
  let height = item.clientHeight;
  let width = item.clientWidth;

  (height > width) ? item.classList.add("h-100") : item.classList.add("w-100");
});

// CARD FRAGRÂNCIA
const cardInner = document.querySelectorAll(".inner");
const cardTitle_Element = document.querySelectorAll(".content_card-produto>h3");
const cardText_Element  = document.querySelectorAll(".content_card-produto>p");

cardInner.forEach((item, i) => {
  const cardTitle = cardTitle_Element[i];
  const cardText  = cardText_Element[i];

  let lengthTitle = cardTitle.innerText.length;
  let lengthText  = cardText.innerText.length;

  item.classList.add((lengthTitle > 16 || lengthText > 36) ? "aumentarCard" : null);
});