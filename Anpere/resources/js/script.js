var div_about = document.querySelector('#text-about');
var popup = document.querySelector('#popup');

var vitrineexc = document.querySelector('#vitrineexclusiva');
var vitrine = document.querySelector('#vitrine');

function esconder_mostrar() {
  if (div_about.style.display === "none") {
    div_about.style.display = "block";
  } else {
    div_about.style.display = "none";
  }
}

function adicionar() {
  popup.style.display = "grid";
  popup.style.visibility = "visible";
  var x = window.scrollX;
  var y = window.scrollY;
  window.onscroll = function () {
    window.scrollTo(x, y);
  }
}

function adicionar2() {

  if (vitrineexc.style.display === "none") {
    vitrineexc.style.display = "flex";

    vitrine.style.display = "none";

  } else {
    vitrineexc.style.display = "none";

    vitrine.style.display = "flex";

  }

}

function fechar1() {
  popup.style.display = "none";
  popup.style.visibility = "hidden";
  window.onscroll = function () { };
}

function fechar2() {
  popup2.style.display = "none";
  popup2.style.visibility = "hidden";

}

function abrir() {
  popup2.style.display = "grid";
  popup2.style.visibility = "visible";
}