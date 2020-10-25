<template>
    <div class=""> 
			<div class="home-page" v-html="page"> 
			</div>  
    </div> 
					<!-- <contact-form></contact-form>  -->
</template> 

<script>

	//import moment from 'moment';
	//import ContactForm from 'components/ContactForm.vue'
    export default {
/*	
		components : {
			'contact-form': ContactForm
		},
*/
		data(){
			return { 
				page: window.loadingHtml,   
			} 	
		}, 
        created() {
			//console.log('desan home created.'); 
			/* caching data */
			if(typeof(window.homepage) !== 'undefined') {
				this.page = window.homepage;
			} else {
				axios.get(REQUEST_ROOT+'/desan') //root url 
				.then(({data}) => this.load(data));
			} 
            
        },	
        mounted() {
            //console.log('home desan mounted.'); 
			inViewScrollCheck();
			window.inView = []; //scrolling
			if(document.getElementsByClassName("mySlides")) showSlides(1);
			this.animSwapSvg();
		},
		updated() {
            //console.log('updated');
			inViewScrollCheck();
			if(document.getElementsByClassName("mySlides")) showSlides(1);
			this.animSwapSvg();
		},
        methods : { 
				load(data){
					//console.log('load data'); 
					window.homepage = this.page = data; 
				},
				animSwapSvg() {
					return typeof(window.animSvg) !== 'function' ? false : window.animSvg('#home') ; //svg animate & swap
				}
			} 
    }
	
	
</script>
