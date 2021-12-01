var div_about = document.querySelector('#text-about');
var popup = document.querySelector('#popup');
var popup3 = document.querySelector('.popup3');
var chat = document.querySelector('.wrapper');

var vitrineexc = document.querySelector('#vitrineexclusiva');
var vitrine = document.querySelector('#vitrine');

let bt_perfil = document.querySelector('#btn-salvar');

let selectbox = document.querySelector('.other-category');


function esconder_mostrar() {
  if (div_about.style.display === "none") {
    div_about.style.display = "block";
  } else {
    div_about.style.display = "none";
  }
}

 function esconder() {
  bt_perfil.style.display = "none";
  bt_perfil.style.visibility = "hidden";
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
  popup3.style.display = "grid";
  popup3.style.visibility = "visible";
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


function abrirselect() {
  selectbox.style.display = "flex";
  selectbox.style.visibility = "visible";
}