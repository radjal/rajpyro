
import './bootstrap';

import router from './desan_routes';

  
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
    },
    
    router     // or router: router
      
});
 
  
// close menu after use
router.afterEach((to, from) => {
    //console.log(app);
    app.menuOpen = false;
    if( window.gaProperty) { //tracking
        gtag('config', window.gaProperty, {'page_path': to}); 
    }
    //app.menuOpen = !app.menuOpen; //inverts
}); 