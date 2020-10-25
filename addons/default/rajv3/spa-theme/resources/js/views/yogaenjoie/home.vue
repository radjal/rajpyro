<template>  
	<div> 
		<div class="home-page" v-html="page"> 
		</div>  
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
				page: window.loadingHtml,   
			} 	
		}, 
        created() {
            //console.log('homepage created.');
			/* caching data */
			if(typeof(window.homepage) !== 'undefined') {
				this.page = window.homepage;
			} else {
				axios.get(REQUEST_ROOT+'/yogaenjoie/homepage') 
				.then(({data}) => this.load(data))
				.catch((error) => {
						//console.log('events error fetching ressource ');   
						//console.log(error);   
						//	/*
						//	* The request was made and the server responded with a
						//	* status code that falls out of the range of 2xx
						//	*/
						//	console.log(error.response.data);
						//	console.log(error.response.status);
						//	console.log(error.response.headers);
						let msg = typeof(error.response) == 'undefined' ? '' : error.response.status;
						this.page = `
						<section class="hero is-large"> 
							<div class="hero-body has-text-centered title">
								<p>ERREUR<br>${msg}</p> 
							</div>
						</section>`; 
					});  
			} 
        },
        mounted() {
            //console.log('home yogaenjoie mounted.'); 
			window.inView = []; 
			//return typeof(window.animSvg) !== 'function' ? false : window.animSvg('#home') ; 
        },
		updated() {
            console.log('updated');
			//if(document.getElementsByClassName("mySlides")) showSlides(1);
			if (typeof(window.showSlides) === 'function')  showSlides(1) ; 
			return typeof(window.animSvg) !== 'function' ? false : window.animSvg('#home') ;  	
		},
		beforedDestroy() {
            console.log('beforedDestroy'); 
		},
        methods : {
                //addStatus(project) { 
               // } 		
				load(data){
					//console.log('load data');
					////console.log(this);
					//this.page = data;  
					window.homepage = this.page = data; 
					//if(document.getElementsByClassName("mySlides")) showSlides(1);
					//return typeof(window.animSvg) !== 'function' ? false : window.animSvg('#home') ; 
				}
			}    
}
</script>
