<template> 
		<div>
				<div class="has-text-centered is-ancestor">
					 
							<div class="tile is-4" style="float:left;"
													v-for="project in projects">
										 <div>
											{{ project.name }}
											<br/>
											<img :src="'/app/default/assets/' + project.path" alt="test">  
										 </div>
							</div>    
					
				</div>
				
			<div style="clear: both;">
			</div>
			
		</div>
</template>

<script>
  //  import moment from 'moment';
	
//    import Status from '../models/Status';
	
	//import AddToStream from '../components/AddToStream.vue';

    //import Form from '../utilities/Form';
    
    export default {
		 
		//components: {AddToStream}, 
	
		data(){
			return {
				projects:[]
			}
			
		},
		
        created() { 
			axios.get('/plist') 
			.then(({data}) => this.projects = data);
			
        },
		
        /*
		filters: {
			ago(date) {
				return moment(date).fromNow();
			}
		},
		
		
        methods : {
                addStatus(project) { 
                } 
        }
        mounted() {
            console.log('Component mounted.')
        }
        */
    }
//console.log('runs first') // this    runs only once before the export!
</script>
