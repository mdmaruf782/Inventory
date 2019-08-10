

let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;
//end auth
let home = require('./components/home.vue').default;


//pos route import
let pos = require('./components/pos/index.vue').default;


//customer route import
 
let create_customer = require('./components/customer/create.vue').default;
let all_customer = require('./components/customer/index.vue').default;
let edit_customer = require('./components/customer/edit.vue').default;


//employee route import
 
let create_employee = require('./components/employee/create.vue').default;
let all_employee = require('./components/employee/index.vue').default;
let edit_employee = require('./components/employee/edit.vue').default;
//end import employee route

//suppliers route import
let create_supplier = require('./components/suppliers/create.vue').default;
let all_supplier = require('./components/suppliers/index.vue').default;
let edit_supplier = require('./components/suppliers/edit.vue').default;

//category import
let create_category = require('./components/category/create.vue').default;
let category = require('./components/category/index.vue').default;

//product import
let create_product = require('./components/products/create.vue').default;
let edit = require('./components/products/edit.vue').default;
let product = require('./components/products/index.vue').default;
let stocks = require('./components/products/stocks.vue').default; //stock route
let edit_stocks = require('./components/products/edit-stocks.vue').default; //stock route



//expense import
let create_expense = require('./components/expense/create.vue').default;
let edit_expense = require('./components/expense/edit.vue').default;
let expense = require('./components/expense/index.vue').default;

//salary import
let salary_index = require('./components/salary/index.vue').default;
let salary_pay = require('./components/salary/pay.vue').default;
let salary = require('./components/salary/all_salary.vue').default;
let salary_month = require('./components/salary/salary_month.vue').default;
let salary_edit = require('./components/salary/edit.vue').default;



 







export const routes = [
  { path: '/', component: login, name: '/' },
  { path: '/register', component: register },
  { path: '/forget', component: forget },
  { path: '/logout', component: logout, name: 'logout' },
  // auth
  { path: '/home', component: home, name: 'home' },


    //start customer route here
    { path: '/create-customer', component: create_customer, name: 'create_customer' },
    { path: '/all-customer', component:  all_customer, name: 'all_customer' },
    { path: '/edit-customer/:id', component: edit_customer, name: 'edit_customer' },

  ///start employee route here
  { path: '/create-employee', component: create_employee, name: 'create_employee' },
  { path: '/all-employee', component:  all_employee, name: 'all_employee' },
  { path: '/edit-employee/:id', component: edit_employee, name: 'edit_employee' },

  //start supplier route

  { path: '/create-supplier', component: create_supplier, name: 'create_supplier' },
  { path: '/all-supplier', component: all_supplier, name: 'all_supplier' },
  { path: '/edit-supplier/:id', component: edit_supplier, name: 'edit_supplier' },

  //start category route

  { path: '/create-category', component: create_category, name: 'create_category' },
  { path: '/all-category', component: category, name: 'category' },

  //start product route
  { path: '/Create-Product', component: create_product, name: 'create_product' },
  { path: '/Edit-Product/:id', component: edit, name: 'edit' },
  { path: '/Products', component: product, name: 'all_product' },
  { path: '/Stocks', component: stocks, name: 'stocks' },
  { path: '/Stocks/:id', component: edit_stocks, name: 'edit_stocks' },



//expense route here
  { path: '/Create-Expense', component: create_expense, name: 'create_expense' },
  { path: '/Expenses', component: expense, name: 'expense' },

//salary route here
{ path: '/Pay-Salary', component: salary_index, name: 'salary_index' },
{ path: '/pay-Salary/:id', component: salary_pay, name: 'salary_pay' },
{ path: '/Salary', component: salary, name: 'salary' },
{ path: '/Salary/:id', component: salary_month, name: 'salary_month' },
{ path: '/Salary-Edit/:id', component: salary_edit, name: 'salary_edit' },


  //pos route here
  { path: '/pos', component: pos, name: 'pos' },


 
]

