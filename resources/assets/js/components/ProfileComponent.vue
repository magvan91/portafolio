<template>
  <div class="row">
    <div class="col-md-6"> <img src="img/myAvatar.png" class="img-responsive mx-auto d-block" alt=""> </div>
    <div class="col-md-6">
        <div class="row">
          <div class="col-md-12 text-center">
              <h1>{{name}} {{AppPaterno}} {{AppMaterno}} </h1>
              <h2>Desarrollador Web</h2>
          </div>
          <div class="col-md-12">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pharetra lectus at fermentum pretium. Sed tincidunt lectus nunc, at accumsan lorem finibus non. Nam velit nisl, vulputate sed purus non, luctus ornare tortor. Morbi tincidunt pretium ex ut congue. Vivamus placerat libero non ante aliquet gravida. Morbi odio turpis, vestibulum non tellus non, lacinia vestibulum ipsum. Aliquam tincidunt gravida gravida. Integer vestibulum pulvinar dignissim. Aliquam fringilla nec velit a varius. Ut auctor volutpat erat eget dignissim. Praesent porta tortor nec odio aliquam, non rhoncus nunc sollicitudin. Cras auctor semper nulla, a condimentum nisl molestie ultricies.</div>
          <div class="col-md-12">
              <span>Edad:</span> {{Edad}}
              <span>Carrera:</span> Ing. Tecnologías de la Información y Comunicación
              <span>Universidad:</span> {{Universidad}}
          </div>
        </div>
    </div>
  </div>
</template>

<script>
  export default {
    data(){
      return {
        name: null,
        AppPaterno: null,
        AppMaterno: null,
        Universidad: null,
        Edad: null,
       }
    },
    mounted(){
      axios
      .get('/profiles')
      .then(response => {
          this.name = response.data[0].name;
          this.AppPaterno = response.data[0].AppPaterno;
          this.AppMaterno = response.data[0].AppMaterno;
          this.FechaNacimiento = response.data[0].fecha_nacimiento;
          this.Edad = this.birthday(response.data[0].fecha_nacimiento);
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
