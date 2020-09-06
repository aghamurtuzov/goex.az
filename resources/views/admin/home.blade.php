@extends("main.admin")
@section("content")

    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">

            </div>

        </div>
    </div>
    <!-- /table -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <!-- Traffic sources -->
                <div class="card">
                    <div class="card-header header-elements-inline">

                    </div>

                    <div class="card-body py-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="d-flex align-items-center justify-content-center mb-4">
                                    <a href="#" class="btn bg-transparent border-teal text-teal rounded-round border-2 btn-icon mr-3 legitRipple">
                                        <i class="icon-plus3"></i>
                                    </a>
                                    <div>
                                        <div class="font-weight-semibold">New visitors</div>
                                        <span class="text-muted">2,349 avg</span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-4">
                                <div class="d-flex align-items-center justify-content-center mb-4">
                                    <a href="#" class="btn bg-transparent border-warning-400 text-warning-400 rounded-round border-2 btn-icon mr-3 legitRipple">
                                        <i class="icon-watch2"></i>
                                    </a>
                                    <div>
                                        <div class="font-weight-semibold">New sessions</div>
                                        <span class="text-muted">08:20 avg</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="d-flex align-items-center justify-content-center mb-2">
                                    <a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon mr-3 legitRipple">
                                        <i class="icon-people"></i>
                                    </a>
                                    <div>
                                        <div class="font-weight-semibold">Total online</div>
                                        <span class="text-muted"><span class="badge badge-mark border-success mr-2"></span> 5,378 avg</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /traffic sources -->

            </div>
        </div>
        <div class="row table-two">
            <div class="card col-md-6">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Daily sales stats</h6>
                    <div class="header-elements">
                        <span class="font-weight-bold text-danger-600 ml-2">$4,378</span>
                        <div class="list-icons ml-3">
                            <div class="list-icons-item dropdown">
                                <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                    <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                    <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                        <tr>
                            <th class="w-100">Application</th>
                            <th>Time</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm legitRipple">
                                            <span class="letter-icon">S</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Sigma application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-checkmark3 font-size-sm mr-1"></i> New order</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">06:28 pm</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$49.90</h6>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-danger-400 rounded-round btn-icon btn-sm legitRipple">
                                            <span class="letter-icon">A</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Alpha application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-spinner11 font-size-sm mr-1"></i> Renewal</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">04:52 pm</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$90.50</h6>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-indigo-400 rounded-round btn-icon btn-sm legitRipple">
                                            <span class="letter-icon">D</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Delta application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-lifebuoy font-size-sm mr-1"></i> Support</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">01:26 pm</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$60.00</h6>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-success-400 rounded-round btn-icon btn-sm legitRipple">
                                            <span class="letter-icon">O</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Omega application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-lifebuoy font-size-sm mr-1"></i> Support</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">11:46 am</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$55.00</h6>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-danger-400 rounded-round btn-icon btn-sm legitRipple">
                                            <span class="letter-icon">A</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-default font-weight-semibold letter-icon-title">Alpha application</a>
                                        <div class="text-muted font-size-sm"><i class="icon-spinner11 font-size-sm mr-2"></i> Renewal</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted font-size-sm">10:29 am</span>
                            </td>
                            <td>
                                <h6 class="font-weight-semibold mb-0">$90.50</h6>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">

                <!-- Sales stats -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Sales statistics</h6>
                        <div class="header-elements">
                            <div class="multiselect-native-select">
                                <select class="form-control" id="select_date" data-fouc="">
                                    <option value="val1">June, 29 - July, 5</option>
                                    <option value="val2">June, 22 - June 28</option>
                                    <option value="val3" selected="">June, 15 - June, 21</option>
                                    <option value="val4">June, 8 - June, 14</option>
                                </select>
                                <div class="btn-group" style="width: 100%;">
                                    <div class="multiselect-container dropdown-menu dropdown-menu-right"><div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label"><input type="radio" value="val1"> June, 29 - July, 5<span class="form-check-control-indicator"></span></label></div><div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label"><input type="radio" value="val2"> June, 22 - June 28<span class="form-check-control-indicator"></span></label></div><div class="multiselect-item dropdown-item form-check active" tabindex="0"><label class="form-check-label"><input type="radio" value="val3"> June, 15 - June, 21<span class="form-check-control-indicator"></span></label></div><div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label"><input type="radio" value="val4"> June, 8 - June, 14<span class="form-check-control-indicator"></span></label></div></div></div></div>
                        </div>
                    </div>

                    <div class="card-body py-0">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="mb-3">
                                    <h5 class="font-weight-semibold mb-0">5,689</h5>
                                    <span class="text-muted font-size-sm">new orders</span>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <h5 class="font-weight-semibold mb-0">32,568</h5>
                                    <span class="text-muted font-size-sm">this month</span>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <h5 class="font-weight-semibold mb-0">$23,464</h5>
                                    <span class="text-muted font-size-sm">expected profit</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /sales stats -->

            </div>
        </div>
    </div>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">



        </div>
    </div>
    <!-- /page header -->


    <!-- Page content -->
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Main charts -->
                <div class="row">
                    <div class="col-xl-7">

                        <!-- Traffic sources -->

                        <!-- /traffic sources -->

                    </div>

                    <div class="col-xl-5">

                        <!-- Sales stats -->

                        <!-- /sales stats -->

                    </div>
                </div>
                <!-- /main charts -->


                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-xl-8">

                        <!-- Marketing campaigns -->

                        <!-- /marketing campaigns -->


                        <!-- Quick stats boxes -->
                        <div class="row">


                            <div class="col-lg-4">

                                <!-- Current server load -->

                                <!-- /current server load -->

                            </div>

                            <div class="col-lg-4">

                                <!-- Today's revenue -->

                                <!-- /today's revenue -->

                            </div>
                        </div>
                        <!-- /quick stats boxes -->


                        <!-- Support tickets -->

                        <!-- /support tickets -->


                        <!-- Latest posts -->

                        <!-- /latest posts -->

                    </div>

                    <div class="col-xl-4">

                        <!-- Progress counters -->
                        <div class="row">
                            <div class="col-sm-6">

                                <!-- Available hours -->

                                <!-- /available hours -->

                            </div>

                            <div class="col-sm-6">

                                <!-- Productivity goal -->

                                <!-- /productivity goal -->

                            </div>
                        </div>
                        <!-- /progress counters -->


                        <!-- Daily sales -->

                        <!-- /daily sales -->


                        <!-- My messages -->

                        <!-- /my messages -->


                        <!-- Daily financials -->

                        <!-- /daily financials -->

                    </div>
                </div>
                <!-- /dashboard content -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->


    @endsection
@section("css")
    @endsection

@section("js")

@endsection
