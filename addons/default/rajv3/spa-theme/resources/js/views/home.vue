<template>
	<div id="homepage" >  
 	   <div class="ajaxpage" v-html="page"></div>
		<!-- contact form -->
		<contact-form></contact-form> 
    </div>  
</template>

<script>

	import ContactForm from '../components/ContactForm.vue'
    export default {
		components : {
			'contact-form': ContactForm
		},
		data(){
			return { 
				page: `<div id="home-loading" style="display: grid;">${window.loadingHtml}</div>`   
			} 	
		}, 
        created() {
            //console.log('homepage created.');
			/* caching data */
			if(typeof(window.homepage) !== 'undefined') {
				this.page = window.homepage;
				delayedScrollUnlock(); 
				this.animSwapSvg() ;
				this.tilt('.selfie-vector');
			} else {
				axios.get(REQUEST_ROOT+'')  //homepage uri
				.then(({data}) => this.load(data))
				.catch((error) => { 
						let msg = typeof(error.response) == 'undefined' ? '' : error.response.status;
						this.page = `
						<section class="hero is-large"> 
							<div class="hero-body has-text-centered title">
								<p>ERROR<br>${msg}</p> 
							</div>
						</section>`; 
					});  
			}  
        },
        updated() {
        	//console.log('home updated.'); 
			this.animSwapSvg() ;
			this.tilt('.selfie-vector'); 
			this.fireRandomTextsElements();
	  	},
        mounted() {
        	//console.log('home mounted.');  
			this.animSwapSvg() ;
			window.inView = [];
			delayedScrollUnlock();  
			this.$root.menu3d=false;
			this.tilt('.selfie-vector');
			this.fireRandomTextsElements();
			//this.randomTextInEffect('#welcometxt', ' Data | Web | Design ');
			//delayedScrollUnlock(); 
			//this.animSwapSvg() ;  
        },
        methods : { 		
				load(data, varslug){
					//console.log('loaded '+varslug);   
						window.ajaxCache[varslug] = data ;
						//this.page = data;  
						window.homepage = this.page = data; 
						//delayedScrollUnlock();  
						this.animSwapSvg() ;  
						this.fireRandomTextsElements();
						//this.randomTextInEffect('#welcometxt', "  Data | Web | Design ");
						this.tilt('.selfie-vector');

				},   
				fireRandomTextsElements() {
				    typeof(window.fireRandomTextsElements) !== 'function' ? false : window.fireRandomTextsElements() ;  
				},   
				randomTextInEffect(p1,p2,p3) {
				    typeof(window.randomTextInEffect) !== 'function' ? false : window.randomTextInEffect(p1,p2,p3) ;  
				},   
				animSwapSvg() {
				    typeof(window.animSvg) !== 'function' ? false : window.animSvg() ; //svg animate & swap 
				},
				tilt(select) { 
					//console.log('VanillaTilt ',select);   
					if(typeof(window.VanillaTilt) == 'function') { 
						let element = document.querySelector(select);
						window.VanillaTilt.init(element, {
							max: 25,
							speed: 400
						});
						if(typeof(element) != 'undefined' && element != null) {
							element.addEventListener("tiltChange", function (event) { 
								//console.log('tilt coords', event.detail); 
								let color = 'rgba(0, 0, 0, 0.26)';
								let X = event.detail.tiltX;
								let Y = event.detail.tiltY;
								//invert X so effect looks more natural
								X = (X>0) ? X = '-'+X : Math.abs(X); 
								//  box-shadow attributes : left/right axis (X), up/down axis (Y), BLUR, DISTANCE
								element.style["box-shadow"]=  `${color} ${X}px ${Y}px 15px 35px`;  
							}); 
						}
					}
					
					//It also supports NodeList
					//VanillaTilt.init(document.querySelectorAll(".your-element")); 
				}
			//	delayedScrollUnlock() {window.delayedScrollUnlock()}
        },
    } 
	
</script> 

<style> 
	/* home.vue */
	div#homepage .columns, #home .hero-body {
	/*	width: 60%; */
		margin: auto;
	}
	div#home-loading {
		vertical-align:center;
		align-items: center;
		color:white;
		height: 100vh;
	}

	/* temp hide fix */
	div#homepage section.contact {
		display: none;
		background: linear-gradient(45deg, #0e69a6, #209cee);
		-webkit-animation: changebackground 10s linear infinite;
		animation: changebackground 10s linear infinite; 
	}

	/* menu override */
	html.is-home .navbar-menu.is-active:before {
		content: "";
		top: -42px;
		width: 100%;
		height: 100px;
		background: #363636;
		z-index: -1;
		position: fixed;
	}
	html.is-home nav.is-fixed-top.navbar {
		background: transparent;
	}
	html.is-home .navbar-brand:before {
		background:transparent;
	}
	html.is-home a.is-active.navbar-item.router-link-exact-active {
		background-color: transparent !important;
	} 
	html.is-home .page-content div  {  
		margin-top: 0;
	}

	/* homepage */

	.pages svg path {
		fill: white;
		/* stroke: white; */
	}
	.pages svg.animated path {
		fill: none;
		stroke: white;
	}
