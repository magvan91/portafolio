<template>
<div class="container">
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
            <td><button type="button" id="editar" class="btn btn-primary" data-toggle="modal" data-target="#myModal" @click="getRow(id)">Editar</button></td>
          </tr>
        </tbody>
      </table>
   </div>
  </div>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editar información general</h4>
          <button type="button" class="close" data-dismiss="modal" @click="Alert=''">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div v-show="Alert!=''" class="alert" role="alert">{{Alert}}</div>
          <form @submit.prevent="submit(fields.idEdit)">
            <div class="form-group">
              <label for="">Nombre(s)</label>
              <input v-model="fields.NameEdit" type="text" class="form-control" placeholder="Nombre(s)">
              <p v-show="errors_form.NameEdit!=''" class="text-danger">{{errors_form.NameEdit}}</p>
            </div>
            <div class="form-group">
              <label for="">Apellido Paterno</label>
              <input v-model="fields.AppPaternoEdit" type="text" class="form-control" placeholder="Apellido Paterno">
              <p v-show="errors_form.AppPaternoEdit!=''" class="text-danger">{{errors_form.AppPaternoEdit}}</p>
            </div>
            <div class="form-group">
              <label for="">Apellido Materno</label>
              <input v-model="fields.AppMaternoEdit" type="text" class="form-control" placeholder="Apellido Materno">
              <p v-show="errors_form.AppMaternoEdit!=''" class="text-danger">{{errors_form.AppMaternoEdit}}</p>
            </div>
            <div class="form-group">
              <label for="">Universidad</label>
              <input v-model="fields.UniversidadEdit" type="text" class="form-control" id="" placeholder="Universidad">
              <p v-show="errors_form.UniversidadEdit!=''" class="text-danger">{{errors_form.UniversidadEdit}}</p>
            </div>
            <div class="form-group">
              <label for="">Carrera</label>
              <input v-model="fields.CarreraEdit" type="text" class="form-control" id="" placeholder="Carrera">
              <p v-show="errors_form.CarreraEdit!=''" class="text-danger">{{errors_form.CarreraEdit}}</p>
            </div>
            <div class="form-group">
              <label for="">Fecha de Nacimiento</label>
              <input v-model="fields.FechaNacimientoEdit" type="text" class="form-control" id="" placeholder="Fecha de Nacimiento">
              <p v-show="errors_form.FechaNacimientoEdit!=''" class="text-danger">{{errors_form.FechaNacimientoEdit}}</p>
            </div>
            <button type="submit" class="btn btn-dark float-right" name="button">Enviar</button>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" @click="Alert=''">Close</button>
        </div>

      </div>
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
      Alert:'',
      alert_class:'',
      fields:{
        idEdit: null,
        NameEdit: null,
        AppPaternoEdit: null,
        AppMaternoEdit: null,
        UniversidadEdit: null,
        FechaNacimientoEdit: null,
        CarreraEdit: null
      },
      errors_form: {
        NameEdit:'',
        AppPaternoEdit: '',
        AppMaternoEdit: '',
        UniversidadEdit: '',
        FechaNacimientoEdit: '',
        CarreraEdit: ''
      }
     }
  },
  mounted(){
    axios
    .get('/crudprofile')
    .then(response => {
        this.id = response.data[0].id;
        this.Name = response.data[0].name;
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
    },
    clear_errors(){
      for(let key in this.errors_form) {
        this.errors_form[key] = '';
      }
    },
    getRow(id){
      this.clear_errors();
      axios
      .get('/crudprofile/'+id)
      .then(response => {
        this.fields.idEdit = response.data.id;
        this.fields.NameEdit = response.data.name;
        this.fields.AppPaternoEdit = response.data.AppPaterno;
        this.fields.AppMaternoEdit = response.data.AppMaterno;
        this.fields.FechaNacimientoEdit = response.data.fecha_nacimiento;
        this.fields.UniversidadEdit = response.data.universidad;
        this.fields.CarreraEdit = response.data.carrera;
      })
      .catch(error => {})
    },
    submit(id) {
      this.clear_errors();
      axios
      .put('/crudprofile/'+id,this.fields)
      .then(response => {
        if(response.data.error==0){
           this.Alert = response.data.msg;
           this.Name = this.fields.NameEdit;
           this.AppPaterno = this.fields.AppPaternoEdit;
           this.AppMaterno = this.fields.AppMaternoEdit;
           this.FechaNacimiento = this.fields.FechaNacimientoEdit;
           this.Edad = this.birthday(this.fields.FechaNacimientoEdit);
           this.Universidad = this.fields.UniversidadEdit;
           this.Carrera = this.fields.CarreraEdit;
           $('.alert').addClass("alert-success");
        }
     })
     .catch(error => {
       if (error.response.status === 422) {
          let errors = error.response.data.errors || {};
          for(let clave in errors) {
            this.errors_form[clave] = errors[clave][0];
          }
          this.Alert = 'Datos incorrectos';
       }else if(error.response.status === 500){
         this.Alert = 'Ocurrio un error intentelo más tarde';
       }
       $('.alert').addClass("alert-danger");
     })
    }
  }
}
</script>
