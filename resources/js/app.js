
import {createApp} from  'vue'
import App from './vue/app.vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faPlusSquare, faTrash } from '@fortawesome/free-solid-svg-icons';

library.add(faPlusSquare, faTrash);


Vue.component('font-awesome-icon', FontAwesomeIcon)
const app = createApp(App);
    

app.mount('#app');

dd(), console.log()