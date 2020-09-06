<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Goex</title>

    <!-- Global stylesheets -->
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset("/admin/assets/login/css/icons/icomoon/styles.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("/admin/assets/login/css/bootstrap.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("/admin/assets/login/css/core.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("/admin/assets/login/css/components.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("/admin/assets/login/css/colors.css")}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{asset("/admin/assets/login/js/plugins/loaders/pace.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("/admin/assets/login/js/core/libraries/jquery.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("/admin/assets/login/js/core/libraries/bootstrap.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("/admin/assets/login/js/plugins/loaders/blockui.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("/admin/assets/login/js/plugins/ui/nicescroll.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("/admin/assets/login/js/plugins/ui/drilldown.js")}}"></script>
    <!-- /core JS files -->

    <script type="text/javascript" src="{{asset("/admin/assets/login/js/plugins/velocity/velocity.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("/admin/assets/login/js/plugins/velocity/velocity.ui.min.js")}}../"></script>

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{asset("/admin/assets/login/js/plugins/forms/validation/validate.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("/admin/assets/login/js/plugins/forms/styling/uniform.min.js")}}"></script>

    <script type="text/javascript" src="{{asset("/admin/assets/login/js/core/app.js")}}"></script>
    <script type="text/javascript" src="{{asset("/admin/assets/login/js/core/time.js")}}"></script>

    <script type="text/javascript" src="{{asset("/admin/assets/login/js/load/intro.js")}}"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container login-cover">
<script type="text/javascript">
    var days = [
        'Bazar',
        'Bazar ertəsi',
        'Çərşənbə axşamı',
        'Çərşənbə',
        'Cümə axşamı',
        'Cümə',
        'Şənbə'
    ];
    var months = [
        'Yanvar',
        'Fevral',
        'Mart',
        'Aprel',
        'May',
        'İyun',
        'İyul',
        'Avqust',
        'Sentyabr',
        'Oktyabr',
        'Noyabr',
        'Dekabr'
    ];
</script>
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Form with validation -->



            <form method="POST" action="{{ route('login') }}" accept-charset="utf-8">
                @csrf
                <div class="panel panel-body login-form">
                    <div class="thumb thumb-rounded">
                        <img src="http://otos.ru/assets/images/profile.svg" alt="">
                    </div>


                    <div class="form-group form-group-login has-feedback has-feedback-left">
                        <input type="email" name="email" id="identity" class="form-control input-xlg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Username" autocomplete="off" required="required"  />
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group form-group-login has-feedback has-feedback-left">
                        <input type="password" name="password" id="password" class="form-control input-xlg @error('password') is-invalid @enderror" name="password" required  placeholder="Password" autocomplete="off" required="required"  />
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember" style="color: white;font-size: 16px;">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="submit" name="submit" value="DAXIL OL"  class="btn btn-block btn-default" />



                </div>
            </form>             <!-- /form with validation -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
<div class="time">
    <h1 class="clock"></h1>
    <h2 class="date">Şənbə, 4 noyabr 2017</h2>
</div>

</body>
</html>

