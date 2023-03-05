<template>
    <div class="temporitzador pax-loading-modal" v-if="visible" @click="muntat">
        <div class="">
            <div class="row data">
                <div class="col-12">{{ dataInici[0] }} {{ formatDate(dataInici[1]) }}</div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="card text-center">
                        <div class="card-block">
                            <h4 class="card-title">{{ dies }}</h4>
                        </div>
                        <div class="card-footer">
                            <p>Dies</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card text-center">
                        <div class="card-block">
                            <h4 class="card-title">{{ hores }}</h4>
                        </div>
                        <div class="card-footer">
                            <p>Hores</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card text-center">
                        <div class="card-block">
                            <h4 class="card-title">{{ minuts }}</h4>
                        </div>
                        <div class="card-footer">
                            <p>Minuts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
    
    
<script>
    export default {
        props: {
            dataInici: [String, String]
        },
        data(){
            return {
                visible: {
                    type: Boolean,
                    default: false
                },
                dies: 0,
                hores: 0,
                minuts: 0,
            }
        },
        methods:{
            formatDate(dateString) {
                const date = new Date(dateString + ' 08:00:00');
                let hoy = new Date();
                let tempsFins = ((date - hoy)/1000/60/60/24);
                this.dies = this.passatOfutur(tempsFins);          
                tempsFins = (tempsFins - this.dies)*24;
                this.hores = this.passatOfutur(tempsFins);
                tempsFins = (tempsFins - this.hores)*60;
                this.minuts = this.passatOfutur(tempsFins);
                return new Intl.DateTimeFormat('default', {dateStyle: 'long'}).format(date);
            },
            passatOfutur(tempsFins){
                if(tempsFins > 0){
                    return Math.trunc(tempsFins);
                }  
                else{
                    this.visible = false;
                    return 0;
                }
            },
            muntat(){
                    this.visible = false;
            },
        },
        beforeMount(){
            this.visible = true;
        },
        mounted() {
        }
    }
</script>
<style>
p{
    font-size: min(6vmin, calc(1rem + 0.23vmax), 2rem) !important;
}
.card-title{
    padding: 1em;
}
.card{
    -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow:10px 10px 5px 0px rgba(0,0,0,0.75);
    box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
    padding-bottom: 0;
    margin-bottom: 2em;
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
.temporitzador{
    -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow:10px 10px 5px 0px rgba(0,0,0,0.75);
    box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
    padding-bottom: 0;
    margin-bottom: 2em;
    background-color: white;
    width: 50%;
}
.data{
    font-size: 32px;
    line-height: 32px;
    background-color: #009970;;
    text-align: center;
}
.temporitzador .row{
    background-color: #009970;;
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
</style>
    