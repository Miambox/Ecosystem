function openDeletePopup(id_logement) {
  var containerModal = $("#container-modal-supprimer"+id_logement);
  containerModal.css("display", "block");
}

function closeDeletePopup(id_logement) {
  var containerModal = $("#container-modal-supprimer"+ id_logement);
  containerModal.css("display", "none");
}

function openSharePopup(id_logement) {
  var containerModal = $("#container-modal-partage"+id_logement);
  containerModal.css("display", "block");
}

function closeSharePopup(id_logement) {
  var containerModal = $("#container-modal-partage"+ id_logement);
  containerModal.css("display", "none");
}

function openAddAmbiance(id_capteur) {
  var containerModal = $("#container-modal-add-ambiance"+ id_capteur );
  containerModal.css("display","block");
}

function closeAddAmmbiancePopup(id_capteur) {
  var containerModal = $("#container-modal-add-ambiance"+ id_capteur);
  containerModal.css("display", "none");
}
