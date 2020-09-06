@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
        <div class="row">

            <div class="content">
                <!-- Basic datatable -->
                <div class="card">

                    <div class="card-header header-elements-inline float-left">
                        <h5 class="card-title">Tarixcə</h5>
                        <div class="panel-body bg-indigo-400 text-center mr-auto ml-5 pt-2 pl-5 pr-5">
                            <h6>#1054447</h6>
                        </div>
                        <div class="header-elements">

                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>

                            </div>
                        </div>
                    </div>
                    <table class="table datatable-basic text-center">
                        <thead>
                        <tr>
                            <th>İstifadəçi</th>
                            <th>Status</th>
                            <th>Operator</th>
                            <th>Tarix</th>
                            <th>Müştəri</th>
                            <th>Tarif</th>
                            <th>Mənbəyi</th>
                            <th>Ünvan</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr>
                            <th>Mammadoff</th>
                            <th><span class="badge badge-success">Aktiv</span></th>
                            <th>Mehemmed</th>
                            <th>02.02.2020</th>
                            <th>Hacı</th>
                            <th>-</th>
                            <th>Trendyol</th>
                            <th>Türkiye, Istanbul. Bahçeli evler. 11</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /basic datatable -->

            </div>

        </div>
    </div>
    @endsection

@section("js")

    @endsection
@section("css")

    @endsection
