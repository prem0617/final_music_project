let song = [
  {
    id: 1,
    name: "Ghungroo War",
    audio: new Audio("Ghungroo War.mp3"),

    time: "5:02",
  },
  {
    id: 2,
    name: "Jai Jai Shivshankar",
    audio: new Audio("Jai Jai Shivshankar.mp3"),
    time: "3:50",
  },
  {
    id: 3,
    name: "Khalids Theme",
    audio: new Audio("Khalids Theme - War (2019).mp3"),
    time: "1:15",
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
