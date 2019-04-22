<template>
  <div class="row"> <br><br><br>
    <div class="col-md-7"><h3>Contacto</h3><hr></div>
    <div class="col-md-5"></div>
    <div class="col-md-7 offset-md-2">
      <form>
        <div class="form-group">
          <label for="">Nombre</label>
          <input type="text" class="form-control" id="nombre" placeholder="Nombre(s):">
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" class="form-control" id="correo" placeholder="Email:">
        </div>
        <div class="form-group">
          <label for="">Mensaje</label>
          <textarea name="mensaje" rows="8" cols="80" id="mensaje"></textarea>
        </div>
        <div class="col-md-7 offset-md-2">
          <div class="g-recaptcha" data-sitekey="6LczVZ8UAAAAAD_qx-5ccTEi33lcEiGK4X7smluO"></div>
        </div>
        <div class="col-md-12 text-center">
          <button type="button" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</template>
