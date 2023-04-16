  <!-- ========== Left Sidebar Start ========== -->

  <div class="left side-menu ">
    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>
                <li>
                    <a href="{{ route('pos') }}" class="waves-effect"><i class="fa-solid fa-cash-register" ></i><span class="text-primary"><b>POS</b>  </span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa fa-users"></i><span> Employees </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('add.employee') }}">Add Employee</a></li>
                        <li><a href="{{ route('all.employee') }}">All Employees</a></li>

                    </ul>
                </li>


                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa fa-user"></i> <span> Customers </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('add.customer') }}">Add Customer</a></li>
                        <li><a href="{{ route('all.customers') }}">All Customers</a></li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-user-tie"></i> <span> Suppliers </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('add.supplier') }}">Add Supplier</a></li>
                        <li><a href="{{ route('all.suppliers') }}">All Suppliers</a></li>

                    </ul>
                </li>
       {{--          <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-money"></i> <span> Salary (EMP) </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('add.advanceSalary') }}">Add Advanced Salary</a></li>
                        <li><a href="{{ route('all.advanceSalaries') }}">All Advanced Salaries</a></li>
                        <li><a href="{{ route('pay.salary') }}">Pay Salary</a></li>
                        <li><a href="{{ route('all.advanceSalaries') }}">Last Month Salary</a></li>

                    </ul>
                </li> --}}
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-list"></i> <span> Categories </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('add.category') }}">Add Category</a></li>
                        <li><a href="{{ route('all.categories') }}">All Categories</a></li>


                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-shopping-bag"></i> <span> Products </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('add.product') }}">Add Product</a></li>
                        <li><a href="{{ route('all.products') }}">All Products</a></li>
                        <li><a href="{{ route('import.product') }}">Import Product</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-coins"></i> <span> Expenses </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('add.expense') }}">Add Expense</a></li>
                        <li><a href="{{ route('today.expenses') }}">Today Expenses</a></li>
                        <li><a href="{{ route('monthly.expenses') }}">Monthly Expenses</a></li>
                        <li><a href="{{ route('yearly.expenses') }}">Yearly Expenses</a></li>


                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-file-circle-check"></i> <span> Orders </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('pending.orders') }}">Pending Orders</a></li>
                        <li><a href="{{ route('delivered.orders') }}">Delivered Orders</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-clipboard-check"></i> <span> Attendance </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('take.attendances') }}">Take Attendance</a></li>
                        <li><a href="{{ route('all.attendances') }}">All Attendances</a></li>
                       {{--  <li><a href="{{ route('all.attendances') }}">Monthly Attendances</a></li> --}}

                    </ul>
                </li>

                <li class="">
                    <a href="{{ route('settings') }}" class="waves-effect"><i class="fa-solid fa-gear"></i> <span> Settings </span> <span class="pull-right"></span></a>
                  {{--   <ul class="list-unstyled">
                        <li><a href="{{ route('settings') }}">First</a></li>

                    </ul> --}}
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
