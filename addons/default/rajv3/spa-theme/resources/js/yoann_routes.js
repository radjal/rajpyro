import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/yoann/home').default,
//        beforeEnter: (to, from, next) => {
//            
//        }
    }, 
    {
        path: '/contact', //contact is not cached
        component: require('./views/yoann/contact').default
    }, 
   {
       path: '*:id',
       component: require('./views/yoann/ajaxpage').default //caches pages
   } 
];


export default new VueRouter({
    routes,
    linkActiveClass: 'is-active is-primary' //custom link class, 
}); 