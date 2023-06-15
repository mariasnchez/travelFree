let recientes = [];

if (localStorage.getItem('recientes')) {
  recientes = JSON.parse(localStorage.getItem('recientes'));
}

const boton = document.querySelector('#buscar');
boton.addEventListener('click', () => {
  const nuevo = document.querySelector('#mysearch').value;

  if (nuevo && !recientes.includes(nuevo)) {
    recientes.push(nuevo);
    localStorage.setItem('recientes', JSON.stringify(recientes));
  }
});

const recientesLista = document.getElementById('recientes');

recientes.forEach((elemento) => {
  const a = document.createElement('a');
  a.textContent = elemento;

  a.style.padding = '10px';
  a.style.backgroundColor = 'white';
  a.style.border = '1px solid gray ';
  a.style.marginTop = '20px';
  a.style.marginRight = '10px';
  a.style.display = 'inline-block';
  a.style.borderRadius = '0.575rem';
  a.style.fontSize = '1.125rem';

  a.href = `/ciudad?query=${elemento}`;

  recientesLista.appendChild(a);
});


if (localStorage.getItem('recientes')) {
  document.getElementById('recientes').style.display = 'block';
} else {
  document.getElementById('recientes').style.display = 'none';
}
