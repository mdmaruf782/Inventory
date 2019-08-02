<template>
	<div>
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Default forms</h2>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<input type="text" class="form-control" placeholder="search here" v-model="searchTerm">
						<table  class="table table-striped table-bordered text-nowrap" >
							<thead>
								<tr>
									<th>Name</th>
									<th>Photo</th>
									<th>Email</th>
									
									
									<th>Address</th>
									
									<th>Action</th>


								</tr>
							</thead>
							<tbody>
								
								
								
								<tr v-for="supplier in filterSearch" :key="supplier.id">
									<td>{{supplier.name}}</td>
									<td><img :src="supplier.photo" alt="" style="height:50px"></td>
									<td>{{supplier.email}}</td>
									
									<td>{{supplier.address}}</td>
									
									<td><router-link :to="{name: 'edit_supplier', params:{id: supplier.id}}" class="btn btn-success btn-sm">Edit</router-link><button @click="DeleteSupplier(supplier.id)" class="btn btn-danger btn-sm">Delete</button></td>

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
		data() {
			return {
				suppliers:[],
				searchTerm:'',
			}
		},
		computed: {
			filterSearch(){
				return this.suppliers.filter(supplier => {
					
					return supplier.shop_name.match(this.searchTerm)
					

					

				})
			}
		},
		created() {
			this.Allsuppliers();
		},

		methods: {
			Allsuppliers(){
				axios.get('/api/supplier/')
				.then(
					({data}) => (this.suppliers = data)
					)
				.catch()
			},


			DeleteSupplier(id){
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
						axios.delete('/api/supplier/'+id)
						.then(()=>{
							this.suppliers =  this.suppliers.filter(supplier => {
								return supplier.id != id
							})
						})
						.catch(()=>{
							Toast.fire({
								type: 'error',
								title: 'supplier Not Deleted'
							})
							this.$route.push({name: 'all_supplier'})
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
