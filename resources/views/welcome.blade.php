<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SYSTEM APPLICATION</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1>SYSTEM </h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          @if (Route::has('login'))
          <ul>
            @auth
            <li><a href="{{route('home')}}" data-after="Home">HOME</a></li>
            @else
            <li><a href="{{route('login')}}" data-after="Home">LOGIN</a></li>
            <li><a href="{{route('register')}}" data-after="Service">REGISTER</a></li>
            @endauth
          </ul>
          @endif
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Hello, <span></span></h1>
        
        <h1>Welcome<span></span></h1>
        <a href="{{route('login')}}" type="button" class="cta">GET STARTED</a>
      </div>
    </div>
    
  </section>
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Serv<span>i</span>ces</h1>
        </div>
        <div class="service-bottom">
        <div class="service-item">
          <div class="icon"><img src="http://materdeicollege.com/images/grading_icon.png" /></div>
          <h2><a href="http://gradeportal.materdeicollege.com">Grade Portal</a></h2>
          <p>The college has its grade portal to easily access the students individual academic performance. And also to view their semester's term grade.</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="http://materdeicollege.com/images/moodle_icon.png" /></div>
          <h2><a href="http://lms.materdeicollege.com">LMS</a></h2>
          <p>The college has its lms to easily access the students their online activities. And also this is a web based learning education develop by the MDC.</p>

        </div>
        <div class="service-item">
          <div class="icon"><img src="http://materdeicollege.com/images/grading_icon.png" /></div>
          <h2><a href="http://ssg.materdeicollege.com">SSG</a></h2>
          <p>SSG to reach the concerns of each students in MDC.Provides a great responsibility as they are capable of students movement around the campus.</p>

        </div>
        <div class="service-item">
          <div class="icon"><img src="http://materdeicollege.com/images/grading_icon.png" /></div>
          <h2><a href="http://sis.materdeicollege.com">INFO SYSTEM</a></h2>
          <p>It has information system to access the remaining information needed by everyone. Also those who wants to be part of MDC Family.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Service Section -->

  <!-- About Section -->
  <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="../images/laptop.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">About <span>Us</span></h1>
        <p>
          <b>Vision:</b> Mater Dei College is a community of dedicated educators and community-oriented students who believe in the search for truth that leads
          to wisdom; unselfish living through service as an expression of charity and the pursuit of prayer life through living the Gospel, as exemplified by
          Mary, the mother of God in whose honor the college identifies herself.</p>

          <p> <b>Mission:</b> Mater Dei College commits herself to provide a holistic Catholic education to deserving youth with preferential option for the
          economically-disadvantaged of northern Bohol to enable them to become responsible citizens and servant leaders in nation building.
          </p>
      </div>
      
    </div>
    
  </section>
  <!-- End About Section -->

  <!-- Contact Section -->
  <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Contact <span>info</span></h1>
      </div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/external-justicon-flat-justicon/2x/external-phone-notifications-justicon-flat-justicon-1.png" /></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2>+63-385-088-106 </h2>
            <h2>+63-382-372-394</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/external-justicon-flat-justicon/512/external-email-notifications-justicon-flat-justicon-1.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>www.mdc.ph</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/color/2x/order-delivered.png" /></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>Cabulijan, Tubigon, Bohol</h2>
            <h2>6329 Philippines</h2>
          </div>
        </div>
      </div>
     
    </div>
  </section>
  <!-- End Contact Section -->

  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <p>Copyright © 2022. All rights reserved</p>
    </div>
  </section>

</body>

<script>
  const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#29323c';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});

</script>

</html>


