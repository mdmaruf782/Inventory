<template>
	<div >
		<div class="row">
			<div class="col-5">
				<div class="card shadow">
					<div class="card-header ">
						<h2 class="mb-0 ">New Customer <button class="btn btn-success btn-sm" style="float:right" data-toggle="modal" data-target="#customer">Add New</button></h2>
					</div>
					<div class="card-body text-center">
						<div class="table-responsive ">
							<table class="table table-bordered ">
								<thead>
									<tr>
										<th>DLT</th>
										<th>name</th>
										<th>unit</th>
										<th>Qty</th>
										<th>total</th>
										
									</tr>
								</thead>
								<tbody>
									<tr  v-for="p_id in productID" :key="p_id.product_id" >
										<td  ><span @click="RemoveSessionData(p_id)" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fas fa-trash"></i></span></td>
										<td >name</td>
										<td >211</td>
										<td >11</td>
										<td >231132</td>
									</tr>
									
								</tbody>
							</table>
						</div>
						<form class="text-left  product-cart mt-4 mb-0">
							<div class="row">
								<div class="col-6"><input class="productcart form-control" type="text" placeholder="Coupon Code"></div>
								<div class="col-6"><a href="#" class="btn btn-primary btn-md">Apply</a></div>
							</div>
						</form>
						<br>
						<div class="table-responsive ">
							<table class="table table-bordered ">
								<tr>
									<th class="text-left">Total Quantity :</th>
									<th class="text-right">11</th>
									


								</tr>
								<tr>
									<td class="text-left">Total Quantity : </td>
									<td class="text-right">11 </td>

								</tr>
								<tr>
									<td class="text-left">Sub Total :</td>
									<td class="text-right">1111</td>
								</tr>
								<tr>
									<td class="text-left">Vat :</td>
									<td class="text-right">5%</td>
								</tr>
								<tr>
									<td class="text-left">Total :</td>
									<td class="text-right">120000</td>
								</tr>
								
							</table>
							
						</div>
						<br>
						<form action="" class="text-left">
							<label for="">Customer Name</label>
							<select  class="form-control" >
								<option id="customers" :value="customer.id" v-for="customer in Customers" :key="customer.id" >{{customer.name}}</option>
								

							</select>
							<label for="">Pay</label>
							<input type="text" class="form-control">
							<label for="">Due</label>
							<input type="text" class="form-control">

							<label for="">Payment Method</label>
							<select name="" id="" class="form-control">
								<option value="">asda</option>
								<option value="">asda</option>
								<option value="">asda</option>
								<option value="">asda</option>

							</select>
							<button class="btn btn-success" type="submit">Submit</button>
						</form>
					</div>
				</div>

				
				<div class="modal fade" id="customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h2 class="modal-title" id="largeModalLabel">Create Customer</h2>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form @submit.prevent="addCustomer">
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
                           
						</div>
						<button type="submit" class="btn btn-primary">Save changes</button>
								
							</form>		
							<button type="button" id="modalClose" class="btn btn-secondary" data-dismiss="modal" style="float:right">Close</button>
						</div>
						
							
						

							
						</div>
						
					</div>
				</div>
			</div>



			<div class="col-7">
				<div class="row" >
					<div class="col-12">
						<div class="card shadow">
							<div class="card-header">
								<h2 class="mb-0">Navigation Tabs</h2>
							</div>
							<div class="card-body">
								<div class="nav-wrapper">
									<ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
										<li class="nav-item">
											<a class="nav-link mb-sm-3 mb-md-0 active border" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fe fe-home mr-2"></i>All</a>
										</li>
										<li class="nav-item col-3" v-for="category in Categories" :key="category.id" style="margin-top:5px">
											<a class="nav-link" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" @click="SetCaregoryId(category.id)" aria-controls="tabs-icons-text-2" aria-selected="false">{{category.name}}</a>
										</li>
										
									</ul>
								</div>
								<div class="card shadow mb-0">
									<div class="card-body ">
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
												<input v-model="searchTerm" type="text" class="form-control col-12" placeholder="Search here.....">
												<div class="row">
													
													<div  v-for="product in GetAllProducts" :key="product.id">
														<div  style="margin-top:10px;" class="col-12" >
															<div class="card shadow" >
																<img :src="'/'+ product.image" style="height:150px"/>
																<div class="card-body text-center text-justify" style="max-height:90px">
																	
																	<a href="#"><h2 class="mb-0">{{product.product_name}} ({{product.quantity}})</h2></a>
																	
																	<div class="price h2 mb-0">
																		{{product.saleing_price}}
																	</div>
																	
																</div>
																
																<div class="card-footer text-center">
																	<button  v-if="product.quantity == 0" class="btn bg-gradient-red btn-sm " data-container="body" data-toggle="popover" data-placement="top" data-content="Stocks not available"><i class="fe fe-slash text-white"></i></button>
																	<button  v-else-if="product.quantity < 10" class="btn bg-gradient-warning btn-sm " data-container="body" data-toggle="popover" data-placement="top" data-content="Stocks  Low"><i class="fe fe-trending-down text-white"></i></button>
																	<button  v-else="" class="btn bg-gradient-success btn-sm " data-container="body" data-toggle="popover" data-placement="top" data-content="Stocks available"><i class="fe fe-check-circle text-white"></i></button>
																	
																	<button @click="setData(product.id)" class="btn btn-icon btn-sm  btn-primary mt-1 mb-1  text-sm text-white" >
																		<i class="fe fe-shopping-cart"></i>
																		Add to Cart
																	</button>
																</div>
															</div>
														</div>
													</div>



												</div>
											</div>
											<div v-for="category in Categories" :key="category.id" class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
												

												<div class="row" >
													<input type="text" class="form-control" placeholder="Search here....." v-model="filterCatProduct">
													<div  v-for="product in getCategoryFilterProduct" :key="product.id">
														<div  style="margin-top:10px;" class="col-12" >
															<div class="card shadow" >
																<img :src="'/'+ product.image" style="height:150px"/>
																<div class="card-body text-center text-justify" style="max-height:90px">
																	
																	<a href="#"><h2 class="mb-0">{{product.product_name}} ({{product.quantity}})</h2></a>
																	
																	<div class="price h2 mb-0">
																		{{product.saleing_price}}
																	</div>
																	
																</div>
																
																<div class="card-footer text-center">
																	<button  v-if="product.quantity == 0" class="btn bg-gradient-red btn-sm " data-container="body" data-toggle="popover" data-placement="top" data-content="Stocks not available"><i class="fe fe-slash text-white"></i></button>
																	<button  v-else-if="product.quantity < 10" class="btn bg-gradient-warning btn-sm " data-container="body" data-toggle="popover" data-placement="top" data-content="Stocks  Low"><i class="fe fe-trending-down text-white"></i></button>
																	<button  v-else="" class="btn bg-gradient-success btn-sm " data-container="body" data-toggle="popover" data-placement="top" data-content="Stocks available"><i class="fe fe-check-circle text-white"></i></button>
																	
																	<button @click="setData(product.id)" class="btn btn-icon btn-sm  btn-primary mt-1 mb-1  text-sm text-white" >
																		<i class="fe fe-shopping-cart"></i>
																		Add to Cart
																	</button>
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
						
						
					</div>
				</div>
			</div>

			
		</div>
	</div>
