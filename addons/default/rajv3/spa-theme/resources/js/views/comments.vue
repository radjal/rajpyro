<template>
    <div class="container">
		
		<add-to-stream @completed="addStatus"></add-to-stream>
        
		<div class="columns">
            <div class="column">
                <div class="message" v-for="project in projects">
                    <div class="message-header">
						<p>
							{{ project.name }} said... 
						</p>
						<p>
							{{ project.created_at | ago }}
						</p>
					</div>

                    <div class="message-body" > 
							<img :src="'/app/default/assets/' + project.path" alt="test"> 
                    </div>
					
                </div> 
            </div>
        </div>
		
    </div>
</template>

<script>
    import moment from 'moment';
	
//    import Status from '../models/Status';
	
	import AddToStream from '../components/AddToStream.vue';

    import Form from '../utilities/Form';
    
    export default {
		 
		//components: {AddToStream}, 
	
		data(){
			return {
				projects:[]
			} 	
		},
		
        created() {
            ///console.log('Component created.');
			axios.get('/comments')
			//.then(response => this.projects = response.data);
			.then(({data}) => this.projects = data);
			
        },
		
		filters: {
			ago(date) {
				return moment(date).fromNow();
			}
		},
		
		
        methods : {
                addStatus(project) { 
                } 
        }
        /*
        mounted() {
            console.log('Component mounted.')
        }
        */
    }
//console.log('runs first') // this    runs only once before the export!
</script>
