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
        <div class="card-body p-5  col-md-8 offset-md-2">

            <table class="table table-bordered table-striped text-center mt-0">
                <tr>
                    <th>Id</th>
                    <th>City Name</th>
                    <th>Country Name </th>
                    <th>Action</th>
                </tr>

                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td class="d-flex justify-content-around">
                            <div><a class="btn btn-warning " href=" ">Edit</a></div>
                            <div>
                                <form method="POST" action=" ">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="show_confirm btn btn-xs btn-danger btn-flat "
                                     data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
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

        };
    },

    mounted() {

    },

    methods: {

    },
};
</script>

<style lang="scss" scoped>

</style>
