<?php
include('Config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Malik</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/fonts/simple-line-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="assets/css/about.css">

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
  <script type="text/javascript">
    (function() {
      emailjs.init('user_Si1vNgkO5T0KHv80OQII6');
    })();
  </script>
  <script type="text/javascript">
    window.onload = function() {
      document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault();
        this.contact_number.value = Math.random() * 100000 | 0;
        emailjs.sendForm('service_a2xisqe', 'template_3dsl76e', this)
          .then(function() {
            console.log('SUCCESS!');
            alert("Thank You, I'll Relpy ASAP")
          }, function(error) {
            console.log('FAILED...', error);
            alert("Sorry, I thought there was a bit of a problem")
          });
      });
    }
  </script>
</head>

<body>

  <header id="header-wrap">
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="icon-menu"></span>
            <span class="icon-menu"></span>
            <span class="icon-menu"></span>
          </button>
          <a href="index.php" class="navbar-brand"><img src="assets/img/LOGO TELKOM.png" alt="" height="40"></a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
          <ul class="onepage-nev navbar-nav mr-auto w-100 justify-content-end clearfix">
            <?php if (!isset($_SESSION['username'])) : ?>
              <li class="nav-item active">
                <a class="nav-link" href="#hero-area">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">
                  About
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services">
                  Services
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#resume">
                  Resume
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">
                  Contact
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./Login.php">
                  Login
                </a>
              </li>
            <?php else : ?>
              <li class="nav-item active">
                <a class="nav-link" href="#hero-area">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">
                  About
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services">
                  Services
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#resume">
                  Resume
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">
                  Contact
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?= $_SESSION['username'] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="Details.php?">My Order</a></li>
                  <li><a class="dropdown-item" href="Logout.php?logout=true">Logout</a></li>
                </ul>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <div id="hero-area" class="hero-area-bg">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 text-center">
            <div class="contents">
              <h5 class="script-font wow fadeInUp" data-wow-delay="0.2s">Hi This is</h5>
              <h2 class="head-title wow fadeInUp" data-wow-delay="0.4s">Malik Alrasyid Basori</h2>
              <p class="script-font wow fadeInUp" data-wow-delay="0.6s">Telkom University Students</p>
              <ul class="social-icon wow fadeInUp" data-wow-delay="0.8s">
                <li>
                  <a class="instagram" href="https://www.instagram.com/malikalrasyidbasorii"><i class="icon-social-instagram"></i></a>
                </li>
                <li>
                  <a class="linkedin" href="https://www.linkedin.com/in/malik-alrasyid-basori-548817202"><i class="icon-social-linkedin"></i></a>
                </li>
              </ul>
              <div class="header-button wow fadeInUp" data-wow-delay="1s">
                <a href="#contact" class="btn btn-success"><i class="icon-speech"></i> Contact Me</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="about" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="img-thumb wow fadeInLeft" data-wow-delay="0.3s">
            <img class="img-fluid" src="assets/img/about/Malik Alrasyid Basori.png" alt="">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="profile-wrapper wow fadeInRight" data-wow-delay="0.3s" style="font-size: larger;">
            <h3>Hi Guys!</h3>
            <p style="font-size: large;text-align:justify">I am a third-year student (Semester 6) at Telkom University Pursuing an S1/Bachelor Degree in Information Systems (Computer Science). Budding Passion in Software Engineering (Website and Android/IOS), Product Development, UI/UX (Design, Research, Writer), and Graphic Designer. You can reach me via Email or Instagram for further queries and if I don't reply more than 24 hours please kindly contact me again.</p>
            <div class="about-profile">
              <ul class="admin-profile">
                <li class="d-flex"><span class="pro-title"> Name </span> <span class="pro-detail">Malik Alrasyid Basori</span></li>
                <li class="d-flex"><span class="pro-title"> Age </span> <span class="pro-detail">21 Years</span></li>
                <li class="d-flex"><span class="pro-title"> Work Experience </span> <span class="pro-detail">-</span></li>
                <li class="d-flex"><span class="pro-title"> City </span> <span class="pro-detail">Indonesia</span></li>
                <li class="d-flex"><span class="pro-title"> Location </span> <span class="pro-detail">Batam, Kepulauan Riau</span></li>
                <li class="d-flex"><span class="pro-title"> E-mail </span> <span class="pro-detail">malikalrasyidbasori.1@gmail.com</span></li>
                <li class="d-flex"><span class="pro-title"> Freelance </span> <span class="pro-detail"><ul>Available for <li>👨‍🎨Design : Visual/Graphics & UI/UX Design</li><li>👨‍💻Development : Cross Platform Development (Website & Android) with Flutter</li><li>🤵 Event : EO, MC, Podcaster & Voice Actor</li></ul></span></li>
              </ul>
            </div>
            <a href="https://drive.google.com/file/d/1u3iuLEp7B3BaoADVmiYPPrq_HMFLU1uV/view?usp=sharing" class="btn btn-common"><i class="icon-paper-clip"></i> Download Resume</a>
            <a href="#contact" class="btn btn-success"><i class="icon-speech"></i> Contact Me</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="services section-padding">
    <h2 class="section-title wow flipInX" data-wow-delay="0.4s">Skills</h2>
    <h6 class="text-center wow flipInX mb-5" data-wow-delay="0.6s">Please Login first if you want to order the service</h6>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
            <div class="icon">
              <i class="icon-vector"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Graphic Design</a></h3>
              <p>Adobe Illustrator, Figma, & Canva</p>
              <a href="Form index.php" class="btn btn-common mt-3">Order Service</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="services-item wow fadeInDown" data-wow-delay="0.9s">
            <div class="icon">
              <i class="icon-drawer"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">UI/UX Design,Research, & Writer</a></h3>
              <p>Adobe XD, Figma, & ProtoPie</p>
              <a href="Form index.php" class="btn btn-common mt-3">Order Service</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="services-item wow fadeInDown" data-wow-delay="0.9s">
            <div class="icon">
              <i class="icon-organization"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Project Management</a></h3>
              <p>ClikUp, Miro, Microsoft Office, & Microsoft Teams</p>
              <a href="Form index.php" class="btn btn-common mt-3">Order Service</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div id="resume" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="education wow fadeInRight" data-wow-delay="0.3s">
            <ul class="timeline">
              <li>
                <i class="icon-graduation"></i>
                <h2 class="timelin-title">Education</h2>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">S1 Information Systems - Telkom University</h3>
                  <span>2019 - now</span>
                  <p class="line-text text-justify">Third Year (Semester 6) Telkom University Student Pursuing an S1/Bachelor Degree in Information Systems (Computer Science). Currently developing skills in Entrepreneurship, Information System Security, Enterprise Application Integrity, Software Engineering: Capstone Project, and Information Technology Service Management at Telkom University. and also developing darts, flutter & firebase skills at <a class="udemy" href="https://www.udemy.com/" class="line-text"> Udemy.com</a></p>
                </div>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">Computer and Network Engineering - SMKN 1 Batam</h3>
                  <span>2010 - 2012</span>
                  <p class="line-text text-justify">SMKN 1 Batam student majoring in computer & network engineering. While in High School, I have skills in networking such as <a class="mikrotik" href="https://mikrotik.com/" class="line-text">Mikrotik</a> & <a class="cisco" href="https://www.cisco.com/" class="line-text">Cisco</a>, and have taken Cisco certification at <a class="netacad" href="https://www.netacad.com/" class="line-text">Netacad</a> and Mikrotik certification at High School, but I did not renew the certificate.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="experience wow fadeInRight" data-wow-delay="0.6s">
            <ul class="timeline">
              <li>
                <i class="icon-briefcase"></i>
                <h2 class="timelin-title">Experience</h2>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">Human Resources Staff at SEARCH Telkom University</h3>
                  <span>January 2021 - January 2022</span>
                  <p class="line-text text-justify">Become one of the HR staff at SEARCH Telkom University. During my time as HR staff, I gained a lot of experience, from how to organize events from start to finish, how to lead a team, how to make relationships within the organization closer, how to manage stress & burnout, how to manage time, and how to make public speaking better.</p>
                  <dl>
                    <dt>More info about SEARCH Telkom University :</dt>
                    <dd><a class="more-info head-title" href="https://www.instagram.com/searchtelkomunv/" style="color:white;">Instagram</a></dd>
                  </dl>
                </div>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">Chairman, Open Mind SEARCH 2021</h3>
                  <span>October 2021 - November 2021</span>
                  <p class="line-text text-justify">Chairman On the Committee for the Open Mind SEARCH 2021. I had the opportunity to be the chairman of this event who organizes and managed a 43-member cross-functional (Core Division, Events Division, Publication and Documentation Division, and Public Relations Division) team. I work on helps other divisions, preparing and compiling the entire series. Open Mind SEARCH 2021 is an event to introduce this organization to new students, to attract new students to join this organization.</p>
                  <dl>
                    <dt>More info about Java Business Competition 2021 :</dt>
                    <dd><a class="more-info head-title" href="https://www.instagram.com/p/CVc7JS2Jw1K/?utm_source=ig_web_copy_link" style="color:white;">Instagram</a></dd>
                  </dl>
                </div>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">PIC of UI/UX Competition, Competition Organizer Division of JBC 2021</h3>
                  <span>June 2021 - September 2021</span>
                  <p class="line-text text-justify">Person in Charge of the UI/UX Competition, On the Committee for the Java Business Competition 2021. I had the opportunity to be the Person in Charge of the UI/UX Competition to manage an 18-member cross-functional (UI/UX Division and Liaison Officer Division) team. I work on preparing and compiling the entire series of UI/UX competition events. In the UI/UX series, there are several events such as live Instagram with judges discussing "Tips for Brainstorming Ideas & Research" and the main event of the national level UI/UX competition. The main event of the Java Business Competition 2021 itself is an International Webinar.</p>
                  <dl>
                    <dt>More info about Java Business Competition 2021 :</dt>
                    <dd><a class="more-info head-title" href="https://www.instagram.com/jbc_telkomuniv/" style="color:white;">Instagram</a></dd>
                    <dd><a class="more-info head-title" href="https://javabusinesscompetition.id/" style="color:white;">Website</a></dd>
                  </dl>
                </div>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">Head of Events Division, SEARCH Inspiration 2021</h3>
                  <span>July 2021 - August 2021</span>
                  <p class="line-text text-justify">Head of Events Division On the Committee for the SEARCH Inspiration 2021. I had the opportunity to become a Head of Events Division that organize and manage a 4-member team. I work on the timeline and event rundown, determine who will be the speakers, and prepare other necessities for the webinars. SEARCH Inspiration is a national webinar with the theme "Maximize scholarship preparation". In this webinar, we invite a speaker who has received a scholarship abroad, namely Alysa Bachtiar.</p>
                  <dl>
                    <dt>More info about SEARCH Inspiration :</dt>
                    <dd><a class="more-info head-title" href="https://www.instagram.com/p/CSCA310psnR/?utm_source=ig_web_copy_link" style="color:white;">Instagram</a></dd>
                  </dl>
                </div>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">Head of Public Relations Division, Championship Regeneration 2020</h3>
                  <span>January 2020 - February 2020</span>
                  <p class="line-text text-justify">My first committee in college, and my first time being a division head in a committee. I had the opportunity to become a Head of Public Relation Division that organize and manage a 4-member team. I work on contacting other internal organizations to establish media cooperation, which in the future have an agreement to help each other in disseminating information on each of our social media. Championship Regeneration 2020 is an internal Telkom University competition.</p>
                  <dl>
                    <dt>More info about Championship Regeneration 2020 :</dt>
                    <dd><a class="more-info head-title" href="https://www.instagram.com/crsearch2022/" style="color:white;">Instagram</a></dd>
                  </dl>
                </div>
              </li>
              <li>
                <div class="content-text">
                  <h3 class="line-title">Internship at PT Infineon Batam</h3>
                  <span>July 2017 - September 2017</span>
                  <p class="line-text text-justify">Internship at PT Infineon in the IT Support Department, where I learned how to maintain devices, ranging from laptops, computers, printers, and photocopiers. besides that, I also learned how to install windows through a server, how it is a server and how a server works, and also learned to manage the data in the company. This internship is one of the mandatory agendas for graduation requirements at SMKN 1 Batam.</p>
                  <dl>
                    <dt>More info about PT Infineon Batam :</dt>
                    <dd><a class="more-info head-title" href="https://www.infineon.com/cms/en/careers/our-locations/batam/" style="color:white;">Website</a></dd>
                  </dl>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section id="contact" class="section-padding">
    <div class="contact-form">
      <div class="container">
        <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.4s">
          <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="contact-block">
              <h2>Contact Form</h2>
              <form id="contactForm">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="hidden" name="contact_number">
                      <input type="text" class="form-control" id="name" name="user_name" placeholder="Name" required data-error="Please enter your name">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" placeholder="Email" id="email" class="form-control" name="user_email" required data-error="Please enter your email">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" placeholder="Subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" id="message" name="message" placeholder="Your Message" rows="5" data-error="Write your message" required></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="submit-button">
                      <button class="btn btn-common" id="submit" type="submit">Send Message</button>
                      <div id="msgSubmit" class="h3 text-center hidden"></div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="footer-right-area wow fadeIn">
              <h2>Contact Address</h2>
              <div class="footer-right-contact">
                <div class="single-contact">
                  <div class="contact-icon">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <p>Batam, Kepulauan Riau</p>
                </div>
                <div class="single-contact">
                  <div class="contact-icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <p><a href="mailto:malikalrasyidbasori.1@gmail.com">malikalrasyidbasori.1@gmail.com</a></p>
                </div>
                <div class="single-contact">
                  <div class="contact-icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <p><a href="https://wa.me/628117788522">+(62) 811 7788 522</a></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <object style="border:0; height: 450px; width: 100%;" data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0789216107314!2d104.05283741470106!3d1.1030802991954007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d988d67596cf4f%3A0xc23cf940ac578d43!2sJl.%20Legenda%20Malaka%2C%20Baloi%20Permai%2C%20Kec.%20Batam%20Kota%2C%20Kota%20Batam%2C%20Kepulauan%20Riau%2029444!5e0!3m2!1sen!2sid!4v1633760140922!5m2!1sen!2sid"></object>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="footer-text text-center wow fadeInDown" data-wow-delay="0.3s">
            <ul class="social-icon">
              <li>
                <a class="facebook" href="https://www.facebook.com/malikalrasyid.basori"><i class="icon-social-facebook"></i></a>
              </li>
              <li>
                <a class="twitter" href="https://twitter.com/BasoriMalik?t=X3qf4H4f84IcP0d_xKXbFA&s=08"><i class="icon-social-twitter"></i></a>
              </li>
              <li>
                <a class="instagram" href="https://www.instagram.com/malikalrasyidbasorii"><i class="icon-social-instagram"></i></a>
              </li>
              <li>
                <a class="linkedin" href="https://www.linkedin.com/in/malik-alrasyid-basori-548817202"><i class="icon-social-linkedin"></i></a>
              </li>
            </ul>
            <p style="font-size: larger">HAVE A NICE DAY 😄</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</php>