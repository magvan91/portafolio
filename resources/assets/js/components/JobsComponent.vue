<template>
  <b-container>
    <b-row class="p-4">
      <b-col md="6" lg="4">
        <div class="circulos_secciones mx-auto d-inline-block">
          <b-img center class="circulos_imgs" src="img/jobs.png" alt="Birrete"></b-img>
        </div>
        <div class="d-inline-block">
          <h4 class="titulo_secciones d-table">
            Experiencia Laboral
          </h4>
        </div>
      </b-col>
      <b-col md="6" lg="8"><hr class="lineas_secciones"></b-col>
    </b-row>
    <b-row class="p-2">
      <div v-for="(info, index) in jobs" :key="index">
        <div class="circles_job"></div>
        <b-col md="12" class="mx-2 b_left_empresa">
          <div class="name_empresa">{{info.empresa}}</div>
          <div class="fechas_job">{{extractDates(info.fechaInicio)}} - {{extractDates(info.fechaFin)}}</div>
          <p class="funciones_jobs">{{info.actividades}}</p>
          <div><hr class="lineas_secciones"></div>
        </b-col>
      </div>
    </b-row>
 </b-container>
</template>

<script>
  export default {
    data(){
      return{
        jobs:[],
        meses:{'01':'Enero','02':'Febrero','03':'Marzo','04':'Abril','05':'Mayo','06':'Junio','07':'Julio','08':'Agosto','09':'Septiembre','10':'Octubre','11':'Noviembre','12':'Diciembre'}
      }
    },
    mounted(){
      axios
      .get('/jobs')
      .then(response => (this.jobs = response.data))
    },
    methods:{
      extractDates (fecha){
        if(fecha == null){
          return 'Actualmente Laborando';
        }else{
          let dateJob = fecha;
          let chunkDate = dateJob.split('-');
          return this.meses[chunkDate[1]] +'  '+ chunkDate[0];  
        }
      }
    }
  }
</script>
