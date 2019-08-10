<template>
	<div>
		<div class="row">
			<div class="col-4">
				<div class="card shadow">
					<div class="card-header ">
						<h2 class="mb-0 ">Employee card</h2>
					</div>
					<div class="card-body text-center">
						
						

					</div>
				</div>
			</div>



			<div class="col-8">
				<div class="row">
					<div class="col-12">
						<div class="card shadow">
							<div class="card-header">
								<h2 class="mb-0">Navigation Tabs</h2>
							</div>
							<div class="card-body">
								<div class="nav-wrapper">
									<ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
										<li class="nav-item">
											<a class="nav-link mb-sm-3 mb-md-0 active border" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fe fe-home mr-2"></i>Home</a>
										</li>
										<li class="nav-item">
											<a class="nav-link mb-sm-3 mb-md-0 border" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fe fe-user mr-2"></i>Profile</a>
										</li>
										<li class="nav-item">
											<a class="nav-link mb-sm-3 mb-md-0 border" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fe fe-message-circle mr-2"></i>Messages</a>
										</li>
									</ul>
								</div>
								<div class="card shadow mb-0">
									<div class="card-body ">
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
												<input type="text" class="form-control col-12" placeholder="Search here.....">
												<div class="row">
                                                    
                                                     <div  v-for="product in GetAllProducts" :key="product.id">
												<div class="col-12" style="margin-top:10px;"  >
													<div class="card shadow" >
														<img :src="'/'+ product.image" style="height:150px"/>
														<div class="card-body text-center text-justify" style="max-height:90px">
															<a href="#"><h2 class="mb-0">{{product.product_name}}</h2></a>
															
															<div class="price h2 mb-0">
																{{product.saleing_price}}
															</div>
														</div>
														
														<div class="card-footer text-center">
															
															<a href="cart.html" class="btn btn-icon btn-sm  btn-primary mt-1 mb-1  text-sm text-white" >
																<i class="fe fe-shopping-cart"></i>
																Add to Cart
															</a>
														</div>
													</div>
												</div>
                                                </div>



                                                </div>
											</div>
											<div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
												<p class="description mb-0">Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
											</div>
											<div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
												<p class="description mb-0">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
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