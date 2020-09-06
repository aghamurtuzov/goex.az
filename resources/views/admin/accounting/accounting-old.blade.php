@extends("main.admin")
@section("content")
    <div class="container-fluid mt-3">
            <div class="row">

                <div class="content">

                    <!-- Basic columns -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Basic columns</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="columns_basic" _echarts_instance_="ec_1582007966493" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative;"><div style="position: relative; overflow: hidden; width: 999px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="999" height="400" style="position: absolute; left: 0px; top: 0px; width: 999px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(0, 0, 0, 0.75); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 13px / 20px Roboto, sans-serif; padding: 10px 15px; left: 149px; top: 248px;">Feb<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:10px;height:10px;background-color:#2ec7c9;"></span>Evaporation: 4.9<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:10px;height:10px;background-color:#b6a2de;"></span>Precipitation: 5.9</div></div>
                            </div>
                        </div>
                    </div>
                    <!-- /basic columns -->

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h5 class="card-title">Basic pie chart</h5>
                                    <div class="header-elements">
                                        <div class="list-icons">
                                            <a class="list-icons-item" data-action="collapse"></a>
                                            <a class="list-icons-item" data-action="reload"></a>
                                            <a class="list-icons-item" data-action="remove"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="chart-container">
                                        <div class="chart has-fixed-height" id="pie_basic" _echarts_instance_="ec_1582007847264" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative;"><div style="position: relative; overflow: hidden; width: 470px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="470" height="400" style="position: absolute; left: 0px; top: 0px; width: 470px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(0, 0, 0, 0.75); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 13px / 20px Roboto, sans-serif; padding: 10px 15px; left: 280px; top: 112px;">Browsers <br>IE: 335 (13.08%)</div></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h5 class="card-title">Basic donut chart</h5>
                                    <div class="header-elements">
                                        <div class="list-icons">
                                            <a class="list-icons-item" data-action="collapse"></a>
                                            <a class="list-icons-item" data-action="reload"></a>
                                            <a class="list-icons-item" data-action="remove"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="chart-container">
                                        <div class="chart has-fixed-height" id="pie_donut" _echarts_instance_="ec_1582007847265" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative;"><div style="position: relative; overflow: hidden; width: 470px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="470" height="400" style="position: absolute; left: 0px; top: 0px; width: 470px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h5 class="card-title">Pie chart timeline</h5>
                                    <div class="header-elements">
                                        <div class="list-icons">
                                            <a class="list-icons-item" data-action="collapse"></a>
                                            <a class="list-icons-item" data-action="reload"></a>
                                            <a class="list-icons-item" data-action="remove"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="chart-container">
                                        <div class="chart has-fixed-height" id="pie_timeline" _echarts_instance_="ec_1582007847271" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative;"><div style="position: relative; overflow: hidden; width: 470px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="470" height="400" style="position: absolute; left: 0px; top: 0px; width: 470px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(0, 0, 0, 0.75); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 13px / 20px Roboto, sans-serif; padding: 10px 15px; left: 184px; top: 219px;">Browser <br>IE9+: 736 (18.55%)</div></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h5 class="card-title">Reversed value axis</h5>
                                    <div class="header-elements">
                                        <div class="list-icons">
                                            <a class="list-icons-item" data-action="collapse"></a>
                                            <a class="list-icons-item" data-action="reload"></a>
                                            <a class="list-icons-item" data-action="remove"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="chart-container">
                                        <div class="chart has-fixed-height" id="area_reversed_axis" _echarts_instance_="ec_1582007837222" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative;"><div style="position: relative; overflow: hidden; width: 999px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="999" height="400" style="position: absolute; left: 0px; top: 0px; width: 999px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(0, 0, 0, 0.75); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 13px / 20px Roboto, sans-serif; padding: 10px 15px; left: 69px; top: 184px;">Monday<br>Flow: 100 (m^3/s)<br>Rainfall: 1 (mm)</div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

    </div>
    @endsection
@section("css")
    <script src="{{asset("/admin/assets/global_assets/js/plugins/visualization/echarts/echarts.min.js")}}"></script>
    <script src="{{asset("/admin/assets/global_assets/js/demo_pages/charts/echarts/columns_waterfalls.js")}}"></script>
    <script src="{{asset("/admin/assets/global_assets/js/demo_pages/charts/echarts/areas.js")}}"></script>
    <script src="{{asset("/admin/assets/global_assets/js/demo_pages/charts/echarts/pies_donuts.js")}}"></script>

    @endsection
@section("js")

    @endsection
