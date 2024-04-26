let song = [
  {
    id: 1,
    name: "Jeetega Jeetega",
    audio: new Audio("Jeetega Jeetega Bonus Track - 83.mp3"),
    time: "4:48",
  },
  {
    id: 2,
    name: "Lehra-Do",
    audio: new Audio("Lehra-Do(PagalWorld).mp3"),
    time: "3:57",
  },
  {
    id: 3,
    name: "World Record 175",
    audio: new Audio("World Record 175 - 83.mp3"),
    time: "1:42",
  },
  {
    id: 4,
    name: "Yeh Hausle",
    audio: new Audio("Yeh Hausle - 83.mp3"),
    time: "4:03",
  },
  {
    id: 5,
    name: "Utth Ja Ziddi Re",
    audio: new Audio("Utth Ja Ziddi Re - 83.mp3"),
    time: "3:58",
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
