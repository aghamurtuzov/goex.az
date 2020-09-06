@extends("main.admin")
@section("content")

    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">
                <!-- Basic datatable -->
                <div class="card p-3">

                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Warehouse all</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>
                    <div class="container form-tabs">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" placeholder="Enter username">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select with placeholder</label>
                                    <select data-placeholder="Select a State..." class="form-control select select2-hidden-accessible" data-fouc="" tabindex="-1" aria-hidden="true">
                                        <option></option>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select with placeholder</label>
                                    <select data-placeholder="Select a State..." class="form-control select select2-hidden-accessible" data-fouc="" tabindex="-1" aria-hidden="true">
                                        <option></option>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone: </label>
                                    <input type="text" class="form-control" data-mask="(999) 99 999-99-99" placeholder="(994) 99 999-99-99">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date: </label>
                                    <input type="text" class="form-control" data-mask="99/99/9999" placeholder="99/99/9999">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date: </label>
                                    <input type="text" class="form-control" data-mask="99/99/9999" placeholder="99/99/9999">
                                </div>
                            </div>
                        </div>
                        <a href="{{url("/")}}/warehouse-add"><button class="btn btn-primary mt-4 mb-4">New Add</button></a>
                    </div>

                    <table class="table datatable-basic">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Job Title</th>
                            <th>DOB</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Marth</td>
                                <td><a href="#">Enright</a></td>
                                <td>Traffic Court Referee</td>
                                <td>22 Jun 1972</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{url("/")}}/warehouse-edit" class="dropdown-item" ><i class="icon-pencil5 mr-3 icon-2x"></i>Edit</a>
                                                <a href="#" class="dropdown-item"><i class="icon-trash-alt mr-3 icon-2x"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Marth</td>
                                <td><a href="#">Enright</a></td>
                                <td>Traffic Court Referee</td>
                                <td>22 Jun 1972</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{url("/")}}/warehouse-edit" class="dropdown-item" ><i class="icon-pencil5 mr-3 icon-2x"></i>Edit</a>
                                                <a href="#" class="dropdown-item"><i class="icon-trash-alt mr-3 icon-2x"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Marth</td>
                                <td><a href="#">Enright</a></td>
                                <td>Traffic Court Referee</td>
                                <td>22 Jun 1972</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{url("/")}}/warehouse-edit" class="dropdown-item" ><i class="icon-pencil5 mr-3 icon-2x"></i>Edit</a>
                                                <a href="#" class="dropdown-item"><i class="icon-trash-alt mr-3 icon-2x"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Marth</td>
                                <td><a href="#">Enright</a></td>
                                <td>Traffic Court Referee</td>
                                <td>22 Jun 1972</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{url("/")}}/warehouse-edit" class="dropdown-item" ><i class="icon-pencil5 mr-3 icon-2x"></i>Edit</a>
                                                <a href="#" class="dropdown-item"><i class="icon-trash-alt mr-3 icon-2x"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Marth</td>
                                <td><a href="#">Enright</a></td>
                                <td>Traffic Court Referee</td>
                                <td>22 Jun 1972</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{url("/")}}/warehouse-edit" class="dropdown-item" ><i class="icon-pencil5 mr-3 icon-2x"></i>Edit</a>
                                                <a href="#" class="dropdown-item"><i class="icon-trash-alt mr-3 icon-2x"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Marth</td>
                                <td><a href="#">Enright</a></td>
                                <td>Traffic Court Referee</td>
                                <td>22 Jun 1972</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{url("/")}}/warehouse-edit" class="dropdown-item" ><i class="icon-pencil5 mr-3 icon-2x"></i>Edit</a>
                                                <a href="#" class="dropdown-item"><i class="icon-trash-alt mr-3 icon-2x"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Marth</td>
                                <td><a href="#">Enright</a></td>
                                <td>Traffic Court Referee</td>
                                <td>22 Jun 1972</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{url("/")}}/warehouse-edit" class="dropdown-item" ><i class="icon-pencil5 mr-3 icon-2x"></i>Edit</a>
                                                <a href="#" class="dropdown-item"><i class="icon-trash-alt mr-3 icon-2x"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Marth</td>
                                <td><a href="#">Enright</a></td>
                                <td>Traffic Court Referee</td>
                                <td>22 Jun 1972</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{url("/")}}/warehouse-edit" class="dropdown-item" ><i class="icon-pencil5 mr-3 icon-2x"></i>Edit</a>
                                                <a href="#" class="dropdown-item"><i class="icon-trash-alt mr-3 icon-2x"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="datatable-footer">
                        <div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries
                        </div>
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_3_paginate">
                            <a class="paginate_button previous disabled" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" id="DataTables_Table_3_previous">←</a>
                            <span>
						<a class="paginate_button current" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0">1</a>
						<a class="paginate_button " aria-controls="DataTables_Table_3" data-dt-idx="2" tabindex="0">2</a>
					</span>
                            <a class="paginate_button next" aria-controls="DataTables_Table_3" data-dt-idx="3" tabindex="0" id="DataTables_Table_3_next">→</a>
                        </div>
                    </div>
                </div>
                <!-- /basic datatable -->

            </div>

        </div>
    </div>
    <!-- /table -->

    @endsection


@section("js")

    @endsection

@section("css")

    @endsection
