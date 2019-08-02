<template>
	<div>
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Default forms</h2>
				</div>
				<div class="card-body">
					<form @submit.prevent="UpdateEmployee">
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<input v-model="form.name" type="text" class="form-control" name="input" placeholder="Enter  Name" >
								</div>
								<div class="form-group">
									<input v-model="form.email" type="email" class="form-control" name="input" placeholder="Enter  email">
								</div>
								<div class="form-group">
									<input v-model="form.salary" type="text" class="form-control" name="input" placeholder="Enter  salary" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group has-success">
									<input v-model="form.address" type="text" class="form-control" name="input" placeholder="Enter  address" >
								</div>
								<div class="form-group  has-danger">
									<input v-model="form.nid" type="text" class="form-control" name="input" placeholder="Enter  nid" >
								</div>
								<div class="form-group">
									<input v-model="form.joining_date" type="date" class="form-control" name="input" placeholder="Enter joining date" >
								</div>
							</div>
							<div class="col-md-12">
								<input   type="file" class="form-control"  @change="onFileselected">
								<img :src="form.photo" alt="" style="height:50px">
							</div>
							<button type="submit" class="btn btn-success">Update</button>
							
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
					salary: '',
					address: '',
					nid: '',
					joining_date: '',
                    photo: '',
                    newphoto: '',
				},
				errors:{}

			}
		},

        created() {
            let id = this.$route.params.id
            axios.get('/api/employees/'+id)
            .then(({data}) => (this.form = data))
            .catch(console.log('error'))
        },
		methods: {
        onFileselected(event){
        		let file=event.target.files[0];
        		if (file.size > 1048770) {
        			Notification.image_validation()
        		}else{
        			let reader = new FileReader();
        			reader.onload = event => {
        				this.form.newphoto = event.target.result
        			};
        			reader.readAsDataURL(file);
        		}
        	},
        

		UpdateEmployee(){
             let id = this.$route.params.id
			axios.patch('/api/create-employee/'+id,this.form)
			.then(
				Toast.fire({
					type: 'success',
					title: 'User Created Successfully'
				}),
				this.$router.push({ name : 'all_employee'})
				
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
