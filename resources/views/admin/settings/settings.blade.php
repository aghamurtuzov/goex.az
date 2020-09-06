@extends("main.admin")
@section("content")
    <div class="page-content pt-4">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                <span class="font-weight-semibold">Main sidebar</span>
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">
                <div class="card card-sidebar-mobile">


                    <!-- User menu -->
                    <div class="sidebar-user bg-indigo-400">
                        <div class="card-body">
                            <div class="media ">
                                <h1 class="m-auto">Tənzimləmələr</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /user menu -->


                    <!-- Main navigation -->
                    <div class="card-body p-3">
                        <ul class="nav nav-tabs nav-sidebar" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active legitRipple" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="icon-headset"></i> Operator</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link legitRipple" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="icon-envelope"></i> Sms</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link legitRipple" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="icon-color-sampler"></i>
                                    Web Xidmətləri</a>
                            </li>
                        </ul>

                    </div>
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-xl-12">

                                <!-- Traffic sources -->
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h4>Operator</h4>

                                    </div>

                                    <div class="card-body" style="margin-bottom: -6px;">

                                        <fieldset class="content-group">
                                            <div class="form-group row">
                                                <label class="control-label col-lg-2">Qiymət strategiyası</label>
                                                <div class="col-lg-10">
                                                    <div class="form-check form-check-switchery">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input-switchery-primary" checked>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </fieldset>


                                    </div>

                                </div>
                                <!-- /traffic sources -->

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-xl-12">

                                <!-- Traffic sources -->
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h4>Sms</h4>

                                    </div>
                                    <form action="" method="post">
                                        <div class="card-body" style="margin-bottom: -6px;">
                                        <fieldset class="content-group">
                                            <div class="form-group row">
                                                <label class="control-label col-lg-2">Təsdiqlənmə mesajı</label>
                                                <div class="col-lg-10">
                                                    <textarea name="message" id="" cols="15" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>

                                        </fieldset>
                                        <fieldset class="content-group">
                                            <div class="form-group row">
                                                <label class="control-label col-lg-2">Çatdım mesajı</label>
                                                <div class="col-lg-10">
                                                    <textarea name="message" id="" cols="15" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <div class="text-right mt-4">
                                            <button type="submit" class="btn btn-primary">Yadda saxla</button>
                                        </div>

                                    </div>
                                    </form>
                                </div>
                                <!-- /traffic sources -->

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">
                            <div class="col-xl-12">

                                <!-- Traffic sources -->
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h4>Web services</h4>

                                    </div>
                                    <form action="">
                                        <div class="card-body" style="margin-bottom: -6px;">
                                            <fieldset class="content-group">
                                                <div class="form-group row">
                                                    <label class="control-label col-lg-2">Ön sifarişin sorğulama müddəti</label>
                                                    <div class="col-lg-10">
                                                        <input type="number" name="" value="10" class="form-control">
                                                    </div>
                                                </div>

                                            </fieldset>
                                            <fieldset class="content-group">
                                                <div class="form-group row">
                                                    <label class="control-label col-lg-2">Sifariş saniyəsi</label>
                                                    <div class="col-lg-10">
                                                        <input type="number" name="" value="20" class="form-control">
                                                    </div>
                                                </div>

                                            </fieldset>
                                            <fieldset class="content-group">
                                                <div class="form-group row">
                                                    <label class="control-label col-lg-2">Dövri sifarişin sorğulanma müddəti</label>
                                                    <div class="col-lg-10">
                                                        <input type="number" name="" value="5" class="form-control">
                                                    </div>
                                                </div>

                                            </fieldset>
                                            <fieldset class="content-group">
                                                <div class="form-group row">
                                                    <label class="control-label col-lg-2">Açıq sifarişin sorğulanma saniyəsi</label>
                                                    <div class="col-lg-10">
                                                        <input type="number" name="" value="7" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="content-group">
                                                <div class="form-group row">
                                                    <label class="control-label col-lg-2">Qiymət strategiyası</label>
                                                    <div class="col-lg-10">
                                                        <div class="form-check form-check-switchery">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input-switchery-primary" checked data-fouc>
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </fieldset>

                                            <div class="text-right mt-4">
                                                <button type="submit" class="btn btn-primary">Yadda saxla</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- /traffic sources -->

                            </div>
                        </div>
                    </div>
                </div>


                <!-- /main charts -->
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    @endsection
@section("css")
    @endsection
@section("js")

    @endsection
