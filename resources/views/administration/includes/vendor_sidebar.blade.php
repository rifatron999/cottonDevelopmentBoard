<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img style="background: white;" src="{{asset('assets/administration/images/icon/cdblogo.png')}}" class="img-circle" width="60"></a></p>
            <h5 class="centered">{{ Auth::user()->name }}</h5>

            <li class="sub-menu">
                <a class="@yield('DashBoard')" href="{{route('home')}}" >
                    <i class="fa fa-home"></i>
                    <span>DashBoard</span>
                </a>
            </li>
                <li class="sub-menu">
                <a class="@yield('Employee_management')" >
                    <i class="fab fa-accusoft"></i>
                    <span>Employee</span>
                </a>
                <ul class="sub" style="display: none;">
                    <li class="@yield('Emplpyee_Add')" ><a  href="{{ route('employeeAddView') }}"><i class="fas fa-skull"></i> Employee Add</a></li>
                    <li class="@yield('All_Emplpyee')" ><a  href="{{ route('employeeListView') }}"><i class="fas fa-skull"></i> All Employee</a></li>
                </ul>
            </li>


        </ul>
        <!-- sidebar menu end-->`
    </div>
</aside>
