window.addEventListener("scroll",()=>{
  document.querySelector(".navbar")
    .classList.toggle("shadow",scrollY>50)
});
