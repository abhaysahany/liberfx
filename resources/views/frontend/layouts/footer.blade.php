<link rel="stylesheet" href="{{ asset('front_assets/style.css') }}?v={{ filemtime(public_path('front_assets/style.css')) }}">

<button class="chat-fab" id="chatToggle" type="button" aria-label="Open Liber AI chat" aria-expanded="false">
    <svg viewBox="0 0 24 24" aria-hidden="true">
        <path
            d="M4 5.5A3.5 3.5 0 0 1 7.5 2h9A3.5 3.5 0 0 1 20 5.5v7A3.5 3.5 0 0 1 16.5 16h-5.1l-4.6 4.1A1.1 1.1 0 0 1 5 19.3V16.2A3.5 3.5 0 0 1 4 13.8z" />
    </svg>
</button>

<aside class="chat-card" id="chatCard" aria-label="Liber AI chatbot" aria-hidden="true" data-api-base="{{ config('services.chatbot.url', '') }}">
    <header class="chat-header">
        <div>
            <p>{{ config('detailsApp.name') }} AI</p>
            <span id="chatStatus">Connecting to assistant...</span>
        </div>
        <button id="chatClose" type="button" aria-label="Close chat">&times;</button>
    </header>

    <div class="messages" id="messages">
        <article class="message assistant">
            <div class="message-meta">
                <span class="message-avatar">AI</span>
                <span class="message-label">Liber Assistant</span>
            </div>
            <div class="message-body">
                <p>Hello! I can help you understand Liber FX and the information in our available guide.</p>
            </div>
        </article>
    </div>

    <div class="chat-suggestions">
        <button class="chat-chip" type="button" data-question="What services does Liber FX offer?">Our services</button>
        <button class="chat-chip" type="button" data-question="What risks should I know about trading?">Trading risks</button>
        <button class="chat-chip" type="button" data-question="Explain the available information simply.">Simple explanation</button>
    </div>

    <form class="chat-form" id="chatForm">
        <textarea id="questionInput" rows="2" placeholder="Ask Liber AI a question..." aria-label="Your question"></textarea>
        <button id="sendButton" type="submit" aria-label="Send question">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M3.7 20.3 21 12 3.7 3.7 3 10.3l10 1.7-10 1.7z" />
            </svg>
        </button>
    </form>
</aside>
<section class="twitter-holder section-bg-1">
    <div class="container-center">
        <h2>LIBER LTD - ANYTIME, ANYWHERE!</h2>
        <a href="{{ url('/') }}" class="twitter-icon"><i class="fa fa-thumbs-up"></i></a><!-- end twitter-icon -->
    </div><!-- container-center -->
</section>
<footer id="footer" class="content">
    <div class="footer-main container-center">
        <div class="col-row">
            <div class="one-fourth">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('logo/logo-w.png') }}" height="170px"
                            width="200px" alt="Liber" /></a>
                </div><!-- end logo -->
                <ul class="social-links-square-2 cf">
                    <li title="Facebook"><a href="javascipt:;"><i class="fa fa-facebook"></i></a></li>
                    <li title="Telegram"><a href="javascipt:;"><i class="fa fa-comments"></i></a></li>
                </ul>
            </div><!-- end  -->
            <div class="one-fourth cf">
                <div class="contact-info">
                    <h4>Contact Details</h4>
                    <strong>Phone:</strong> +44 167.793.8888<br />
                    <strong>E-mail:</strong><span class="__cf_email__"
                        data-cfemail="14676164647b666054787d767166727b66716c3a73787b767578"><span
                            style="color: #9f9f9f;">info@liberfx.com</span></span>
                    <br />
                    <strong>Registered office address:</strong>
                    <span class="__cf_email__" data-cfemail="14676164647b666054787d767166727b66716c3a73787b767578"
                        style="color: #9f9f9f;">67
                        Leonard Street,
                        London, London, United Kingdom, EC2A 4QS</span>
                    <br />
                    <br />
                    <strong>Website:</strong> <a href="#">https://liberfx.com</a>
                </div><!-- end contact-info -->
            </div><!-- end  -->
            <div class="one-fourth">
                <h4>Navigation</h4>
                <ul class="footer-links">
                    <li><i class="fa fa-angle-right"></i><a href="{{ url('/trading') }}">Trading settings</a>
                    </li>
                    <li><i class="fa fa-angle-right"></i><a href="{{ url('/course') }}">Courses</a></li>
                    <li><i class="fa fa-angle-right"></i><a href="{{ url('/about') }}">About</a></li>
                    <li><i class="fa fa-angle-right"></i><a href="{{ url('/member') }}">Login</a></li>
                    <li><i class="fa fa-angle-right"></i><a href="{{ url('/member/register/1') }}">Register</a></li>
                </ul>
            </div><!-- end  -->
            <div class="one-fourth">
                <h4>NOTIFICATION OF RISKS</h4>
                <p>
                    Financial products involving the use of leverage carry significant risks to your investments.
                </p>
            </div><!-- end  -->
        </div><!-- end col-row -->
    </div><!-- end footer-main -->
    <div class="footer-bottom container-center cf">
        <div class="bottom-left">
            <p class="copyright">Copyright &copy; 2024 Liberfx. All rights reserved</p>
        </div><!-- end bottom-left -->
    </div><!-- end footer-bottom -->
