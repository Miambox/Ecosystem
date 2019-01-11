function autocomplete(inp, arr) {
    /*Execute une fonction quand quelque chose est entrée dans la barre de recherche*/
    inp.addEventListener("input", function(e) {
        var a, i, b;
        var val = this.value;

        /*Close any already open lists of autocompleted values*/
        closeAllLists();

        /*Si aucune valeur est present dans la searchbar, on affiche rien*/
        if (!val) { return false;}

        /*Créer un élément DIV qui contiendra les objets (values):*/
        a = document.createElement("DIV");

        /*Element.setAttribute(name, value);*/

        a.setAttribute("class", "searchbar-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);

        for (i = 0; i < arr.length; i++){
            if (arr[i].substring(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*Créer un element DIV pour chaque element satisfaisant la condition*/
                b = document.createElement("DIV");
                /*Les lettres qui match sont mis en gras*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*Insère la valeur sur lequel on a cliqué dans le champ de la barre de recherche:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("searchbar-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}

var nomClient = ["Ly", "Dupond", "De Sousa", "Perrault", "Forterre", "Remati", "Penin", "Feller"];

autocomplete(document.getElementById("search-desktop"), nomClient);
