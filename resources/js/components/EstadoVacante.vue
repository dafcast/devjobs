<template>
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
        :class="isActive"
        :key="estadoData"
        @click="cambiarEstado"
    >
    {{estadoVacante}}
    </span>
</template>
<script>
export default {
    props:['estado','vacanteId'],
    data: function(){
        return{
            estadoData: null
        }
    },
    mounted: function(){
        this.estadoData = Number(this.estado);
    },
    methods:{
        cambiarEstado(){
            if(this.estadoData === 1){
                this.estadoData = 0;
            }else{
                this.estadoData = 1;
            }

            let params = {
                estado: this.estadoData
            }

            axios.post(`/vacantes/${this.vacanteId}`,params)
                    .then(response => {
                        console.log(response.data.respuesta);
                    })
                    .catch(error => {
                        console.log(error);
                    });
        }
    },
    computed:{
        isActive: function(){
            return this.estadoData ? "bg-green-100 text-green-800" : "bg-red-100 text-red-800";
        },
        estadoVacante: function(){
            return this.estadoData ? "Activa" : "Inactiva";
        }
    }
}
</script>