</footer>
<div class="scroll-top"><a href="#"><i class="fa fa-angle-up"></i></a></div>
<!--*************************
*							*
*      JAVASCRIPT FILES	 	*
*							*
************************* -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<!--imports jquery
    -->
<script data-cfasync="false"
    src="cdn-cgi/scripts/5c5dd728/cloudflare-{{ asset('front_assets/static/email-decode.min.js') }}"></script>
<script src="{{ asset('front_assets/static/js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('front_assets/static/js/jquery-migrate-1.1.0.min.js') }}"></script>
<!-- used for the contact form -->
<script src="{{ asset('front_assets/static/js/jquery.form.js') }}"></script>
<!-- used for the the fun facts counter -->
<script src="{{ asset('front_assets/static/js/jquery.countTo.js') }}"></script>
<!-- for displaying flickr images -->
<script src="{{ asset('front_assets/static/js/jflickrfeed.min.js') }}"></script>
<!-- used to trigger the animations on elements -->
<script src="{{ asset('front_assets/static/js/waypoints.min.js') }}"></script>
<!-- used to stick the navigation menu to top of the screen on smaller displays -->
<script src="{{ asset('front_assets/static/js/waypoints-sticky.min.js') }}"></script>
<!-- used for rotating through tweets -->
<script src="{{ asset('front_assets/static/js/vTicker.js') }}"></script>
<!-- imports jQuery UI, used for toggles, accordions, tabs and tooltips -->
<script src="{{ asset('front_assets/static/js/jquery-ui-1.10.3.custom.min.js') }}"></script>
<!-- used for smooth scrolling on local links -->
<script src="{{ asset('front_assets/static/js/jquery.scrollTo-1.4.3.1-min.js') }}"></script>
<!-- used for opening images in a Lightbox gallery -->
<script src="{{ asset('front_assets/static/js/nivo-lightbox.min.js') }}"></script>
<!-- used for displaying tweets -->
<script src="{{ asset('front_assets/static/js/jquery.tweet.js') }}"></script>
<!-- flexslider plugin, used for image galleries (blog post preview, portfolio single page) and carousels -->
<script src="{{ asset('front_assets/static/js/jquery.flexslider-min.js') }}"></script>
<!-- used for sorting portfolio items -->
<script src="{{ asset('front_assets/static/js/jquery.isotope.js') }}"></script>
<!-- for dropdown menus -->
<script src="{{ asset('front_assets/static/js/superfish.js') }}"></script>
<!-- for detecting Retina displays and loading images accordingly -->
<script src="{{ asset('front_assets/static/js/retina-1.1.0.min.js') }}"></script>
<!-- used for sharing post pages -->
<script src="{{ asset('front_assets/static/js/jquery_sharrre.min.js') }}"></script>
<!-- easing plugin for easing animation effects -->
<script src="{{ asset('front_assets/static/js/jquery-easing-1.3.js') }}"></script>
<!-- Slider Revolution plugin -->
<script src="{{ asset('front_assets/static/plugins/rs-plugin/js/jquery.themepunch_plugins.min.js') }}"></script>
<script src="{{ asset('front_assets/static/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<!--imports custom javascript code-->
<script src="{{ asset('front_assets/static/js/custom.js') }}"></script>
<script src="{{ asset('front_assets/script.js') }}?v={{ filemtime(public_path('front_assets/script.js')) }}"></script>
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
    _atrk_opts = {
        atrk_acct: "BnGcv1Fx9f207i",
        domain: "liberforex.global",
        dynamic: true
    };
    (function() {
        var as = document.createElement('script');
        as.type = 'text/javascript';
        as.async = true;
        as.src = "../certify-js.alexametrics.com/atrk.js";
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(as, s);
    })();
</script>
<noscript></noscript>
<!-- End Alexa Certify Javascript -->

</body>

</html>
