<template>
  <div>
    <div class="form-inline">
      <a v-if="criar" v-bind:href="criar">Criar</a>
      <div class="form-group pull-right">
        <input type="search" class="form-control" placeholder="Buscar" v-model="search" />
      </div>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th
            style="cursor:pointer"
            v-on:click="ordemByColumn(index)"
            v-for="(title,index) in titles"
            :key="index"
          >{{title}}</th>
          <th v-if="detalhe || editar || deletar">Ações</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="(item, index) in list" :key="index">
          <td v-for="el in item" :key="el">{{el}}</td>

          <td v-if="detalhe || editar || deletar">
            <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
              <input type="hidden" name="_method" value="DELETE" />
              <input type="hidden" name="_token" v-bind:value="token" />

              <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
              <a v-if="editar" v-bind:href="editar">Editar |</a>

              <a href="#" v-on:click="executeForm(index)">Deletar</a>
            </form>
            <span v-if="!token">
              <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
              <a v-if="editar" v-bind:href="editar">Editar |</a>
              <a v-if="deletar" v-bind:href="deletar">Deletar</a>
            </span>

            <span v-if="token && !deletar">
              <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
              <a v-if="editar" v-bind:href="editar">Editar</a>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: [
    "titles",
    "itens",
    "criar",
    "detalhe",
    "editar",
    "deletar",
    "token",
    "ordem",
    "ordemcol"
  ],
  data: function() {
    return {
      search: "",
      ordemAux: this.ordem || "asc",
      ordemAuxCol: this.ordemcol || 0
    };
  },

  methods: {
    executeForm: function(index) {
      document.getElementById(index).submit();
    },
    ordemByColumn: function(colunm) {
      this.ordemAuxCol = colunm;
      if (this.ordemAux.toLowerCase() == "asc") {
        this.ordemAux = "desc";
      } else {
        this.ordemAux = "asc";
      }
    }
  },
  computed: {
    list: function() {
      let ordem = this.ordemAux;
      let ordemcol = this.ordemAuxCol;

      ordem = ordem.toLowerCase();
      ordemcol = parseInt(ordemcol);

      if (ordem == "asc") {
        this.itens.sort(function(a, b) {
          if (Object.values(a)[ordemcol] > Object.values(b)[ordemcol]) {
            return 1;
          }
          if (Object.values(a)[ordemcol] <Object.values(b)[ordemcol]) {
            return -1;
          }
          return 0;
        });
      } else {
        this.itens.sort(function(a, b) {
          if (Object.values(a)[ordemcol] < Object.values(b)[ordemcol]) {
            return 1;
          }
          if (Object.values(a)[ordemcol] > Object.values(b)[ordemcol]) {
            return -1;
          }
          return 0;
        });
      }
      if (this.search) {
        return this.itens.filter(res => {
          for (let k = 0; k < res.length; k++) {
            if (
              (res[k] + "").toLowerCase().indexOf(this.search.toLowerCase()) >=
              0
            ) {
              return true;
            }
          }
          return false;
        });
      }
      return this.itens;
    }
  }
};
</script>

