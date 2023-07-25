<template>
    <div class="todo">
    <input
    type="checkbox"
    @change="updateCheck()"
    v-mod="todo.completed"
    />
    <span :class="[todo.completed ? 'completed' : '', 'todoText']"> {{ name }}</span>
   <button @click="removeTodo()" class="trashcan"></button>
   <font-awesome-icon icon="trash"/>
   </div>
</template>

<script>
export default{
    props: ['todo'],
    methods: {
        updateCheck() {
            axios.put('api/todo' + this.name.id,{
                name: this.name
            })
            .then( response => {
                if( response.status == 200){
                    this.$emit('todochanged');
                }
            })
            .catch( error => {
                console.log (error);
            })
        },
        removeTod(){
            axios.delete('api/todo' +this.todo.id)
            .then( response => {
                if (response.statues == 200){
                    this.$emit('todochanged');
                }
            })
            .catch( error => {
                console.log (error);
            })
        }

    }
    
}
</script>

<style>

.completed{
    text-decoration: line-through;
    color: #811414;
}

.todoText{
    width: 100%;
    margin-left: 20px;
}

.todo{
    display: flex;
    justify-content: center;
    align-items: center;
}

.trashcan{
    background: #e6e6e6;
    border: 2px;
    color: aqua;
    outline: none;
}
</style>