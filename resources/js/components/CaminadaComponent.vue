<template>
<div>
    <LoadingPageComponent v-if="isLoading" :dataInici="[results.nom,results.data_caminada]"/>
    
    <section id="caminada" class="team">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <div class="section-title content" data-aos="fade-right">
              <h2>{{results.nom}}, {{ formatDate(results.data_caminada) }} </h2>
              <div class="member sortida">
                <div class="pic">
                  <img :src="'/'+results.imatges_id" class="img-fluid" :alt="results.nom">
                </div>

                <span>{{results.descripcio}}</span>
                <div class="member-info">
                  <h4>Sortida</h4>
                  <span>{{results.controls[0].nom}}</span>
                  <p  v-html="results.controls[0].descripcio"></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="row">
              
              <div  v-for="(result, key, index) in results.controls.slice(1)" v-if="key < numControls -1" class="col-lg-6">
                <div class="member" data-aos="zoom-in" data-aos-delay="100" v-if="result.descripcio != null">
                  <!--<div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>-->
                  <div class="member-info">
                    <h4>Control {{key+1}}</h4>
                    <h6>{{result.nom}}</h6>
                    <p v-html="result.descripcio"></p>
                  </div>
                </div>
              </div>
              <div class="member">
                <!--<div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>-->
                <div class="member-info" data-aos="zoom-in" data-aos-delay="500"  v-if="results.controls[numControls].descripcio != null">
                  <h4>Arribada </h4>
                  <h6>{{results.controls[numControls].nom}}</h6>
                  <p>{{results.controls[numControls].descripcio}}</p>
                </div>
              </div>

            </div>

          </div>
          <div class="container">
            <div class="row">
              <div v-if="results.mapa_id != null" class="col-sm">
                <img :src="'/'+results.mapa_id" class="img-fluid" alt="Mapa">
              </div>
              <div v-if="results.altimetria_id != null" class="col-sm">
                <img :src="'/'+results.altimetria_id" class="img-fluid" alt="Altimetria">
              </div>
            </div>
            <div class="row">
              <div v-if="results.triptic_id != null" class="col-sm" style="text-align: center;">
                <a :href="'/'+results.triptic_id" ><i class="bi bi-file-earmark-pdf-fill" style="font-size: 4em; "></i>Descarrega Triptic PDF</a>
              </div>
              <div  v-if="results.track_id != null" class="col-sm" style="text-align: center;" >
                <a :href="'/'+results.track_id"><i class="fs bi-strava" style="font-size: 4em; "></i>Descarrega Track GPX</a>
              </div>
            </div>
          </div>  
        </div>

      </div>
    </section><!-- End Team Section -->
  </div>
</template>


<script>
import LoadingPageComponent from './LoadingPageComponent.vue';

    export default {
      components: {
          LoadingPageComponent
      },
      props:{
        identificacioCaminada: String,
      },
      data(){
        return {
          visible: {
            type: Boolean,
            default: false
          },
          isLoading: true,
          results: [],
          controls: [],
          counter: 0,
          numControls: 0,
        }
      },
      methods:{
        formatDate(dateString) {
            const date = new Date(dateString + ' 08:00:00');
            return new Intl.DateTimeFormat('default', {dateStyle: 'long'}).format(date);
        },
      },
      beforeMount(){
        if(this.identificacioCaminada == null){
          axios.get('/api/caminada/actual').then(response => {
            this.results = response.data;
            this.numControls = response.data.controls.length - 1
            console.log(response.data);
          });
        }else{
          axios.get('/api/caminada/'+this.identificacioCaminada).then(response => {
            this.results = response.data;
            this.numControls = response.data.controls.length - 1
            console.log(response.data);
          });
        }
        },
      mounted() {
        setTimeout(() => {
          this.isLoading = false;
        }, 3500);
        console.log('Caminada Component muntat')
      }
    }
</script>
<style>
p{
  font-size: min(6vmin, calc(1rem + 0.23vmax), 2rem) !important;
}
.pax-loading-modal {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	background-color: rgba(0, 0, 0, 0.7);
  background: radial-gradient(elipse at center, #0a2e38 0%, #000000 70%);
  background-size: 100%;
  z-index: 11111;
	
}
#temporitzador{
  color: white;
  text-align: center;
  position: absolute;
  left: 50%;
  top: 50%;
  text-shadow: 0 0 20px rgba(10, 175, 230,0);
}
.data{
  font-size: 32px;
  line-height: 32px;
}
.dies{
  font-size: 64px;
  line-height: 64px;
}
.hores{
  font-size: 64px;
  line-height: 64px;
}
.minuts{
  font-size: 64px;
  line-height: 64px;
}
.about{
  color: black;
}
</style>
