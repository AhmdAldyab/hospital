<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li><a href="{{ route('dashboard') }}">{{ trans('main_trans.dashboard') }}</a></li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        {{ trans('main_trans.governmental_hospital') }} </li>
                    <!-- menu item Elements-->

                    <!-- Doctors -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Doctors">
                            <div class="pull-left"><i class="ti-email"></i><span
                                    class="right-nav-text">{{ trans('main_trans.DoctorsNurses') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Doctors" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('doctor.index') }}">{{ trans('main_trans.list_doctors') }}</a> </li>
                            <li> <a href="{{ route('nurse.index') }}">{{ trans('main_trans.list_Nurses') }}</a> </li>
                        </ul>
                    </li>

                    <!-- Department of Doctors and Nursing -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i
                                class="fas fa-user-graduate"></i>{{ trans('main_trans.department_doctors_nursing') }}
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#Student_information">{{ trans('main_trans.department_doctors_nursing') }}
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Student_information" class="collapse">
                                    <li> <a
                                            href="{{ route('section.index') }}">{{ trans('section.list_section') }}</a>
                                            @foreach (App\Models\Section::all() as $section)
                                            <a href="{{ route('section.show',$section->id) }}">{{ $section->name }}</a>
                                            @endforeach
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="calendar.html">{{ trans('main_trans.Ambulance_emergency_department') }}</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Financial Affairs Administration -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#financial_administration">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ trans('main_trans.financial_administration') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="financial_administration" class="collapse" data-parent="#sidebarnav">
                            <li><a href="accordions.html">{{ trans('main_trans.box') }}</a></li>
                            <li><a href="accordions.html">{{ trans('main_trans.reception_patient') }}</a></li>
                            <li><a href="accordions.html">{{ trans('main_trans.Central_warehouse') }}</a></li>
                            <li><a href="accordions.html">{{ trans('main_trans.debt_collection') }}</a></li>
                        </ul>
                    </li>

                    <!-- secretarial-->
                    <li><a href="accordions.html"><i class="ti-palette"></i> {{ trans('main_trans.secretarial') }}</a>
                    </li>

                    <!-- Department of Legal Affairs -->
                    <li><a href="accordions.html"><i class="ti-calendar"></i>
                            {{ trans('main_trans.Department_Legal') }}</a></li>

                    <!-- Public Relations and Marketing Department -->
                    <li><a href="accordions.html"><i class="ti-comments"></i>
                            {{ trans('main_trans.public_relations') }}</a></li>

                    <!-- Administrative Affairs Department -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse"
                            data-target="#administrative_affairs_dpartment">
                            <div class="pull-left"><i class="ti-email"></i><span
                                    class="right-nav-text">{{ trans('main_trans.administrative_affairs_dpartment') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="administrative_affairs_dpartment" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">{{ trans('main_trans.Department_Statistics_Records') }}</a>
                            </li>
                        </ul>
                    </li>

                    <!-- public services administration -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse"
                            data-target="#public_services_administration">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">{{ trans('main_trans.public_services_administration') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="public_services_administration" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">{{ trans('main_trans.maintenance') }}</a> </li>
                            <li> <a href="calendar.html">{{ trans('main_trans.Hygiene_laundry') }}</a> </li>
                            <li> <a href="calendar.html">{{ trans('main_trans.drivers') }}</a> </li>
                            <li> <a href="calendar.html">{{ trans('main_trans.guard') }}</a> </li>
                        </ul>
                    </li>

                    <!-- Outpatient Department -->
                    <li><a href="accordions.html"><i class="ti-blackboard"></i>
                            {{ trans('main_trans.outpatient_department') }}</a></li>

                    <!-- Operations Department -->
                    <li><a href="accordions.html"><i class="ti-files"></i>
                            {{ trans('main_trans.operations_department') }}</a></li>

                    <!-- Intensive care department -->
                    <li><a href="accordions.html"><i class="ti-layout-tab-window"></i>
                            {{ trans('main_trans.Intensive_care_department') }}</a></li>

                    <!-- Paramedical Services Department -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse"
                            data-target="#paramedical_services_department">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Intensive_care_department') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="paramedical_services_department" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="chart-js.html">{{ trans('main_trans.pharmacy') }}</a> </li>
                            <li> <a href="chart-morris.html">{{ trans('main_trans.Laboratory_blood_bank') }} </a>
                            </li>
                            <li> <a href="chart-sparkline.html">{{ trans('main_trans.rays') }}</a> </li>
                            <li> <a href="chart-sparkline.html">{{ trans('main_trans.sterilization') }}</a> </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
