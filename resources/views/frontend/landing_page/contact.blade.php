@php
    $footer = App\Models\Footer::find(1);
@endphp

<section class="homeContact homeContact__style__two">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">07 - Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form</p>
                        <h2 class="mail"><a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form action="{{ route('store.message') }}" method="post">
                            @csrf
                            
                            <input type="text" name="username" placeholder="Username">
                            <input type="email" name="email" placeholder="E-Mail">
                            <input type="text" name="subject" placeholder="Subject">
                            <input type="number" name="phone" placeholder="Phone number">
                            <textarea name="message" placeholder="Type your message here"></textarea>
                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>