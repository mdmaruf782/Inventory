<template>
	<div>
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Create Suppliers</h2>
				</div>
				<div class="card-body">
					<form @submit.prevent="addSuppliers">
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
							<input v-model="form.name" type="text" class="form-control" name="input" placeholder="Enter  Name" >
							 <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
								</div>
                                
								<div class="form-group">
							<input v-model="form.email" type="email" class="form-control" name="input" placeholder="Enter  email">
							 <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
								</div>
								<div class="form-group">
						<input v-model="form.phone" type="text" class="form-control" name="input" placeholder="Enter  phone number" >
							  <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
						<input v-model="form.address" type="text" class="form-control" name="input" placeholder="Enter  address" >
						   <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
								</div>
								
								<div class="form-group">
							<input v-model="form.shop_name" type="text" class="form-control" name="input" placeholder="Enter  Shop Name" >
							 <small class="text-danger" v-if="errors.shop_name">{{ errors.shop_name[0] }}</small>
								</div>
							</div>
							<div class="col-md-12">
								<input   type="file" class="form-control"  @change="onFileselected">
								<img :src="form.photo" alt="" style="height:50px">
								  <small class="text-danger" v-if="errors.photo">{{ errors.photo[0] }}</small>
							</div>
							<button type="submit" class="btn btn-success">Submit</button>
							
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
				
					
                    photo: '',
                    shop_name: '',
				},
				errors:{}

			}
		},

		methods: {
			onFileselected(event){
				let file = event.target.files[0]
				if (file.size > 1048770) {
					Toast.fire({
						type: 'error',
						title: 'file is too learge'
					})
					
				}
				else{
					let reader = new FileReader();
					reader.onload = event => {
						this.form.photo = event.target.result
					//console.log(event.target.result);
					
				}
				reader.readAsDataURL(file)
				
			}
			
        },
        
        
		addSuppliers(){
			axios.post('/api/supplier/',this.form)
			.then(
				Toast.fire({
					type: 'success',
					title: 'Supplier Created Successfully'
				}),
				this.$router.push({ name : 'all_supplier'})
				
				)
            .catch(error => this.errors = error.response.data.errors,
           
            
				Toast.fire({
					type: 'error',
					title: 'User not Created '
				})
				
				)
			
		}
	},
}
</script>
