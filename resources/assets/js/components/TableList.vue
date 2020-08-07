<template>
  <div>
    <div class="form-inline">
      <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
      <modallink v-if="criar && modal" type="link" name="add" title="Criar" css></modallink>
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
          <th v-if="detalhes || editar || deletar">Ações</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="(item, index) in list" :key="index">
          <td v-for="el in item" :key="el">{{el | formatData}}</td>

          <td v-if="detalhes || editar || deletar">
            <form
              v-bind:id="index"
              v-if="deletar && token"
              v-bind:action="deletar + item.id"
              method="post"
            >
              <input type="hidden" name="_method" value="DELETE" />
              <input type="hidden" name="_token" v-bind:value="token" />

              <a v-if="detalhes && !modal" v-bind:href="detalhes">Detalhes |</a>
              <modallink
                v-if="detalhes && modal"
                v-bind:item="item"
                v-bind:url="detalhes"
                type="link"
                name="details"
                title="Detalhes | "
                css
              ></modallink>

              <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
              <modallink
                v-if="editar && modal"
                v-bind:item="item"
                v-bind:url="editar"
                type="link"
                name="editar"
                title=" Editar |"
                css
              ></modallink>

              <a href="#" v-on:click="executeForm(index)">Deletar</a>
            </form>
            <span v-if="!token">
              <a v-if="detalhes && !modal" v-bind:href="detalhes">Detalhes |</a>
              <modallink
                v-if="detalhes && modal"
                v-bind:item="item"
                v-bind:url="detalhes"
                type="link"
                name="details"
                title="Detalhes | "
                css
              ></modallink>

              <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
              <modallink
                v-if="editar && modal"
                type="link"
                v-bind:item="item"
                v-bind:url="editar"
                name="editar"
                title=" Editar |"
                css
              ></modallink>

              <a v-if="deletar" v-bind:href="deletar">Deletar</a>
            </span>

            <span v-if="token && !deletar">
              <a v-if="detalhes && !modal" v-bind:href="detalhes">Detalhe |</a>
              <modallink
                v-if="detalhes && modal"
                v-bind:item="item"
                v-bind:url="detalhes"
                type="link"
                name="details"
                title="Detalhes | "
                css
              ></modallink>
              <a v-if="editar && !modal" v-bind:href="editar">Editar</a>
              <modallink
                v-if="editar && modal"
                type="link"
                v-bind:item="item"
                v-bind:url="editar"
                name="editar"
                title=" Editar"
                css
              ></modallink>
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
    "detalhes",
    "editar",
    "deletar",
    "token",
    "ordem",
    "ordemcol",
    "modal",
  ],
  data: function () {
    return {
      search: "",
      ordemAux: this.ordem || "asc",
      ordemAuxCol: this.ordemcol || 0,
    };
  },

  methods: {
    executeForm: function (index) {
      document.getElementById(index).submit();
    },
    ordemByColumn: function (colunm) {
      this.ordemAuxCol = colunm;
      if (this.ordemAux.toLowerCase() == "asc") {
        this.ordemAux = "desc";
      } else {
        this.ordemAux = "asc";
      }
    },
  },

  filters: {
    formatData: function (value) {
      if (!value) return "";

      value = value.toString();

      if (value.split("-").length === 3) {
        value = value.split("-");
        return value[2] + '/' + value[1] + '/' + value[0];

      }

      return value;
    },
  },

  computed: {
    list: function () {
      let ordem = this.ordemAux;
      let ordemcol = this.ordemAuxCol;

      let list = this.itens.data;

      ordem = ordem.toLowerCase();
      ordemcol = parseInt(ordemcol);

      if (ordem == "asc") {
        list.sort(function (a, b) {
          if (Object.values(a)[ordemcol] > Object.values(b)[ordemcol]) {
            return 1;
          }
          if (Object.values(a)[ordemcol] < Object.values(b)[ordemcol]) {
            return -1;
          }
          return 0;
        });
      } else {
        list.sort(function (a, b) {
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
        return list.filter((res) => {
          res = Object.values(res);
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
      return list;
    },
  },
};
</script>

