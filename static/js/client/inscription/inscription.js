function checkSameMdp() {
    let element_mdp = document.getElementById("mot_de_passe");
    let alerte_mdp_confirm = document.getElementById("alerte_mdp_confirm");
    let element_mdp_confirm = document.getElementById("mot_de_passe_confirm");
    if (element_mdp.value !== element_mdp_confirm.value) {
        element_mdp_confirm.style.background = "#FA6A6A";
        alerte_mdp_confirm.textContent = "Ils ne sont pas identiques...";
    } else {
        element_mdp_confirm.style.background = "#72F695";
        alerte_mdp_confirm.textContent = "";
    }
}

function checkSameEmail() {
    let element_email = document.getElementById("email");
    let alerte_email_confirm = document.getElementById("alerte_email_confirm");
    let element_email_confirm = document.getElementById("email_confirm");
    if (element_email.value !== element_email_confirm.value) {
        element_email_confirm.style.background = "#FA6A6A";
        alerte_email_confirm.textContent = "Ils ne sont pas identiques..";
    } else {
        element_email_confirm.style.background = "#72F695";
        alerte_email_confirm.textContent = "";
    }
}
