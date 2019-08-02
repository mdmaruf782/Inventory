<template>
	<div>
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Edit Product</h2>
				</div>
				<div class="card-body">
					<form @submit.prevent="UpdateProducts" enctype="multipart/form-data">
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Product Name</label>
									<input v-model="form.product_name" type="text" class="form-control" name="input" placeholder="Enter Product Name" >
									<small class="text-danger" v-if="errors.product_name">{{ errors.product_name[0] }}</small>
								</div>
								<div class="form-group">
									<label for="">Enter Product Code</label>
									<input v-model="form.product_code" type="text" class="form-control" name="input" placeholder="Enter Product Code">
									<small class="text-danger" v-if="errors.product_code">{{ errors.product_code[0] }}</small>
								</div>
								<div class="form-group">
									<label for="">Category</label>
									<select name="" id="" class="form-control" v-model="form.category_id">
										
										<option :value="category.id" v-for="category in categories" :key="category.id">{{category.name}}</option>
										

									</select> 
									<small class="text-danger" v-if="errors.category_id">{{ errors.category_id[0] }}</small>
								</div>
							</div>
							<div class="col-md-6">
								
								<div class="form-group ">
									<label for="">Root</label>
									<input v-model="form.root" type="text" class="form-control" name="input" placeholder="Enter  Product Root" >
									<small class="text-danger" v-if="errors.root">{{ errors.root[0] }}</small>
								</div>
								<div class="form-group">
									<label for="">Quantity</label>
									<input v-model="form.quantity" type="number" class="form-control" name="input" placeholder="Enter Product quantity" >
									<small class="text-danger" v-if="errors.quantity">{{ errors.quantity[0] }}</small>
								</div>
								<div class="form-group">
									<label for="">Supplier</label>
									<select name="" id="" class="form-control" v-model="form.supplier_id">
										<option :value="supplier.id" v-for="supplier in suppliers" :key="supplier.id">{{supplier.name}}</option>
										
									</select> 
									<small class="text-danger" v-if="errors.supplier_id">{{ errors.supplier_id[0] }}</small>
								</div>
							</div>
							<div class="col-md-6">
								
								<div class="form-group ">
									<label for="">Saleing Price</label>
									<input v-model="form.saleing_price" type="text" class="form-control" name="input" placeholder="Enter  Saleing Price" >
									<small class="text-danger" v-if="errors.saleing_price">{{ errors.saleing_price[0] }}</small>
								</div>
								
							</div>
							<div class="col-sm-6">
									<div class="form-group ">
									<label for="">Buying Price</label>
									<input v-model="form.buying_price" type="text" class="form-control" name="input" placeholder="Enter  Buying Price" >
									<small class="text-danger" v-if="errors.buying_price">{{ errors.buying_price[0] }}</small>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Buying Date</label>
									<input v-model="form.buying_date" type="date" class="form-control" name="input" placeholder="Enter Product Buying Date" >
									<small class="text-danger" v-if="errors.buying_date">{{ errors.buying_date[0] }}</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									
								</div>

							</div>
							<div class="col-md-12">
								<input   type="file" class="form-control"  @change="onFileselected">
								<img :src="form.image" alt="" style="height:50px">
								<small class="text-danger" v-if="errors.image">{{ errors.image[0] }}</small>
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
                    product_name: '',
					product_code: '',
					category_id: '',
					supplier_id: '',
					root: '',

					buying_price: '',
					saleing_price: '',
					quantity:'',
					image:'',
					buying_date:'',
            },
                errors:{},
				categories:{},
				suppliers:{}
        }
    },
    created() {
       let id = this.$route.params.id
        	axios.get('/api/product/'+id)
        	.then(({data}) => (this.form = data))
        	.catch()
        	//category collected
        	axios.get('/api/category')
        	.then(({data}) => (this.categories = data))
        	//supplier colledted
        	axios.get('/api/supplier/')
        	.then(({data}) => (this.suppliers = data))

        },

    methods: {
        UpdateProducts(){
            let id = this.$route.params.id
            axios.patch('/api/product/'+id,this.form)
           
			.then(
				Toast.fire({
					type: 'success',
					title: 'Product Inserted Successfully'
				}),
				this.$router.push({ name : 'all_product'})
				
				)
			.catch(error => this.errors = error.response.data.errors,
				Toast.fire({
					type: 'success',
					title: 'Product Inserted Successfully'
				})
				
				)
        },

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
						this.form.image = event.target.result
				//	console.log(event.target.result);
					
				}
				reader.readAsDataURL(file)
				
			}
			
		},
    },


   




}
</script>
<style lang="">
    
</style>