<template>
<div>
    <ul class="flex flex-wrap justify-center">
        <li class="bg-gray-200 border border-gray-700 px-10 py-3 mr-4 mb-3 rounded"
        :class="claseActiva(skill)"
        v-for="(skill,i) in skills"
        v-bind:key="i"
        v-on:click="activar($event)"
        >{{skill}}</li>
    </ul>
    <input type="hidden" name="skills" id="skills">
</div>
</template>

<script>
    export default {
        props: ['skills','oldskills'],
        data: function(){
            return {
                habilidades: new Set()
            }
        },
        created: function(){
            if(this.oldskills){
                let skillsArray = this.oldskills.split(',');
                skillsArray.forEach(skill => {
                    this.habilidades.add(skill)
                });
            }
        },
        mounted: function() {
            document.querySelector('#skills').value = this.oldskills;
        },
        methods:{
            activar(e){
                if(e.target.classList.contains('bg-green-600')){
                    e.target.classList.remove('bg-green-600');
                    this.habilidades.delete(e.target.textContent);
                }else{
                    e.target.classList.add('bg-green-600');
                    this.habilidades.add(e.target.textContent);
                }

                let stringHabilidades = [...this.habilidades];

                document.querySelector('#skills').value = stringHabilidades;
            },
            claseActiva(skill){
                return this.habilidades.has(skill) ? 'bg-green-600' : '';
            }
        }
        
    }
</script>
