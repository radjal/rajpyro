import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/yogaenjoie/home').default,
//        beforeEnter: (to, from, next) => {  }
    },
    {
        path: '/events',  
        component: require('./views/yogaenjoie/events').default
    },           
    {
        path: '/events/all',  
        component: require('./views/yogaenjoie/events').default
    },           
    {
        path: '/events/category/*:id',  
        name:'category',
        component: require('./views/yogaenjoie/events').default
    },    
    {
        path: '/events/*:id',  
        component: require('./views/yogaenjoie/event').default
    },        
    {
        path: '/contact', //contact is not cached
        component: require('./views/yogaenjoie/contact').default
    },   
    {
        path: '*:id',
        component: require('./views/yogaenjoie/ajaxpage').default //caches pages
    }, 
      
//    {
//        path: '/:id',
//        component: require('./views/yogaenjoie/ajaxpage').default
//    }, 
      
//   {
//       path: '/publication:id',
//       component: require('./views/yogaenjoie/ajaxpage').default
//   }, 
//    {
//        path: '/galeries',
//        component: require('./views/yogaenjoie/galeries').default
//    }, 
//    
//    {
//        path: '/publications',
//        component: require('./views/yogaenjoie/publications').default
//    }, 
//    
//   {
//       path: '*',
//       component: require('./views/yogaenjoie/ajaxpage').default
//   }, 
];


export default new VueRouter({
    routes,
    linkActiveClass: 'is-active is-primary' //custom link class, 
}); 