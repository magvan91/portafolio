<template>
  <b-container>
   <b-row>
     <b-col md="12"><h3>Contacto</h3><hr></b-col>
     <b-col md="7" offset-md="2">
        <b-form>
          <b-form-group label="Nombre:" label-for="nombre">
            <b-form-input id="nombre" type="text" required placeholder="Nombre(s):"></b-form-input>
          </b-form-group>
          <b-form-group label="Email:" label-for="email">
            <b-form-input id="email" type="email" required placeholder="Email"></b-form-input>
          </b-form-group>
          <b-form-group label="Enter your name" label-for="input-horizontal">
            <b-form-textarea id="mensaje" placeholder="Escribe tu mensaje" rows="3" max-rows="6"></b-form-textarea>
          </b-form-group>
          <b-col md="12" class="text-center"> 
            <b-button-group><b-button  size="lg" variant="primary">Enviar Mensaje</b-button></b-button-group>
          </b-col>
        </b-form>
     </b-col>
   </b-row>
 </b-container>
</template>
