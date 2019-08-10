<template>
	<div>
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">{{this.$route.params.id}}</h2>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<input type="text" class="form-control" placeholder="search here" v-model="searchTerm">
						<table  class="table table-striped table-bordered text-nowrap" >
							<thead>
								<tr>
									<th>Name</th>
									<th>Photo</th>
									<th>Email</th>
									<th>Salary Paid</th>
                                    <th>Salary Due</th>
									<th>Action</th>


								</tr>
							</thead>
							<tbody>
								
								
								
								<tr v-for="employee in filterSearch" :key="employee.id">
									<td>{{employee.employee_name}}</td>
									<td><img :src="'/'+employee.photo" alt="" style="height:50px"></td>
									<td>{{employee.employee_email}}</td>
									<td class="text-success">{{employee.amount}}</td>
									<td class="text-danger">{{employee.salary - employee.amount}}</td>
									
									
									<td>
                                        <router-link :to="{name: 'salary_edit', params:{id: employee.id}}" class="btn btn-warning">Edit</router-link>
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
				Employees:[],
				searchTerm:'',
			}
		},
		computed: {
			filterSearch(){
				return this.Employees.filter(employee => {
					
					return employee.employee_email.match(this.searchTerm)
					

					

				})
			}
		},
		created() {
			this.AllEmployees();
		},

		methods: {
			AllEmployees(){
                let id = this.$route.params.id
				axios.get('/api/salary-based-month/'+id)
				.then(
					({data}) => (this.Employees = data)
					)
				.catch()
			},


	
		},


	}
</script>
<style lang="" >
	
</style>
