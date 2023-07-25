<template>
    <div class="addTodo">
        <input type="text" v-model="name" class="custom-border"/>
        <font-awesome-icon
        icon="plus-square"
        @click="addTodo"
        :class="[name ? 'active': 'inactive' , 'plus']"
        />
        
    </div>
</template>

<script>
import axios from 'axios';

export default {

  data() {
    return{
        name:""
       }
  }, 

    methods: {
       addTodo() {
        if(this.name == ''){
            return;
        
        }

        axios.post('api/todo/store', {
            name: this.name
        })

        .then( response =>{ 
            if (response.status == 201){
                this.name = "";
                this.$emit('reloadlist')
            }
        })
            .catch( error => {
                console.log(error);
           
    })

       }
    }
}
</script>

<style>
.addTodo{
    display: flex;
    justify-content: center;
    align-items: center;

}

.input{
    background-color:#FFFCFC;
    border: 20px;

    padding: 5px;
    margin-right: 10px;
    width: 100%;

}
.custom-border {
  border: 2px solid #1DCFDB;
}

.plus{
    font-size: 20px;
    color: #1DCFDB;
   
}
.active{
    color: bisque;
}

.innactive{
    color: blanchedalmond;
}
</style>