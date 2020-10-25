<template>
    <div class="container"> 
	 
					 <div class="page-content" v-html="page"> 
					 </div>   
					 
    </div>
</template>

<script>  
 
    export default { 
		data(){
			return { 
				page: window.loadingHtml   
			} 	
		}, 
        created() { 
			/* caching data */
			let varslug = this.$route.path.replace(/[/|-]/g, "") ;
			console.log('varslug '+ varslug); 
			window.ajaxCache = typeof(window.ajaxCache) == 'undefined' ? {} : window.ajaxCache ;
			if(typeof(window.ajaxCache[varslug]) !== 'undefined') {
				this.page = window.ajaxCache[varslug];
				return ;
			} else {
				 window.ajaxCache[varslug] ;
			}
			
			//window.ajaxCache.
			let path = '/yogaenjoie'+ this.$route.path ;
            console.log('ajaxpage Component created: ' + path);
            console.log(this.$route);
			axios.get(REQUEST_ROOT+path)  
			.catch(({error}) => {
					console.log('error fetching ressource ');   
					this.page = '<h1 style="text-align: center;">404</h1>';  
				})
				.then( ({data}) => this.load(data, varslug) ); //HTML	 
				//.then(response => this.contact = response.data);  
        },		
		
        methods : { 		
				load(data, varslug){
					console.log('loaded '+varslug);   
						window.ajaxCache[varslug] = data ;
						this.page = data;  
						
				},   
        },
		
        mounted() {
            console.log('ajaxpage mounted.'); 
			window.scrollTo(0, 0);
			//return { 
				//page: window.loadingHtml   
			//} 	
			//for svg anim
			//return typeof(window.animSvg) !== 'function' ? false : window.animSvg() ;
			 
        } 
    }
//console.log('runs first') // this    runs only once before the export!
</script>
