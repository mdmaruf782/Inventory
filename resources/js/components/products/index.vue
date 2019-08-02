<template>
	<div>
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">All Products</h2>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<input type="text" class="form-control" placeholder="search here" v-model="searchTerm">
						
						<table  class="table table-striped table-bordered text-nowrap" >
							<thead>
								<tr>
									<th>Action</th>

									<th>photo</th>
									<th>name</th>
                                    <th>Buying Price</th>
									<th>Saleing Price</th>

									<th>Product Code</th>
									<th>Root</th>
									<th>Quantity </th>
									<th>Buying Date </th>

									<th>Supplier Name</th>
									<th>Category</th>


								</tr>
							</thead>
							<tbody>
								<tr v-for="product in GetAllProducts" :key="product.id">
                                    <td><router-link :to="{name: 'edit', params:{id: product.id}}" class="btn btn-success btn-sm">Edit</router-link><button class="btn btn-danger btn-sm" @click="DeleteProduct(product.id)">Edlete</button></td>

                                    <td><img :src="product.image" style="height:50px"></td>
                                    <td>{{product.product_name}}</td>
                                    <td>{{product.buying_price}}</td>
                                    <td>{{product.saleing_price}}</td>

                                    <td>{{product.product_code}}</td>
                                    <td>{{product.root}}</td>
                                    <td>{{product.quantity}}</td>
                                    <td>{{product.buying_date}}</td>
                                    <td>{{product.supplier_name}}</td>
                                    <td>{{product.category_name}}</td>
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
				products:[],
				searchTerm:'',
			}
		},
		computed: {
			GetAllProducts(){
				return this.products.filter(product => {
					
					return product.product_code.match(this.searchTerm)
					

					

				})
			}
		},
		created() {
			this.AllProducts();
		},

		methods: {
			AllProducts(){
				axios.get('/api/product/')
				.then(
					({data}) => (this.products = data)
					)
				.catch()
			},


			DeleteProduct(id){
                console.log(id);
                
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
						axios.delete('/api/product/'+id)
						.then(()=>{
							this.products =  this.products.filter(product => {
								return product.id != id
							})
						})
						.catch(()=>{
							Toast.fire({
								type: 'error',
								title: 'Product Not Deleted'
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
