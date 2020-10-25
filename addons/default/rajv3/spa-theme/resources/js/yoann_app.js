
import './bootstrap';

import router from './yoann_routes';

  
let app = new Vue({
    el: '#app',
	 
    data() { 
        return {  
            menuOpen: false, 
            showSuccess: true, 
            showInfo: true, 
            showWarn: true, 
            showError: true, 
            		
        }},
     
    methods: {
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
    //console.log(app);
    app.menuOpen = false;
    //app.menuOpen = !app.menuOpen; //inverts
}); 