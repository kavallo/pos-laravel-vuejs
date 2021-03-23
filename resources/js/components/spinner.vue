<template>
  <div id="app" class="spinner">
    <spinner-add></spinner-add>
  </div>
</template>

<script>
  import {Circle8} from 'vue-loading-spinner'
  export default {
    components: {
      'spinner-add': Circle8
    }
  }
</script>
<style scoped>
    .spinner {
        z-index: 99999999;
        position: fixed;
        top: 50%;
        left: 50%;
    }
</style>