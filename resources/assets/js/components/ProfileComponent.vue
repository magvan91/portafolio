<template>
  <b-container>
    <b-row class="p-3">
      <b-col md="12" style="overflow:hidden;">
        <b-img center v-bind="mainProps" title="Marco Antonio García Cabrera" src="img/profile.jpg" alt="Marco Anotnio García Cabrera"></b-img>
      </b-col>
    </b-row>
    <b-row>
      <b-col md="12" class="mx-auto text-center">
       <b-link href="https://www.linkedin.com/in/marco-antonio-garc%C3%ADa-cabrera-8b7996b4/" target="_blank" class="links_icos">
        <b-img v-bind="socialProps" title="LinkedIn"  :src="In" alt="Linkedin" @mouseover="In='img/ico_linkedin2.png'" @mouseleave="In='img/ico_linkedin1.png'"></b-img>
       </b-link> 
       <b-link href="https://twitter.com/marco_trance" target="_blank" class="links_icos">
        <b-img v-bind="socialProps" title="Twitter" :src="Tw" @mouseover="Tw='img/ico_twitter2.png'" @mouseleave="Tw='img/ico_twitter1.png'" alt="Twitter" class="ico_twitter"></b-img> 
       </b-link>
      </b-col>
    </b-row>
    <b-row class="p-2">
      <b-col md="12">
        <h3 class="text-center"><span class="txt_name">{{Name}}</span> <br> <span class="txt_apellidos">{{AppPaterno}} {{AppMaterno}}</span></h3>
      </b-col>
    </b-row>
    <b-row class="p-1">
      <b-col md="6" lg="4" offset-lg="4" offset-md="3">
        <div class="profesion mx-auto text-center">Desarrollador Web</div>
      </b-col>
    </b-row>
    <b-row class="p-3">
      <b-col md="12">
        <p v-html="Descripcion"></p>
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
      <b-col md="12" class="py-3" v-for="(info, index) in Universities" :key="index">
        <div>
          <span class="span_titulos_educacion">Universidad:</span> <span class="span_txt_educacion">{{info.universidad}}</span>
        </div>
        <div>
          <span class="span_titulos_educacion">Promedio:</span> <span class="span_txt_educacion">{{info.promedio}}</span>
        </div>
        <div>
          <span class="span_titulos_educacion">Título Obtenido:</span> <span class="span_txt_educacion">{{info.titulo}}</span>
        </div>
        <div>
          <span class="span_titulos_educacion">Periodo:</span> <span class="span_txt_educacion">{{extractDates(info.fechaInicio)}} - {{extractDates(info.fechaFin)}}</span>
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
        Descripcion:null,
        Promedio:null,
        Titulo:null,
        Universities: [],
        In:'img/ico_linkedin1.png',
        Tw:'img/ico_twitter1.png',
        meses:{'01':'Enero','02':'Febrero','03':'Marzo','04':'Abril','05':'Mayo','06':'Junio','07':'Julio','08':'Agosto','09':'Septiembre','10':'Octubre','11':'Noviembre','12':'Diciembre'},
        mainProps: { class: 'm1 rounded-circle photo_circle img-fluid' },
        socialProps: { class: 'd-inline px-1 icos-social' }
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
          this.Descripcion = response.data[0].descripcion;
        }
      )
      axios
      .get('/universities')
      .then(response => 
         (this.Universities = response.data)
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
      extractDates (fecha){
        let dateJob = fecha;
        let chunkDate = dateJob.split('-');
        return this.meses[chunkDate[1]] +'  '+ chunkDate[0];  
      }
    }
  }
</script>
