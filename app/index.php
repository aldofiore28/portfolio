<?php
require_once 'php/PHPMailer.php';
require_once 'php/Validate.php';
require_once 'php/Sanitise.php';
if (!empty($_POST)) {
    $inputEmail = $_POST['email'];
    $inputTitle = $_POST['title-email'];
    $inputContent = $_POST['content-email'];
    $errorMessage = '';

    $validation = new Validate($inputEmail, $inputTitle, $inputContent);
    $email = new PHPMailer\PHPMailer\PHPMailer();
    $validData = $validation->validate();
    $sanitization = new Sanitise($validData);
    $finalData = $sanitization->sanitise();
    $email->setFrom($finalData['email'], $finalData['title']);
    $email->addAddress('job.aldo.fiore95@gmail.com', 'Aldo Fiore');
    $email->Subject = 'Email from portfolio';
    $email->Body = $finalData['content'];
    if(!$email->send()) {
        $errorMessage = '<p class="error-message">The email was not sent! ' . $email->ErrorInfo . '.</p>';
    } else {
        $errorMessage = '<p class="success-message">Email sent!</p>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aldo Fiore || Full stack web developer</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="css/normalize.css">
    <link type="text/css" rel="stylesheet" href="css/main.css" />
    <script src="js/es5/formValidation.js" defer></script>
</head>
<body>
    <nav class="side-navbar">
        <img class="profile-image" src="images/profile-picture2.jpg" alt="profile-image" />
        <ul class="navigation">
            <li class="nav-item">
                <a class="nav-link" href="#home">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">ABOUT ME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#portfolio">PORTFOLIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">CONTACT</a>
            </li>
        </ul>
        <ul class="social">
            <li class="social-items">
                <a href="https://twitter.com/aldofiore9" class="social-link" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
            <li class="social-items">
                <a href="https://github.com/aldofiore28" class="social-link" target="_blank">
                    <i class="fab fa-github"></i>
                </a>
            </li>
            <li class="social-items">
                <a href="https://www.linkedin.com/in/aldo-fiore-880346178/" class="social-link" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
        </ul>
    </nav>
    <main id="home" class="side-content">
        <div class="container">
            <h1 class="title">ALDO FIORE</h1>
            <h3 class="subtitle">full stack <span>web developer</span></h3>
            <img class="main-image" src="images/main-image.jpg" alt="main image">
            <section id="about" class="about-me-section">
                <h1 class="title-about-me">ABOUT ME...</h1>
                <p class="about-me-text">Hello! My name is Aldo and I'm a 24 year old Italian fella from a small town
                    near Rome. I am currently studying at the renowned Mayden Academy in Bath to become a Full Stack web developer. I enjoy the highs and lows of coding, especially the time spent in front of a laptop with a good problem to solve. I particularly love the feeling of creating something, whether a product or a service that people can use. I lean towards back-end development, but as a full-stack trainee, I like to get down with front-end apps and creating styles and pages. I feel confident with PHP, MySQL, Javascript, HTML and CSS, and I just started using Sass and Bootstrap. I also look forward learning other tools and frameworks the course has in store for us to expand our knowledge: Slim and Node.js.</p>
                <p class="about-me-text">I migrated in the UK for a scenery change and worked in casinos for about 3 years before I moved to Bath. Whilst considering other opportunities I remembered how much I had enjoyed the software development I experienced at high school, so decided to apply for the Mayden Academy to help change my career and life! In my free time I like to cook, as a proud Italian, for my friends and girlfriend. I also love relaxing at home watching movies.</p>
            </section>
            <section id="portfolio" class="projects">
                <h1 class="project-section-title">PROJECTS</h1>
                <article class="project">
                    <img class="project-image" src="images/pilot_shop.jpg" alt="CMS project">
                    <div class="project-text">
                        <h1 class="project-title">Pilot Shop</h1>
                        <p class="project-description">
                            I recreated the layout of this website as an exercise
                            at the academy, following responsive design principles
                            and handlebars.
                        </p>
                        <p class="tags">#Javascript #HTML #CSS #Handlebars.js</p>
                        <a class="project-link" href="https://github.com/aldofiore28/pilot-shop" target="_blank">code</a>
                        <a class="project-link" href="http://dev.maydenacademy.co.uk/students/2019/feb/aldo/pilot-shop/" target="_blank">project</a>
                    </div>
                </article>
                <article class="project">
                    <img class="project-image" src="images/cms.png" alt="CMS project">
                    <div class="project-text">
                        <h1 class="project-title">Portfolio & CMS</h1>
                        <p class="project-description">
                            First version of my portfolio created as a project
                            at the academy. Built a responsive design and a CMS
                            from scratch with a security login page.
                        </p>
                        <p class="tags">#PHP #HTML #CSS</p>
                        <a class="project-link" href="https://github.com/aldofiore28/portfolio-build" target="_blank">code</a>
                        <a class="project-link" href="http://dev.maydenacademy.co.uk/students/2019/feb/aldo/portfolio/" target="_blank">project</a>
                    </div>
                </article>
                <article class="project">
                    <img class="project-image" src="images/paint-app.jpg" alt="">
                    <div class="project-text">
                        <h1 class="project-title">Paintmaster 3000</h1>
                        <p class="project-description">
                            Javascript paint like application built from scratch with
                            my team at the academy. We used ES5 and a js library called
                            "jscolor" to customize the app.
                        </p>
                        <p class="tags">#Javascript #jsColor #HTML #CSS</p>
                        <a class="project-link" href="https://github.com/Mayden-Academy/2019-paint-app" target="_blank">code</a>
                        <a class="project-link" href="http://dev.maydenacademy.co.uk/projects/2019Feb/2019-paint-app/" target="_blank">project</a>
                    </div>
                </article>
                <article class="project">
                    <img class="project-image" src="images/aptitude-test.jpg" alt="aptitude-test">
                    <div class="project-text">
                        <h1 class="project-title">Academy aptitude test</h1>
                        <p class="project-description">
                            Worked on an aptitude test app for the academy
                            using ES6 and working on an existing code base,
                            adding features and bug-fixing.
                        </p>
                        <p class="tags">#Javascript #Handlebars #HTML #CSS</p>
                        <a class="project-link" href="https://github.com/Mayden-Academy/aptitude-test" target="_blank">code</a>
                        <a class="project-link" href="http://dev.maydenacademy.co.uk/projects/2017/aptitude-test/app/" target="_blank">project</a>
                    </div>
                </article>
                <article class="project">
                    <img class="project-image" src="images/topdog.png" alt="topdog-app">
                    <div class="project-text">
                        <h1 class="project-title">TopDog App</h1>
                        <p class="project-description">
                            Created an application in PHP using the dog API
                            to display dog images organised by breed, using
                            autoloading and OOP programming.
                        </p>
                        <p class="tags">#PHP #OOP #HTML #CSS</p>
                        <a class="project-link" href="https://github.com/Mayden-Academy/2019-nmr-TopDog" target="_blank">code</a>
                        <a class="project-link" href="http://dev.maydenacademy.co.uk/projects/2019Feb/2019-nmr-TopDog/" target="_blank">project</a>
                    </div>
                </article>
                <article class="project">
                    <img class="project-image" src="images/topdog.png" alt="topdog-app">
                    <div class="project-text">
                        <h1 class="project-title">TODO app</h1>
                        <p class="project-description">
                            Built a simple TODO app that let's you choose
                            a user and create Todos to keep track. I built it
                            with SLIM and following a MVC architecture.
                        </p>
                        <p class="tags">#PHP #OOP #Slim #MVC</p>
                        <a class="project-link" href="https://github.com/Mayden-Academy/2019-nmr-TopDog" target="_blank">code</a>
                        <a class="project-link" href="http://dev.maydenacademy.co.uk/projects/2019Feb/2019-nmr-TopDog/" target="_blank">project</a>
                    </div>
                </article>
            </section>
        </div>
        <footer id="contact" class="contact-info">
            <div class="container">
                <h1 class="contact-info-title">CONTACT</h1>
                <p class="sub-title-contact">If you are <span>interested</span> in working with me</p>
                <section class="form-email">
                    <form id="form-email" method="POST" action="index.php#form-email">
                        <label for="email">Email:</label>
                        <input id="email" type="text" name="email" placeholder="Email..." data-type="email" />
                        <label for="title-email">Title:</label>
                        <input id="title-email" type="text" name="title-email" placeholder="Title..."
                               data-type="title" />
                        <label for="content-email">Content:</label>
                        <textarea id="content-email" form="form-email" name="content-email"
                                  placeholder="Content..."></textarea>
                        <button type="submit" name="send-email">Send</button>
                        <?php
                            if(isset($errorMessage)) {
                                echo $errorMessage;
                            }
                        ?>
                    </form>
                </section>
                <section class="contact-footer">
                    <ul class="social-footer">
                        <li class="social-items">
                            <a href="https://twitter.com/aldofiore9" class="social-link" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="social-items">
                            <a href="https://github.com/aldofiore28" class="social-link" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                        <li class="social-items">
                            <a href="https://www.linkedin.com/in/aldo-fiore-880346178/" class="social-link" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </section>
            </div>
        </footer>
    </main>
</body>
</html>