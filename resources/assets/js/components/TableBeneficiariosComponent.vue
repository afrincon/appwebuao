<template>
  <div id="crud" class="row">
    <input type="text" name="nombre" class="input" v-model="nombre" placeholder="Buscar iglesia">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped is-fullwidth">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo de Documento</th>
            <th scope="col">Documento</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Dirección</th>
            <th scope="col">Clasificación</th>
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="beneficiario in beneficiarios" :key="beneficiario.id_beneficiario">            
              <td>{{ beneficiario.id_beneficiario }}</td>
              <td><a :href="'/beneficiarios/' + beneficiario.id_beneficiario">{{ beneficiario.nombre }}</a></td>
              <td>{{ beneficiario.tipo_documento.descripcion }}</td>
              <td>{{ beneficiario.documento }}</td>
              <td>{{ beneficiario.telefono }}</td>
              <td>{{ beneficiario.direccion }}</td>
              <td>{{ beneficiario.clasificacion }}</td>
              <td><a class="button is-link is-rounded is-outlined" :href="'/beneficiarios/' + beneficiario.id_beneficiario + '/editar'">Editar</a></td>
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
      beneficiarios: [],
      nombre: null,
    }
  },
  created() {
    this.getBeneficiarios();
  },
  watch: {
    nombre(after,before) {
      this.getBeneficiarios();				
    }
  },
  methods: {
    getBeneficiarios() {
      var url = 'beneficiarios/obtenerlistadobeneficiarios';                
      axios.get(url, { params: { nombre: this.nombre }}).then(response => {
        this.beneficiarios = response.data;
      });
    }
  }
}
</script>

