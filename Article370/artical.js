let song = [
  {
    id: 1,
    name: "Dua",
    audio: new Audio("_Dua(PagalWorld.com.cm).mp3"),
    time: "4:38",
  },
  {
    id: 2,
    name: "Aandhi",
    audio: new Audio("Aandhi(PagalWorld.com.cm).mp3"),
    time: "3:34",
  },
  {
    id: 3,
    name: "Ishq Tera",
    audio: new Audio("Ishq Tera(PagalWorld.com.cm).mp3"),
    time: "3:45",
  },
  {
    id: 4,
    name: "Main Hoon",
    audio: new Audio("Main Hoon(PagalWorld.com.cm).mp3"),
    time: "3:21",
  },
  {
    id: 5,
    name: "Main Tujhe Phir Miloongi",
    audio: new Audio("Main Tujhe Phir Miloongi(PagalWorld.com.cm).mp3"),
    time: "5:32",
  },
  {
    id: 6,
    name: "Najariya LoFi Cake Mix",
    audio: new Audio("Najariya LoFi Cake Mix(PagalWorld.com.cm).mp3"),
    time: "2:36",
  },
];

let change = document.querySelectorAll(".song");

let h2 = document.querySelectorAll(".song h2");
let time = document.querySelectorAll(".time");
let musicPlay = document.querySelectorAll("button");
console.log(musicPlay);
change.forEach((e, i) => {
  time[i].innerHTML = song[i].time;
  h2[i].innerHTML = song[i].name;
  musicPlay[i].addEventListener("click", () => {
    if (song[i].audio.paused || song[i].audio.currentTIme <= 0) {
      musicPlay.forEach((e, i) => {
        song[i].audio.pause();
      });
      song[i].audio.play();
    } else {
      song[i].audio.pause();
    }
  });
});
