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
									<input v-model="form.product_name" type="text" class="form-control" disabled name="input" placeholder="Enter Product Name" >
									<small class="text-danger" v-if="errors.product_name">{{ errors.product_name[0] }}</small>
								</div>
								<div class="form-group">
									<label for="">Product Code</label>
									<input v-model="form.product_code" type="text" disabled class="form-control" name="input" placeholder="Enter Product Code">
									<small class="text-danger" v-if="errors.product_code">{{ errors.product_code[0] }}</small>
								</div>
							
							
							
								
								<div class="form-group">
									<label for="">Quantity</label>
									<input v-model="form.quantity" type="number" class="form-control" name="input" placeholder="Enter Product quantity" >
									<small class="text-danger" v-if="errors.quantity">{{ errors.quantity[0] }}</small>
								</div>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
							
						<div class="col-md-6">
                           <center><img :src="'/'+ form.image" alt="" style="height:250px"></center>
						</div>
							
							
							
							
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
					

				
					quantity:'',
					image:'',
					
            },
                errors:{},
			
        }
    },
    created() {
       let id = this.$route.params.id
        	axios.get('/api/product/'+id)
        	.then(({data}) => (this.form = data))
        	.catch()
        

        },

    methods: {
        UpdateProducts(){
            let id = this.$route.params.id
            axios.patch('/api/product/'+id,this.form)
           
			.then(
				Toast.fire({
					type: 'success',
					title: 'Stock updated Successfully'
				}),
				this.$router.push({ name : 'stocks'})
				
				)
			.catch(error => this.errors = error.response.data.errors,
				Toast.fire({
					type: 'success',
					title: 'Stock updated Successfully'
				})
				
				)
        },

        	
    },


   




}
</script>
<style lang="">
    
</style>