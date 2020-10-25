<template>
    <div class="event">  

		<div v-html="page" v-if="event.length == 0"></div> 
		<div v-else class="hero event">  

						<div class="container hero-body"> 

							<div class="">
							
									<time datetime="event.date" class="date-as-calendar inline-flex size1_75x" >
										<span class="weekday">{{event.weekday}}</span>
										<span class="day">{{event.day}}</span>
										<span class="month">{{event.month}}</span>
										<span class="year">{{event.year}}</span>
									</time>  
									
										<div class="title"> 
											 {{ event.name }} 
										</div> 

										<div class="subtitle"> 
											Le {{ event.dateFr }}  {{ event.dateHumanized }}
										</div> 
							</div>

							<div class="columns" style="width:100%"> 
								<div class="column" v-html="event.description"></div>

								<div class="column" v-if="event.address">
										<p v-text="event.address"></p>   
								</div>
							</div> 


							<div class="mapouter" v-if="event.address">
								<div class="gmap_canvas">
									<iframe width="735" height="451" id="gmap_canvas" 
									:src="'https://maps.google.com/maps?q=' + event.address + '&t=&z=11&ie=UTF8&iwloc=&output=embed'" 
									frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
								</div>
							</div> 

						</div>  
 
			
		</div>    
 
		<!-- contact form -->
		<contact-form url="/yogaenjoie/contact"></contact-form> 

    </div>
</template>

<script> 
	import ContactForm from '../../components/ContactForm.vue' ; // watch directory level
 //   import moment from 'moment'; // too big
    export default { 
		components : {
			'contact-form': ContactForm
		},
		data(){
			return { 
				page: window.loadingHtml,
				event:[]
			} 	
		},   
		created() {  
            //console.log('event created ' );
			/* caching data */
			let index = this.$route.params.id;
			if( typeof window.eventCache == 'undefined' ) {window.eventCache={};}
		}, 
		 		
		//filters: {
		//	ago(date) {
		//		return moment(date).fromNow();
		//	}
		//},
		
        methods : { 		
				//load(data, varslug){ 
				//		window.ajaxCache[varslug] = data ;
				//		this.page = data.event;   
				//},   
        },
		
		updated() { 
            //console.log('event updated ' );
		   
		},
		
        mounted() { 
            //console.log('event mounted ' );	
			let index = this.$route.params.id;
			if(typeof(window.eventCache[index]) !== 'undefined' ) {
				this.event = window.eventCache[index] ; 
			} else {
			//if( this.event.length == 0 ) {		
				let path = this.$route.path ;		 
				axios.get(REQUEST_ROOT+path) 
				//axios.get( this.$route.path ) 
				.then(({data}) => window.eventCache[data.event.id] = this.event = data.event	) 
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
        } 
    }
////console.log('runs first') // this    runs only once before the export!
</script>

<style scoped>
	.mapouter{position:relative;text-align:right;}
	.gmap_canvas {overflow:hidden;background:none!important;width:100%;}
	iframe#gmap_canvas {
		width: 100%;
		height: 30vh;
	}

	time.date-as-calendar {
		float: left;
		margin-right: 20px;
		margin-bottom: 15px;
	}
	.event .columns {
		/* width: 100%; */
	}
</style>