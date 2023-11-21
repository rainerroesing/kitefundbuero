<?php
/*
Template Name: Submit Verloren Modal
*/
?>

<button type="button" class="close" data-dismiss="modal">&times;</button>

<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-body">

          <div class="row">
          <div class="col">

          <form  action="" method="post" name="post_information" class="submitform" id="new_post" enctype="multipart/form-data">


          <h3 class="titles">Was hast Du verloren?</h3>


          <div class="form-group">
          <?php taxonomy_dropdown( 'lostitem' ); ?>
          </div>


          <input id="enterbrand" name="brand" class="form-control" type="text" placeholder="Bitte Marke eingeben" />

          <input id="entermodell" name="modell"  class="form-control" type="text" placeholder="Bitte Modell eingeben" />

          <textarea id="enterdesc" name="description" class="form-control" type="textarea" placeholder="Beschreibung und besondere Merkmale" rows="3"></textarea>

          <h3 class="titles">Wie erreicht man dich?</h3>
          <div class="form-group filesubmit">

          <input id="thumbnail" name="thumbnail" class="form-control-file" type="file" />



          <h3 class="titles">Zeit und Ort?</h3>
          <input id="datetimepicker" name="date" class="form-control" type="date" placeholder="Bitte Datum angeben" />

          <input id="enterspot" name="spot" class="form-control" type="text" placeholder="Bitte Verlustort angeben" />


          <h3 class="titles">Wie erreicht man dich?</h3>

          <input id="entername" name="owner" class="form-control" type="text" placeholder="Dein Name" />

          <input id="enterphone" name="phone" class="form-control" type="number" placeholder="Deine Telefonnummer" />

          <input id="entermail" name="mail" class="form-control" type="email" placeholder="Deine E-Mail Adresse" />

          <div class="form-check"><label class="form-check-label">
          <input class="form-check-input" name="agb" type="checkbox" /> Check me out
          </label></div>


          <button id="submit"  class="btn btn-danger btn-submit" name="submit" type="submit" value="Publish">Abschicken</button>
          <input name="action" type="hidden" value="new_post" />


          </form>

          </div>
          </div>

        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Abbrechen</a>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
