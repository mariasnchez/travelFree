document.getElementById("obtenerDatos").addEventListener("click", obtenerDatos);

async function obtenerDatos() {
    const url = "https://restcountries.com/v3.1/all";

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            const index = Math.floor(Math.random() * data.length);

            const pais = data[index].name.common;
            const ciudad = data[index].capital[0];

            document.getElementById("nombre").value = ciudad;
            document.getElementById("pais").value = pais;
        
        })
        .catch((error) => {
            console.error(error);
        });
}
