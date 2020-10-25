import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/desan/home').default, 
    }, 
    {
        path: '/contact', //contact is not cached
        component: require('./views/desan/contact').default
    }, 
   {
       path: '*:id',
       component: require('./views/desan/ajaxpage').default //caches pages
   } 
];


export default new VueRouter({
    routes,
    linkActiveClass: 'is-active is-primary' //custom link class, 
}); 