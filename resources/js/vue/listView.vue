<template>
    <div v-for="(todo, index) in todo" :key="index">
      <list-todo:
      todo="todo" 
      class="todo" 
      v-on:todochanged="$emit('reloadlist')" />
    </div>
  </template>
  
  <script>
  import listTod from './listTod.vue'

  
  export default {
    props: ['todo'],
    components: {
      listTod 
    }
  };
  </script>
  

<style>

.todo{
    background-color: #1DCFDB;
    padding: 5px;
    
}
</style>