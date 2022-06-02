<template>
    <div>
    <div class="container">
        <div class="card">
            <div class="card-header ">
            <h3>Index of City</h3>
            <div class="d-flex justify-content-end mt-2">

                <router-link :to="{ name: 'EmployeeCreate' }"
                     class="btn btn-primary mb-2"> Create Employee</router-link>
            </div>

        </div>
        <div class="card-body p-5  ">
            <div class="d-flex justify-content-center">

            </div>
            <div v-if="showMessage">
                    <div class="alert alert-success">{{ message }}</div>
            </div>
            <table class="table table-bordered table-striped text-center mt-0">
                <tr>
                    <th>Id</th>
                    <th>Employee Name</th>
                    <th>Employee Address </th>
                    <th>Country Name</th>
                    <th>City Name </th>
                    <th>Department</th>
                    <th>Date of Birth</th>
                    <th>Date of Hired </th>
                    <th>Action</th>
                </tr>

                    <tr v-for="employee in employess" :key="employee.id">
                        <td> {{employee.id}}</td>
                        <td> {{employee.name}}</td>
                        <td> {{employee.address}}</td>
                        <td> {{employee.country.name}}</td>
                        <td> {{employee.city.name}}</td>
                        <td> {{employee.department.name}}</td>
                        <td> {{employee.birthdate}}</td>
                        <td> {{employee.date_hired}}</td>
                        <td class="d-flex justify-content-around">
                            <div>
                                 <router-link
                                        :to="{
                                            name: 'EmployeeEdit',
                                            params: { id: employee.id }
                                        }"
                                        class="btn btn-success"
                                        >Edit</router-link>
                            </div>
                            <div>
                                    <button @click="deleteEmployee(employee.id)"  class="show_confirm btn btn-xs btn-danger btn-flat "
                                     data-toggle="tooltip" title='Delete'>Delete</button>
                        </div>
                        </td>
                    </tr>

            </table>
        </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    name: 'EmployeeIndex',

    data() {
        return {
            employess:[],
            showMessage: false,
            message:"",
        };
    },

    mounted() {
        this.getEmployee()
    },

    methods: {
       getEmployee(){
            axios.get('api/employee').then(res=>{
            this.employess=res.data;
        }).catch(error=>{
           console.log(error)
        })
       },
       deleteEmployee(id){
            axios.delete('api/employee/'+id).then(res=>{
            this.getEmployee();
            this.showMessage = true;
            this.message = res.data;
            }).catch(error=>{
           console.log(error)
        })
       }
    },
};
</script>

<style lang="scss" scoped>

</style>
