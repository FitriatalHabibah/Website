// import { createApp } from 'vue'
// import './style.css'
// import App from './App.vue'

// createApp(App).mount('#app')

//import createApp from Vue
import { createApp } from 'vue'; 

//import './style.css'

//import component App
import App from './App.vue'; 

//import config router
import router from './router' 

//create App Vue
const app = createApp(App);

//gunakan "router" di Vue dengan plugin "use"
app.use(router);

app.mount('#app');

// // Mengimpor createApp dari Vue
// import { createApp } from 'vue';

// // Mengimpor komponen utama (App.vue)
// import App from './App.vue';

// // Mengimpor konfigurasi router (pastikan file router ada)
// import router from './router';

// // Membuat aplikasi Vue dengan komponen utama
// const app = createApp(App);

// // Menggunakan router untuk aplikasi
// app.use(router);

// // Memasang aplikasi pada elemen dengan id 'app'
// app.mount('#app');
