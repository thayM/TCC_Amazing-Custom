// MODAIS -- add blur e overflow
const body   = document.querySelector("body");
const header = document.querySelector("header");
const main   = document.querySelector("main");

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
  let heightTitle = cardTitle_Element[i].offsetHeight;
  let heightText  = cardText_Element[i].offsetHeight;

  if(heightTitle > 27 || heightText > 60){
    item.classList.add("aumentarCard");
  }

  item.addEventListener("mouseover", () => {
    let heightSum = heightText + heightTitle;
    if(heightSum > 87) {
      item.style.minHeight = `calc(165px + (${heightSum}px - 87px))`;
    }
  });

  item.addEventListener("mouseout", () => {item.style.minHeight = "165px"});
});