</template>
<script>
	export default {
		created() {
			if (! User.loggedIn()) {
				this.$router.push({ name : '/'})
			}
		},
		
		data() {
			return {
				Customers:[],
				Categories:[],
				products:[],
				Catproducts:[],
				searchTerm:'',
				filterCatProduct:'',
				errors:{},

				form:{
					name: '',
					email: '',
					phone: '',
					
					address: '',
				
				},
				productID:[],
				
			


			}
		},
		computed: {
			GetAllProducts(){
				return this.products.filter(product => {
					
					return product.product_name.match(this.searchTerm)
				})
			},
			getCategoryFilterProduct(){
				return this.Catproducts.filter(product => {
					return product.product_name.match(this.filterCatProduct)
				})
			}
		},
		
		created() {
			this.AllProducts();
			this.allCustomer();
			this.allCategory();
			this.getID();
			Reload.$on('afterAdd', ()=>{
				this.getID();
			});
		},

		methods: {
				
		addCustomer(){
			axios.post('/api/customer/',this.form)
			.then(
				Toast.fire({
					type: 'success',
					title: 'Customer Created Successfully'
				}),
				//$('#modalClose').click()
               //$('#customers').refresh
				)
			.catch(error => this.errors = error.response.data.errors,
				
				
				)
			
		},
			//send category id for get product data by id
				SetCaregoryId(id){
				axios.get('/api/get-product-by-cat-id/'+id)
				.then(({data}) => (this.Catproducts = data))
				.catch()

				
			},
			AllProducts(){
				axios.get('/api/product/')
				.then(
					({data}) => (this.products = data)
					)
				.catch()
			},

			allCustomer(){
				axios.get('/api/customer/')
				.then(
					({data}) => (this.Customers = data)
					)
				.catch()
			},
			//get all category
			allCategory(){
				axios.get('/api/category/')
				.then(({data}) => (this.Categories = data))
				.catch()
			},
			
			setesson(){
				let dynamic = [sessionStorage.getItem('id')]
				dynamic.push(this.id)
				sessionStorage.setItem('id',dynamic)
				let getData = sessionStorage.getItem('id');
				let array = getData.split(',');
				let filterVal = array.filter(this.onlyUnique());
				console.log(filterVal);
				
			},

			setData(id){
				let ProductId = [sessionStorage.getItem('product_id')]
				ProductId.push(id);
				sessionStorage.setItem('product_id', ProductId);
				Reload.$emit('afterAdd');
				
				
			},

			getID(){
				let getData = sessionStorage.getItem('product_id')
				if (getData !== null) {
					let splited =  getData.split(',')
			       let filtr =	splited.filter(function (el) {
					return el != '';
				})
				this.productID = filtr
				}
			},
			RemoveSessionData(id){
				let getData = sessionStorage.getItem('product_id')
				if (getData !== null) {
					let splited =  getData.split(',')
			       let filtr =	splited.filter(function (el) {
					return el != id;
				});
			  		sessionStorage.removeItem('product_id')
			  	 sessionStorage.setItem('product_id',filtr)
			  	 	Reload.$emit('afterAdd');
				

				}
			}

			
		},



	}
</script>