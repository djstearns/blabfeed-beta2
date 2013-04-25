<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php //echo $this->Html->image('/img/cake.power.gif'); ?>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->
	<title><?php echo $title_for_layout; ?> &raquo; <?php echo Configure::read('Site.title'); ?></title>
    <meta charset="utf-8">
	<?php
        //debug($this);
		echo $this->Layout->meta();
        echo $this->Layout->feed();
	?>
		<!--style sheet
<link rel="stylesheet" media="screen" href="css/bootstrap.css"/>
<link rel="stylesheet" media="screen" href="css/bootstrap-responsive.css"/>
<link rel="stylesheet" media="screen" href="css/style.css"/>-->
	<?php
        echo $this->Html->css(array(
            /*
			'reset',
            '960',
            'theme',
			*/
		   'stylesheets/base',
		   'stylesheets/media.queries',
		   'stylesheets/tipsy',
		   'javascripts/fancybox/jquery.fancybox-1.3.4',
		   'http://fonts.googleapis.com/css?family=Nothing+You+Could+Do%7CQuicksand:400,700,300'
		
        ));
		?>
     
    <?php
        echo $this->Html->script(array(
		'javascripts/jquery-1.7.1.min.js',
		'javascripts/html5shiv.js',
		'javascripts/jquery.tipsy.js',
		'javascripts/fancybox/jquery.fancybox-1.3.4.pack.js',
		'javascripts/fancybox/jquery.easing-1.3.pack.js',
		'javascripts/jquery.touchSwipe.js',
		'javascripts/jquery.mobilemenu.js',
		'javascripts/jquery.infieldlabel.js',
		'javascripts/jquery.echoslider.js',
		'javascripts/fluidapp.js',
            /*
			'jquery/jquery.min',
            'jquery/jquery.hoverIntent.minified',
            'jquery/superfish',
            'jquery/supersubs',
            'theme',
			*/
        ));
        
    ?>
<!--flexslider scripts ends-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php 	echo $this->Layout->js();
			echo $scripts_for_layout; 
	?>
