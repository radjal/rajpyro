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
			if(typeof(window.galeries) !== 'undefined') {
				this.page = window.galeries;
			} else {
				let path = REQUEST_ROOT+'yogaenjoie'+this.$route.path;
				console.log('ajaxpage Component created: ' + path);
				axios.get(path) 
				.then(({data}) => this.load(data));	//HTML 
			}            
        },		
		
        methods : { 		
				load(data){ 
					window.galeries = this.page = data;  
				}, 
				 
        },
		
        mounted() {
            console.log('publications mounted.');
			
			return { 
				page: window.loadingHtml   
			} 	 
        } 
    } 
</script>
