@extends('layouts.app')

@section('content')
<br>
<div class="container">
  <h1 class="display-3 page-header">Kontakt</h1>
  <hr class="divider">
  <div class="row">
    
    <form method="POST" action="{{ route('home.mail_contact') }}" enctype="multipart/form-data">
      @csrf <!-- pocetak forme -->
      <div class="row" style="text-align:center;">
        <div class="col">
          <div class="form-group">
            <label for="inputName">Ime i prezime</label>
            <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Ime i prezime" required>
          </div><br>
          <div class="form-group">
            <label for="inputEmail">E-mail</label>
            <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="E-mail" required>
          </div><br>
         <!-- <div class="form-group">
            <label for="inputTel">Telefonski broj</label>
            <input type="tel" class="form-control" id="inputTel" placeholder="Telefonski broj">
          </div><br>-->
        </div>
        <div class="col">
          <div class="form-group">
            <label for="inputText">Poruka</label>
            <textarea class="form-control" rows="5" name="inputText" id="inputText" required></textarea>
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-lg btn-block">Pošalji</button>
        </div>
        
      </form> <!-- kraj forme -->
    </div>
  </div>
  <hr class="divider">
  <div class="row" style="text-align:center;">
    
    <h2 class="page-header">
      Gde se nalazi Vinarija Varkulja
    </h2>
    <p><i class="bi bi-geo-alt"></i> Nosa, Hajdukovo </p>
    <p><i class="bi bi-phone"></i> +381 60 686 4552</p>
    <p><i class="bi bi-telephone"></i> +381 24 686 4552</p>
    <p><i class="bi bi-envelope"></i> vinarija.varkulja@gmail.com</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6909.078848523522!2d19.851441945471088!3d46.0964012407267!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47449d779293609d%3A0xe93b28ec321d34e9!2sVarkulja!5e0!3m2!1sen!2sus!4v1677100907719!5m2!1sen!2sus" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>


@endsection
