<?php
$Setting = \App\Models\Setting::first();
?>
<div class="footer">
    <div class="inside-footer">
        <div class="container">
            <div class="row">
                <div class="details col-md-4">
                    <img src="{{ asset('front/imgs/logo-ltr.png') }}">
                    <h4>Blood Bank</h4>
                    <p>
                        This text is an example of text that can be replaced in the same space, this text has been
                        generated from the Arabic text generator, where you can generate such text or many other.
                    </p>
                </div>
                <div class="pages col-md-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list"
                            href="index-ltr.html" role="tab" aria-controls="home">Home</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list"
                            href="{{ route('about') }}" role="tab" aria-controls="profile">About us</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list"
                            href="{{ route('articles') }}" role="tab" aria-controls="messages">Articles</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list"
                            href="{{ route('donation-request') }}" role="tab" aria-controls="settings">Donation
                            requests</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list"
                            href="{{ route('who-are-us') }}" role="tab" aria-controls="settings">Who are us</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list"
                            href="{{ route('contact-us') }}" role="tab" aria-controls="settings">Contact us</a>
                    </div>
                </div>
                <div class="stores col-md-4">
                    <div class="availabe">
                        <p>Available on</p>
                        <a href="#">
                            <img src="{{ asset('front/imgs/google1.png') }}">
                        </a>
                        <a href="#">
                            <img src="{{ asset('front/imgs/ios1.png') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="other">
        <div class="container">
            <div class="row">
                <div class="social col-md-4">
                    <div class="icons">
                        <a href="{{ $Setting->insta_link }}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $Setting->fb_link }}" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $Setting->tw_link }}" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="rights col-md-8">
                    <p>All rights reserved to <span>{{ config('app.name', 'Laravel') }}.</span> &copy;
                        {{ date('Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
