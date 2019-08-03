<template>
    <div>
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Create Expense</h2>
				</div>
				<div class="card-body">
					<form @submit.prevent="createExpense">
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
							<input v-model="form.description" type="text" class="form-control" name="input" placeholder="Enter  Expense name" >
							 <small class="text-danger" v-if="errors.description">{{ errors.description[0] }}</small>
							 
								</div>
                                <div class="form-group">
							<input v-model="form.amount" type="text" class="form-control" name="input" placeholder="Enter  Expense amount" >
							 <small class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</small>
							 
								</div>
							
                              
                            
							
							<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</template>
<script>
export default {
    created() {
			if (!User.loggedIn()) {
				this.$router.push({ name : '/'})
			}
		},
    data() {
        return {
            form:{
                description:'',
                amount:''

            },
            errors:{},
           
            
        }
    },
   
    methods: {
        createExpense(){
            axios.post('/api/expense/',this.form)
           .then(
             //  this.$router.push({ name : 'category'}),
				 Toast.fire({
					type: 'success',
					title: 'Expense Created Successfully'
                })
				
				)
            .catch(error => this.errors = error.response.data.errors,
               
                // Toast.fire({
				// 	type: 'error',
				// 	title: 'Something Wrong'
				// }),
                
                )
        },
        
    },


}
</script>