</head>
<body> <!-- Start Wrapper -->
    <div id="page_wrapper">
      <!-- Start Header -->
      <header>
        <div class="container">
          <!-- Start Social Icons -->
          <aside>
            <?php echo $this->Layout->blocks('iconarea'); ?>
          </aside>
          <!-- End Social Icons -->
          <!-- Start Navigation -->
          <nav>
           
              <?php echo $this->Layout->menu('main'); ?>
              <?php echo $this->Layout->menu('second'); ?>
      
            <span class="arrow"></span> </nav>
          <!-- End Navigation --> </div>
      </header>
      <!-- End Header -->
      <section class="container">
        <!-- Start App Info -->
        <div id="app_info">
          	<?php echo $this->Layout->blocks('mainarea'); ?>
        </div>
        <!-- End App Info -->
        <!-- Start Pages -->
        <div id="pages">
          <div class="top_shadow"></div>
          <!-- Start Home -->
          <div id="home" class="page">
            <div id="slider">
              
              	<?php echo $this->Layout->blocks('mainslider'); ?>
              
            </div>
          </div>
           <?php 
			echo $this->Layout->sessionFlash();
			if($this->here != '/'){ 
				echo '<div id="'.str_replace('/','',$this->here).'" class="page">';
                	echo $content_for_layout;
				echo '</div>';
			}
			?>
          <!-- End Home -->
          <!-- Start Team -->
          <div id="team" class="page">
            <h1>Team</h1>
            <div class="about_us content_box">
              <div class="one_half">
                <h2>about us</h2>
                <p>we select location providers to receive our unique digital
                  media displays equipped with wifi and other goodies. we
                  syndicate content that anyone, anywhere can submit via our
                  website. born in 2012. cornfed in omaha, nebraska. backed by <a
                    href="http://www.hochunkinc.com"
                    target="new">ho-chunk,
                    inc.</a> </p>
              </div>
              <div class="one_half column_last"> <img src="images/about-main.png"
                  alt="">
              </div>
            </div>
            
           
            <div class="team_members">
              <div class="person one_half"> <img src="images/about-team_2.png"
                  alt="">
                <h3>keith fix</h3>
                <span>chief blab</span> <a href="http://www.keithfix.com">keithfix.com</a>
                <ul class="social">
                  <li class="facebook"><a href="http://facebook.com/fixkeith">facebook</a></li>
                  <li class="twitter"><a href="http://www.twitter.com/keithfix">twitter</a></li>
                  <li class="dribbble"><a href="http://www.linkedin.com/in/keithfix">linkedin</a></li>
                </ul>
              </div>
              <div class="person one_half column_last"> <img src="images/about-team_1.png"
                  alt="">
                <h3>derek stearns</h3>
                <span>chief ops blab</span> <a href="http://www.derekstearns.com">derekstearns.com/</a>
                <ul class="social">
                  <li class="facebook"><a href="https://www.facebook.com/derek.stearns">facebook</a></li>
                  <li class="twitter"><a href="http://www.twitter.com/djstearns">twitter</a></li>
                  <li class="dribbble"><a href="http://www.linkedin.com/in/derekstearns">linkedin</a></li>
                </ul>
              </div>
              <!-- <div class="person one_half"> <img src="images/about-team_3.png"
                  alt="">                <h3><a href="mailto:work@blabfeed.com">now hiring</a></h3>                <span>cio</span> <a href="#">http://blabfeed.com</a>                <ul class="social">                  <li class="facebook"><a href="http://www.facebook.com/blabfeed">facebook</a></li>                  <li class="twitter"><a href="">twitter</a></li>                  <li class="dribbble"><a href="">dribbble</a></li>                </ul>              </div> -->
              <!-- <div class="person one_half column_last"> <img src="images/about-team_4.png"
                  alt="">                <h3><a href="mailto:work@blabfeed.com">now hiring</a></h3>                <span>account executive</span> <a href="#">http://blabfeed.com</a>                <ul class="social">                  <li class="facebook"><a href="http://www.facebook.com/blabfeed">facebook</a></li>                  <li class="twitter"><a href="">twitter</a></li>                  <li class="dribbble"><a href="">dribbble</a></li>                </ul>              </div> -->
            </div>
          </div>
          <!-- End Team -->
          <!-- Start Features -->
          <div id="features" class="page">
            <h1>Features</h1>
            <div class="feature_list content_box">
              <div class="one_half">
                <h2 class="icon chart">get analytics.</h2>
                <p>access impression reporting with the ability to gauge impact
                  on in-store and online initiatives.</p>
              </div>
              <div class="one_half column_last">
                <h2 class="icon cart">influence shopping.</h2>
                <p>steer consumers towards purchasing target products or
                  services promoted on your digital bulletin board.</p>
              </div>
              <div class="one_half">
                <h2 class="icon pencil">sign them up.</h2>
                <p>leverage your storefront to encourage engagement via email,
                  facebook, twitter and other social media.</p>
              </div>
              <div class="one_half column_last">
                <h2 class="icon graph">increase traffic.</h2>
                <p>when you host a board, your message is syndicated across our
                  network at a minimum of 3 non-competing locations.</p>
              </div>
              <div class="one_half">
                <h2 class="icon briefcase">professional image.</h2>
                <p>content is professionally produced to maximize results and
                  boost your image. </p>
              </div>
              <div class="one_half column_last">
                <h2 class="icon help">world class support.</h2>
                <p>we provide installation, update, and ongoing support when you
                  host a board - at no additional cost.</p>
              </div>
            </div>
          </div>
          <!-- End Features -->
          <!-- Start Screenshots -->
          <div id="screenshots" class="page">
            <h1>Blabs</h1>
            <p>so what do people blab about on blabfeed? everything from
              products, services, ideas, events, announcements, reminders, and
              more! check out some of the sample blab posts below.</p>
            <div class="screenshot_grid content_box">
              <div class="one_third"> <a href="images/screenshots/screen_1.jpg"
                  class="fancybox"
                  rel="group"
                  title="Screenshot 1"><img
                    src="images/screenshots/screen_1.jpg"
                    alt=""></a>
              </div>
              <div class="one_third"> <a href="images/screenshots/screen_2.jpg"
                  class="fancybox"
                  rel="group"
                  title="Screenshot 2"><img
                    src="images/screenshots/screen_2.jpg"
                    alt=""></a>
              </div>
              <div class="one_third column_last"> <a href="images/screenshots/screen_3.jpg"
                  class="fancybox"
                  rel="group"
                  title="Screenshot 3"><img
                    src="images/screenshots/screen_3.jpg"
                    alt=""></a>
              </div>
              <div class="one_third"> <a href="images/screenshots/screen_4.jpg"
                  class="fancybox"
                  rel="group"
                  title="Screenshot 4"><img
                    src="images/screenshots/screen_4.jpg"
                    alt=""></a>
              </div>
              <div class="one_third"> <a href="images/screenshots/screen_5.jpg"
                  class="fancybox"
                  rel="group"
                  title="Screenshot 5"><img
                    src="images/screenshots/screen_5.jpg"
                    alt=""></a>
              </div>
              <div class="one_third column_last"> <a href="images/screenshots/screen_6.jpg"
                  class="fancybox"
                  rel="group"
                  title="Screenshot 6"><img
                    src="images/screenshots/screen_6.jpg"
                    alt=""></a>
              </div>
              <div class="one_third"> <a href="images/screenshots/screen_7.jpg"
                  class="fancybox"
                  rel="group"
                  title="Screenshot 7"><img
                    src="images/screenshots/screen_7.jpg"
                    alt=""></a>
              </div>
              <div class="one_third"> <a href="images/screenshots/screen_8.jpg"
                  class="fancybox"
                  rel="group"
                  title="Screenshot 8"><img
                    src="images/screenshots/screen_8.jpg"
                    alt=""></a>
              </div>
              <div class="one_third column_last"> <a href="images/screenshots/screen_9.jpg"
                  class="fancybox"
                  rel="group"
                  title="Screenshot 9"><img
                    src="images/screenshots/screen_9.jpg"
                    alt=""></a>
              </div>
            </div>
          </div>
          <!-- End Screenshots -->
          <!-- Start Press -->
          <div id="press" class="page">
            <h1>Press</h1>
            <div class="press_mentions">
              <ul>
                <li>
                  <div class="logo"> <img src="images/light-press1.jpg" alt="">
                  </div>
                  <div class="details">
                    <p>"Ingenious and simple."</p>
                    <address> Emily Nohr <a href="http://www.omaha.com/article/20120815/MONEY/708159924/1697">http://omaha.com
                        →</a> </address>
                  </div>
                </li>
                <li>
                  <div class="logo"> <img src="images/light-press2.jpg" alt="">
                  </div>
                  <div class="details">
                    <p>"BlabFeed is a unique device, smaller than a credit card,
                      that will instantly convert any television into a wireless
                      digital billboard."</p>
                    <address> Michael Luchies <a href="http://voices.yahoo.com/turning-waiting-room-experience-into-six-figure-11789705.html">http://yahoo.com
                        →</a> </address>
                  </div>
                </li>
                <li>
                  <div class="logo"> <img src="images/light-press3.jpg" alt="">
                  </div>
                  <div class="details">
                    <p>"The opportunity for one business to reach a captive
                      audience in another business is what really drives
                      BlabFeed."</p>
                    <address> Michael Stacy <a href="http://www.siliconprairienews.com/2012/08/student-startup-blabfeed-aims-to-make-waits-worthwhile-with-ads">http://siliconprairienews.com
                        →</a> </address>
                  </div>
                </li>
                <li>
                  <div class="logo"> <img src="images/light-press4.jpg" alt="">
                  </div>
                  <div class="details">
                    <p>"Anytime you find yourself in a waiting area (doctor's
                      office, coffee shop line, grocery story line, etc.) make
                      sure to tell them about how BlabFeed can make your
                      experience less wait, and more blab."</p>
                    <address> 1 Million Cups, Kauffman Foundation <a href="http://www.entrepreneurship.org/en/Kauffman-Labs/1-Million-Cups/Alumni/BlabFeed.aspx">http://entrepreneurship.org
                        →</a> </address>
                  </div>
                </li>
                <li>
                  <!-- <div class="logo"> <img src="images/light-press.png" alt="">
                  </div>                  <div class="details">                    <p>"Maecenas faucibus mollis interdum."</p>                    <address> Jane Doe <a href="#">http://website.com →</a> </address>                  </div> -->
                  <br>
                </li>
              </ul>
            </div>
          </div>
          <!-- End Press -->
          <!-- Start Start Contact -->
          <div id="contact" class="page">
            <h1>Contact</h1>
            <p>for general questions or press inquires please fill out the form
              below. for support, please <a href="http://blabfeed.com/boxbill/index.php/"
                target="new">login</a>
              and submit a ticket. to speak to a live person, call us at
              1.877.330.3575. our hq is located at 6708 pine street, omaha, ne
              68182. </p>
            <div id="contact_form">
              <div class="validation">
                <p>oops! please correct the highlighted fields...</p>
              </div>
              <div class="success">
                <p>thanks! we'll get back to you shortly.</p>
              </div>
              <form action="javascript:;" method="post">
                <div class="row">
                  <p class="left"> <label for="name">name*</label> <input name="name"
                      id="name"
                      value=""
                      type="text">
                  </p>
                  <p class="right"> <label for="email">email*</label> <input name="email"
                      id="email"
                      value=""
                      type="text">
                  </p>
                </div>
                <div class="row">
                  <p class="left"> <label for="website">website</label> <input
                      name="website"
                      id="website"
                      value=""
                      type="text">
                  </p>
                  <p class="right"> <label for="subject">subject</label> <input
                      name="subject"
                      id="subject"
                      value=""
                      type="text">
                  </p>
                </div>
                <p> <label for="message" class="textarea">message</label> <textarea
                    class="text"
                    name="message"
                    id="message"></textarea>
                </p>
                <input class="button white" value="Send →" type="submit"> </form>
            </div>
          </div>
          <!-- End Start Contact -->
          <!-- Start Privacy -->
          <div id="privacy" class="page">
            <h1>Privacy</h1>
            <div> <br>
              This Privacy Policy applies to the main Site as well as related
              consultant Sites accessed at www.blabfeed.com.
              <br>
              We are committed to protecting your privacy and using any personal
              information you provide responsibly. We believe it is important
              for you to understand what information we collect from you, how it
              is used and who will have access to that information.
              <br>
              Information Collected The information we receive depends on what
              you do when you visit our Sites. We do not collect or retain any
              personal information unless you choose to provide it to us. When
              you visit our Site, Tastefully Simple, Inc. collects and stores
              non-personally identifiable information such as: the name of the
              domain from which you access the Internet, the date and time you
              access our Site, and the Internet address of the website from
              which you linked to our Site.
              <br>
              BlabFeed may also use your information if you opt to receive
              information about BlabFeed, hosting a board, becoming a
              consultant, or purchasing or inquiring about BlabFeed products. We
              use this information to track the number of visitors to the
              different pages of our Site as well as make our Site more
              convenient to users.
              <br>
              If you contact us, submit ideas to us or request to be contacted
              by a Consultant, we collect the information that you provide,
              which may include name, email address, postal address and
              telephone number. When you make a purchase from our website, your
              credit card information is collected and stored only for the
              duration of the sale, unless you ask to have the information
              stored indefinitely. In addition, when you make a purchase from
              our website, your billing and shipping information may be used to
              provide you with additional product information and offers unless
              you request not to receive such information.
              <br>
              <br>
              Information Disclosure We may disclose your personal information
              for the following purposes:
              <br>
              To our subcontractors to provide services to you; To organizations
              that perform services for us or on our behalf, including, without
              limitation, to provide customer service; process credit cards;
              conduct research, marketing or data processing; or to provide
              marketing and promotional services on our behalf, to the extent
              that information is necessary to provide services to us; To
              protect the Site and our rights; to protect ourselves against
              liability or prevent fraudulent activity; or where it is necessary
              to permit us to pursue available remedies or limit any damages
              that we may sustain; In the event of or in connection with the
              sale, merger, spin-off or other corporate reorganization of our
              corporation, where the information is provided to the new
              controlling entity in regular course of business; If required to
              comply with a subpoena or warrant issued or an order made by a
              court, person or body with jurisdiction to compel the production
              of information, or to comply with the rules or court relating to
              the production of records; and If we believe in good faith that a
              law, regulation, rule or guideline requires it.
              <br>
              Data Security To prevent unauthorized use, maintain data accuracy
              and ensure the appropriate use of information, BlabFeed has put in
              place appropriate physical, electronic and administrative
              procedures to safeguard and secure information collected online.
              BlabFeed is working to meet or exceed the requirements for the 12
              Payment Card Industry (PCI) and Data Security Standards to ensure
              that any data you provide is secure.
              <br>
              Changes to Privacy Policy We may change or supplement this Privacy
              Policy from time to time and we will post revised versions of this
              Policy on the Site. Privacy Policy changes will apply to the
              information collected from the date we post the revised Privacy
              Policy to the Site, as well as to existing information held by us.
              <br>
              <br>
              California Privacy Rights
              <br>
              California residents have the right to request the following
              information from businesses with whom they have an established
              business relationship:
              <br>
              a list of the categories of personal information that a business
              has disclosed to third parties during the immediately preceding
              calendar year for the third parties' direct marketing purposes if
              any, and the names and addresses of all such third parties if any.
              BlabFeed and/or your consultant will collect your address and zip
              code to facilitate shipping any products you choose to order.
              Collection of such information is necessary to complete your
              order.
              <br>
              If you are a BlabFeed client and a California resident, please
              contact us at the postal address below to request this
              information. Please note that we are only required to respond to
              each client once per calendar year.
              <br>
              <br>
              Contact Information All questions and concerns about your privacy
              can be sent to Privacy@blabfeed.com or <br>
              6708 Pine Street, <br>
              Attn: BlabFeed Privacy Policy Rights, <br>
              Omaha, NE 68182.
              <br>
              Effective Date: February 2011 </div>
          </div>
          <!-- End Privacy -->
          <!-- Start Terms -->
          <div id="terms" class="page">
            <h1>Terms</h1>
            <div> BlabFeed Advertising Program Terms These BlabFeed Advertising
              Program Terms ("Terms") are entered into by, as applicable, the
              customer signing these Terms or any document that references these
              Terms or that accepts these Terms electronically ("Customer") and
              BlabFeed ("BlabFeed"). These Terms govern Customer's participation
              in BlabFeed's advertising program(s) ("Program") and, as
              applicable, any insertion orders or service agreements ("IO")
              executed by and between the parties and/or Customer's online
              management of any advertising campaigns. These Terms and any
              applicable IO are collectively referred to as the "Agreement."
              BlabFeed and Customer hereby agree and acknowledge:
              <br>
              <br>
              1 Policies. Program use is subject to all applicable BlabFeed and
              Partner policies, including without limitation the Editorial
              Guidelines (BlabFeed.com/select/guidelines.html), BlabFeed Privacy
              Policy (www.BlabFeed.com/privacy.html) and Trademark Guidelines
              (www.BlabFeed.com/permissions/guidelines.html), and BlabFeed and
              Partner ad specification requirements (collectively, "Policies").
              Policies may be modified at any time. Customer shall direct only
              to BlabFeed communications regarding Customer ads on Partner
              Properties. Some Program features are identified as "Beta," "Ad
              Experiment," or otherwise unsupported ("Beta Features"). To the
              fullest extent permitted by law, Beta Features are provided "as
              is" and at Customer's option and risk. Customer shall not disclose
              to any third party any information from Beta Features, existence
              of non-public Beta Features or access to Beta Features. BlabFeed
              may modify ads to comply with any Policies.
              <br>
              <br>
              2 The Program. Customer is solely responsible for all: (a) ad
              targeting options (collectively "Targets") and all ad content, ad
              information, and ad URLs ("Creative"), whether generated by or for
              Customer; and (b) web sites, services and landing pages which
              Creative links or directs viewers to, and advertised services and
              products (collectively "Services"). Customer shall protect any
              Customer passwords and takes full responsibility for Customer's
              own, and third party, use of any Customer accounts. Customer
              understands and agrees that ads may be placed on (y) any content
              or property provided by BlabFeed ("BlabFeed Property"), and,
              unless Customer opts out of such placement in the manner specified
              by BlabFeed, (z) any other content or property provided by a third
              party ("Partner") upon which BlabFeed places ads ("Partner
              Property"). Customer authorizes and consents to all such
              placements. With respect to advertising, BlabFeed may send
              Customer an email notifying Customer it has 72 hours
              ("Modification Period") to modify settings as posted. The account
              (as modified by Customer, or if not modified, as initially posted)
              is deemed approved by Customer in all respects after the
              Modification Period. Customer agrees that all placements of
              Customer's ads shall conclusively be deemed to have been approved
              by Customer unless Customer produces contemporaneous documentary
              evidence showing that Customer disapproved such placements in the
              manner specified by BlabFeed. With respect to all other
              advertising, Customer must provide BlabFeed with all relevant
              Creative by the due date set forth in that Program's applicable
              frequently asked questions at www.BlabFeed.com ("FAQ") or as
              otherwise communicated by BlabFeed. Customer grants BlabFeed
              permission to utilize an automated software program to retrieve
              and analyze websites associated with the Services for ad quality
              and serving purposes, unless Customer specifically opts out of the
              evaluation in a manner specified by BlabFeed. BlabFeed may modify
              any of its Programs at any time without liability. BlabFeed also
              may modify these Terms at any time without liability, and
              Customer's use of the Program after notice that these Terms have
              changed constitutes Customer's acceptance of the new Terms.
              BlabFeed or Partners may reject or remove any ad or Target for any
              or no reason.
              <br>
              <br>
              3 Cancellation. Customer may cancel advertising online through
              Customer's account if online cancellation functionality is
              available, or, if not available, with prior written notice to
              BlabFeed, including without limitation electronic mail. BlabFeed
              advertising cancelled online will cease serving shortly after
              cancellation. The cancellation of all other advertising may be
              subject to Program policies or BlabFeed's ability to re-schedule
              reserved inventory or cancel ads already in production. Cancelled
              ads may be published despite cancellation if cancellation of those
              ads occurs after any applicable commitment date as set forth in
              advance by the Partner or BlabFeed, in which case Customer must
              pay for those ads. BlabFeed may cancel immediately any IO, any of
              its Programs, or these Terms at any time with notice, in which
              case Customer will be responsible for any ads already run.
              Sections 1, 2, 3, 5, 6, 7, 8, and 9 will survive any expiration or
              termination of this Agreement.
              4 Prohibited Uses; License Grant; Representations and Warranties.
              Customer shall not, and shall not authorize any party to: (a)
              generate automated, fraudulent or otherwise invalid impressions,
              inquiries, conversions, clicks or other actions; (b) use any
              automated means or form of scraping or data extraction to access,
              query or otherwise collect BlabFeed advertising related
              information from any Program website or property except as
              expressly permitted by BlabFeed; or (c) advertise anything illegal
              or engage in any illegal or fraudulent business practice. Customer
              represents and warrants that it holds and hereby grants BlabFeed
              and Partners all rights (including without limitation any
              copyright, trademark, patent, publicity or other rights) in
              Creative, Services and Targets needed for BlabFeed and Partner to
              operate Programs (including without limitation any rights needed
              to host, cache, route, transmit, store, copy, modify, distribute,
              perform, display, reformat, excerpt, analyze, and create
              algorithms from and derivative works of Creative or Targets) in
              connection with this Agreement ("Use"). Customer represents and
              warrants that (y) all Customer information is complete, correct
              and current; and (z) any Use hereunder and Customer's Creative,
              Targets, and Customer's Services will not violate or encourage
              violation of any applicable laws, regulations, code of conduct, or
              third party rights (including without limitation intellectual
              property rights). Violation of the foregoing may result in
              immediate termination of this Agreement or customer's account
              without notice and may subject Customer to legal penalties and
              consequences. <br>
              <br>
              5 Disclaimer and Limitation of Liability. To the fullest extent
              permitted by law, BlabFeed DISCLAIMS ALL WARRANTIES, EXPRESS OR
              IMPLIED, INCLUDING WITHOUT LIMITATION FOR NONINFRINGEMENT,
              SATISFACTORY QUALITY, MERCHANTABILITY AND FITNESS FOR ANY PURPOSE.
              To the fullest extent permitted by law, BlabFeed disclaims all
              guarantees regarding positioning, levels, quality, or timing of:
              (i) costs per click; (ii) click through rates; (iii) availability
              and delivery of any impressions, Creative, or Targets on any
              Partner Property, BlabFeed Property, or section thereof; (iv)
              clicks; (v) conversions or other results for any ads or Targets;
              (vi) the accuracy of Partner data (e.g. reach, size of audience,
              demographics or other purported characteristics of audience); and
              (vii) the adjacency or placement of ads within a Program. Customer
              understands that third parties may generate impressions on
              Customer's ads for prohibited or improper purposes, and Customer
              accepts the risk of any such impressions and clicks. Customer's
              exclusive remedy, and BlabFeed's exclusive liability, for
              suspected invalid impressions or clicks is for Customer to make a
              claim for a refund in the form of advertising credits for BlabFeed
              Properties within the time period required under Section 7 below.
              Any refunds for suspected invalid impressions or clicks are within
              BlabFeed's sole discretion. EXCEPT FOR INDEMNIFICATION AMOUNTS
              PAYABLE TO THIRD PARTIES HEREUNDER AND CUSTOMER'S BREACHES OF
              SECTION 1, TO THE FULLEST EXTENT PERMITTED BY LAW: (a) NEITHER
              PARTY WILL BE LIABLE FOR ANY CONSEQUENTIAL, SPECIAL, INDIRECT,
              EXEMPLARY, OR PUNITIVE DAMAGES (INCLUDING WITHOUT LIMITATION LOSS
              OF PROFITS, REVENUE, INTEREST, GOODWILL, LOSS OR CORRUPTION OF
              DATA OR FOR ANY LOSS OR INTERRUPTION TO CUSTOMER'S BUSINESS)
              WHETHER IN CONTRACT, TORT (INCLUDING WITHOUT LIMITATION
              NEGLIGENCE) OR ANY OTHER LEGAL THEORY, EVEN IF ADVISED OF THE
              POSSIBILITY OF SUCH DAMAGES AND NOTWITHSTANDING ANY FAILURE OF
              ESSENTIAL PURPOSE OF ANY LIMITED REMEDY; AND (b) EACH PARTY'S
              AGGREGATE LIABILITY TO THE OTHER IS LIMITED TO AMOUNTS PAID OR
              PAYABLE TO BlabFeed BY CUSTOMER FOR THE AD GIVING RISE TO THE
              CLAIM. Except for payment obligations, neither party is liable for
              failure or delay resulting from a condition beyond the reasonable
              control of the party, including without limitation to acts of God,
              government, terrorism, natural disaster, labor conditions and
              power failures.
              <br>
              <br>
              6 Agency. Customer represents and warrants that (a) it is
              authorized to act on behalf of and has bound to this Agreement any
              third party for which Customer advertises (a "Principal"), (b) as
              between Principal and Customer, the Principal owns any rights to
              Program information in connection with those ads, and (c) Customer
              shall not disclose Principal's Program information to any other
              party without Principal's consent. <br>
              <br>
              7 Payment. Customer shall be responsible for all charges up to the
              amount of each IO, or as set in an online account, and shall pay
              all charges in U.S. Dollars or in such other currency as agreed to
              in writing by the parties. Unless agreed to by the parties in
              writing, Customer shall pay all charges in accordance with the
              payment terms in the applicable IO or Program FAQ. Late payments
              bear interest at the rate of 1.5% per month (or the highest rate
              permitted by law, if less). Charges are exclusive of taxes.
              Customer is responsible for paying (y) all taxes, government
              charges, and (z) reasonable expenses and attorneys fees BlabFeed
              incurs collecting late amounts. To the fullest extent permitted by
              law, Customer waives all claims relating to charges (including
              without limitation any claims for charges based on suspected
              invalid clicks) unless claimed within 60 days after the charge
              (this does not affect Customer's credit card issuer rights).
              Charges are solely based on BlabFeed's measurements for the
              applicable Program, unless otherwise agreed to in writing. To the
              fullest extent permitted by law, refunds (if any) are at the
              discretion of BlabFeed and only in the form of advertising credit
              for only BlabFeed Properties. Nothing in these Terms or an IO may
              obligate BlabFeed to extend credit to any party. Customer
              acknowledges and agrees that any credit card and related billing
              and payment information that Customer provides to BlabFeed may be
              shared by BlabFeed with companies who work on BlabFeed's behalf,
              such as payment processors and/or credit agencies, solely for the
              purposes of checking credit, effecting payment to BlabFeed and
              servicing Customer's account. BlabFeed may also provide
              information in response to valid legal process, such as subpoenas,
              search warrants and court orders, or to establish or exercise its
              legal rights or defend against legal claims. BlabFeed shall not be
              liable for any use or disclosure of such information by such third
              parties.
              <br>
              <br>
              8 Indemnification. Customer shall indemnify and defend BlabFeed,
              its Partners, agents, affiliates, and licensors from any third
              party claim or liability (collectively, "Liabilities"), arising
              out of Use, Customer's Program use, Targets, Creative and Services
              and breach of the Agreement. Partners shall be deemed third party
              beneficiaries of the above Partner indemnity.
              <br>
              <br>
              9 Miscellaneous. THE AGREEMENT MUST BE CONSTRUED AS IF BOTH
              PARTIES JOINTLY WROTE IT AND GOVERNED BY NEBRASKA LAW EXCEPT FOR
              ITS CONFLICTS OF LAWS PRINCIPLES. ALL CLAIMS ARISING OUT OF OR
              RELATING TO THIS AGREEMENT OR THE BLABFEED PROGRAM(S) SHALL BE
              LITIGATED EXCLUSIVELY IN THE FEDERAL OR STATE COURTS OF DOUGLAS
              COUNTY, NEBRASKA, USA, AND BlabFeed AND CUSTOMER CONSENT TO
              PERSONAL JURISDICTION IN THOSE COURTS. The Agreement constitutes
              the entire and exclusive agreement between the parties with
              respect to the subject matter hereof, and supersedes and replaces
              any other agreements, terms and conditions applicable to the
              subject matter hereof. No statements or promises have been relied
              upon in entering into this Agreement except as expressly set forth
              herein, and any conflicting or additional terms contained in any
              other documents (e.g. reference to a purchase order number) or
              oral discussions are void. Each party shall not disclose the terms
              or conditions of these Terms to any third party, except to its
              professional advisors under a strict duty of confidentiality or as
              necessary to comply with a government law, rule or regulation.
              Customer may grant approvals, permissions, extensions and consents
              by email, but any modifications by Customer to the Agreement must
              be made in a writing executed by both parties. Any notices to
              BlabFeed must be sent to BlabFeed, Advertising Programs, 6708 Pine
              Street MH303-BLAB Omaha, Nebraska, USA, with a copy to Legal
              Department, via confirmed facsimile, with a copy sent via first
              class or air mail or overnight courier, and are deemed given upon
              receipt. A waiver of any default is not a waiver of any subsequent
              default. Unenforceable provisions will be modified to reflect the
              parties' intention and only to the extent necessary to make them
              enforceable, and remaining provisions of the Agreement will remain
              in full effect. Customer may not assign any of its rights
              hereunder and any such attempt is void. BlabFeed and Customer and
              BlabFeed and Partners are not legal partners or agents, but are
              independent contractors. In the event that these Terms or a
              Program expire or is terminated, BlabFeed shall not be obligated
              to return any materials to Customer. Notice to Customer may be
              effected by sending an email to the email address specified in
              Customer's account, or by posting a message to Customer's account
              interface, and is deemed received when sent (for email) or no more
              than 15 days after having been posted (for messages in Customer's
              BlabFeed interface).
              <br>
              <br>
              August 1, 2012 </div>
          </div>
          <!-- End Terms -->
          
          
          <!-- Start Signup -->
          <div id="updates" class="page"> <b>
              <h1>Manage your Digital Signage Inventory</h1>
            </b> <b>
              <h2>Easy monthly pricing. No setup fee. $0 first month.</h2>
            </b>
            <div style="height:600px;">
            <!--
              <div style="float:left; position:absolute;"> <img src="pricing.jpg">
              </div>
              <div style="float:left; position:absolute; margin-top:102px; margin-left:40px;">
                <a href="#contact"><img src="http://www.blabfeed.com/images/invisible.png"></a>
              </div>
              <div style="float:left; position:absolute; margin-top:163px; margin-left:202px; width:450px;">
                <ul class="buttonrow" style="list-style:none;">
                  <li><a href="https://blabfeed.chargify.com/h/2974615/subscriptions/new"
                      class="button green"
                      target="new">Sign
                      up!</a> </li>
                  <li><a href="https://blabfeed.chargify.com/h/2974614/subscriptions/new"
                      class="button green"
                      target="new">Sign
                      up!</a> </li>
                  <li><a href="https://blabfeed.chargify.com/h/2974613/subscriptions/new"
                      class="button green"
                      target="new">Sign
                      up!</a> </li>
                  <li><a href="https://blabfeed.chargify.com/h/2974612/subscriptions/new"
                      class="button green"
                      target="new">Sign
                      up!</a> </li>
                </ul>
              </div>
            </div>
            <div style="clear:both"></div>
          </div>-->
          <iframe src="http://erp.blabfeed.com/register" width="350px" height="450px" style="border:none;"></iframe>
        </div>
        <!-- End Signup -->
        <div class="bottom_shadow"></div>
      </section>
    </div>
    <!-- End Pages -->
    <div class="clear"></div>
    <!-- Start Footer -->
    <footer class="container">
    	<?php echo $this->Layout->blocks('footer'); ?>
      
    </footer>
    <!-- End Footer -->
    <!-- End Wrapper -->
  </body>
</html>