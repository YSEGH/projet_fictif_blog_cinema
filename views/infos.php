<section id="section" class="section-infos row d-flex flex-wrap my-5 justify-content-center">
  <div id="section-infos-map" class="col-md-5 col-sm-12 col-xs-12 section-infos-map"></div>
  <div class="section-infos-infos col-md-5 col-sm-12 col-xs-12 d-flex flex-column justify-content-center p-4">
    <h1 class="mb-4 text-uppercase text-center font-weight-light text-dark">Infos pratiques</h1>
    <p class="text-justify font-weight-light text-dark"><?= str_replace(',', ',<br>', $infos->address) ?></p>
    <p class="text-justify font-weight-light text-dark"><i class="fa fa-phone" aria-hidden="true"></i><?= ' : ' . str_replace('-', '.', $infos->phone) ?></p>
    <p class="text-justify font-weight-light text-dark"><i class="fa fa-envelope-o" aria-hidden="true"></i><?= ' : ' . $infos->email ?></p>
    <p class="text-justify font-weight-light text-dark"><i class="fa fa-subway" aria-hidden="true"></i><?= ' : ' . $infos->metro ?></p>
    <p class="text-justify font-weight-light text-dark"><i class="fa fa-bus" aria-hidden="true"></i><?= ' : ' . $infos->bus ?></p>
    <p class="text-justify font-weight-light text-dark"><?= $infos->presentation ?></p>
    <div class="section-header-button">
      <button class="section-header-button-reservation btn btn-dark rounded-0 my-3 ml-auto font-weight-lighter">Réserver ma place</button>
      <button class="section-header-button-contact btn btn-dark rounded-0 my-3 ml-auto font-weight-lighter">Nous contacter</button>
    </div>   
  </div>
  </section>