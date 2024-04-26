let song = [
  {
    id: 1,
    name: "Lehra-Do",
    audio: new Audio("Lehra-Do(PagalWorld).mp3"),
    time: "3:57",
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
    name: "Mann Bharryaa 2",
    audio: new Audio("Mann Bharryaa 2 - Shershaah.mp3"),
    time: "4:26",
  },
  {
    id: 6,
    name: "Jeetega Jeetega",
    audio: new Audio("Jeetega Jeetega Bonus Track - 83.mp3"),
    time: "4:48",
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
