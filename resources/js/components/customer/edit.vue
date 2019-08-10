<template>
	<div>
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Customer Edit</h2>
				</div>
				<div class="card-body">
					<form @submit.prevent="UpdateCustomer">
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
							<input v-model="form.name" type="text" class="form-control" name="input" placeholder="Enter  Name" >
							 <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
								</div>
							<div class="form-group">
							<input v-model="form.email" type="email" class="form-control" name="input" placeholder="Enter  Email" >
							 <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
								</div>
                                
							</div>
							<div class="col-md-6">
                                <div class="form-group">
							<input v-model="form.phone" type="text" class="form-control" name="input" placeholder="Enter  phone" >
							 <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
								</div>
								<div class="form-group">
							<input v-model="form.address" type="text" class="form-control" name="input" placeholder="Enter  address" >
							 <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
								</div>
							</div>
                            <div class="col-sm-6">	<button type="submit" class="btn btn-success">Submit</button></div>
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
					name: '',
					email: '',
					phone: '',
					
					address: '',
				
				},
				errors:{}

			}
        },
        created(){
             let id = this.$route.params.id
            axios.get('/api/customer/'+id)
            .then(({data}) => (this.form = data))
            .catch(console.log('error'))
        },

		methods: {
		
		UpdateCustomer(){
              let id = this.$route.params.id
			axios.patch('/api/customer/'+id,this.form)
			.then(
				Toast.fire({
					type: 'success',
					title: 'Customer updated Successfully'
				}),
				this.$router.push({ name : 'all_customer'})
				
				)
			.catch(error => this.errors = error.response.data.errors,
				Toast.fire({
				type: 'success',
					title: 'Customer updated Successfully'
				})
				
				)
			
        },
       
	},
}
</script>
