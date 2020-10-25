<template>
    <div class="ajaxpage" v-html="page">  
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
			//console.log('varslug '+ varslug); 
			window.ajaxCache = typeof(window.ajaxCache) == 'undefined' ? {} : window.ajaxCache ;
			if(typeof(window.ajaxCache[varslug]) !== 'undefined') {
				this.page = window.ajaxCache[varslug];
				return ;
			} else {
				 window.ajaxCache[varslug] ;
			}
			
			//window.ajaxCache.
			let path = '/desan'+ this.$route.path ;
            //console.log('ajaxpage Component created: ' + path);
            //console.log(this.$route);
			axios.get(path)  
			.catch(({error}) => {
					//console.log('error fetching ressource ');   
					this.page = '<h1 style="height:1vh;margin:auto;text-align: center;">404</h1>';  
				})
				.then( ({data}) => this.load(data, varslug) ); //HTML	 
				//.then(response => this.contact = response.data);  
        },		
		
        methods : { 		
				load(data, varslug){
					//console.log('loaded '+varslug);   
						window.ajaxCache[varslug] = data ;
						this.page = data;  
						
				},   
				animSwapSvg() {
					return typeof(window.animSvg) !== 'function' ? false : window.animSvg('.animated-svg') ; //svg animate & swap
				}
        },
		
        mounted() {
			//console.log('ajaxpage mounted.'); 
			//hack to trigger scroll script on cached pages
			window.scrollTo(0,1);
			window.scrollTo(0, 0); 
		},
		updated() { 
            //console.log('updated');
			// for svg anim
			this.animSwapSvg();
			inViewScrollCheck();
		}
    }
////console.log('runs first') // this    runs only once before the export!
</script>
