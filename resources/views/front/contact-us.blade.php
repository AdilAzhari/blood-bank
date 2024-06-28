<x-front.master bodyClass="contact-us">

    <div class="contact-now">

        <div class="container">
                <x-breadcrumb :items="['Home', 'Contact us']" :routes="['/', '/contact-us']" />

            <div class="row methods">
                <div class="col-md-6">
                    <div class="call">
                        <div class="title">
                            <h4>Contact us</h4>
                        </div>
                        <div class="content">
                            <div class="logo">
                                <img src="{{ asset('front/imgs/logo-ltr.png') }}">
                            </div>
                            <div class="details">
                                <ul>
                                    <li><span>Telephone nomber:</span> {{ $Setting->phone_number }}</li>
                                    <li><span>Fax:</span> 234234234</li>
                                    <li><span>E-mail:</span> {{ $Setting->email }}</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>Contact us</h4>
                                <div class="icons" dir="ltr">
                                    <div class="out-icon">
                                        <a href="{{ $Setting->fb_link }}"><img src="{{ asset('front/imgs/001-facebook.svg')}}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $Setting->tw_link }}"><img src="{{ asset('front/imgs/002-twitter.svg')}}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="#"><img src="{{ asset('front/imgs/003-youtube.svg')}}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{ $Setting->insta_link }}"><img src="{{ asset('front/imgs/004-instagram.svg')}}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="#"><img src="{{ asset('front/imgs/005-whatsapp.svg')}}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="#"><img src="{{ asset('front/imgs/006-google-plus.svg')}}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="title">
                            <h4>Connect with us</h4>
                        </div>
                        <div class="fields">
                            <form>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name">
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail" name="email">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Telephone number" name="phone_number">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Message title" name="message_header">
                                <textarea placeholder="Text message" class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                                <button type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us End -->
</x-front.master>
