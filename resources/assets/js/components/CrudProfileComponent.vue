<template>
<div class="container">

  <div class="row">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">CMS</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="#">Generales <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Conocimientos</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Trabajos</a>
                  </li>
              </ul>
          </div>
      </nav>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Carrera</th>
            <th scope="col">Universidad</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{Name}} {{AppPaterno}} {{AppMaterno}} </td>
            <td>{{FechaNacimiento}}</td>
            <td>{{Carrera}}</td>
            <td>{{Universidad}}</td>
            <td> <button type="button" id="editar" :rel-id="id" class="btn btn-primary">Editar</button> <button type="button" id="eliminar" :rel-id="id" class="btn btn-danger">Eliminar</button> </td>
          </tr>
        </tbody>
      </table>
   </div>
  </div>
</div>
</template>

<script>
export default {
  data(){
    return {
      id:null,
      Name: null,
      AppPaterno: null,
      AppMaterno: null,
      Universidad: null,
      Edad: null,
      FechaNacimiento: null,
      Carrera: null,
     }
  },
  mounted(){
    axios
    .get('/crudprofile')
    .then(response => {
        this.id = response.data[0].id;
        this.name = response.data[0].name;
        this.AppPaterno = response.data[0].AppPaterno;
        this.AppMaterno = response.data[0].AppMaterno;
        this.FechaNacimiento = response.data[0].fecha_nacimiento;
        this.Edad = this.birthday(response.data[0].fecha_nacimiento);
        this.Universidad = response.data[0].universidad;
        this.Carrera = response.data[0].carrera;
      }
    )
  },
  methods: {
    birthday (fecha) {
      var today = new Date();
      var birthDate = new Date(fecha);
      var age = today.getFullYear() - birthDate.getFullYear();
      var m = today.getMonth() - birthDate.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
          age--;
      }
      return age;
    }
  }
}
</script>
