<template>
  <div>
    <input type="text" class="input" list="data-parrocos" name="user_id">
    <datalist class="select" id="data-parrocos">
    
        <option v-for="parroco in parrocos" v-bind:value="parroco.text" v-bind:label="parroco.text" :key="parroco.id"></option>
      
    </datalist>
  </div>
</template>

<script>
export default {
  data() {
    return {
      parrocos : [],
      user_id: null,
    }
  },
  created() {
    this.obtenerParrocos();
  },
  watch: {
    user_id(after,before) {
      this.obtenerParrocos();
    }
  },
  methods: {
    obtenerParrocos(){
      var url = '/usuarios/obtenerlistadoparrocos'
      axios.get(url, { params: { user_id: this.user_id }}).then(response => {
        response.data.forEach(obj => {
          this.parrocos.push({ text: obj.name, value: obj.id })            
        });
      });
    }
  }
}
</script>

