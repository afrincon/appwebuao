<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="id_beneficiario" placeholder="Buscar beneficiario">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped table is-fullwidth">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fecha</th>
            <th scope="col">Tipo de Ayuda</th>
            <th scope="col">Beneficiario</th>
            <th scope="col">Iglesia</th>
            <th scope="col">Observaciones</th> 
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="ayuda in ayudas" :key="ayuda.id_ayuda">                        
            <td>{{ ayuda.id_ayuda }}</td>
            <td>{{ ayuda.fecha_ayuda }}</td>
            <td>{{ ayuda.tipo_ayuda.descripcion }}</td>
            <td>{{ ayuda.beneficiario.nombre }}</td>
            <td>{{ ayuda.iglesia.nombre }}</td>
            <td>{{ ayuda.observaciones }}</td>
            <td>
              <a class="button is-link is-rounded is-outlined" :href="'/ayudas/' + ayuda.id_ayuda + '/editar'">Editar</a>
              <a class="button is-danger is-rounded is-outlined" :href="'#'">Anular</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      ayudas: [],
      id_beneficiario: null,
      
    }
  },
  created() {
    this.getAyudas();
  },
  watch: {
    id_beneficiario(after,before) {
        this.getAyudas();
    }
  },
  methods: {
    getAyudas() {
      var url = 'ayudas/obtenerlistadoayudas';
      axios.get(url, { params: { id_beneficiario: this.id_beneficiario }}).then(response => {
        this.ayudas = response.data;
      });
    }  
  }
}
</script>

