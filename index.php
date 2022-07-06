<?php
include('inc/config.php');

$title = 'Accueil';
include('inc/header.php');

$sql = "SELECT * FROM `users`";
$sth = $log->prepare($sql);
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <ul class="list-group list-group-flush">
                <?php
                    foreach ($list as $key => $value) {
                        echo '<li data-user-id="' . $value["id"] . '"
                                  data-user-prenom="' . $value["prenom"] . '"
                                  data-user-nom="' . $value["nom"] . '"
                                  data-user-email="' . $value["email"] . '"
                             class="list-group-item d-flex justify-content-between">' . $value["prenom"] . ' / ' . $value["nom"] . ' / ' . $value["email"] . '';
                            echo '<div class="d-flex justify-content-end w-25">';
                                echo '<a href="inc/delete.php?id=' . $value["id"] . '" type="button" class="btn btn-danger me-3">X</a>';
                                echo '<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" id="edit-btn" data-id="' . $value["id"] . '">Edit</button>';
                            echo '</div>';
                        echo '</li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mettre à jour les informations</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="inc/edit.php" method="POST">
        <div class="form-floating mb-3">
            <input type="hidden" class="form-control" id="floatingId" name="floatingId">
          </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingEditSurname" name="floatingEditSurname" placeholder="Prénom">
            <label for="floatingSurname">Prénom</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingEditName" name="floatingEditName" placeholder="Nom">
            <label for="floatingName">Nom</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingEditEmail" name="floatingEditEmail" placeholder="name@example.com">
            <label for="floatingEmail">Email</label>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
include("inc/footer.php")
?>