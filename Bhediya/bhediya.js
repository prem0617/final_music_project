let song = [
  {
    id: 1,
    name: "Apna-Bana-Le",
    audio: new Audio("Apna-Bana-Le(PagalWorld).mp3"),

    time: "3:24",
  },
  {
    id: 2,
    name: "The Bombay Royale",
    audio: new Audio("The Bombay Royale - Bhediya (128 kbps).mp3"),
    time: "3:42",
  },
  {
    id: 3,
    name: "Thumkeshwari",
    audio: new Audio("Thumkeshwari - Bhediya.mp3"),
    time: "3:12",
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
