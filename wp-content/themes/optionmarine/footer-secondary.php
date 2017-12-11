<footer class="white-background">
    <div class="footer-secondary">
        <div class="row align-middle">
            <div class="columns small-12 medium-6">
                <nav class="footer-secondary__nav">
                    <li>
                        <a href="#">Subscribe</a>
                    </li>
                    <li>
                        <a href="#">Disclaimer</a>
                    </li>
                    <li>
                        <a href="#">About Us</a>
                    </li>
                    <li>
                        <a href="#">Sitemap</a>
                    </li>
                </nav>
            </div>
            <div class="columns small-12 medium-6 footer-secondary__social-list">
                <ul>
                    <li>
                        <a href="https://www.facebook.com/optionmarine/" target="_blank">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-youtube" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row align-middle">
            <div class="footer-secondary__copyright text-center columns small-12 medium-12">
                &copy;Copyright 2017 Option Marine
            </div>
        </div>
    </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcLrxc8hXGgGgt2nbCELdbkJNeXQDD1yE&callback=initMap">
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.menu').click(function () {
            $('ul').toggleClass('active');
        })
    });

    function initMap() {
        var uluru = {
            lat: -37.9088056,
            lng: 145.2441885
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: uluru,
            disableDefaultUI: true,
            scrollwheel: false,
            navigationControl: false,
            mapTypeControl: false,
            scaleControl: false,
            draggable: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP

        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });

    }
</script>
<?php wp_footer();?>
</body>

</html>
