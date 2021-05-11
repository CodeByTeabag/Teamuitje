<?php
$page = 'contact';
require_once('page-layout/header.php');

?>
<div class="blue-fade-bg">
    <div class="container">
        <h2 class="contact-text-styling">Contact</h2>
        <div class="row">
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control">
                                <h6 class="contact-text-styling">Naam</h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="email" name="email" class="form-control">
                                <h6 class="contact-text-styling">Email</h6>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="text" id="subject" name="subject" class="form-control">
                                <h6 class="contact-text-styling">Onderwerp</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="md-form">
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                <h6 class="contact-text-styling">Bericht</h6>
                            </div>

                        </div>
                    </div>
                </form>

                <div class="text-center text-md-left text-white">
                    <a class="btn btn-primary" onclick="submit()">Versturen</a>
                </div>
                <div class="status"></div>
            </div>
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p class="contact-text-styling">Nijmgen, 6539 HH, Nederland</p>
                    </li>

                    <li>
                        <i class="fas fa-phone mt-4 fa-2x"></i>
                        <p class="contact-text-styling">+024 3654434</p>
                    </li>

                    <li>
                        <i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p class="contact-text-styling">info@anker.nl</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
include('page-layout/footer.php');
?>