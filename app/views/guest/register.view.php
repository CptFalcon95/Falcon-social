<?php 
requireTemplate('partials/head');
requireTemplate('guest/guest_navigation');
?>

<div id="bg-home" class="clearfix"></div>

<section class="testimonial" id="testimonial">
    <div class="container">
        <div class="row align-items-center testimonial-row">
            <div class="col-12 col-md-12 col-lg-6 offset-lg-6 sm-h-100">
                <div class="row">      
                    <div class="col-12 col-md-6 py-3 bg-dark text-white text-center">
                        <div class="card-body">
                            <img src="/images/register.png">
                            <h2 class="py-3 text-uppercase">Registration</h2>
                            <p>Tation argumentum et usu, dicit viderer evertitur te has. Eu dictas concludaturque usu, facete detracto patrioque an per, lucilius pertinacia eu vel.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 pt-4 pb-3 border register-form">
                        <h5 class="pb-2 text-uppercase">Enter your details</h5>
                        <form class="js-form-register" action="#">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="just-validate-tooltip-container">
                                        <input name="name" data-validate-field="name" placeholder="Name" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <div class="just-validate-tooltip-container">
                                        <input type="email" data-validate-field="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <div class="just-validate-tooltip-container">
                                        <input name="password" data-validate-field="password" placeholder="Password" class="form-control" type="password">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <div class="just-validate-tooltip-container">
                                        <input type="password" data-validate-field="password_repeat" name="password_repeat" class="form-control" placeholder="Repeat password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" data-validate-field="tos_check" name="tos_check" type="checkbox" value="" id="invalidCheck2" required>
                                            <label class="form-check-label" for="invalidCheck2">
                                                <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                                            </label>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <button type="submit" id="register-btn" class="btn btn-secondary py-2 w-100">Join Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</section>

<?php requireTemplate('footer');?>