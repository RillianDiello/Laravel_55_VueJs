<template>
  <!-- <div v-bind:id="name" class="modal fade" tabindex="-1" role="dialog" v-bind:aria-labelledby="name">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <slot></slot>
      </div>
    </div>
  </div>-->
  <div class="modal fade" v-bind:id="name" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{title}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <slot></slot>
        </div>
        <div class="modal-footer">
          <slot name="buttons"></slot> 
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["name", "title"]
};
</script>
