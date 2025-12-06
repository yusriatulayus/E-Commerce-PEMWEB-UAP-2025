document.addEventListener("DOMContentLoaded", () => {

    const leftFrame  = document.querySelector(".hero-left");
    const rightFrame = document.querySelector(".hero-right");
    const textBlock  = document.querySelector(".hero-text");

    // Oval kiri
    setTimeout(() => {
        leftFrame?.classList.add("show");
    }, 200);

    // Oval kanan
    setTimeout(() => {
        rightFrame?.classList.add("show");
    }, 450);

    // Text
    setTimeout(() => {
        textBlock.style.opacity = "1";
    }, 650);
});
