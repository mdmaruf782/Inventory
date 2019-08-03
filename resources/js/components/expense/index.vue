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
									<th>Expense Issue</th>
									<th>Amount</th>
									<th>Date</th>
									
									<th>Action</th>


								</tr>
							</thead>
							<tbody>
								
								
								
								<tr v-for="expense in AllExpensesWithFilter" :key="expense.id">
									<td>{{expense.description}}</td>
									
									<td>{{expense.amount}}</td>
									<td>{{expense.date}}</td>
									
<td><button class="btn btn-success btn-sm" @click="EditExpense(expense.id)" data-toggle="modal" data-target="#exampleModal">Edit</button>
<button @click="DeleteExpence(expense.id)" class="btn btn-danger btn-sm">Delete</button></td>

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
        <h5 class="modal-title" id="exampleModalLabel">Edit Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
       <form  @submit.prevent="UpdateExpense">
           <input type="text" class="form-control" v-model="form.description"><br>
            <small class="text-danger" v-if="errors.description">{{ errors.description[0] }}</small>
           <input type="text" class="form-control" v-model="form.amount">
            <small class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</small>
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
				expenses:[],
                searchTerm:'',
                form:{
                    description:'',
                    amount:'',
                    id:''
				},
				errors:[],
			}
		},
		computed: {
			AllExpensesWithFilter(){
				return this.expenses.filter(expense => {
					
					return expense.description.match(this.searchTerm)
					

					

				})
			}
		},
		created() {
			this.AllExpenses();
		},

		methods: {
            //get all record
			AllExpenses(){
				axios.get('/api/expense/')
				.then(
					({data}) => (this.expenses = data)
					)
				.catch()
            },
            
            //get record by id
            EditExpense(id){
                axios.get('/api/expense/'+id)
                .then(({data}) => (this.form = data),id = this.form.id)
                .catch(console.log('error'))
            },


            //update record
            UpdateExpense(){
               // console.log(this.form.id);
                let id = this.form.id
                axios.patch('/api/expense/'+id,this.form)
                
				
				.then(

                 Toast.fire({
					type: 'success',
					title: 'Expense Updated Successfully'
                })
                )
                .catch(
                    error => this.errors = error.response.data.errors,
					
                )
            },

            //delete record
			DeleteExpence(id){
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
						axios.delete('/api/expense/'+id)
						.then(()=>{
							this.expenses =  this.expenses.filter(expense => {
								return expense.id != id
							})
						})
						.catch(()=>{
							Toast.fire({
								type: 'error',
								title: 'supplier Not Deleted'
							})
						//	this.$route.push({name: 'category'})
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
