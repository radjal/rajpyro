
import './bootstrap';

import router from './routes';

  
let app = new Vue({
    el: '#app',
	 
    data() { 
        return {  
            menuOpen: false, 
            showSuccess: true, 
            showInfo: true, 
            showWarn: true, 
            showError: true, 
            menu3d:false
        }},
     
    methods: {
        // example from https://v1.vuejs.org/guide/events.html#Inline-Statement-Handler
        say: function (msg, event) {
            // now we have access to the native event
            event.preventDefault()
        }, 
        delayedScrollUnlock() { delayedScrollUnlock()  } // wrapper for global function
        // menuOpen = !menuOpen
//        menuToggle() { 
//            this.menuOpen = this.menuOpen ? false : true ;
//        }
    },
    
    router
    // or router: router
      
});
 
  
// close menu after use
router.afterEach((to, from) => {
    //console.log(` from ${from.path} > ${to.path}  `);
    app.menuOpen = false; 
    
    if(from.path=='/') { // remove menu transparency
        document.documentElement.classList.remove('is-home');
    }
    window.scrollTo(0, 0);  
  //  delayedScrollUnlock();
}); 

router.beforeEach((to, from, next) => {
    //console.log('app menu3d', app.menu3d); 
    if(!app.menu3d) {
        app.menu3d=true;
    }
    next(); 
  })