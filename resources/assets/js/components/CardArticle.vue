<template>
  <div :class="'col-sm-'+ (sm || '6') + ' col-md-'+ (md || '4')">
    <div class="thumbnail">
      <img
        src="https://coletiva.net/files/e4da3b7fbbce2345d7772b0674a318d5/midia_foto/20170713/118815-maior_artigo_jul17.jpg"
        alt="..."
      />
      <div class="caption">
        <small>{{data | formatData}} - {{author}}</small>
        <h3>{{title }}</h3>
        <p>{{description}}</p>
        <p>
          <a v-bind:href="link" class="btn btn-primary" role="button">Leia Mais</a>
        </p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: [
    "title",
    "description",
    "link",
    "imageDest",
    "data",
    "author",
    "sm",
    "md",
  ],
  filters: {
    formatData: function (value) {
      if (!value) return "";

      value = value.toString();

      value = value.split("-");
      return value[2] + "/" + value[1] + "/" + value[0];
    },
  },
};
</script>
