var textWrapper = document.querySelector('.text-wrapper .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<h1 class='letter'>$&</h1>");

anime.timeline({loop: true})
  .add({
    targets: '.text-wrapper .letter',
    translateY: ["1.1em", 0],
    translateZ: 0,
    duration: 750,
    delay: (el, i) => 50 * i
  }).add({
    targets: '.text-wrapper',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });