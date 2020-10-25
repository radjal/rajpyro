<template>
    <div class="container"> 
	 
					 <div class="publications" v-html="publications"> 
					 </div>   
					 
    </div>
</template>

<script> 
 
    export default { 
		data(){
			return { 
				publications: window.loadingHtml    
			} 	
		}, 
		
        created() {
			console.log('publications created ');
			/* caching data */
			if(typeof(window.publications) !== 'undefined') {
				this.publications = window.publications;
			} else {
				let path = REQUEST_ROOT+'yogaenjoie'+this.$route.path;
				console.log(path);
				axios.get(path) 
				.then(({data}) =>  window.publications = this.publications = data);	//HTML  
			}
        },		
		
        methods : { 		 
				 
        },
		
        mounted() {
            console.log('publications mounted.');
			
			return { 
				publications: window.loadingHtml   
			} 	 
        } 
    } 
</script>
