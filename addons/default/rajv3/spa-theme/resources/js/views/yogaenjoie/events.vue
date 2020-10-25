<template>
    <div class="events">  

			<div class="container mt-5">
				<ul class="buttons categories" v-if="categories.length != 0"> 
					<li class=""  v-for="cat in categories" :key="cat.id">   
						<a :href="'#/events/category/' + cat.id" class="">
							<strong v-if="activeCategory == cat.id">{{ cat.name }} </strong>
							<span v-else>{{ cat.name }}</span>
						</a>
					</li>  
				</ul> 
			</div>

			<div v-html="page" v-if="events.length == 0"></div>				
			<div v-else class="hero"> 

						<div class="event container hero-body" v-for="event in events" :key="event.id"> 

							<div class="">
							
									<time datetime="event.date" class="date-as-calendar inline-flex size1_75x"  >
										<span class="weekday">{{event.weekday}}</span>
										<span class="day">{{event.day}}</span>
										<span class="month">{{event.month}}</span>
										<span class="year">{{event.year}}</span>
									</time>  
									
										<div> 
											<a class="title" :href="'#/events/event/' + event.id">{{ event.name }}</a>
										</div> 

										<div class="subtitle"> 
											Le {{ event.dateFr }}  {{ event.dateHumanized }}
										</div> 
							</div>

							<div class="columns"> 
								<div class="column" v-html="event.description"></div>

								<div class="column" v-if="event.address">
										<p v-text="event.address"></p>   
								</div>
							</div>
							 

						</div>    
				
			</div>     

			<div style="clear: both;"></div>

		<!-- contact form -->
		<contact-form url="/yogaenjoie/contact"></contact-form> 

    </div>
</template>

<script> 
	import ContactForm from '../../components/ContactForm.vue' ;// watch directory level
	// import moment from 'moment'; //library is too big
	/*
	moment.locale('fr', {
				months : 'janvier_février_mars_avril_mai_juin_juillet_août_septembre_octobre_novembre_décembre'.split('_'),
				monthsShort : 'janv._févr._mars_avr._mai_juin_juil._août_sept._oct._nov._déc.'.split('_'),
				monthsParseExact : true,
				weekdays : 'dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi'.split('_'),
				weekdaysShort : 'dim._lun._mar._mer._jeu._ven._sam.'.split('_'),
				weekdaysMin : 'Di_Lu_Ma_Me_Je_Ve_Sa'.split('_'),
				weekdaysParseExact : true,
				longDateFormat : {
					LT : 'HH:mm',
					LTS : 'HH:mm:ss',
					L : 'DD/MM/YYYY',
					LL : 'D MMMM YYYY',
					LLL : 'D MMMM YYYY HH:mm',
					LLLL : 'dddd D MMMM YYYY HH:mm'
				},
				calendar : {
					sameDay : '[Aujourd’hui à] LT',
					nextDay : '[Demain à] LT',
					nextWeek : 'dddd [à] LT',
					lastDay : '[Hier à] LT',
					lastWeek : 'dddd [dernier à] LT',
					sameElse : 'L'
				},
				relativeTime : {
					future : 'dans %s',
					past : 'il y a %s',
					s : 'quelques secondes',
					m : 'une minute',
					mm : '%d minutes',
					h : 'une heure',
					hh : '%d heures',
					d : 'un jour',
					dd : '%d jours',
					M : 'un mois',
					MM : '%d mois',
					y : 'un an',
					yy : '%d ans'
				},
				dayOfMonthOrdinalParse : /\d{1,2}(er|e)/,
				ordinal : function (number) {
					return number + (number === 1 ? 'er' : 'e');
				},
				meridiemParse : /PD|MD/,
				isPM : function (input) {
					return input.charAt(0) === 'M';
				},
				// In case the meridiem units are not separated around 12, then implement
				// this function (look at locale/id.js for an example).
				// meridiemHour : function (hour, meridiem) {
				//     return  0-23 hour, given meridiem token and hour 1-12  ;
				// },
				meridiem : function (hours, minutes, isLower) {
					return hours < 12 ? 'PD' : 'MD';
				},
				week : {
					dow : 1, // Monday is the first day of the week.
					doy : 4  // Used to determine first week of the year.
				}
			});
		*/
	
	export default { 
		components : {
			'contact-form': ContactForm
		},
		data(){
			return {
				page: window.loadingHtml,
				events: [],
				categories: [],
				activeCategory: null,
				noRecordsTxt:`<div class="hero-body has-text-centered subtitle">
								<p>Pas d'enregistrements</p> 
							</div>`
			} 
		},   
		created() {   
            //console.log('events created ' );
			/* caching data */
			var varslug = this.$route.path.replace(/[/|-]/g, "") ; 

			//categories
			window.categoriesCache = typeof(window.categoriesCache) == 'undefined' ? {} : window.categoriesCache ; //make if needed
			if(typeof(window.categoriesCache) !== 'undefined') {
				this.categories = window.categoriesCache;
			}

			this.activeCategory = this.$route.name == 'category' ? this.activeCategory = this.$route.params.id : null;

			//events
			window.eventsCache = typeof(window.eventsCache) == 'undefined' ? {} : window.eventsCache ; //make if needed
			if(typeof(window.eventsCache[varslug]) !== 'undefined') {
				if( window.eventsCache[varslug].length ==0) {
					this.events =[];
					this.page= this.noRecordsTxt; 
				} else { 
					this.events = window.eventsCache[varslug];
				}
				return ;
			} 

			  
			//if( this.events.length == 0 ) {			
				let path = this.$route.path ;		 
				axios.get(REQUEST_ROOT+path) 		 
				//axios.get('/events') 
				.then(({data}) => {
					//window.eventsCache = this.events = data.events;
					//window.categoriesCache = this.categories = data.categories;
					window.categoriesCache = this.categories = data.categories;
					window.eventsCache[varslug] = this.events = data.events;
					this.page = data.events.length == 0 ? this.noRecordsTxt : null;
					}) 
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
						let msg = typeof(error.response ) == 'undefined' ? '' : error.response.status;
						this.page = `
						<section class="hero is-large"> 
							<div class="hero-body has-text-centered title">
								<p>ERREUR<br>${msg}</p> 
							</div>
						</section>`;  
					});
				
			//}  
		}, 		
		
       //methods : { 		
				//load(data, varslug){ 
				//		window.eventsCache[varslug] = data ;
				//		this.page = data;   
				//},   
       //},
		
		//filters: {
			// 	{{ event.date | ago }}
		//	ago(date) {
		//		return moment(date).fromNow();
		//	}
		//},

		//updated() { 
		//},
		//
        mounted() {   
			console.log(this.$route.path);
        } 
    }
////console.log('runs first') // this    runs only once before the export!
</script>

<style scoped>

	time.date-as-calendar {
		float: left;
		margin-right: 20px;
		margin-bottom: 15px;
	}
	.event .columns {
		/* width: 100%; */
	}
	ul.buttons.categories {
		justify-content: space-evenly;
	}
</style>