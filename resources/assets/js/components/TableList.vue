<template>
  <div>
    <a href="#">Criar</a>

    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th v-for="title in titles" :key="title.message">{{title}}</th>
          <th>Ações</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="item in itens" :key="item">
          <td v-for="el in item" :key=el>{{el}}</td>          
          <td>
            <a href="#">Editar</a>
            <a href="#">Delete</a>
          </td>
        </tr>
        
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
    props: ['titles', 'itens']
};
</script>

