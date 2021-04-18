<template>
    <button class="text-red-600 hover:text-red-900  mr-5"
        @click="eliminarVacante"
    >Eliminar</button>
</template>
<script>
export default {
    props:['vacanteId'],
    methods:{
        eliminarVacante(){
            this.$swal.fire({
                title: '¿Estas seguro?',
                text: "Los cambios no podran ser revertidos",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar!',
                cancelButtonText: 'Canacelar'
            }).then((result) => {
                // let params = {
                //     _method: 'DELETE'
                // }
                if (result.isConfirmed) {
                    axios.delete('/vacantes/'+ this.vacanteId)
                        .then(response =>{
                            console.log(response);
                            this.$swal.fire(
                                'Eliminada!',
                                `la vacante ${response.data.respuesta}, fue eliminada`,
                                'success'
                            );
                            
                            this.$el.parentElement.parentElement.parentElement.removeChild(this.$el.parentElement.parentElement);
                        }).catch(error =>{
                            console.log(error);
                        });
                }
            })
        }
    }
}
</script>
