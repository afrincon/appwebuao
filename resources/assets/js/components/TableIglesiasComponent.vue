<template>
  <div id="crud" class="row">
    <input type="text" name="nombre" class="input" v-model="nombre" placeholder="Buscar iglesia">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped is-fullwidth">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Telefóno</th>
            <th>Arquidiocesis</th>
            <th>Parroco</th>
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="iglesia in iglesias" :key="iglesia.id">
            <td>{{ iglesia.id }}</td>
            <td><a :href="'/iglesias/' + iglesia.id">{{ iglesia.nombre }}</a></td>
            <td>{{ iglesia.direccion}}</td>
            <td>{{ iglesia.telefono}}</td>
            <td>{{ iglesia.arquidiocesis.nombre }}</td>
            <td>{{ iglesia.user.name }}</td>
            <td>
                <a class="button is-link is-rounded is-outlined" :href="'/iglesias/'+iglesia.id + '/editar'">Editar</a>
                <a class="button is-link is-rounded is-outlined" :href="'/consultar-ayudas/'+iglesia.id">Ver ayudas</a>    
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
      iglesias: [],
      nombre: null,
    }
  },
  created() {
    this.getIglesias();
  },
  watch: {
    nombre(after,before) {
      this.getIglesias();				
    }
  },
  methods: {
    getIglesias() {
      var url = 'iglesias/obtenerlistadoiglesias';                
      axios.get(url, { params: { nombre: this.nombre }}).then(response => {
        this.iglesias = response.data;
      });
    }
  }
}
</script>

