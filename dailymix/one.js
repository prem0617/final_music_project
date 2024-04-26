let song = [
  {
    id: 1,
    name: "Apna-Bana-Le",
    audio: new Audio("Apna-Bana-Le(PagalWorld).mp3"),

    time: "3:24",
  },
  {
    id: 3,
    name: "Sanu Kehndi",
    audio: new Audio("Sanu Kehndi _ Kesari.mp3"),
    time: "2:54",
  },
  {
    id: 4,
    name: "Ek Onkar",
    audio: new Audio("Jassi Jasraj - Ek Onkar  - Various.mp3"),
    time: "7:17",
  },
  {
    id: 4,
    name: "World Record 175",
    audio: new Audio("World Record 175 - 83.mp3"),
    time: "1:42",
  },
  {
    id: 5,
    name: "Yeh Hausle",
    audio: new Audio("Yeh Hausle - 83.mp3"),
    time: "4:03",
  },
  {
    id: 6,
    name: "Utth Ja Ziddi Re",
    audio: new Audio("Utth Ja Ziddi Re - 83.mp3"),
    time: "3:58",
  },
  {
    id: 7,
    name: "Main Tujhe Phir Miloongi",
    audio: new Audio("Main Tujhe Phir Miloongi(PagalWorld.com.cm).mp3"),
    time: "5:32",
  },
  {
    id: 8,
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
