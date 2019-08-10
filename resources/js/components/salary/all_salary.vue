<template>
	<div>
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Salary Months</h2>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<input type="text" class="form-control" placeholder="search here" v-model="searchTerm">
						<table  class="table table-striped table-bordered text-nowrap" ref="table">
							<thead>
								<tr>
									<th class="col-md-11">Month Name</th>
									
									
									<th class="col-md-1">Action</th>


								</tr>
							</thead>
							<tbody>
								
								
								
								<tr v-for="month in filterMonth" :key="month.id">
									<td>{{month.salary_month}}</td>
									
									
									
                            <td>
                               <router-link :to="{name: 'salary_month', params:{id: month.salary_month}}" class="btn btn-success">View</router-link>
                            </td>

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
				months:[],
                searchTerm:'',
               
				errors:[],
			}
		},
		computed: {
			filterMonth(){
				return this.months.filter(expense => {
					
					return expense.salary_month.match(this.searchTerm)
					

					

				})
			}
		},
		created() {
			this.allMonth();
		},

		methods: {
            //get all record
			allMonth(){
				axios.get('/api/salary/')
				.then(
					({data}) => (this.months = data)
					)
				.catch()
            },
            
           
           
		},


	}
</script>
<style lang="" >
	
</style>
