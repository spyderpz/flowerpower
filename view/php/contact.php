<?php
  $customCss = "<link rel='stylesheet' href='../../view/css/contact.css'>";
  $customTitle = "Contact";
  require_once("../../view/php/partials/_header.php");
  require_once("../../view/php/partials/_menu.php");
?>

<div class="row content">
  <div class="col-7">
    <div class="row contact-wrapper col-12">
      <div class="col-2">
      </div>
      <div class="form-wrapper col-8">
        <h3>Stuur ons een berichtje!</h3>
        <form>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Voorbeeld@voorbeeld.com">
        </div>
        <div class="form-group">
          <label for="subject">Onderwerp:</label>
          <input type="text" class="form-control" id="subject" placeholder="onderbroeken">
        </div>
        <div class="form-group">
          <label for="bericht">Bericht:</label>
          <textarea class="form-control" id="bericht" rows="4" cols="50">godverdomme wat een lekker berichtje</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-5">
    <div class="locatie-wrapper col-9">
      <div class="locatie-content col-6">
        <h5 class="locatie-text">
          <br>
          karspellaan 21,
          4444 AF <br>
          0591- 23 32323 <br>
          info@flowerpower.nl
        </h5>
        </div>
        <div class="col-6" style="padding: 5%; padding-right: 0%;">
          <img src="../../model/img/locaties/winkel1.jpg" alt="" style="max-width: 100%; max-height: 100%;">
        </div>
      </div>
      <div class="locatie-wrapper col-9">
        <div class="locatie-content col-6">
          <h5 class="locatie-text">
            <br>
            karspellaan 21,
            4444 AF <br>
            0591- 23 32323 <br>
            info@flowerpower.nl </h5>
        </div>
      <div class="col-6" style="padding: 5%; padding-right: 0%;">
        <img src="../../model/img/locaties/winkel1.jpg" alt="" style="max-width: 100%; max-height: 100%;">
      </div>
    </div>
    <div class="locatie-wrapper col-9">
      <div class="locatie-content col-6">
        <h5 class="locatie-text">
          <br>
          karspellaan 21,
          4444 AF <br>
          0591- 23 32323 <br>
          info@flowerpower.nl
        </h5>
      </div>
      <div class="col-6" style="padding: 5%; padding-right: 0%;">
        <img src="../../model/img/locaties/winkel1.jpg" alt="" style="max-width: 100%; max-height: 100%;">
      </div>
    </div>
    <div class="locatie-wrapper col-9">
      <div class="locatie-content col-6">
        <h5 class="locatie-text">
          <br>
          karspellaan 21,
          4444 AF <br>
          0591- 23 32323 <br>
          info@flowerpower.nl
        </h5>
      </div>
      <div class="col-6" style="padding: 5%; padding-right: 0%;">
        <img src="../../model/img/locaties/winkel1.jpg" alt="" style="max-width: 100%; max-height: 100%;">
      </div>
    </div>
  </div>
</div>
<?php
  require_once("../../view/php/partials/_footer.php");
  $customScript = "";
  require_once("../../view/php/partials/_scripts.php");
?>
