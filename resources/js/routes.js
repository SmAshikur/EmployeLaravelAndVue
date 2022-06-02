import EmployeeIndex from './components/employee/index'
import EmployeeCreate from './components/employee/create'
import EmployeeEdit from './components/employee/edit'

export const routes =[
    {
        path:'/employee',
        name:'EmployeeIndex',
        component:EmployeeIndex
    },
    {
        path:'/home',
        name:'home',
    },
    {
        path:'/employees/create',
        name:'EmployeeCreate',
        component:EmployeeCreate
    },
    {
        path:'/employee/:id',
        name:'EmployeeEdit',
        component:EmployeeEdit
    }
]
