<body>
    <div class="text-start">
        <a name="" class="btn btn-dark" role="button" href="<?php echo href('user', 'getAllUsers'); ?>"><i class="fas fa-arrow-left"></i></a>
    </div>
    

    <div class="container mt-5">
        <br>
        <div class="row">
            <?php foreach ($list as $user) { ?>
                <div class="col-md-4 text-center">
                    <img src='<?= $user->getImage() ? $user->getImage() : 'public/images/noimg.jpg' ?>' width="95%" class='img-fluid rounded-circle' alt="User Image" />
                    <h3><?php echo $user->getName() ?></h3>
                    <p><strong>FullName :</strong> <?php echo $user->getUsername() ?> </p>
                    <p><strong>Gender:</strong> <img src="./public/images/<?= $user->getGender() ?>.jpg" width="40px" class='img-fluid rounded-top'></p>
                    <p>
                        <strong>Status:</strong>
                        <?php
                        echo  $user->getStatus() == 1 ? '<span class="badge bg-success">active</span>' : '<span class="badge bg-dark">lock</span>' ?>
                    </p>
                </div>
                <div class="col-md-8 ">
                    <h4>About me</h4>
                    <ul class="list-unstyled">
                        <li> Hello! My name is <?php echo $user->getName() ?>, and I am a passionate student currently pursuing a degree in Information Technology. With a strong interest in programming and web development, I enjoy exploring new technologies and enhancing my skills. In my free time, I love working on personal projects, such as building web applications and experimenting with different programming languages. I'm also keen on learning about artificial intelligence and its potential to revolutionize various industries. I'm excited to connect with others who share similar interests and exchange knowledge and ideas!</li>
                    </ul>
                    <h4>Experience</h4>
                    <ul>
                        <li>I'm a web developer with experience in building dynamic, user-friendly websites and applications. Skilled in HTML, CSS, JavaScript, and frameworks like React, I enjoy creating solutions that enhance user experience and meet project goals.</li>
                        <li>Experienced web developer specializing in responsive, high-performance websites and applications for enterprise clients, including IBM, Microsoft, and Oracle.</li>
                        <li>Skilled in HTML, CSS, JavaScript, and frameworks like React, with a focus on delivering scalable, user-friendly solutions.</li>
                        <li>Proven ability to collaborate with cross-functional teams, ensuring seamless integration and robust functionality across large-scale projects.</li>
                        <li>Proven ability to collaborate with cross-functional teams, ensuring seamless integration and robust functionality across large-scale projects.</li>
                    </ul>
                    <h4>Education</h4>
                    <ul>
                        <li> Graduated from Btest FPT College, majoring in software engineering</li>
                        <li> Achieved TOEIC 700 English certificate</li>
                    </ul>
                    <div>
                        <h4>Contact Information</h4>
                        <ul>
                            <li><strong>Email:</strong> <?php echo $user->getEmail() ?> </li>
                            <li><strong>Phone:</strong> <?php echo $user->getphone() ?> </li>
                            <li><strong>Socal Media: </strong><a href="#">
                                    <i class="fab fa-facebook-f profile-icon" style="font-size: 24px; "></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-instagram profile-icon" style="font-size: 24px;color:orange"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-tiktok profile-icon" style="font-size: 24px;color:black"></i>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
        </div>
    <?php } ?>

    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>