let song = [
  {
    id: 1,
    name: "Jaane Jaan - Title Track",
    audio: new Audio("Jaane Jaan - Title Track.mp3"),
    time: "2:20",
  },
  {
    id: 2,
    name: "Doriyaan",
    audio: new Audio("Doriyaan(PagalWorld.com.cm).mp3"),
    time: "3:30",
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
