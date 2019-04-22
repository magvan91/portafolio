<template>
  <div class="row"><br><br><br>
    <div class="col-md-7"><h3>Experiencia Laboral</h3><hr></div>
    <div class="col-md-5"></div>
    <div v-for="(info, index) in jobs" :key="index">
      <b-container>
        <b-row v-if="index%2==0">
          <b-col class="text-center digitas justify-content-center align-self-center">
            <a :href="info.pagina" target="_blank">{{info.empresa}}</a>
            <br>Mayo 2017 - Actualmente Laborando
          </b-col>
          <b-col>Actividades: {{info.actividades}}</b-col>
          <div class="w-100" />
        </b-row>
        <b-row v-else>
          <b-col>Actividades: {{info.actividades}}</b-col>
          <b-col class="text-center digitas justify-content-center align-self-center">
            <a :href="info.pagina" target="_blank">{{info.empresa}}</a>
            <br> Noviembre 2016 - Mayo 2017
          </b-col>
          <div class="w-100" />
        </b-row>
      </b-container>
    </div>
  </div>
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
