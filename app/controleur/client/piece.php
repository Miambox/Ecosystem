<?php

include('app/model/client/requete.piece.php');

switch ($action) {

    // Vue permettant d'afficher les pièces et logements
    case 'vuePrincipale':

        $vue = "piece";
        $title = "Les pieces";

        if(isset($_POST['id_logement'])) {
          $id_logement = securitePourXSSFail($_POST['id_logement']);
          $liste_piece = selectionnerPiece($bdd, $id_logement);
          $information_logement = informationLogement($bdd, $id_logement);
        } else if(isset($_GET['id_logement'])) {
          $id_logement = securitePourXSSFail($_GET['id_logement']);
          $liste_piece = selectionnerPiece($bdd, $id_logement);
          $information_logement = informationLogement($bdd, $id_logement);
        } else if(isset($_POST['id_piece'])) {
          $id_piece = securitePourXSSFail($_POST['id_piece']);
          $liste_piece = selectionnerIDLogementBYPieceId($bdd, $id_piece);
          if(isset($liste_piece)) {
            foreach ($liste_piece as $key => $value) {
              $liste_piece = selectionnerPiece($bdd, intval($value['id_logement']));
              $information_logement = informationLogement($bdd, intval($value['id_logement']));
            }
          } else {
            header('Location: ?Route=client&Ctrl=piece');
          }
        } else {
          header('Location: ?Route=client&Ctrl=piece');
        }

        break;

    // Vue permettant d'ajouter une pièce
    case 'addPiece':

        $title = "Ajouter une piece";
        $vue = "addPiece";
        $id_logement = $_POST['id_logement'];
        if( isset($_POST['nom']) and
            isset($_POST['type']) and
            isset($_POST['etage']) and
            isset($_POST['surface']))
            {
            $values = [
              'nom'              => securitePourXSSFail($_POST['nom']),
              'type'             => securitePourXSSFail($_POST['type']),
              'etage'            => securitePourXSSFail($_POST['etage']),
              'surface'          => securitePourXSSFail($_POST['surface'])
            ];
            $request = insererNouvellePiece($bdd, $values, $id_logement);

            if(isset($request)) {
              header('Location: ?Route=client&Ctrl=piece&Vue=vuePrincipale&id_logement='. intval($id_logement));
            } else {
              header('Location: ?Route=client&Ctrl=piece');
            }
        }

        break;

    // Vue permettant de supprimer les pièces
    case 'supprimerPiece':
      $vue = "piece";
      $title = "Les pièces";

      if(isset($_POST['id_piece']) and isset($_POST['type'])) {
        $id_logement = $_POST['id_logement'];
        $piece = [
          'id'      => securitePourXSSFail($_POST['id_piece']),
          'type'    => securitePourXSSFail($_POST['type']),
        ];

        $request = supprimerPiece($bdd, $piece);

        if($request) {
          header('Location: ?Route=client&Ctrl=piece&Vue=vuePrincipale&id_logement='. $id_logement);
        }
      }
    break;

    case 'updaterPiece':
      $title ="Editer une pièce";
      $vue ="addPiece";
      if( isset($_POST['nom']) and
          isset($_POST['type']) and
          isset($_POST['etage']) and
          isset($_POST['surface']))
          {
          $id_piece = securitePourXSSFail($_POST['id_piece']);
          $id_logement = securitePourXSSFail($_POST['id_logement']);
          $values = [
            'nom'              => securitePourXSSFail($_POST['nom']),
            'type'             => securitePourXSSFail($_POST['type']),
            'etage'            => securitePourXSSFail($_POST['etage']),
            'surface'          => securitePourXSSFail($_POST['surface'])
          ];
          $request = updaterPiece($bdd, $values, intval($id_piece));
          if(isset($request)) {
            header('Location: ?Route=client&Ctrl=piece&Vue=vuePrincipale&id_logement='. intval($id_logement));
          } else {
            header('Location: ?Route=client&Ctrl=piece');
          }
      }
    break;

    case 'editerPiece':
      $title="Editer une pièce";
      $vue="addPiece";
      $id_logement = securitePourXSSFail($_POST['id_logement']);
      $id_piece = securitePourXSSFail($_POST['id_piece']);
      $information_piece = selectionnerIDLogementBYPieceId($bdd, intval($id_piece));
    break;
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $title = "Erreur";
        $vue = "piece";
}

include ('app/vues/client/header.php');
include ('app/vues/client/'.$vue. '.php');
include ('app/vues/client/footer.php');
?>
