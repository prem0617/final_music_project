let song = [
  {
    id: 1,
    name: "Ranjha",
    audio: new Audio("Ranjha - Shershaah.mp3"),

    time: "3:48",
  },
  {
    id: 2,
    name: "Raataan Lambiyan",
    audio: new Audio("Raataan Lambiyan - Shershaah.mp3"),
    time: "3:50",
  },
  {
    id: 3,
    name: "Kabhi Tumhe",
    audio: new Audio("Kabhi Tumhe - Shershaah.mp3"),
    time: "3:50",
  },
  {
    id: 4,
    name: "Kabhi Tumhe Female",
    audio: new Audio("Kabhi Tumhe Female - Shershaah.mp3"),
    time: "3:38",
  },
  {
    id: 5,
    name: "Mann Bharryaa 2",
    audio: new Audio("Mann Bharryaa 2 - Shershaah.mp3"),
    time: "4:26",
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
