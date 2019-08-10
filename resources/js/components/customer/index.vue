<template>
	<div>
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">All Customers</h2>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<input type="text" class="form-control" placeholder="search here" v-model="searchTerm">
						<table  class="table table-striped table-bordered text-nowrap" >
							<thead>
								<tr>
									<th>Name</th>
									
									<th>Email</th>
									<th>Phone</th>
									
									<th>Address</th>
									
									<th>Action</th>


								</tr>
							</thead>
							<tbody>
								
								
								
								<tr v-for="customer in filterSearch" :key="customer.id">
									<td>{{customer.name}}</td>
									<td>{{customer.email}}</td>
									<td>{{customer.phone}}</td>
									<td>{{customer.address}}</td>
									
									<td>
                                        <router-link :to="{name: 'edit_customer', params:{id: customer.id}}" class="btn btn-success btn-sm">Edit</router-link>
                                    <button @click="DeleteCustomer(customer.id)" class="btn btn-danger btn-sm">Delete</button>
                                    </td>

								</tr>
								
								
							</tbody>
						</table>
					</div>
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
				Customer:[],
				searchTerm:'',
			}
		},
		computed: {
			filterSearch(){
				return this.Customer.filter(customers => {
					
					return customers.email.match(this.searchTerm)
					

					

				})
			}
		},
		created() {
			this.allCustomer();
		},

		methods: {
			allCustomer(){
				axios.get('/api/customer/')
				.then(
					({data}) => (this.Customer = data)
					)
				.catch()
			},


			DeleteCustomer(id){
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!"  ,
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
					if (result.value) {
						axios.delete('/api/customer/'+id)
						.then(()=>{
							this.Customer =  this.Customer.filter(customers => {
								return customers.id != id
							})
						})
						.catch(()=>{
							Toast.fire({
								type: 'error',
								title: 'Customer Not Deleted'
							})
							this.$route.push({name: 'employees'})
						})
						Swal.fire(
							'Deleted!',
							'Your file has been deleted.',
							'success'
							)
					}
				})
			}
		},


	}
</script>
<style lang="" >
	
</style>
