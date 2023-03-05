<template>
    <!-- ======= Clients Section ======= -->
    <section id="colaboradors" class="clients">
      <div class="container">

        <div class="row">

          <div v-for="(result, index) in results" :key="result.id" class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <a :href="result.url" _blank>
              <img :src="'/'+result.img" class="img-fluid" :alt="result.nom">
            </a>
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->
</template>

<script>
    export default{
        data(){
            return {
                results: []
            }
        },
        methods: {
        },
        beforeMount(){
          axios.get('/api/colaboradors').then(response => {
            this.results = response.data;
            console.log(response.data);
          });
        },
        mounted(){
          console.log('Colaborador mountedd.')
        }
    }
</script>
<style>
p{
  font-size: min(6vmin, calc(1rem + 0.23vmax), 2rem) !important;
}
.about{
  color: black;
}
</style>
