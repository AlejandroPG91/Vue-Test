import VueRouter from 'vue-router';

let routes = [
  {
    path: '/home',
    component: require('./views/Home')
  },
  {
    path: '/publication',
    component: require('./views/Home2')
  },
  {
    path: '/chat',
    component: require('./views/Chat')
  },
  {
    path: '/login',
    component: require('./auth/Login')
  },
  {
    path: '/register',
    component: require('./auth/Register')
  },
  {
    path: '/imagen',
    component: require('./views/imagen')
  },
];

export default new VueRouter({
  routes,

  linkActiveClass: 'is-active'
});
