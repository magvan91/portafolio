<template>
  <b-container>
    <b-row class="p-4">
      <b-col md="5" lg="3">
        <div class="circulos_secciones mx-auto d-inline-block">
          <b-img center class="circulos_imgs" src="img/ideas.png" alt="Birrete"></b-img>
        </div>
        <div class="d-inline-block">
          <h4 class="titulo_secciones d-table">
            Habilidades
          </h4>
        </div>
      </b-col>
      <b-col md="7" lg="9"><hr class="lineas_secciones"></b-col>
    </b-row>
    <b-row class="p-4 bg-skills">
      <b-col md="3" class="text-center py-3">
        <div>100%</div>
        <div>PHP</div>
      </b-col>
      <b-col md="3" class="text-center py-3">
        <div>100%</div>
        <div>PHP</div>
      </b-col>
      <b-col md="3" class="text-center py-3">
        <div>100%</div>
        <div>PHP</div>
      </b-col>
      <b-col md="3" class="text-center py-3">
        <div>100%</div>
        <div>PHP</div>
      </b-col>
      <b-col md="3" class="text-center py-3">
        <div>100%</div>
        <div>PHP</div>
      </b-col>
    </b-row>
  </b-container>
  <!--b-container>
    <b-row>
      <b-col md="12"><h3>Habilidades</h3><hr></b-col>
      <b-col lg="12" id="skills">
        <sequential-entrance>
          <b-col v-for="(info, index) in skills" :key="index" md="3" cols="12" class="text-center ">
              <div v-bind:class="info.color+'-skills-box'">
                  <p style="width:65%" v-bind:data-value="info.percent">{{info.skill}}</p>
                  <progress max="100" v-bind:value="info.percent" class="php">
                      <div class="progress-bar">
                          <span v-bind:style="'width:'+info.percent+'%'">{{info.percent}}%</span>
                      </div>
                  </progress>
              </div>
          </b-col>
       </sequential-entrance>
      </b-col>
    </b-row>
  </b-container-->
</template>

<script>
export default {
  data () {
    return {
      skills: []
    }
  },
  mounted () {
    axios
      .get('/skills')
      .then(response => (this.skills = response.data))
  }
}
</script>
<style>

@media (min-width: 320px) {
  #skills span {
    width: 100%;
    display: inherit;
    justify-content: center;
  }
}
@media (min-width: 1200px) {
  #skills span {
    width: 100%;
    display: flex;
    justify-content: center;
  }
}
</style>
