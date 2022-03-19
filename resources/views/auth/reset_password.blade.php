
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Log in</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">

<!-- iCheck -->
<link rel="stylesheet" href="{{asset('public/backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="{{asset('public/backend') }}/dist/css/adminlte.min.css">
<script nonce="fd583e82-c48f-4085-9e37-3e3e9fc831aa">(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
    <a href="{{ url('/') }}"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
        <ul class="text-red">
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>

        <div class="card-body login-card-body">
            <p class="login-box-msg">
                @if (session()->has('msg'))
                    <h4 class="text-danger">{{ session()->get('msg') }}</h4>
                @endif

            </p>
            <form action="{{ route('update.password') }}"  method="post">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" name="otp" class="form-control" value="{{ old('otp') }}" placeholder="OTP">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Update Passoword</button>
                    </div>

                </div>
            </form>



        </div>

    </div>
</div>


<!-- jQuery -->
<script src="{{asset('public/backend') }}/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('public/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('public/backend') }}/dist/js/adminlte.js"></script>
</body>
</html>

