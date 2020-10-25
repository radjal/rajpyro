<template>
    <div class="container"> 
	
					 <div class="contact-form" v-html="contact"> 
					 </div>   
					 
    </div>
</template>

<script>
    //import moment from 'moment'; 

    import Form from '../../utilities/Form'; // watch directory level
 
    export default { 
		data(){
			return { 
				contact: window.loadingHtml, 
				form: new Form({ message: '', name: '', email: '', _token:'' })  
			} 	
		}, 
		
        created() {
            //console.log('contact Component created.');
			let path = '/desan/contact';		 
			let url = this.urlForm(path); // created
			//console.log(url); 
			axios.get(url.path, url.header)
			//.then(response => this.contact = response.data);
			.then(({data}) => this.load(data)) 
			.then(() => {
						this.form._action = document.querySelector('#contactform').action;
						this.form._method = document.querySelector('#contactform').method;
						this.form._token = document.querySelector('[name=_token]').value;
								document.getElementById("contactform").addEventListener("submit", (event) => {
									//	//console.log('submit event listener.'); 							 
										event.preventDefault(); 
										this.onSubmit();
								}); 
								document.getElementById("name").addEventListener("change", (event) => { 
										document.querySelector('button[type=submit]').classList.remove('is-loading') ;
										this.$data.form.name = document.getElementById("name").value;
								}); 
								document.getElementById("email").addEventListener("change", (event) => { 
										document.querySelector('button[type=submit]').classList.remove('is-loading') ;
										this.$data.form.email = document.getElementById("email").value;
								}); 
								document.getElementById("message").addEventListener("change", (event) => { 
										document.querySelector('button[type=submit]').classList.remove('is-loading') ;
										this.$data.form.message = document.getElementById("message").value;
								}); 
								 
					});	//HTML		
            /////console.log(this.contact );
            
        },		
		
        methods : { 
				urlForm(path='/') {
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
					//this.$data.form._token = document.querySelector('[name=_token]').value; 
				},
				onSubmit() {
					//console.log('onSubmit !'); 
					//console.log(this); 
 
					document.querySelector('button[type=submit]').classList.add('is-loading') ;
					 
					this.form.name 	  = this.$data.form.originalData.name = document.querySelector('#name').value;
					this.form.email   = this.$data.form.originalData.email = document.querySelector('#email').value;
					this.form.message = this.$data.form.originalData.message = document.querySelector('#message').value; 
					this.form._token  = this.$data.form.originalData._token = document.querySelector('[name=_token]').value;  
					
					this.form.originalData = this.$data.form.originalData; 

					let url = this.urlForm(this.form._action); //submit 
					//console.log(url); 
					////console.log(this); 
						this.form
							//.post(URL, HEADERS) 
							.post(url.path, url.header) 
							.then( response => {
										//console.log('completed demand, response is', response);
										//alert(response.success);
										if(response.success == true) { 
											//console.log('success');	 
											this.$data.contact = '<div class=" has-text-centered hero-body">Sent<br/><span class="icon is-medium"><i class="fa fa-2x fa-check"></i></span></div>'
											
										} else if(response.success == false) {  
												let removeMsgs = 'while(this.parentNode.parentNode.lastChild){this.parentNode.parentNode.removeChild(this.parentNode.parentNode.lastChild);}';							
												let msgBox = document.createElement('div');														
												msgBox.classList.add('is-danger', 'notification') ;	 
												msgBox.innerHTML = `<a class="delete" onclick="${removeMsgs}"></a>`; 
												document.getElementById('messages').appendChild(msgBox); 
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
							//.then( status => this.$emit('completed', status)); 
				}
				 
        },
		
        mounted() {
            //console.log('contact mounted.');
			//return typeof(window.animSvg) !== 'function' ? false : window.animSvg() ;
			 
        } 
    }
////console.log('runs first') // this    runs only once before the export!
</script>
