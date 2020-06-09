<template>
  <div class="container">
    <div class="row">
      <div v-bind:class="defineLength">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["length"],
  computed: {
    defineLength: function() {
      if (this.length >= 12) {
        return "col-md-12";
      }
      if (this.length <= 2) {
        return "col-md-2 col-md-offset-5";
      }
      if (this.length % 2 == 0) {
        return (
          "col-md-" + this.length + " col-md-offset-" + (12 - this.length) / 2
        );
      } else {
        return (
          "col-md-" +
          (parseInt(this.length) + 1) +
          " col-md-offset-" +
          (12 - (parseInt(this.length) + 1)) / 2
        );
      }
    }
  }
};
</script>
