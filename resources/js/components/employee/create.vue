<template>
    <div>
         <div class="container mt-0">
        <div class="card">
            <div class="card-header ">

            <div class="d-flex justify-content-around mt-2">
<h3>Index of City</h3>
                <router-link :to="{ name: 'EmployeeIndex' }"
                     class="btn btn-primary mb-2">Back</router-link>
            </div>

        </div>
        <div class="card-body p-5  col-md-6 offset-md-3">

            <form action="">
                <div class="form-group row mb-3 ">
                    <label  class="col-md-4 col-form-label text-md-right" for="name">Employee name </label>
                    <div class="col-md-8">
                        <input type="text" class=" form-control " name="name">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="address">Address </label>
                    <div class="col-md-8">
                        <input type="text" class=" form-control " name="address">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="name">Select Country </label>
                    <div class="col-md-8">
                        <select  
                                            name="country"
                                            class="form-control"
                                            aria-label="Default select example">
                        <option v-for="country in countries" :value="country.country_code"
                            :key="country.id">{{country.name}} (+{{ country.country_code }}) </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="name">Select City </label>
                    <div class="col-md-8">
                        <select class=" form-control " name="city_id">

                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="name">Select Department </label>
                    <div class="col-md-8">
                        <select class=" form-control " name="department_id">

                        </select>
                    </div>
                </div>


                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="zip_code">Zip Code </label>
                    <div class="col-md-8">
                        <input type="text" class=" form-control " name="zip_code">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="birthdate">Date of Birth </label>
                    <div class="col-md-8">
                        <input type="date" class=" form-control " name="birthdate">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label  class="col-md-4 col-form-label text-md-right" for="date_hired">Date of Hired </label>
                    <div class="col-md-8">
                        <input type="date" class=" form-control " name="date_hired">
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

        };
    },

    mounted() {
 this.getCountries();
    },

    methods: {
        getCountries(){
            axios.get('/api/employees/countries').then(res=>{

                this.countries=this.data;

            }).catch(error=>{console.log(error)})
        }
    },
};
</script>

<style lang="scss" scoped>

</style>
