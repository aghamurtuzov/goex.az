@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">
                <!-- Basic datatable -->
                <div class="card">

                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Basic datatable</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>
                    <div class="datatable-header">
                        <div id="DataTables_Table_3_filter" class="dataTables_filter">
                            <label>
                                <span>Filter:</span>
                                <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_3">
                            </label>
                        </div>
                        <div class="dataTables_length" >
                            <label>
                                <span>Show:</span>
                                <select name="DataTables_Table_3_length">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label>
                        </div>
                    </div>

                    <table class="table datatable-basic text-center">
                        <thead>
                        <tr>
                            <th>test1</th>
                            <th>test2</th>
                            <th>test3</th>
                            <th>test4</th>
                            <th>test5</th>
                            <th>test6</th>
                            <th>test7</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr>
                            <td>user1</td>
                            <td><a href="#">user2</a></td>
                            <td>user3</td>
                            <td>user4</td>
                            <td>user5</td>
                            <td>user6</td>
                            <td>user7</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="icon-pencil7"></i>Edit</a>
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
    @endsection

@section("css")

    @endsection
@section("js")

    @endsection
