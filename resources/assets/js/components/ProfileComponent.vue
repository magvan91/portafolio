<template>
  <b-container>
    <b-row class="p-3">
      <b-col md="12" style="overflow:hidden;">
        <b-img center v-bind="mainProps"  src="img/profile.jpg" alt="Marco Anotnio García Cabrera"></b-img>
      </b-col>
    </b-row>
    <b-row class="p-2">
      <b-col md="12">
        <h3 class="text-center"><span class="txt_name">{{Name}}</span> <br> <span class="txt_apellidos">{{AppPaterno}} {{AppMaterno}}</span></h3>
      </b-col>
    </b-row>
    <b-row class="p-1">
      <b-col md="6" lg="4" offset-lg="4">
        <div class="profesion mx-auto text-center">Desarrollador Web</div>
      </b-col>
    </b-row>
    <b-row class="p-3">
      <b-col md="12">
        <p>
          Ingeniero en Tecnologías de la Información y Comunicación con 6 años de experiencia en el ambiente del desarrollo Web, donde mi mayor experiencia ha sido en agencias de marketing, sin embargo, no me cierro a la idea de incursionar en empresas con un giro diferente.
          <br> <br>
          Durante mi estadía en cada uno de mis empleos, siempre he imprimido responsabilidad, proactividad y respeto, en cada una de la funciones y tareas que me han tocado desempeñar, por ello considero que en cada lugar en el que he tenido oportunidad de laborar, he dejado una buena imagen de mí.
          <br><br>
          Mi objetivo es continuar creciendo como profesional, por lo que busco oportunidades laborales que me ayuden conseguir esto, al tiempo que trato de alinearme completamente con los objetivos de la empresa en turno.
        </p>
      </b-col>
    </b-row>
    <b-row class="p-4">
      <b-col md="5" lg="3">
        <div class="circulos_secciones mx-auto d-inline-block">
          <b-img center class="circulos_imgs" src="img/birrete.png" alt="Birrete"></b-img>
        </div>
        <div class="d-inline-block">
          <h4 class="titulo_secciones d-table">
            Educación
          </h4>
        </div>
      </b-col>
      <b-col md="7" lg="9"><hr class="lineas_secciones"></b-col>
    </b-row>
    <b-row class="px-4 pb-4">
      <b-col md="12">
        <div>
          <span class="span_titulos_educacion">Carrera:</span> <span class="span_txt_educacion">{{Carrera}}</span>
        </div>
        <div>
          <span class="span_titulos_educacion">Universidad:</span> <span class="span_txt_educacion">{{Universidad}}</span>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
  export default {
    data(){
      return {
        Name: null,
        AppPaterno: null,
        AppMaterno: null,
        Universidad: null,
        Edad: null,
        Carrera: null,
        mainProps: { class: 'm1 rounded-circle photo_circle img-fluid' }
       }
    },
    mounted(){
      axios
      .get('/profiles')
      .then(response => {
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
      }
    }
  }
</script>
