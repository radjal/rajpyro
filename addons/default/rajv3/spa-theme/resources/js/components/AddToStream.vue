<template> 
	<div class="message">
		<div class="message-header">
			Push to the stream
		</div>
		<div class="message-body">
		
			<form @submit.prevent="onSubmit" @keydown="form.errors.clear()">
			
				<p class="control">
				
					<textarea 
						class="textarea" 
						placeholder="Update your status" 
						v-model="form.body">
					</textarea>
					
					<span class="help is-danger" 
						v-if="form.errors.has('body')" 
						v-text="form.errors.get('body')">errors</span>
					
				</p>
					
				<p class="control">
				
					<button class="button is-primary" :disabled="form.errors.any()">Submit</button>
					
				</p> 
				
			</form>
		
		</div>
				
	</div>
</template>

<script>
    export default {
		
		data() {
			return {
				form: new Form({ body: ''  })
			};
		},
	
		methods: {
			onSubmit() {
				//console.log('SubmittedToStream!');
				//console.log(this);

				this.form
					.post('/plist')
					.then( status => this.$emit('completed', status));
					//.then( status => alert('Done'));
			}
		},
        mounted() {
            console.log('AddToStream');
			//console.log(this);
        }
    }
</script>
