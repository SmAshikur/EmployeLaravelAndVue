<template>
    <div>
         <div class="container mt-0">
        <div class="card">
            <div class="card-header ">

            <div class="d-flex justify-content-around mt-2">
<h3>Edit</h3>
                <router-link :to="{ name: 'EmployeeIndex' }"
                     class="btn btn-primary mb-2">Back</router-link>
            </div>

        </div>
        <div class="card-body p-5  col-md-6 offset-md-3">

            <form @submit.prevent="updateEmployee">
                <div class="form-group row mb-3 ">
                    <label  class="col-md-4 col-form-label text-md-right" for="name">Employee name </label>
                    <div class="col-md-8">
                        <input  v-model="form.name" type="text" class=" form-control " name="name">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="address">Address </label>
                    <div class="col-md-8">
                        <input  v-model="form.address" type="text" class=" form-control " name="address">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="name">Select Country </label>
                    <div class="col-md-8">
                       <select
                       name="country_id"
                       v-model="form.country_id"
                        @change="getCities()"
                        class="form-control"
                        aria-label="Default select example">
                        <option v-for='country in countries' :value="country.id"
                            :key="country.id">{{country.name}} (+{{ country.country_code }})
                        </option>
                       </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="name">Select City </label>
                    <div class="col-md-8">
                        <select
                        name="city_id"
                        v-model="form.city_id"
                        class="form-control"
                        aria-label="Default select example">
                        <option v-for='city in cities' :value="city.id"
                            :key="city.id">{{city.name}} </option>
                       </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="name">Select Department </label>
                    <div class="col-md-8">
                        <select
                        name="department_id"
                        v-model="form.department_id"
                        class="form-control"
                        aria-label="Default select example">
                           <option v-for='dept in depts' :value="dept.id"
                            :key="dept.id">{{dept.name}} </option>
                       </select>
                    </div>
                </div>


                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="zip_code">Zip Code </label>
                    <div class="col-md-8">
                        <input  v-model="form.zip_code" type="text" class=" form-control " name="zip_code">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="birthdate">Date of Birth </label>
                    <div class="col-md-8">
                        <input  v-model="form.birthdate" type="date" class=" form-control " name="birthdate">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="date_hired">Date of Hired </label>
                    <div class="col-md-8">
                        <input  v-model="form.date_hired" type="date" class=" form-control " name="date_hired">
                    </div>
                </div>
                <div class="form-group row m-4 d-flex justify-content-center">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'EmployeeCreate',

    data() {
        return {
            countries:[],
            cities:[],
            depts:[],
            form: {
                name: "",
                address: "",
                country_id: "",
                city_id: "",
                department_id: "",
                zip_code: "",
                birthdate: null,
                date_hired: null
            }

        };
    },

    mounted() {
        this.getEmployees();
        this.getCountries();
        this.getDepts();
    },

    methods: {
        getEmployees(){
            axios.get('/api/employee/'+this.$route.params.id).then(res=>{
                this.form=res.data;
                this.getCities()
                //console.log(res.data)
            }).catch(error=>{console.log(error)})
        },
        getCountries(){
            axios.get('/api/employees/countries').then(res=>{
                this.countries=res.data;
            }).catch(error=>{console.log(error)})
        },
        getCities(){
            //alert('hi')
            axios.get('/api/employees/'+this.form.country_id+'/cities').then(res=>{

                this.cities=res.data;
            }).catch(error=>{console.log(error)})
        },
        getDepts(){
            //alert('hi')
            axios.get('/api/employees/departments').then(res=>{

                this.depts=res.data;
            }).catch(error=>{console.log(error)})
        },
         updateEmployee() {

            axios.put('/api/employee/'+this.$route.params.id, {
                    name: this.form.name,
                    address: this.form.address,
                    country_id: this.form.country_id,
                    city_id: this.form.city_id,
                    department_id: this.form.department_id,
                    zip_code: this.form.zip_code,
                    birthdate:  this.form.birthdate,
                    date_hired: this.form.date_hired
                })
                .then(res => {
                    this.$router.push({ name: "EmployeeIndex" });
                });
        },

    },
};
</script>

<style lang="scss" scoped>

</style>
