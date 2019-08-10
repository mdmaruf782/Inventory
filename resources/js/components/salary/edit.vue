<template>
	<div>
		<div class="col-md-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0">Salary For  <b>{{info.name}}</b> </h2>
				</div>
				<div class="card-body">
                    <div class="row">
                    <div class="col-md-6 col-lg-4">
                                        
										<div class="card shadow">
											<div class="card-header ">
												<h2 class="mb-0 text-center">{{info.name}} BIO</h2>
											</div>
											<div class="card-body text-center">
												<img class="avatar avatar-xxl brround" :src="'/'+info.photo" alt="avatra-img">
												<h4 class="h4 mb-0 mt-3 font-600">Name: {{info.name}}</h4>
												<p class="card-text text-sm">Email: {{info.email}}</p>
                                                	<p class="card-text text-sm">Address: {{info.address}}</p>
                                                	<p class="card-text text-sm">NID No: {{info.nid}}</p>
                                                	<p class="card-text text-sm">Joining Date: {{info.joining_date}}</p>
                                                	<p class="card-text text-sm">Salary Range: {{info.salary}}</p>




											</div>
										</div>
									</div>
                            <div class="col-md-6 col-lg-6">
                                        
										<div class="card shadow">
											
											<div class="card-body text-center">
												<form @submit.prevent="UpdateSalary">
                                                        <label for="" style="float:left">Amount</label>
                                                        
                                                        <input type="number" class="form-control" v-model="form.amount" placeholder="Enter Amount">
                                                         <small class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</small>
                                                        <label for="" style="float:left">Month</label>
                                                        <select class="form-control" v-model="form.salary_month">
                                                            <option value="January">January</option>
                                                            <option value="February">February</option>
                                                            <option value="March">March</option>
                                                            <option value="April">April</option>
                                                            <option value="May">May</option>
                                                            <option value="June">June</option>
                                                            <option value="July">July</option>
                                                            <option value="August">August</option>
                                                            <option value="September">September</option>
                                                            <option value="October">October</option>
                                                            <option value="November">November</option>
                                                            <option value="December">December</option>

                                                        </select>
                                                         <small class="text-danger" v-if="errors.salary_month">{{ errors.salary_month[0] }}</small>

                                                        <br>
                                                        <Button class="btn btn-success col-sm-12" >Payout</Button>

                                                </form>


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
				info:{
					name: '',
					email: '',
					salary: '',
					address: '',
					nid: '',
					joining_date: '',
                    photo: '',
                    newphoto: '',
				},
                errors:{},
                form:{
                    amount:'',
                    salary_month:'',
                    employee_id: this.$route.params.id,
                },
                responses:{},

			}
		},

        created() {
            let id = this.$route.params.id
            axios.get('/api/salary/'+id)
            .then(
                  ({data}) => (this.form = data) + (this.info = data)
               
               
                )
            .catch(console.log('error'))
        },
		methods: {
            UpdateSalary(){
               let id = this.$route.params.id

                axios.patch('/api/salary/'+id,this.form)
                .then(
             
                  Toast.fire({
				 	type: 'success',
				 	title: 'Payment Updated'
                 }),
                	this.$router.push({ name : 'salary'})
                    
                )
                .catch(error => this.errors = error.response.data.errors)
            }
        

	},
}
</script>
