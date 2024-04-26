let playList = document.querySelector(".playList");
let body = document.querySelector("body");

console.log(playList);

playList.addEventListener("click", () => {
  let div = document.createElement("div");
  body.appendChild(div);
  div.classList.add("display");
});
