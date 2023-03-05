<template>
  <div>
    <!-- ======= Cta Section ======= -->
    <CitaComponent/>
    <!-- End Cta Section -->
    <!-- ======= Portfolio Section ======= -->
    <section id="caminadesAnteriors" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-left">
          <h2>Caminades populars</h2>
          <p>En realitat es pot venir a caminar per la Vall de Lord en qualsevol època, ja que en cada estació de l’any es troba alguna raó per gaudir del paisatge, però alguns camins no estan marcats, i per algú que no conegui la Vall, pot ser fàcil perdre’s. Per això us convidem a venir a caminar el Dissabte Sant de cada any, tot i així aqui teniu el recull de les diferents caminades.</p>
        </div>
        
        
        




        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li v-on:click="carregaTots('')">Vall de Lord</li>
              <li v-on:click="carrega('Sant Llorenç de Morunys')">Sant Llorenç de Morunys</li>
              <li v-on:click="carrega('La Coma i la Pedra')">La Coma i la Pedra</li>
              <li v-on:click="carrega('Guixers')">Guixers</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio" data-aos="fade-up" data-aos-delay="200">

          <div v-for="(result, index) in results" :key="result.id"  class="col-lg-4 col-md-6 portfolio-item" :class="result.poblacio">

            <a :href="'/caminada/'+result.nom" :title="result.nom">
            <div class="portfolio-wrap">
                <div  id="over" style=" width:100%; height:100%"><img :src="'/'+result.imatges_id" class="img-fluid" alt=""></div>
                <div class="portfolio-info">
                  <div class="portfolio-links">
                  <h4>{{ result.nom }}</h4>
                  <p>{{ result.descripcio }}</p>
                    <!--<a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>-->
                    <!--<img width="30px" src="https://localhost:8000/img/favicon.png">-->
                  </div>
                </div>
            </div>
              </a>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->
    <!-- ======= Cta Section ======= -->
    <CitaComponent/>
    <!-- End Cta Section -->
  </div>
</template>

<script>
  import CitaComponent from './CitaComponent.vue';
    export default {
      components: {
        CitaComponent
      },
      data(){
            return {
                results: []
            }
        },
        methods: {
          carrega(lloc){  
            this.results = []
            axios.get('/api/caminades/municipi/'+lloc).then(response => {
              this.results = response.data;
              console.log(response.data);
            });
          },
          carregaTots(){
            this.results = []
            axios.get('/api/caminades').then(response => {
            this.results = response.data;
            console.log(response.data);
          });
          }
        },
        mounted() {
        },
        beforeMount(){
          this.carregaTots()
        },
    }
</script>
<style>
@keyframes spin { 100% { transform:rotate(360deg); } }
p{
  font-size: min(6vmin, calc(1rem + 0.23vmax), 2rem) !important;
}
.container {
	position: relative;
}
.portfolio-item{
    -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow:10px 10px 5px 0px rgba(0,0,0,0.75);
    box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
    padding-bottom: 0;
    margin-bottom: 2em;
}
.portfolio-wrap{
  width: 105%;
  height: 100%;
}


.about{
  color: black;
}
</style>
