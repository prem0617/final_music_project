let song = [
  {
    id: 1,
    name: "Ranjha",
    audio: new Audio("Ranjha - Shershaah.mp3"),

    time: "3:48",
  },
  {
    id: 2,
    name: "Dua",
    audio: new Audio("_Dua(PagalWorld.com.cm).mp3"),
    time: "4:38",
  },
  {
    id: 3,
    name: "Deh Shiva",
    audio: new Audio("Deh Shiva - Diljit Dosanjh.mp3"),
    time: "5:08",
  },
  {
    id: 4,
    name: "Ajj Singh Garjega",
    audio: new Audio("Ajj Singh Garjega - Kesari.mp3"),
    time: "2:19",
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
  {
    id: 7,
    name: "Lehra-Do",
    audio: new Audio("Lehra-Do(PagalWorld).mp3"),
    time: "3:57",
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
