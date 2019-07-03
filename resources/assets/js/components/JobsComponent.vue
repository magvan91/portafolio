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
          <div class="fechas_job">Mayo 2017 - Junio 2019</div>
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
        jobs:[]
      }
    },
    mounted(){
      axios
      .get('/jobs')
      .then(response => (this.jobs = response.data))
    }
  }
</script>
