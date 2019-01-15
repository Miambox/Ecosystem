function openPopup(id_logement) {
  var containerModal = $("#container-modal-supprimer"+ id_logement);
  containerModal.css("display", "block");
}

function closePopup(id_logement) {
  var containerModal = $("#container-modal-supprimer"+ id_logement);
  containerModal.css("display", "none");
}
