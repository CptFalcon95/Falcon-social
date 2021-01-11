<?php 
requireTemplate('partials/head'); 
requireTemplate('guest/guest_navigation')
?>

<div id="bg-home" class="clearfix"></div>

<section class="testimonial" id="testimonial">
    <div class="container">
        <div class="row align-items-center testimonial-row">
            <div class="col-xs-12 col-md-12 col-lg-6 offset-lg-6 sm-h-100">
                <div class="row">      
                    <div class="col-md-6 py-3 bg-dark text-white text-center">
                        <div class="card-body">
                            <img src="/images/key.png" alt="Login icon">
                            <h2 class="py-3 text-uppercase">Login</h2>
                            <p>Tation argumentum et usu, dicit viderer evertitur te has. Eu dictas concludaturque usu, facete detracto patrioque an per, lucilius pertinacia eu vel.</p>
                        </div>
                    </div>
                    <div class="col-md-6 pt-4 pb-3 border login-form">
                        <div class="login-form-content w-100">
                            <h5 class="pb-2 d-xs-none text-uppercase">Enter your credentials</h5>
                            <form action="/login" method="POST" class="js-form-login">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="just-validate-tooltip-container">
                                            <input type="email" data-validate-field="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="just-validate-tooltip-container">
                                            <input data-validate-field="password" name="password" placeholder="Password" class="form-control" type="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <button id="login-btn" type="submit" class="btn text-white py-2 w-100">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php requireTemplate('partials/footer') ?>