<!-- 
contact component
1st loads form via ajax HTML, then send POST awaiting JSON respons for message 
-->
<template> 
	<section class="hero contact is-medium">
		<div class="hero-header"> </div>
		<div class="hero-body">
			<div class="contact-form" v-html="contact"></div>  
		</div>		
	</section>
</template>

<script>
	import Form from '../utilities/Form'; // watch directory level
	
    export default {
		props: ['url'],
		data() {
			return { 		
				contact: '',  // window.loadingHtml, 		
				form: new Form({ message: '', name: '', email: '', subject: '', phone: '', _token:'' }) 
			};
		},
	
		methods: {
			onSubmit() { 
					//console.log('onSubmit!');  
					//messages
					let msgs = document.querySelector('#messages .notification');
					if(msgs !== 'undefined' && msgs !== null ) {msgs.remove();}  
					//packing
					this.form.name 	  = this.$data.form.originalData.name = document.querySelector('#name').value;
					this.form.email   = this.$data.form.originalData.email = document.querySelector('#email').value;
					this.form.message = this.$data.form.originalData.message = document.querySelector('#message').value; 
					this.form._token  = this.$data.form.originalData._token = document.querySelector('[name=_token]').value; 
					
					//quick check
					if(!this.form.email || !this.form.message) { return; }
					document.querySelector('button[type=submit]').classList.add('is-loading') ; 
					this.form.originalData = this.$data.form.originalData;
					//console.log(this);
						
					let url = this.urlForm(this.form._action); //submit 
					console.log(url); 

						this.form
							//.post(this.form._action)
							.post(url.path, url.header) 
							//.post('/contact-bulma')
							.then( response => {
										//console.log('completed demand, response is', response);
										//alert(response.success);
										if(response.success == true) { 
											//console.log('success');	  
											//show sent notification, keep the form tag in dom to avoid generating errors
											document.getElementById('contactform').innerHTML = '<div class="sent title has-text-centered">Message envoyé<br/><br/><span class=""><i class="fa fa-3x fa-check is-outlined"></i></span></div>';
										} else if(response.success == false) {  
												let removeMsgs = 'while(this.parentNode.parentNode.lastChild){this.parentNode.parentNode.removeChild(this.parentNode.parentNode.lastChild);}';							
												let msgBox = document.createElement('div');														
												msgBox.classList.add('is-danger', 'notification') ;	 
												msgBox.innerHTML = `<a class="delete" onclick="${removeMsgs}"></a>`; 
												document.getElementById('messages').appendChild(msgBox); 
												document.querySelector('button[type=submit]').classList.remove('is-loading') ; 
												
												for (let field in response.errors) {
													this[field] = response.errors[field];//saving var
													let err = document.createElement('div'); 
														err.classList.add('is-danger', 'notification') ;
														err.innerHTML = `${this[field]}`;  //error message  
														msgBox.appendChild(err);  
												}  
										} else {
											//console.log('unknown error');	
										}
								});
			}, 
		urlForm(path='/') { // for proxy if required
				//contact component
				//console.log(path);   
				let header = null ;
				if(window.location.origin != REQUEST_ROOT)  
				{
					//correct if needed
					path = path.startsWith(REQUEST_ROOT) ? path : REQUEST_ROOT+path ;
					path = '/get.php?url='+path;
					// AUTH_KEY is for get.php proxy script
					header = {headers:{'AUTH_KEY': 'Bj5pnZEX6DkcG6Nz6AjDUT1bvcGRVhRaXDuKDX9CjsEs2'}};
				}
				return {path:path, header:header}; 
			}, 
			load(data) {
				////console.log(this);
				this.contact = data;  
			},
			attachSubmit(){
				//console.log('attachSubmit');
				// do check on form to avoid attaching error notifications	
				if(typeof(document.getElementById('contactform')) !== 'undefined') {
						this.form._action = document.querySelector('#contactform').action;
						this.form._method = document.querySelector('#contactform').method;
						this.form._token = document.querySelector('[name=_token]').value;
							document.getElementById("contactform").addEventListener("submit", (event) => { 
									event.preventDefault();
									this.onSubmit();
							});  
				} 
			}  
		}, 
		updated() {  
			//console.log('contact Component updated.');
			if(typeof(window.ajaxCache.contactFormComponent) !== 'undefined') { 
				/* 2.2 if page is cached then we attach submit event after rendering content  */
					this.attachSubmit();
			}
		},
        mounted() {  
			//console.log('contact Component mounted.'); 
			if(typeof(window.ajaxCache.contactFormComponent) !== 'undefined') { 
				/* 2.1 if page is cached then we first render content  */
				this.contact = window.ajaxCache.contactFormComponent;
			} 
        },  
        created() {  
			//console.log('contact Component created.');  
			/* caching data */
			window.ajaxCache = typeof(window.ajaxCache) == 'undefined' ? {} : window.ajaxCache ;
			if(typeof(window.ajaxCache.contactFormComponent) === 'undefined') { 
					/* 1.0  if page is cached then we proceed otherwise for attaching submit event  */ 
					let path = !this.url ? '/contact-bulma' :  this.url ;	 
					let url = this.urlForm(path);
					axios.get(url.path, url.header)  
					.then(({data}) => this.load(data)) 
					.then(() => { 
								window.ajaxCache.contactFormComponent = this.contact;
								this.attachSubmit(); 
							}); 
			}  
        },	
    }
</script>
