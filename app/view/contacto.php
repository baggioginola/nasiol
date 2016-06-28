

<div id="container">
    <div id="scroll-down-target"></div> <!-- This is Flexslider scroll down button target -->




    <!-- Begin notifications -->
    <div id="notification-fixed">
        <div id="notification"></div>
    </div>
    <div style="clear:both;"></div>
    <!-- End notifications --> <style>

        /*---------------------(A)--------------------------*/
        #container{ border:0 !important; padding-top: 10px !important;}
        #container.contactcontent {
            margin-left: 20px;
            padding: 0 0 25px !important;
            width: 1140px;}
        #container{ min-height:0 !important;}
        .google-visualization-tooltip {
            border:solid 1px #fff!important;
            border-radius: 2px;
            background-color: white;
            position: absolute;
            font-size: 12px;
            padding: 0px;
            margin:0!important;height:20px;overflow:hidden;
        }
        .google-visualization-tooltip-item-list {
            list-style-type: none;
            margin: 0!important;
            padding: 0!important;
        }

        .google-visualization-tooltip-item:first-child {
            margin: 0!important;
        }
        .google-visualization-tooltip-item {
            margin: 0!important;
            padding: 0!important;
        }

        #regions_div path {
            stroke: #fff;
        }

    </style>

    <div id="content"  class="contactcontent">  <div class="breadcrumb1 contactcontentbredcrumb">
            <a href="http://www.nasiol.com/">Home</a>
            &raquo; <a href="http://www.nasiol.com/contact">Contact Us</a>
        </div>

        <div class="contact-info">

            <div class="box1">
                <h2>Contact Us</h2>
                <div class="address-box">
                    <ul>
                        <li>
                            <div class="icon-box"><img src="<?php echo IMAGES; ?>con-home.png"></div>
                            <div class="text-box">
                                <span>ARTEKYA LTD</span><br>
                                Ikitelli OSB Heskop Industrial Plant M10-189  Istanbul/TURKEY <br />
                                <br>
                            </div>
                        </li>
                        <li> <div class="icon-box"><img src="<?php echo IMAGES; ?>conph.png"></div>
                            <div class="text-box">
                                +90 212 670 1395</br> +90 850 644 3755                                     </div>
                        </li>
                        <li>
                            <a href="mailto:info@nasiol.com"> <div class="icon-box"><img src="<?php echo IMAGES; ?>conmail.png"></div>
                                <div class="text-box">

                                    info@nasiol.com

                                </div></a>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="box2">
                <h2>Contact Form</h2>
                <div class="form-box">
                    <div class="inner-form">
                        <form action="http://www.nasiol.com/contact" enctype="multipart/form-data" method="post">

                            <div class="box-first">
                                <b>Name Surname:</b><br>
                                <input type="text" name="name" value="" />
                                <br />


                                <b>E-Mail Address:</b><br>
                                <input type="text" name="email" value="" />
                                <br />
                            </div>

                            <div class="box-sec">
                                <b>Enquiry:</b><br>
                                <textarea name="enquiry" cols="40" rows="10" style="width: 99%;"></textarea>
                                <br />
                            </div>

                            <div class="box-thr">
                                <b>Enter the code in the box below:</b><br>
                                <input type="text" name="captcha" value="" />
                                <div class="boxcaptcha">
                                    <div class="cap-box">
                                        <img src="index.php?route=information/contact/captcha" alt="" />
                                    </div>
                                    <div class="right">
                                        <!--<input type="submit" value="Continue" class="button" />-->
                                        <input type="submit" value="Send" class="button" />
                                    </div>

                                </div>
                                <br />

                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="map-box" id="map-box">

            <div class="exported-list">
                <h3>EXPORTED</h3>
                <a href="#" id="scroll-up"><img src="<?php echo IMAGES; ?>up-arrow.png"></a>
                <div class="scroll-name" id="scroll-name"> <ul>
                        <li><a href="#">Australia</a></li>
                        <li><a href="#">Austria</a></li>
                        <li><a href="#">Azerbaijan</a></li>
                        <li><a href="#">Belgium</a></li>
                        <li><a href="#">England</a></li>
                        <li><a href="#">Finland</a></li>
                        <li><a href="#">France</a></li>
                        <li><a href="#">South Africa</a></li>
                        <li><a href="#">Netherlands</a></li>
                        <li><a href="#">Ireland</a></li>
                        <li><a href="#">Spain</a></li>
                        <li><a href="#">Hong Kong</a></li>
                        <li><a href="#">Chile</a></li>
                        <li><a href="#">Sweden</a></li>
                        <li><a href="#">Canada</a></li>
                        <li><a href="#">Kazakhistan</a></li>
                        <li><a href="#">Lithuania</a></li>
                        <li><a href="#">Hungary</a></li>
                        <li><a href="#">Malaysia</a></li>
                        <li><a href="#">Mongolia</a></li>
                        <li><a href="#">Japan</a></li>
                        <li><a href="#">Singapore</a></li>
                        <li><a href="#">California</a></li>
                        <li><a href="#">Panama</a></li>
                        <li><a href="#">Colombia</a></li>
                        <li><a href="#">Sri Lanka</a></li>
                        <li><a href="#">Germany</a></li>
                        <li><a href="#">Maldivies</a></li>
                        <li><a href="#">Greece</a></li>
                        <li><a href="#">South Korea</a></li>
                        <li><a href="#">Maldivies</a></li>
                        <li><a href="#">United Kingdom</a></li>
                        <li><a href="#">Vietnam</a></li>
                        <li><a href="#">Thailand</a></li>
                        <li>Nigeria</li>
                        <li>Russia</li>
                        <li>New Zealand</li>
                        <li>Togo</li>
                        <li>Peru</li>
                        <li>Chile</li>
                    </ul>
                </div>
                <a href="#" id="scroll-down"><img src="<?php echo IMAGES; ?>down-arrow.png"></a>





                <div id="expcount" style="display:none;">40</div>
                <div id="discount" style="display:none;">21</div>

            </div>
            <div class="map-custom">

                <div style="position:absolute; top:55%; left:59.8%; z-index: 9999;"><a href="#" title="Turkey"><img src="<?php echo IMAGES; ?>small-logo.png" style="width: 15px;"></a></div>

                <div id="regions_div"></div>

            </div>

            <div class="exported-list1">

                <h3>DISTRIBUTORS</h3>
                <a href="#" id="scroll-up-dist"><img src="<?php echo IMAGES; ?>up-arrow.png"></a>
                <div class="dist-list scroll-name" id="scroll-name-dist">

                    <ul>
                        <li><a href="#">Bahrain</a></li>
                        <li><a href="#">Brazil</a></li>
                        <li><a href="#">China</a></li>
                        <li><a href="http://nasiolgulf.com/" target="_blank">Egypt</a></li>
                        <li><a href="http://nasiolgulf.com/" target="_blank">Kuwait</a></li>
                        <li><a href="http://nasiolgulf.com/" target="_blank">Oman</a></li>
                        <li><a href="http://nasiolgulf.com/" target="_blank">Qatar</a></li>
                        <li><a href="http://nasiolgulf.com/" target="_blank">Saudi Arabia </a></li>
                        <li><a href="http://nasiol.co.kr/" target="_blank">South Korea</a></li>
                        <li><a href="#">South Africa</a></li>
                        <li><a href="http://nasiolgulf.com/" target="_blank">UAE</a></li>
                        <li><a href="#">Sri Lanka</a></li>
                        <li><a href="#">Maldivies</a></li>
                        <li>Argentina</li>
                        <li>Mexico</li>
                        <li>Morocco</li>
                        <li>Thailand</li>
                    </ul>
                    <!-- Google Code for nasiol-cotact page Conversion Page --><script type="text/javascript">
                        /* <![CDATA[ */
                        var google_conversion_id = 964406326;
                        var google_conversion_language = "en";
                        var google_conversion_format = "3";
                        var google_conversion_color = "ffffff";
                        var google_conversion_label = "igk9CMiZ0lsQttjuywM";
                        var google_remarketing_only = false;
                        /* ]]> */
                    </script><script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
                    </script><noscript>
                        <div style="display:inline;">
                            <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/964406326/?label=igk9CMiZ0lsQttjuywM&amp;guid=ON&amp;script=0"/>
                        </div>
                    </noscript>
                </div>
                <a href="#" id="scroll-down-dist"><img src="<?php echo IMAGES; ?>down-arrow.png"></a>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <div class="map-iframe">
        <h3>LOCATION</h3>
    </div>

    <script type="text/javascript" src="<?php echo JS; ?>jsapi.js"></script>
    <script>
        var count;
        google.load('visualization', '1', {'packages': ['geochart']});
        google.setOnLoadCallback(drawMarkersMap);

        function drawMarkersMap() {
            var data = google.visualization.arrayToDataTable([["'Country'","'Population'"],["'Australia'",6],["'Austria'",6],["'Azerbaijcan'",6],["'Belgium'",6],["'England'",6],["'Finland'",6],["'France'",6],["'South Africa'",6],["'Holland'",6],["'Ireland'",6],[" 'United Kingdom'",6],["'Spain'",6],["'Sweden'",6],["'Canada'",6],["'Kazakhistan'",6],["'Lithuania'",6],["'Hungary'",6],["'Malaysia'",6],["'Mongolia'",6],["'Japan'",6],["'Chile'",6],["'United States of America'",6],["'Romania'",6],[" 'Germany'",6],["'Hong Kong'",6],[" 'Peru'",6],[" 'Panama'",6],[" 'Reunion'",6],[" 'Greece'",6],[" 'Cyprus'",6],[" 'Qatar'",6],[" 'Oman'",6],[" 'Nigeria'",6],[" 'New Zealand'",6],[" Switzerland",6],[" 'Philipinnes'",6],[" 'Netherlands'",6],[" 'Togo'",6],["&nbsp;",6],["'Bahreyn'",6],["'Avusturia'",6],[" 'Brazil'",6],["'China'",6],["'Egypt'",6],["'Kuveyt'",6],["'Oman'",6],["'Qatar'",6],["'Saudi Arabia'",6],["'South Korea'",6],["'Tunusia'",6],["'UAE'",6],["'South Africa'",6],["'Maldivies'",6],["'Sri Lanka'",6],[" 'Thailand'",6],[" 'Argentina'",6],[" 'Morocco'",6],[" 'Mexico'&nbsp;",6],["none",3],["Turkey",8]]);

            var options = {

                legend: 'none',
                backgroundColor: '#fff',
                datalessRegionColor: '#c6c8ca',
                displayMode: 'markers',
                tooltip: {isHtml: true},
                keepAspectRatio: false,
                width:890,
                height:420,
                colorAxis: {colors: ['#c6c8ca', '#1ab5e0', '#1ab5e0']}
            };

            var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
            var expcount = document.getElementById('expcount').innerHTML;
            var discount = document.getElementById('discount').innerHTML;
            google.visualization.events.addListener(chart, 'ready', function () {

                for(ecount = 0; ecount < expcount; ecount++){
                    createMarkerImage("img"+ecount, "<?php echo IMAGES; ?>last4.png");
                    document.getElementsByTagName('circle')[ecount].setAttribute("fill", "url(#img"+ecount+")");
                    document.getElementsByTagName('circle')[ecount].removeAttribute("stroke");
                }
                var abc = parseInt(expcount);
                var def = parseInt(abc)+parseInt(discount);
                for(dcount = abc; dcount < def; dcount++){
                    createMarkerImage("img"+dcount, "<?php echo IMAGES; ?>last4d.png");
                    document.getElementsByTagName('circle')[dcount].setAttribute("fill", "url(#img"+dcount+")");
                    document.getElementsByTagName('circle')[dcount].removeAttribute("stroke");

                }

            });
            chart.draw(data, options);
        };

        function createMarkerImage(id, url) {
            var patt = document.createElementNS('http://www.w3.org/2000/svg', 'pattern');
            patt.setAttribute('id', id);
            patt.setAttribute('width', '100%');
            patt.setAttribute('height', '100%');
            var image = document.createElementNS('http://www.w3.org/2000/svg', 'image');
            image.setAttributeNS('http://www.w3.org/1999/xlink', 'xlink:href', url);
            image.setAttribute('width', '30');
            image.setAttribute('height', '30');
            var defs = document.getElementsByTagName('defs')[0];
            patt.appendChild(image);
            defs.appendChild(patt);
        }
    </script>
    <style>
        #google-visualization-errors-all-1 {
            display: none !important;
        }
        #scroll-name{ overflow-y:scroll}
        #content{ position:relative;}
        #content{ position:relative;}
    </style>

    <script type="text/javascript">
        $( ".downarrowimg a" ).click(function() {
            $( ".exported-list" ).toggleClass( "exported-list-auto" );
        });
    </script>

    <div class="map-set">

        <div style="display: none;"><span>Welcome to ARTEKYA LTD</span></div>
        <div class="welcome-message"><p><iframe frameborder="0" height="360" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d752.0089167916066!2d28.794198999999978!3d41.06821300000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s41.068213%2C+28.794199!5e0!3m2!1str!2s!4v1425467711924" style="border:0" width="100%"></iframe></p>
        </div></div></div>

</div><!-- End container //-->