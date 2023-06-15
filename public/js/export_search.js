export class search {
    constructor(myurlp, mysearchp, ul_add_lip) {
        this.url = myurlp;
        this.mysearch = mysearchp;
        this.ul_add_li = ul_add_lip;
        this.idli = "mylist";
        this.pcantidad = document.querySelector("#pcantidad");
    }

    InputSearch() {
        this.mysearch.addEventListener("input", (e) => {
            e.preventDefault();
            try {
                let token = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");
                let minimo_letras = 0;
                let valor = this.mysearch.value;
                if (valor.length > minimo_letras) {
                    let datasearch = new FormData();
                    datasearch.append("valor", valor);
                    fetch(this.url, {
                        headers: {
                            "X-CSRF-TOKEN": token,
                        },
                        method: "post",
                        body: datasearch,
                    })
                        .then((data) => data.json())
                        .then((data) => {
                            this.Showlist(data, valor);
                        })
                        .catch(function (error) {
                            console.error("Error:", error);
                        });
                } else {
                    this.ul_add_li.style.display = "";
                }
            } catch (error) {
                console.log(error);
            }
        });
    }

    Showlist(data, valor) {
        this.ul_add_li.style.display = "block";
        if (data.estado != "") {
            let arrayp = data.result;
            this.ul_add_li.innerHTML = "";
            let n = 0;
            this.Show_list_each_data(arrayp, valor, n);
        }
    }

    Show_list_each_data(arrayp, valor, n) {
        for (let item of arrayp) {
          n++;
          let nombre = item.nombre;
          let pais = item.pais;
    
          let li = document.createElement("li");
          li.id = n + this.idli;
          li.value = item.nombre;
          li.className = "bg-white cursor-pointer p-2 m-1 rounded";
          li.innerHTML = `
            <div>
              <strong>${nombre.substr(0, valor.length)}</strong>${nombre.substr(valor.length)}, ${pais}
            </div>
          `;
    
          li.addEventListener("click", (e) => {
            this.mysearch.value = nombre;
          });
    
          this.ul_add_li.appendChild(li);
        }
      }
    }
