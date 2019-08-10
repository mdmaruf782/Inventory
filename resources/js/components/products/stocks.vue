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
                                   

									<th>Product Code</th>
                                    <th>Product Status</th>
									<th>Quantity </th>
									
									


								</tr>
							</thead>
							<tbody>
								<tr v-for="product in GetAllProducts" :key="product.id">
                                    <td><router-link :to="{name: 'edit_stocks', params:{id: product.id}}" class="btn btn-success btn-sm">Edit</router-link></td>

                                    <td><img :src="product.image" style="height:50px"></td>
                                    <td>{{product.product_name}}</td>
                                    

                                    <td>{{product.product_code}}</td>
                                     <td v-if="product.quantity == 0"><button class="btn btn-danger btn-sm">Stock Unavailable</button></td>
                                   
                                     <td v-else-if="product.quantity < 10"><button class="btn btn-warning btn-sm">Stock Low</button></td>
                                     <td v-else=""><button class="btn btn-success btn-sm">Stock Available</button></td>

                                    
                                    <td>{{product.quantity}}</td>
                                   
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


		
		},


	}
</script>
<style lang="" >
	
</style>
