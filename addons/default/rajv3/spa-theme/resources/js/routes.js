import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/home').default,
        beforeEnter: (to, from, next) => {
            //console.log(` from ${from.path} > ${to.path}  `);
            document.documentElement.classList.add('is-home'); // transparent menu
            next();
        }
    },
    
    {
        path: '/projects',
        component: require('./views/projects').default
    },
    
    {
        path: '/about',
        component: require('./views/about').default
    },
    
    {
        path: '/contact',
        component: require('./views/contact').default
    },
    {
        path: '*:id',
        component: require('./views/ajaxpage').default //caches pages
    } 
    
//    {
//        path: '/subscribe',
//        component: require('./views/subscribe').default
//    } 
];


export default new VueRouter({
    routes,
    linkActiveClass: 'is-active' //custom link class, 
}); 