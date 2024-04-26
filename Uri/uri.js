let song = [
  {
    id: 1,
    name: "Jagga Jiteya - URI",
    audio: new Audio("Jagga Jiteya - URI.mp3"),
    time: "3:18",
  },
  {
    id: 2,
    name: "Challa (Main Lad Jaana) - URI",
    audio: new Audio("Challa (Main Lad Jaana) - URI.mp3"),
    time: "2:25",
  },
  {
    id: 3,
    name: "Jigra - URI",
    audio: new Audio("Jigra _ URI.mp3"),
    time: "4:09",
  },
  {
    id: 4,
    name: "Behe Chala - URI",
    audio: new Audio("Behe Chala - URI.mp3"),
    time: "3:38",
  },
  {
    id: 5,
    name: "Manzar-Hai-Yeh-Naya",
    audio: new Audio("Manzar-Hai-Yeh-Naya.mp3"),
    time: "4:13",
  },
  {
    id: 6,
    name: "Jaihind Ki Senaa",
    audio: new Audio("Jaihind Ki Senaa - Shershaah.mp3"),
    time: "2:31",
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
