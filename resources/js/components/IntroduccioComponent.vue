<template>
    <div><!-- ======= About Section ======= -->
        <section class="about">
          <div class="container">
    
            <div class="row content">
              <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                <h2>QUÈ ÉS LA CAMINADA POPULAR?</h2>
                <h3></h3>
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
                <p>
                  És un intent de poder mostrar els entorns de la Vall de Lord; la fauna i la flora que hi conviuen, els monuments i els llocs més pintorescos i amagats. I la que la millor manera de endinsar-te a la natura és caminant de forma pausada, sense motors ni cap mena de soroll que molesti.
    Gairebé en totes les edicions de la Caminada s’ha intentat mostrar vells oficis o activitats que abans eren habituals a la Vall de Lord. Gràcies a la Caminada, es recuperen molts camins i fonts que el temps havia deixat en desús.
                </p>
                <p>La sortida de la Caminada varia cada any en funció de d’itinerari escollit. S’aconsella visitar periòdicament aquesta pàgina web per conèixer els detalls de cada edició. Per donar més varietat als recorreguts, intentem que la Caminada surti des de els tres municipis de la Vall de Lord: </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> Guixers</li>
                  <li><i class="ri-check-double-line"></i> La Coma i la Pedra</li>
                  <li><i class="ri-check-double-line"></i> Sant Llorenç de Morunys</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
              <h2>PREPARATIUS</h2>
            </div>
            <div>
              <hooper :itemsToShow="1.25" :centerMode="true" :progress="true" :autoPlay="true" :playSpeed="2000" v-for="(result, index) in results" :key="result.id" >
                <slide>
                  <img class="imageHopper" :src="result.imatges_id" :alt="result.nom">
                </slide>

                <hooper-pagination slot="hooper-addons" mode="fraction"></hooper-pagination>
                <hooper-navigation slot="hooper-addons"></hooper-navigation>
              </hooper>
            </div>
          </div>
            
        </section><!-- End About Section -->
      </div>
    </template>
    
    
    <script>
        import { Hooper, Slide, Pagination as HooperPagination, Navigation as HooperNavigation } from 'hooper';
        import 'hooper/dist/hooper.css';
        export default {
          data(){
                return {
                    results: [],
                    counter: 0,
                    numControls: 0,
                    hooperSettings: {
                      itemsToShow: 2,
                      centerMode: true,
                      breakpoints: {
                        800: {
                          centerMode: false,
                          itemsToShow: 3
                        },
                        1000: {
                          itemsToShow: 6,
                          pagination: 'fraction'
                        }
                      }
                    }
                }
            },
          components: {
            Hooper,
            Slide,
            HooperPagination,
            HooperNavigation
          },
          methods:{
            carregaTots(){
              this.results = []
              axios.get('/api/preparatius').then(response => {
                this.results = response.data;
                console.log(response.data);
              });
            },
          },
          beforeMount(){
            this.carregaTots()
          },
          mounted() {
              console.log('Caminada mounted.')
          },
        }
    </script>
    <style>
    p{
      font-size: min(6vmin, calc(1rem + 0.23vmax), 2rem) !important;
    }
    .about{
      color: black;
    }
    .hooper{
      height: 100%!important;
    }
    .hooper-slide.is-current {
      transform: scale(1.2);
    }
    .imageHopper{
      width: 100%;
    }
    </style>
    