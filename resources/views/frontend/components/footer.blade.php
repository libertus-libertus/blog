@php
$footer = App\Models\Footer::find(1);
@endphp

<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Contact us</h5>
                        <h4 class="title">{{ $footer->number }}</h4>
                    </div>
                    <div class="footer__widget__text">
                        <p style="text-align: justify"><strong>{{ config('app.name') }}</strong> {{ $footer->description
                            }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Address</h5>
                        <h4 class="title">Indonesia</h4>
                    </div>
                    <div class="footer__widget__address">
                        <p>{{ $footer->address }}</p>
                        <a href="mailto:libert.jobs@gmail.com" class="mail">{{ $footer->email }}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Follow our social media</h5>
                        <h4 class="title">socially connect</h4>
                    </div>
                    <div class="footer__widget__social">
                        <ul class="footer__social__list">
                            <li><a target="_blank" href="{{ $footer->facebook }}"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li><a target="_blank" href="{{ $footer->tiktok }}"><i class="fab fa-telegram"></i></a></li>
                            <li><a target="_blank" href="https://youtube.com/libertus-lin"><i
                                        class="fab fa-youtube"></i></a></li>
                            <li><a target="_blank" href="{{ $footer->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li><a target="_blank" href="{{ $footer->instagram }}"><i class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrap">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>Copyright &copy <script>
                                document.write(new Date().getFullYear())
                            </script>, <a class="text-white" href="{{ $footer->copyright }}" target="_blank">{{
                                config('app.name') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>