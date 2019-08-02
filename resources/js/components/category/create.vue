<template>
    <div>
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Create Category</h2>
				</div>
				<div class="card-body">
					<form @submit.prevent="createCategory">
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
							<input v-model="form.name" type="text" class="form-control" name="input" placeholder="Enter  Name" >
							 <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
								</div>
							</div>
                              <div class="col-md-6">
                                  	<!-- <div class="form-group">
                                    <select v-model="form.sub_cat" v-for="category in categories" :key="category.id" class="form-control" for>
                                       <option value="{{category.name}}">{{category.name}}</option>

                                    </select>
							 <small class="text-danger" v-if="errors.p_id">{{ errors.p_id[0] }}</small>
								</div> -->

                                <span v-for="category in categories" :key="category.id">
                                <small>{{category.name}}</small>
                            </span>
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
                name:'',
                //sub_cat:''

            },
            errors:{},
            categories:[],
            
        }
    },
    created() {
        this.allCategory()
    },
    methods: {
        createCategory(){
            axios.post('/api/category/',this.form)
           .then(
               this.$router.push({ name : 'category'}),
				Toast.fire({
					type: 'success',
					title: 'category Created Successfully'
				}),
				
				
				)
            .catch(error => this.errors = error.response.data.errors,
                Toast.fire({
					type: 'error',
					title: 'category not Created '
				}))
        },
        allCategory(){
            axios.get('/api/category/')
            .then(({data}) => (this.categories = data))
			.catch()

        }
    },


}
</script>
