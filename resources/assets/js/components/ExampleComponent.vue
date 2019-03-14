<template>
   <div class="row">
      <div class="col-md-7"><h3>Habilidades</h3><hr></div>
      <div class="col-md-5"></div>
      <div v-for="(info, index) in skills" :key="index" class="col-md-3 col-sm-6 col-xs-6 text-center ">
          <div v-bind:class="info.color+'-skills-box'">
              <p style="width:65%" v-bind:data-value="info.percent">{{info.skill}}</p>
              <progress max="100" v-bind:value="info.percent" class="php">
                  <div class="progress-bar">
                      <span v-bind:style="'width:'+info.percent+'%'">{{info.percent}}%</span>
                  </div>
              </progress>
          </div>
      </div>
    </div>
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
