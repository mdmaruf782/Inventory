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
						<table  class="table table-striped table-bordered text-nowrap" >
							<thead>
								<tr>
									<th>Name</th>
									<th>Photo</th>
									<th>Email</th>
									<th>Salary</th>
									<th>Joining Date</th>
									<th>Address</th>
									<th>NID</th>
									<th>Action</th>


								</tr>
							</thead>
							<tbody>
								
								
								
								<tr v-for="employee in filterSearch" :key="employee.id">
									<td>{{employee.name}}</td>
									<td><img :src="employee.photo" alt="" style="height:50px"></td>
									<td>{{employee.email}}</td>
									<td>{{employee.salary}}</td>
									<td>{{employee.joining_date}}</td>
									<td>{{employee.address}}</td>
									<td>{{employee.nid}}</td>
									<td><router-link :to="{name: 'edit_employee', params:{id: employee.id}}" class="btn btn-success btn-sm">Edit</router-link><button @click="DeleteEmpoyee(employee.id)" class="btn btn-danger btn-sm">Delete</button></td>

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
					
					return employee.email.match(this.searchTerm)
					

					

				})
			}
		},
		created() {
			this.AllEmployees();
		},

		methods: {
			AllEmployees(){
				axios.get('/api/employees/')
				.then(
					({data}) => (this.Employees = data)
					)
				.catch()
			},


			DeleteEmpoyee(id){
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
						axios.delete('/api/employees/'+id)
						.then(()=>{
							this.Employees =  this.Employees.filter(employee => {
								return employee.id != id
							})
						})
						.catch(()=>{
							Toast.fire({
								type: 'error',
								title: 'Employee Not Deleted'
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
<style lang="" >
	
</style>