/*
	section#home .hero-body {
		display: flex;
		justify-content: center;
		align-items: center;
	} 
*/
	.selfie-vector  {
		padding-top: 2em;
		height: 50vh;
		width: 40vh;
		max-width: 100vw;
		max-height: 100vw;
		border-radius: 50%;
		display: grid;
		-webkit-box-align: center;
		align-items: center;
		box-shadow: rgba(0, 0, 0, 0.26) 0px 0px 22px 5px;
		background-color: rgb(0 0 0 / 26%);
		/* border: 3vh solid rgba(254, 237, 244, 0.24); */
	}
	.selfie-vector svg {
	/*	max-width: 277px;*/
	/*	max-height: 324px; */
		width: 50%;
		height: 50%;
		margin: 0;
		padding: 0;
	} 
	.selfie-vector .inner { 
		padding: 20%;
		/* -webkit-box-shadow: 0px 0px 22px 5px rgba(0,0,0,0.36); */
		/* box-shadow: 0px 0px 22px 5px rgba(0,0,0,0.36); */  
	}

	.center-title {
		height: 15vh;
		align-items: center;
		display: grid;
		text-transform: uppercase;
	}
	.center-title p span#welcometxt {  
		font-weight: normal;
	}
	.center-title p.subtitle {  
		font-weight: bold; 
	} 

	.home-bottom {  
		margin-bottom: 3em;
		align-items: center;
		display: grid;
		/*
		min-height: 35vh;
		height: 50vh;
		display: grid;
		column-gap: 10px;
		align-items: center;
		grid-template-columns: 50px 1fr 50px; 
		-webkit-box-align: center;  
		row-gap: 15px;   */
	}
	.home-bottom svg {
		max-width: 20vw;
	} 
	.home-bottom svg path {
		/*
		fill: rgb(0 185 255 / 70%);
		fill: linear-gradient(#eee, #00b9ff);
		-webkit-text-fill-color: transparent;
		-webkit-background-clip: text; 
		fill: red;  
		*/
	}
	.pages p.subtitle { 
		padding-bottom: 1em;
		text-transform: uppercase;
		white-space: nowrap;
		font-size: 1rem;
	} 

	.pages {
		margin: auto;
		max-width: 60vh;
		width: 80%;
		height: 100%;
		align-items: center;
		/* align-items: center;  
		justify-content: center; 
		grid-template-rows: 1fr;  
		display: grid;
		grid-template-columns: 1fr 1fr 1fr; 
		column-gap: 10px;
		row-gap: 15px; */
}

	
/* responsive overrides */
@media screen and (min-width: 320px) { 	/* wider than 320px */ 
	.pages { 
		margin-top: 1em;
		display: grid;
		grid-template-columns: 20px 1fr 1fr 1fr 20px;
		column-gap: 10px;  
	}
	.center-title p.subtitle { 
		line-height: 2em;
		font-size: 1.2em; 
	}
}
@media screen and (min-width: 768px) { 	/* wider than 768px */ 
	.center-title p.subtitle {
		font-size: 1.80rem;
	}
}
@media screen and (min-width: 1024px) { 	/* wider than 1024px */ 
	.center-title p.subtitle {
		font-size: 2.05rem; 
	}
}

/* title bar 
	.container.has-text-centered p {
		font-size: 5vw;
		margin: 8vh 0;
		white-space: nowrap; 
		line-height: 2em; 
		color: rgba(254, 237, 244, 0.5)!important; 
 	   text-transform: uppercase;
	}
 */
  
	section#home, #home-loading { 
		background: linear-gradient(45deg, #0e69a6, #209cee); 
		background-image: url(https://cdn.hipwallpaper.com/i/37/19/sma5Bj.png);
    	/*background-image: url(https://ak.picdn.net/shutterstock/videos/26726548/thumb/1.jpg);*/
    	background-size: cover;
		animation: changebackground 10s linear infinite;
		/* filter: hue-rotate(60deg); */ 
    	/* filter: hue-rotate(60deg) brightness(70%) opacity(1); */
    	/* filter: hue-rotate(60deg) brightness(76%) saturate(0.5); */
		min-height: 100vh;  
	}
	@keyframes changebackground  {
		from {
			filter: hue-rotate(0deg) hue-rotate(60deg) brightness(76%) saturate(0.5);
			/* filter: hue-rotate(0deg) brightness(80%);  */
		}
		to {
			filter: hue-rotate(360deg) hue-rotate(60deg) brightness(76%) saturate(0.5);
			/* filter: hue-rotate(360deg) brightness(80%);    */    
		}
	} 
	/* homepage end */
</style>

