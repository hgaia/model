<template>
<Menu :user="user" :title="title">
<div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
       
    </div>
</div>
</Menu>
</template>
<script>
import Menu from '../layout/Menu.vue'
export default {
  components:{
    Menu
  },
  props: ['title','user'],
    data() {
    return {
      count: 0
    }
  }
}
</script>
<style>

</style>
