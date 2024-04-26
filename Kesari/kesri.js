let song = [
  {
    id: 1,
    name: "Ve Maahi",
    audio: new Audio("Ve Maahi.mp3"),

    time: "3:54",
  },
  {
    id: 2,
    name: "Teri Mitti ",
    audio: new Audio("Teri Mitti Tribute - B Praak.mp3"),
    time: "4:01",
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
    id: 5,
    name: "Deh Shiva",
    audio: new Audio("Deh Shiva - Diljit Dosanjh.mp3"),
    time: "5:08",
  },
  {
    id: 6,
    name: "Ajj Singh Garjega",
    audio: new Audio("Ajj Singh Garjega - Kesari.mp3"),
    time: "2:19",
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
