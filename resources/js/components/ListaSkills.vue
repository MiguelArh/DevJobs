<template>
    <div>
        <ul class="flex flex-wrap justify-center">
        <li 
        class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
        :class="verificarClaseActiva(skill)"
        v-for="( skill, i ) in this.skills"
        v-bind:key="i"
        v-on:click="activar($event)"
        >{{skill}}</li>
    </ul>

    <input type="hidden" name="skills" id="skills"> 
    </div>
</template>

<script>
export default {
    props: ['skills', 'oldskills'],
    data: function() {
        return {
            habilidades: new Set()
        }
    },

    created() {
        if(this.oldskills){
            const skillsArreglo = this.oldskills.split(',');
            skillsArreglo.forEach(skill => this.habilidades.add(skill));
                
            }
        },
    

    mounted() {
        document.querySelector('#skills').value = this.oldskills;
    },
    


    methods: {
        activar(e){

            if( e.target.classList.contains('bg-green-400')){
                //El Skill esta activo
                 e.target.classList.remove('bg-green-400');
                
                //Eliminar del Set() de Habilidades
                this.habilidades.delete(e.target.textContent);

                }else{
                    //No esta acivo la Skill
                     e.target.classList.add('bg-green-400');

                     //Agregar  al Set() de Habilidades
                     this.habilidades.add(e.target.textContent);
                }

                //Agregar las Hanilidades del Input Hiddenx

                const stringHabilidades = [...this.habilidades];
                document.querySelector('#skills').value = stringHabilidades;
           
        },
        verificarClaseActiva(skill){
            return this.habilidades.has(skill) ? 'bg-green-400' : '';
        }
    }
}
</script>