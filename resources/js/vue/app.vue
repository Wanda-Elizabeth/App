<template>
    <div class="todolistContainer">
        <div class="heading">
            <h2 id="title">Todo List</h2> 

           <add-todo-form 
           v-on:reaload="getList()" 
           /> 

        </div>
        <list-view:
        todo="todo" 
        v-on:reaload="getList()"/>
    </div>
</template>

<script>
import axios from 'axios';
import addTodoForm from './addTodoForm.vue'
import listView from './listView.vue'

export default{
    components:{
        addTodoForm,
        listView
    },
    data: function () {
        return{
            todo:[]
        }
    },
    methods: {
        getList () {
            axios.get('api/todo')
            .then( response => {
                this.name = response.data
            })

            .catch( error => { 
                console.log( error );


           })
    },

    created (){
        this.getList()
   
    }
}
}
</script>
<style>

.todoListContainer{
    widows: 350px;
    margin: auto;
}

.heading{
    background-color: #ffffff;
    padding: 10px;
}

#title{
    text-align: center;
}
</style>