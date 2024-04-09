let columna1 = document.querySelector('.cuadrado__columna-1');
let columna2 = document.querySelector('.cuadrado__columna-2');
let columna3 = document.querySelector('.cuadrado__columna-3');
let btnprev = document.querySelector('.flecha--prev');
let btnnext = document.querySelector('.flecha--next');
let currentIndex = 0;

function resetTransformations() {
    columna1.style.transform = "";
    columna2.style.transform = "";
    columna3.style.transform = "";
    btnprev.style.opacity = "";
    btnnext.style.opacity = "";
    currentIndex = 0;
}

window.addEventListener("resize", () => {
    if (window.innerWidth >= 600) {
        resetTransformations();
    }
});

btnprev.addEventListener("click", () => {
    if (currentIndex < 1) {
        currentIndex++;
        columna1.style.transform = "translateX(-100%)";
        columna2.style.transform = "translateX(0%)";
        columna3.style.transform = "translateX(100%)";
        btnnext.style.opacity = 1;
    } else if (currentIndex < 2) {
        currentIndex++;
        columna1.style.transform = "translateX(-200%)";
        columna2.style.transform = "translateX(-100%)";
        columna3.style.transform = "translateX(0%)";
        btnprev.style.opacity = 0.3;
    }
});

btnnext.addEventListener("click", () => {
    if (currentIndex > 1) {
        currentIndex--;
        columna1.style.transform = "translateX(-100%)";
        columna2.style.transform = "translateX(0%)";
        columna3.style.transform = "translateX(100%)";
        btnprev.style.opacity = 1;
    } else if (currentIndex > 0) {
        currentIndex--;
        columna1.style.transform = "translateX(0%)";
        columna2.style.transform = "translateX(100%)";
        columna3.style.transform = "translateX(200%)";
        btnnext.style.opacity = 0.3;
    }
});
