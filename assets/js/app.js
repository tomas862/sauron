import Vue from 'vue';
import VueRouter from 'vue-router';

import AppComponent from './components/app/index.vue';

Vue.use(VueRouter);

Vue.component('app', AppComponent);

const routes = [{
  path: '/',
  component: AppComponent,
}];

const router = new VueRouter({
  mode: 'history',
  routes,
});

const app = new Vue({
  router,
}).$mount('#app');

export default app;
