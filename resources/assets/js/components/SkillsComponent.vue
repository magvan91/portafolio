<template>
  <b-container>
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
  </b-container>
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
