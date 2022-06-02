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
        <div class="card-body   ">
           <div class="row">
               <div class="d-inline-flex row mt-2 mb-4">
                    <div class="form-inline d-inline-flex col-md-3 offset-md-2">
                           <input placeholder="Search Employee" type="search"
                                            v-model="search"
                             id="search" class="form-control mx-1">

                    </div>

                   <div class="col-md-3 offset-md-2" >
                       <select  v-model="selectedDeprtment"
                       class="form-control" placeholder="Select by Department">
                           <option v-for="dept in depts" :key="dept.id" :value="dept.id">
                               {{dept.name}}
                           </option>
                       </select>
                   </div>

               </div>
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
            selectedDeprtment:null,
            selectedCountry:null,
            search:null,
            message:"",
            depts:[],
            countries:[],
        };
    },
    watch: {
        search() {
            this.getEmployee();
        },
        selectedDeprtment() {
            this.getEmployee();
        },
        selectedCountry() {
            this.getEmployee();
        }
    },
    mounted() {
        this.getEmployee()
        this.getDepts()
        this.getCountries()
    },

    methods: {
       getEmployee(){
            axios.get('api/employee', {
                    params: {
                        search: this.search,
                        department_id: this.selectedDeprtment,
                        country_id:this.selectedCountry,
                    }
                }).then(res=>{
            this.employess=res.data;
        }).catch(error=>{
           console.log(error)
        })
       },
       getCountries(){
            axios.get('/api/employees/countries').then(res=>{
                this.countries=res.data;
            }).catch(error=>{console.log(error)})
        },
        getDepts(){
            axios.get('/api/employees/departments').then(res=>{

                this.depts=res.data;
            }).catch(error=>{console.log(error)})
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
