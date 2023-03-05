<template>
  <div>
    <section id="hero" class="d-flex align-items-center">
      <div class="container text-center position-relative">
        <h1>Ja Arribarem Club </h1>
        <h2>Som un grup de persones vinculades d'una manera o altra a la Vall de Lord, que tenim en comú la passió per la natura. I és per això, que volem conservar al màxim possible els entorns que des de sempre han envoltat la nostra vall, i de la mateixa manera donar-ho a conèixer a persones que no han tingut el privilegi de viure en un lloc tan meravellós com és el nostre.</h2>
        <h2>El nom del Ja Arribarem Club respon a la idea del que entenem que hauria de ser la nostra caminada. Es a dir, gaudir del paisatge sense presses.</h2>
        <h2>No som un grup excursionista que es dediqui en sí a organitzar excursions; només organitzem la Caminada Popular, però hi dediquem el màxim esforç per fer gaudir el nombrosos participants que ens visiten any rere any. Per a poder-la dur a terme necessitem la col·laboració desinteressada de la gent de la vall que fa un esforç cada any per poder ser-hi ajudant en algun dels cinc controls que tenim, ja que nosaltres som molt pocs i el dia de la Caminada no ens podem fer càrrec de tota la feina que comporta el desenvolupament de la mateixa.</h2>
        <!--<a href="#caminada" class="btn-get-started scrollto">Caminada 2023</a>-->
      </div>
    </section><!-- End Hero -->

    <IntroduccioComponent/>
    <!-- ======= Cta Section ======= -->
    <CitaComponent/>
    <!-- End Cta Section -->
    <!-- ======= Team Section ======= -->
  </div>
</template>

<script>
import CitaComponent from './CitaComponent.vue';
import IntroduccioComponent from './IntroduccioComponent.vue';
    export default {
      components: {
        CitaComponent,
        IntroduccioComponent
      },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
h2{
  font-size: min(3.5vmin, calc(2rem + 1.2vmax)) !important;
}
</style>