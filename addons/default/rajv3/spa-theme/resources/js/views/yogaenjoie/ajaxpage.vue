<template>
    <div class="">  

		<div class="page-content container" v-html="page"></div>    

		<!-- contact form -->
		<contact-form url="/yogaenjoie/contact"></contact-form> 
		
    </div>
</template>

<script>
	import ContactForm from '../../components/ContactForm.vue' ;// watch directory level
    export default {
		components : {
			'contact-form': ContactForm
		},
		data(){
			return { 
				page: window.loadingHtml   
			} 	
		},  
        created() { 
			/* caching data */
			let varslug = this.$route.path.replace(/[/|-]/g, "") ;
			//console.log('varslug '+ varslug); 
			window.ajaxCache = typeof(window.ajaxCache) == 'undefined' ? {} : window.ajaxCache ;
			if(typeof(window.ajaxCache[varslug]) !== 'undefined') {
				this.page = window.ajaxCache[varslug];
				return ;
			} else {
				 window.ajaxCache[varslug] ;
			}
			
			//window.ajaxCache.
			let path = '/yogaenjoie' + this.$route.path ;
            //console.log('ajaxpage Component created: ' + path);
            //console.log(this.$route);
			axios.get(REQUEST_ROOT+path) 
			.then( ({data}) => this.load(data, varslug) ) 
			.catch((error) => {
					//console.log('ajaxpage error fetching ressource ');   
					//console.log(error);   
					//	/*
					//	* The request was made and the server responded with a
					//	* status code that falls out of the range of 2xx
					//	*/
					//	console.log(error.response.data);
					//	console.log(error.response.status);
					//	console.log(error.response.headers);
					this.page = `
					<section class="hero is-large"> 
						<div class="hero-body has-text-centered title">
							<p>ERREUR<br>${error.response.status}</p> 
						</div>
					</section>`;  
				}); //HTML	 
				//.then(response => this.contact = response.data);  
        },		
		
        methods : { 		
				load(data, varslug){
					
					//console.log(data);
					//console.log('loaded '+varslug);   
						window.ajaxCache[varslug] = data ;
						this.page = data;  
						
				},   
        },
		
		updated() {
			if(document.getElementsByClassName("mySlides") && typeof window.showSlides !== 'undefined' ) window.showSlides(1); 
			return typeof(window.animSvg) !== 'function' ? false : window.animSvg('#home') ; 
		},
		
        mounted() {
            //console.log('ajaxpage mounted.'); 
			if(document.getElementsByClassName("mySlides") && typeof window.showSlides !== 'undefined' ) window.showSlides(1); 
			// if(document.getElementsByClassName("mySlides")) window.showSlides(1); 
			window.scrollTo(0, 0);
			
			//if(document.getElementsByClassName("mySlides")) window.showSlides(1);
			//return { 
				//page: window.loadingHtml   
			//} 	
			//for svg anim
			//return typeof(window.animSvg) !== 'function' ? false : window.animSvg() ;
			 
        } 
    }
////console.log('runs first') // this    runs only once before the export!
</script>
