

let threeDots = document.querySelectorAll(".header-right .hamburger div");

let left = document.querySelector(".left");

let dark = document.querySelector(".dmode");

let light = document.querySelector(".lmode");

let headerIcon = document.querySelectorAll(".headerIcon");

let gridcontainer = document.querySelector(".grid_container");

let explorePremium = document.querySelectorAll(".premium");

let goodAfterNoon = document.querySelector(".good");

let daliy = document.querySelectorAll(".daly_container .box");

let dailyContent = document.querySelectorAll(".box .contain");

let dailySqure = document.querySelectorAll(".squre_box");

let animateCharcter = document.querySelectorAll(".animate-charcter");

let boxA = document.querySelectorAll(".show_container .boxShowa");

let boxAName = document.querySelectorAll(".show_container .boxShowa .mname");

let boxB = document.querySelectorAll(".show_container .boxShowb");

let aName = document.querySelectorAll(".boxShowb_catainer p");

let user = document.querySelector(".profile_container h2");


// LIGHT

light.addEventListener('click',()=>
{
    threeDots.forEach((val)=>{
        val.style.backgroundColor="black";
    })
    left.style.backgroundColor="#f1faee";
    headerIcon.forEach((val)=>{
        val.style.color="#335c67";
    })
    gridcontainer.style.backgroundColor="white";
    goodAfterNoon.style.color="#335c67";
    explorePremium.forEach((val)=>{
        val.style.color="black";
        val.style.backgroundColor="#f1faee";
        val.style.border="solid 1px black"
    })
    daliy.forEach((val)=>{
        val.style.backgroundColor="#e9edc9";
    })
    dailyContent.forEach((val)=>
    {
        val.style.color="black";
    })
    dailySqure.forEach((val)=>
    {
        val.style.backgroundImage="linear-gradient(to right bottom, rgb(237, 242, 244), rgb(237, 242, 244))";
        val.slot.boxShadow="6px 0px 9px rgba(0, 0, 0, 0.2)"

    })
    animateCharcter.forEach((val)=>
    {
        val.style.backgroundImage="linear-gradient(#335c67 100%,#335c67 100%)"
    })
    boxA.forEach((val)=>{
        val.style.backgroundColor="#edede9";
    })
    boxAName.forEach((val)=>{
        val.style.color="#335c67";
    })
    boxB.forEach((val)=>{
        val.style.backgroundColor="#dad7cd";
    })
    aName.forEach((val)=>{
        val.style.color="#335c67"
    })
    user.style.color="#335c67";
})



// DARK

dark.addEventListener('click',()=>
{
    threeDots.forEach((val)=>{
        val.style.backgroundColor="white";
    })
    left.style.backgroundColor="rgb(5, 4, 4)";
    headerIcon.forEach((val)=>{
        val.style.color="white";
    })
    gridcontainer.style.backgroundColor="#0a0707";
    goodAfterNoon.style.color="white";
    explorePremium.forEach((val)=>{
        val.style.color="white";
        val.style.backgroundColor="black";
        val.style.border="solid 1px red"
    })
    daliy.forEach((val)=>{
        val.style.backgroundColor="#384067";
    })
    dailyContent.forEach((val)=>
    {
        val.style.color="white";
    })
    dailySqure.forEach((val)=>
    {
        val.style.backgroundImage="linear-gradient(to bottom right, rgb(211, 0, 0), rgb(223, 124, 124))";
        val.slot.boxShadow="6px 0px 9px rgba(0, 0, 0, 0.2)"
    })
    animateCharcter.forEach((val)=>
    {
        val.style.backgroundImage="linear-gradient(-225deg, rgb(249, 0, 0) 0%, rgb(255, 255, 255) 29%, rgb(0, 74, 211) 67%, rgb(168, 3, 3) 100%)"
    })
    boxA.forEach((val)=>{
        val.style.backgroundColor="black";
    })
    boxAName.forEach((val)=>{
        val.style.color="white";
    })
    aName.forEach((val)=>{
        val.style.color="white"
    })
    user.style.color="white";

})




// Profile dark and light mode

let nameBg = document.querySelector(".name_container");

light.addEventListener('click',()=>
{
    nameBg.style.backgroundColor="white";
})