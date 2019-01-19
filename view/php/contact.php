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
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="voorbeeld@voorbeeld.com">
        </div>
        <div class="form-group">
          <label for="subject">Onderwerp:</label>
          <input type="text" class="form-control" id="subject" placeholder="onderwerp">
        </div>
        <div class="form-group">
          <label for="bericht">Bericht:</label>
          <textarea class="form-control" id="bericht" rows="4" cols="50"></textarea>
        </div>
        <button type="submit" class="btn btn-secondary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-5 animated delay-05s fadeInUp">
    <div class="locatie-wrapper col-9">
      <div class="locatie-content col-6">
        <h5 class="locatie-text">
          <br>
          Karspellaan 21,<br>
          4444 AF <br>
          0591- 23 32323 <br>
          info@flowerpower.nl
        </h5>
        </div>
        <div class="col-6 img-box">
          <img src="../../model/img/locaties/winkel1.jpg" alt="1e locatie">
        </div>
      </div>
      <div class="locatie-wrapper col-9">
        <div class="locatie-content col-6">
          <h5 class="locatie-text">
            <br>
            Flevostraat 95,<br>
            3445 BB <br>
            0591- 43 32343 <br>
            info@flowerpower.nl </h5>
        </div>
      <div class="col-6 img-box">
        <img src="../../model/img/locaties/winkel2.jpg" alt="2e locatie">
      </div>
    </div>
    <div class="locatie-wrapper col-9">
      <div class="locatie-content col-6">
        <h5 class="locatie-text">
          <br>
          Snavelkavel 34,<br>
          6565 BG <br>
          0591- 23 34455 <br>
          info@flowerpower.nl
        </h5>
      </div>
      <div class="col-6 img-box">
        <img src="../../model/img/locaties/winkel3.jpg" alt="3e locatie">
      </div>
    </div>
    <div class="locatie-wrapper col-9">
      <div class="locatie-content col-6">
        <h5 class="locatie-text">
          <br>
          Berenspel 98,<br>
          4334 ZZ <br>
          0591- 42 32645 <br>
          info@flowerpower.nl
        </h5>
      </div>
      <div class="col-6 img-box">
        <img src="../../model/img/locaties/winkel4.png" alt="4e locatie">
      </div>
    </div>
  </div>
</div>
<?php
  require_once("../../view/php/partials/_footer.php");
?>
