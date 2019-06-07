<template>
  <b-container>
   <b-row>
    <b-col md="12"><h3>Experiencia Laboral</h3><hr></b-col>

    <div v-for="(info, index) in jobs" :key="index">
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
