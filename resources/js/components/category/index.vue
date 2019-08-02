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
						<table  class="table table-striped table-bordered text-nowrap" ref="table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Parent Category</th>
									
									
									<th>Action</th>


								</tr>
							</thead>
							<tbody>
								
								
								
								<tr v-for="category in filterSearch" :key="category.id">
									<td>{{category.name}}</td>
									
									<td>{{category.p_id}}</td>
									
									
<td><button class="btn btn-success btn-sm" @click="EditCategory(category.id)" data-toggle="modal" data-target="#exampleModal">Edit</button>
<button @click="DeleteCategory(category.id)" class="btn btn-danger btn-sm">Delete</button></td>

								</tr>
								
								
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
		</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
       <form  @submit.prevent="UpdateCategory">
           <input type="text" class="form-control" v-model="form.name">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes </button>
    
       </form>
    
        
      
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
				categories:[],
                searchTerm:'',
                form:{
                    name:'',
                    id:''
				},
				errors:[],
			}
		},
		computed: {
			filterSearch(){
				return this.categories.filter(category => {
					
					return category.name.match(this.searchTerm)
					

					

				})
			}
		},
		created() {
			this.AllCategory();
		},

		methods: {
			AllCategory(){
				axios.get('/api/category/')
				.then(
					({data}) => (this.categories = data)
					)
				.catch()
			},
            EditCategory(id){
                axios.get('/api/category/'+id)
                .then(({data}) => (this.form = data),id = this.form.id)
                .catch(console.log('error'))
            },

            UpdateCategory(){
               // console.log(this.form.id);
                let id = this.form.id
                axios.patch('/api/category/'+id,this.form)
                
				
				.then(this.$refs.table.refresh())
                .catch(
                    console.log('error')
					
                )
            },

			DeleteCategory(id){
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
						axios.delete('/api/category/'+id)
						.then(()=>{
							this.categories =  this.categories.filter(category => {
								return category.id != id
							})
						})
						.catch(()=>{
							Toast.fire({
								type: 'error',
								title: 'supplier Not Deleted'
							})
							this.$route.push({name: 'category'})
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
