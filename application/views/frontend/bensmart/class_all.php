<?php
isset($layout) ? "" : $layout = "list";
isset($selected_materi_id) ? "" : $selected_materi_id = "all";
isset($selected_level) ? "" : $selected_level = "all";
isset($selected_language) ? "" : $selected_language = "all";
isset($selected_rating) ? "" : $selected_rating = "all";
isset($selected_price) ? "" : $selected_price = "all";
?>

<body>

  <!-- MODALS
    ================================================== -->
  <!-- Example -->
  <div class="modal fade" id="modalExample" tabindex="-1" role="dialog" aria-labelledby="modalExampleTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">

          <!-- Close -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>

          <!-- Image -->
          <div class="text-center">
            <img src="assets/img/illustrations/illustration-1.png" alt="..." class="img-fluid mb-3" style="width: 200px;">
          </div>

          <!-- Heading -->
          <h2 class="font-weight-bold text-center mb-1" id="modalExampleTitle">
            Schedule a demo with us
          </h2>

          <!-- Text -->
          <p class="font-size-lg text-center text-muted mb-6 mb-md-8">
            We can help you solve company communication.
          </p>

          <!-- Form -->
          <form>
            <div class="row">
              <div class="col-12 col-md-6">

                <!-- First name -->
                <div class="form-label-group">
                  <input type="text" class="form-control form-control-flush" id="registrationFirstNameModal" placeholder="First name">
                  <label for="registrationFirstNameModal">First name</label>
                </div>

              </div>
              <div class="col-12 col-md-6">

                <!-- Last name -->
                <div class="form-label-group">
                  <input type="text" class="form-control form-control-flush" id="registrationLastNameModal" placeholder="Last name">
                  <label for="registrationLastNameModal">Last name</label>
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6">

                <!-- Email -->
                <div class="form-label-group">
                  <input type="email" class="form-control form-control-flush" id="registrationEmailModal" placeholder="Email">
                  <label for="registrationEmailModal">Email</label>
                </div>

              </div>
              <div class="col-12 col-md-6">

                <!-- Password -->
                <div class="form-label-group">
                  <input type="password" class="form-control form-control-flush" id="registrationPasswordModal" placeholder="Password">
                  <label for="registrationPasswordModal">Password</label>
                </div>

              </div>
            </div>
            <div class="row">
              <div class="col-12">

                <!-- Submit -->
                <button class="btn btn-block btn-primary mt-3 lift">
                  Request a demo
                </button>

              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- Signup: Horizontal  -->
  <div class="modal fade" id="modalSignupHorizontal" tabindex="-1" role="dialog" aria-labelledby="modalSignupHorizontalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="card card-row">
          <div class="row no-gutters">
            <div class="col-12 col-md-6 bg-cover card-img-left" style="background-image: url(assets/img/photos/photo-8.jpg);">

              <!-- Image (placeholder) -->
              <img src="assets/img/photos/photo-8.jpg" alt="..." class="img-fluid d-md-none invisible">

              <!-- Shape -->
              <div class="shape shape-right shape-fluid-y svg-shim text-white d-none d-md-block">
                <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M116 0H51v172C76 384 0 517 0 517v173h116V0z" fill="currentColor" />
                </svg>
              </div>

            </div>
            <div class="col-12 col-md-6">
              <div class="card-body">

                <!-- Close -->
                <button type="button" class="modal-close close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>

                <!-- Heading -->
                <h2 class="mb-0 font-weight-bold text-center" id="modalSignupHorizontalTitle">
                  Sign Up
                </h2>

                <!-- Text -->
                <p class="mb-6 text-center text-muted">
                  Simplify your workflow in minutes.
                </p>

                <!-- Form -->
                <form class="mb-6">

                  <!-- Email -->
                  <div class="form-group">
                    <label class="sr-only" for="modalSignupHorizontalEmail">
                      Your email
                    </label>
                    <input type="email" class="form-control" id="modalSignupHorizontalEmail" placeholder="Your email">
                  </div>

                  <!-- Password -->
                  <div class="form-group mb-5">
                    <label class="sr-only" for="modalSignupHorizontalPassword">
                      Create a password
                    </label>
                    <input type="password" class="form-control" id="modalSignupHorizontalPassword" placeholder="Create a password">
                  </div>

                  <!-- Submit -->
                  <button class="btn btn-block btn-primary" type="submit">
                    Sign up
                  </button>

                </form>

                <!-- Text -->
                <p class="mb-0 font-size-sm text-center text-muted">
                  Already have an account? <a href="signin-illustration.html">Log in</a>.
                </p>

              </div>
            </div>

          </div> <!-- / .row -->
        </div>
      </div>
    </div>
  </div>

  <!-- Signup: Vertical  -->
  <div class="modal fade" id="modalSignupVertical" tabindex="-1" role="dialog" aria-labelledby="modalSignupVerticalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="card">

          <!-- Close -->
          <button type="button" class="modal-close close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>

          <!-- Image -->
          <img src="assets/img/photos/photo-7.jpg" alt="..." class="card-img-top">

          <!-- Shape -->
          <div class="position-relative">
            <div class="shape shape-bottom shape-fluid-x svg-shim text-white">
              <svg viewBox="0 0 2880 480" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2160 0C1440 240 720 240 720 240H0v240h2880V0h-720z" fill="currentColor" />
              </svg>
            </div>
          </div>

          <!-- Body -->
          <div class="card-body">

            <!-- Heading -->
            <h2 class="mb-0 font-weight-bold text-center" id="modalSignupVerticalTitle">
              Sign Up
            </h2>

            <!-- Text -->
            <p class="mb-6 text-center text-muted">
              Simplify your workflow in minutes.
            </p>

            <!-- Form -->
            <form class="mb-6">

              <!-- Email -->
              <div class="form-group">
                <label class="sr-only" for="modalSignupVerticalEmail">
                  Your email
                </label>
                <input type="email" class="form-control" id="modalSignupVerticalEmail" placeholder="Your email">
              </div>

              <!-- Password -->
              <div class="form-group mb-5">
                <label class="sr-only" for="modalSignupVerticalPassword">
                  Create a password
                </label>
                <input type="password" class="form-control" id="modalSignupVerticalPassword" placeholder="Create a password">
              </div>

              <!-- Submit -->
              <button class="btn btn-block btn-primary" type="submit">
                Sign up
              </button>

            </form>

            <!-- Text -->
            <p class="mb-0 font-size-sm text-center text-muted">
              Already have an account? <a href="signin-illustration.html">Log in</a>.
            </p>

          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Signin: Horizontal  -->
  <div class="modal fade" id="modalSigninHorizontal" tabindex="-1" role="dialog" aria-labelledby="modalSigninHorizontalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="card card-row">
          <div class="row no-gutters">
            <div class="col-12 col-md-6 bg-cover card-img-left" style="background-image: url(<?php echo base_url().'assets/frontend/bensmart/img/photos/photo-1.jpg' ?>);">

              <!-- Image (placeholder) -->
              <img src="<?php echo base_url().'assets/frontend/bensmart/img/photos/photo-1.jpg' ?>" alt="..." class="img-fluid d-md-none invisible">

              <!-- Shape -->
              <div class="shape shape-right shape-fluid-y svg-shim text-white d-none d-md-block">
                <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M116 0H51v172C76 384 0 517 0 517v173h116V0z" fill="currentColor" />
                </svg>
              </div>

            </div>
            <div class="col-12 col-md-6">
              <div class="card-body">

                <!-- Close -->
                <button type="button" class="modal-close close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>

                <!-- Heading -->
                <h2 class="mb-0 font-weight-bold text-center" id="modalSigninHorizontalTitle">
                  Sign In
                </h2>

                <!-- Text -->
                <p class="mb-6 text-center text-muted">
                  Simplify your workflow in minutes.
                </p>

                <!-- Form -->
                <form class="mb-6">

                  <!-- Email -->
                  <div class="form-group">
                    <label class="sr-only" for="modalSigninHorizontalEmail">
                      Your email
                    </label>
                    <input type="email" class="form-control" id="modalSigninHorizontalEmail" placeholder="Your email">
                  </div>

                  <!-- Password -->
                  <div class="form-group mb-5">
                    <label class="sr-only" for="modalSigninHorizontalPassword">
                      Enter your password
                    </label>
                    <input type="password" class="form-control" id="modalSigninHorizontalPassword" placeholder="Enter your password">
                  </div>

                  <!-- Submit -->
                  <button class="btn btn-block btn-primary" type="submit">
                    Sign in
                  </button>

                </form>

                <!-- Text -->
                <p class="mb-0 font-size-sm text-center text-muted">
                  Don't have an account yet? <a href="signin-illustration.html">Sign up</a>.
                </p>

              </div>
            </div>

          </div> <!-- / .row -->
        </div>
      </div>
    </div>
  </div>

  <!-- Signup: Vertical  -->
  <div class="modal fade" id="modalSigninVertical" tabindex="-1" role="dialog" aria-labelledby="modalSigninVerticalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="card">

          <!-- Close -->
          <button type="button" class="modal-close close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>

          <!-- Image -->
          <img src="assets/img/photos/photo-21.jpg" alt="..." class="card-img-top">

          <!-- Shape -->
          <div class="position-relative">
            <div class="shape shape-bottom shape-fluid-x svg-shim text-white">
              <svg viewBox="0 0 2880 480" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2160 0C1440 240 720 240 720 240H0v240h2880V0h-720z" fill="currentColor" />
              </svg>
            </div>
          </div>

          <!-- Body -->
          <div class="card-body">

            <!-- Heading -->
            <h2 class="mb-0 font-weight-bold text-center" id="modalSigninVerticalTitle">
              Sign In
            </h2>

            <!-- Text -->
            <p class="mb-6 text-center text-muted">
              Simplify your workflow in minutes.
            </p>

            <!-- Form -->
            <form class="mb-6">

              <!-- Email -->
              <div class="form-group">
                <label class="sr-only" for="modalSigninVerticalEmail">
                  Your email
                </label>
                <input type="email" class="form-control" id="modalSigninVerticalEmail" placeholder="Your email">
              </div>

              <!-- Password -->
              <div class="form-group mb-5">
                <label class="sr-only" for="modalSigninVerticalPassword">
                  Enter your password
                </label>
                <input type="password" class="form-control" id="modalSigninVerticalPassword" placeholder="Enter your password">
              </div>

              <!-- Submit -->
              <button class="btn btn-block btn-primary" type="submit">
                Sign in
              </button>

            </form>

            <!-- Text -->
            <p class="mb-0 font-size-sm text-center text-muted">
              Don't have an account yet? <a href="signin-illustration.html">Sign up</a>.
            </p>

          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Example -->
  <div class="modal fade" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="modalPaymentTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">

          <!-- Close -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>

          <!-- Heading -->
          <h2 class="font-weight-bold text-center mb-1" id="modalPaymentTitle">
            Add Payment
          </h2>

          <!-- Text -->
          <p class="font-size-lg text-center text-muted mb-6 mb-md-8">
            Simplify your workflow in minutes.
          </p>

          <!-- Form -->
          <form>

            <!-- Name -->
            <div class="form-group">
              <label for="modalPaymentName">Name on card</label>
              <input class="form-control" id="modalPaymentName" type="text" placeholder="First Last">
            </div>

            <!-- Name -->
            <div class="form-group">
              <label for="modalPaymentNumbber">Card number</label>
              <input class="form-control" id="modalPaymentNumbber" type="number" placeholder="4242 4242 4242 4242">
            </div>

            <!-- Name -->
            <div class="form-group">
              <label for="modalPaymentDate">Exp. Date</label>
              <input class="form-control" id="modalPaymentDate" type="text" placeholder="03/2023">
            </div>

            <!-- Submit -->
            <button class="btn btn-block btn-primary mt-3 lift">
              Add Payment Method
            </button>

          </form>

        </div>
      </div>
    </div>
  </div>

  <section>
    <div class="container">
      <div class="row mt-8">

        <!-- Card Right -->
        <div class="col-lg-3" data-aos="fade-up">
          <!-- Card -->
          <div class="card shadow-light-lg mb-6 mb-md-4 lift lift-lg">
            <a href="javascript::" style="color: unset;">
              <div class="card-header filter-card-header bg-warning">
                <h4 class="mb-0">
                  Filter
                  <i class="fas fa-sliders-h" style="float: right;"></i>
                </h4>
              </div>
            </a>
            <div class="card accordion" id="featuresAccordion">
              <div class="card-body shadow-light">

                <!-- List group -->
                <div class="list-group list-group-flush">
                  <div class="list-group-item">

                    <!-- Toggle -->
                    <a class="d-flex align-items-center text-reset text-decoration-none" data-toggle="collapse" href="#featuresOne" role="button" aria-expanded="true" aria-controls="featuresOne">
                      <div class="mr-auto">

                        <!-- Title -->
                        <p class="font-weight-bold mb-0">
                          Jenjang
                        </p>

                        <!-- Text -->
                        <!-- <p class="font-size-sm text-muted mb-0">
                          Our new key fobs make it so easy!
                        </p> -->

                      </div>

                      <!-- Badge -->
                      <!-- <span class="badge badge-pill badge-success-soft ml-4">
                        <span class="h6 text-uppercase">New</span>
                      </span> -->

                      <!-- Chevron -->
                      <span class="collapse-chevron text-muted ml-4">
                        <i class="fe fe-lg fe-chevron-down"></i>
                      </span>

                    </a> <!-- / .row -->

                    <!-- Collapse -->
                    <div class="collapse show" id="featuresOne" data-parent="#featuresAccordion">
                      <div class="py-5 py-md-6">
                        <div class="">
                          <input type="radio" id="all" name="level" class="level custom-radio" value="all" onclick="filter(this)" <?php if ($selected_level == 'all') echo 'checked'; ?>>
                          <label for="all">Semua</label>
                        </div>
                        <div class="">
                          <input type="radio" id="beginner" name="level" class="level custom-radio" value="beginner" onclick="filter(this)" <?php if ($selected_level == 'beginner') echo 'checked'; ?>>
                          <label for="beginner">SD</label>
                        </div>
                        <div class="">
                          <input type="radio" id="advanced" name="level" class="level custom-radio" value="advanced" onclick="filter(this)" <?php if ($selected_level == 'advanced') echo 'checked'; ?>>
                          <label for="advanced">SMP</label>
                        </div>
                        <div class="">
                          <input type="radio" id="intermediate" name="level" class="level custom-radio" value="intermediate" onclick="filter(this)" <?php if ($selected_level == 'intermediate') echo 'checked'; ?>>
                          <label for="intermediate">SMA</label>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="list-group-item">

                    <!-- Toggle -->
                    <a class="d-flex align-items-center text-reset text-decoration-none" data-toggle="collapse" href="#featuresTwo" role="button" aria-expanded="false" aria-controls="featuresTwo">
                      <div class="mr-auto">

                        <!-- Title -->
                        <p class="font-weight-bold mb-0">
                          Harga
                        </p>

                        <!-- Text -->
                        <!-- <p class="font-size-sm text-muted mb-0">
                          Keep your engine going with free food and drinks.
                        </p> -->

                      </div>

                      <!-- Chevron -->
                      <span class="collapse-chevron text-muted ml-4">
                        <i class="fe fe-lg fe-chevron-down"></i>
                      </span>

                    </a> <!-- / .row -->

                    <!-- Collapse -->
                    <div class="collapse" id="featuresTwo" data-parent="#featuresAccordion">
                      <div class="py-5 py-md-6">
                        <div class="">
                          <input type="radio" id="price_all" name="price" class="prices custom-radio" value="all" onclick="filter(this)" <?php if ($selected_price == 'all') echo 'checked'; ?>>
                          <label for="price_all">Semua</label>
                        </div>
                        <div class="">
                          <input type="radio" id="price_free" name="price" class="prices custom-radio" value="free" onclick="filter(this)" <?php if ($selected_price == 'free') echo 'checked'; ?>>
                          <label for="price_free">Gratis</label>
                        </div>
                        <div class="">
                          <input type="radio" id="price_paid" name="price" class="prices custom-radio" value="paid" onclick="filter(this)" <?php if ($selected_price == 'paid') echo 'checked'; ?>>
                          <label for="price_paid">Berbayar</label>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="list-group-item">

                    <!-- Toggle -->
                    <a class="d-flex align-items-center text-reset text-decoration-none" data-toggle="collapse" href="#featuresThree" role="button" aria-expanded="false" aria-controls="featuresThree">
                      <div class="mr-auto">

                        <!-- Title -->
                        <p class="font-weight-bold mb-0">
                          Rating
                        </p>

                        <!-- Text -->
                        <!-- <p class="font-size-sm text-muted mb-0">
                          Connectivity, power, and IT issues solved in no time.
                        </p> -->

                      </div>

                      <!-- Chevron -->
                      <span class="collapse-chevron text-muted ml-4">
                        <i class="fe fe-lg fe-chevron-down"></i>
                      </span>

                    </a> <!-- / .row -->

                    <!-- Collapse -->
                    <div class="collapse" id="featuresThree" data-parent="#featuresAccordion">
                      <div class="py-5 py-md-6">
                        <div class="">
                          <input type="radio" id="all_rating" name="rating" class="ratings custom-radio" value="<?php echo 'all'; ?>" onclick="filter(this)" <?php if ($selected_rating == "all") echo 'checked'; ?>>
                          <label for="all_rating">Semua Rating</label>
                        </div>
                        <div class="">
                          <input type="radio" id="rating1" name="rating" class="ratings custom-radio" value="<?php echo '1'; ?>" onclick="filter(this)" <?php if ($selected_rating == "1") echo 'checked'; ?>>
                          <label for="all_rating">&#9734;</label>
                        </div>
                        <div class="">
                          <input type="radio" id="rating2" name="rating" class="ratings custom-radio" value="<?php echo '2'; ?>" onclick="filter(this)" <?php if ($selected_rating == "2") echo 'checked'; ?>>
                          <label for="all_rating">&#9734;&#9734;</label>
                        </div>
                        <div class="">
                          <input type="radio" id="rating3" name="rating" class="ratings custom-radio" value="<?php echo '3'; ?>" onclick="filter(this)" <?php if ($selected_rating == "3") echo 'checked'; ?>>
                          <label for="all_rating">&#9734;&#9734;&#9734;</label>
                        </div>
                        <div class="">
                          <input type="radio" id="rating4" name="rating" class="ratings custom-radio" value="<?php echo '4'; ?>" onclick="filter(this)" <?php if ($selected_rating == "4") echo 'checked'; ?>>
                          <label for="all_rating">&#9734;&#9734;&#9734;&#9734;</label>
                        </div>
                        <div class="">
                          <input type="radio" id="rating5" name="rating" class="ratings custom-radio" value="<?php echo '5'; ?>" onclick="filter(this)" <?php if ($selected_rating == "5") echo 'checked'; ?>>
                          <label for="all_rating">&#9734;&#9734;&#9734;&#9734;&#9734;</label>
                        </div>
                        <!-- <?php for ($i = 1; $i <= 5; $i++) : ?>
                          <div class="">
                            <input type="radio" id="rating_<?php echo $i; ?>" name="rating" class="ratings custom-radio" value="<?php echo $i; ?>" onclick="filter(this)" <?php if ($selected_rating == $i) echo 'checked'; ?>>
                            <label for="rating_<?php echo $i; ?>">
                              <?php for ($j = 1; $j <= $i; $j++) : ?>
                                <i class="bi bi-star" style="color: #f4c150;"></i>
                              <?php endfor; ?>
                              <?php for ($j = $i; $j < 5; $j++) : ?>
                                <i class="bi bi-star" style="color: #dedfe0;"></i>
                              <?php endfor; ?>
                            </label>
                          </div>
                        <?php endfor; ?> -->
                      </div>
                    </div>

                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Card Left -->
        <div class="col-lg-9 mb-5">

            <div class="card card-row shadow-light-lg mb-6">
              <div class="row no-gutters">
                <!-- GAMBAR -->
                <div class="col-12 col-md-4 ">
                  <div class="limit">
                    <img src="<?php echo base_url().'assets/frontend/bensmart/img/photos/photo-1.jpg' ?>" alt="..." class="card-img-left" style="display: block; margin: 0 auto;" >
                  </div>
                  <style type="text/css">
                    .limit{
                        width: 100%;
                        height: 300px;
                        max-height: 300px;
                        overflow: hidden;
                     }
                    .limit img{
                       width: 100%;
                       height: 100%;
                     }
                 </style>
                </div>
                <!-- TEXT -->
                <div class="col-12 col-md-8">
                  <!-- Body -->
                  <div class="px-6">
                    <div class="d-flex justify-content-between">

                      <h4 class="font-weight-bold mt-6">
                        Belajar Matematika
                      </h4>

                      <div class="position-relative mt-n4 mt-md-3 text-right mb-2 mr-0">
                        <span class="badge badge-pill badge-primary">
                          <span class="h6 fst-italic"><s>Rp 550.000</s></span>
                          <span class="h5 font-weight">Rp 290.000</span>
                        </span>
                      </div>
                    </div>
    
                    <!-- Text -->
                    <h6 class="text-muted mt-0" style="font-size: 14px;">
                      Belajar matematika tidak pernah semudah ini bersama Bensmart. Dari dulu belajar matematika gapernah paham?
                      disini solusinya.
                    </h6>
    
                   <div class="row align-items-center">
                      <p>                
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle ml-5" viewBox="0 0 20 20">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                        <h6 class="align-items-center pb-2 ml-1 text-gray-700" style="font-size: 14px;">Jenjang Sekolah Dasar</h6>
                      </p>
                    </div>
    
                    <div class="row align-items-center mt-n4">
                      <p>                
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person ml-5" viewBox="0 0 20 20">
                          <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                        <h6 class="align-items-center pb-2 ml-1 text-gray-700" style="font-size: 14px;">Fauzan Pratama Putra</h6>
                      </p>
                    </div>
    
                    <div class="row align-items-center mt-n4">
                      <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play-circle ml-5" viewBox="0 0 20 20">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z"/>
                        </svg>
                        <h6 class="align-items-center pb-2 ml-1 text-gray-700" style="font-size: 14px;">15 Materi, 20 Jam</h6>
                      </p>
                    </div>
    
                    <div class="row align-items-center mt-n4">
                      <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star ml-5" viewBox="0 0 20 20">
                          <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                        </svg>
                        <h6 class="align-items-center pb-2 ml-1 text-gray-700" style="font-size: 14px;">
                          <b>4.6</b>
                           (410 reviews)</h6>
                      </p>
                    </div>
                  </div>
                  <a href="#!" class="d-flex align-items-center font-weight-bold text-decoration-none mt-n2 mr-7 mb-5 mb-md-0 justify-content-end">
                    Ikuti Kelas <i class="fe fe-arrow-right ml-2"></i>
                  </a>
                </div>
              </div> <!-- / .row -->
            </div>            

		

            <div class="card card-row shadow-light-lg mb-6">
              <div class="row no-gutters">
                <!-- GAMBAR -->
                <div class="col-12 col-md-4 ">
                  <div class="limit">
                    <img src="<?php echo base_url().'assets/frontend/bensmart/img/photos/photo-1.jpg' ?>" alt="..." class="card-img-left" style="display: block; margin: 0 auto;" >
                  </div>
                  <style type="text/css">
                    .limit{
                        width: 100%;
                        height: 300px;
                        max-height: 300px;
                        overflow: hidden;
                     }
                    .limit img{
                       width: 100%;
                       height: 100%;
                     }
                 </style>
                </div>
                <!-- TEXT -->
                <div class="col-12 col-md-8">
                  <!-- Body -->
                  <div class="px-6">
                    <div class="d-flex justify-content-between">

                      <h4 class="font-weight-bold mt-6">
                        Belajar Matematika
                      </h4>

                      <div class="position-relative mt-n4 mt-md-3 text-right mb-2 mr-0">
                        <span class="badge badge-pill badge-primary">
                          <span class="h6 fst-italic"><s>Rp 550.000</s></span>
                          <span class="h5 font-weight">Rp 290.000</span>
                        </span>
                      </div>
                    </div>
    
                    <!-- Text -->
                    <h6 class="text-muted mt-0" style="font-size: 14px;">
                      Belajar matematika tidak pernah semudah ini bersama Bensmart. Dari dulu belajar matematika gapernah paham?
                      disini solusinya.
                    </h6>
    
                   <div class="row align-items-center">
                      <p>                
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle ml-5" viewBox="0 0 20 20">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                        <h6 class="align-items-center pb-2 ml-1 text-gray-700" style="font-size: 14px;">Jenjang Sekolah Dasar</h6>
                      </p>
                    </div>
    
                    <div class="row align-items-center mt-n4">
                      <p>                
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person ml-5" viewBox="0 0 20 20">
                          <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                        <h6 class="align-items-center pb-2 ml-1 text-gray-700" style="font-size: 14px;">Fauzan Pratama Putra</h6>
                      </p>
                    </div>
    
                    <div class="row align-items-center mt-n4">
                      <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play-circle ml-5" viewBox="0 0 20 20">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z"/>
                        </svg>
                        <h6 class="align-items-center pb-2 ml-1 text-gray-700" style="font-size: 14px;">15 Materi, 20 Jam</h6>
                      </p>
                    </div>
    
                    <div class="row align-items-center mt-n4">
                      <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star ml-5" viewBox="0 0 20 20">
                          <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                        </svg>
                        <h6 class="align-items-center pb-2 ml-1 text-gray-700" style="font-size: 14px;">
                          <b>4.6</b>
                           (410 reviews)</h6>
                      </p>
                    </div>
                  </div>
                  <a href="#!" class="d-flex align-items-center font-weight-bold text-decoration-none mt-n2 mr-7 mb-5 mb-md-0 justify-content-end">
                    Ikuti Kelas <i class="fe fe-arrow-right ml-2"></i>
                  </a>
                </div>
              </div> <!-- / .row -->
            </div>            


		
		
        </div>

      </div>
    </div>
  </section>

</body>