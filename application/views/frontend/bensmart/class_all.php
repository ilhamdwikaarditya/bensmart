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
            <div class="col-12 col-md-6 bg-cover card-img-left" style="background-image: url(assets/img/photos/photo-1.jpg);">

              <!-- Image (placeholder) -->
              <img src="assets/img/photos/photo-1.jpg" alt="..." class="img-fluid d-md-none invisible">

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
        <div class="col-lg-4" data-aos="fade-up">
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
          <!--   <div id="collapseFilter" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body pt-0">
                <div class="filter_type">
                  <h6>Materi</h6>
                  <ul>
                    <li class="ml-2">
                      <div class="">
                        <input type="radio" id="category_all" name="sub_category" class="categories custom-radio" value="all" onclick="filter(this)">
                        <label for="category_all">Semua Materi</label>
                      </div>
                    </li>
                  </ul>
                  <a href="javascript::" id="city-toggle-btn" onclick="showToggle(this, 'hidden-categories')" style="font-size: 12px;"></a>
                </div>
                <hr>
                <div class="filter_type">
                  <div class="form-group">
                    <h6>Harga</h6>
                    <ul>
                      <li>
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
                      </li>
                    </ul>
                  </div>
                </div>
                <hr>
                <div class="filter_type">
                  <h6>Jenjang</h6>
                  <ul>
                    <li>
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
                    </li>
                  </ul>
                </div>
                <hr>
                <div class="filter_type">
                  <h6><?php echo site_phrase('ratings'); ?></h6>
                  <ul>
                    <li>
                      <div class="">
                        <input type="radio" id="all_rating" name="rating" class="ratings custom-radio" value="<?php echo 'all'; ?>" onclick="filter(this)" <?php if ($selected_rating == "all") echo 'checked'; ?>>
                        <label for="all_rating"><?php echo site_phrase('all'); ?></label>
                      </div>
                    </li>
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                      <li>
                        <div class="">
                          <input type="radio" id="rating_<?php echo $i; ?>" name="rating" class="ratings custom-radio" value="<?php echo $i; ?>" onclick="filter(this)" <?php if ($selected_rating == $i) echo 'checked'; ?>>
                          <label for="rating_<?php echo $i; ?>">
                            <?php for ($j = 1; $j <= $i; $j++) : ?>
                              <i class="fas fa-star" style="color: #f4c150;"></i>
                            <?php endfor; ?>
                            <?php for ($j = $i; $j < 5; $j++) : ?>
                              <i class="far fa-star" style="color: #dedfe0;"></i>
                            <?php endfor; ?>
                          </label>
                        </div>
                      </li>
                    <?php endfor; ?>
                  </ul>
                </div>
              </div>
            </div> -->
        </div>

        <!-- Card Left -->
        <div class="col-lg-8 mb-5">
          <div class="card shadow-light-lg px-5 py-5">
            <div class="card-header-class">
              <h1 class="font-weight-bold">
                Belajar Matematika Sehari Semalam
              </h1>

              <div class="row ml-0 mt-n2 mb-5">
                <h5>
                  <span class="font-weight-bold">4.0 </span>

                </h5>

                <div class="star mt-0 ml-2">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                </div>

                <h5 class="text-muted mt-0 ml-2">(2.000 reviews)</h5>

              </div>
            </div>

            <div class="card-body-class">
              <p>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                qui officia deserunt mollit anim id est laborum."
              </p>
            </div>
            <hr>

            <section>

              <div class="row ml-0">
                <h3 class="font-weight-bold">
                  Daftar Kelas
                </h3>
              </div>

              <div class="row justify-content-center">

                <div class="col-12">

                  <!-- Card -->
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
                                Flexible access to facilities.
                              </p>

                              <!-- Text -->
                              <p class="font-size-sm text-muted mb-0">
                                Our new key fobs make it so easy!
                              </p>

                            </div>

                            <!-- Badge -->
                            <span class="badge badge-pill badge-success-soft ml-4">
                              <span class="h6 text-uppercase">New</span>
                            </span>

                            <!-- Chevron -->
                            <span class="collapse-chevron text-muted ml-4">
                              <i class="fe fe-lg fe-chevron-down"></i>
                            </span>

                          </a> <!-- / .row -->

                          <!-- Collapse -->
                          <div class="collapse show bg-light" id="featuresOne" data-parent="#featuresAccordion">
                            <div class="py-5 py-md-6">
                              <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt rerum minima a possimus, amet perferendis, temporibus obcaecati pariatur. Reprehenderit magnam necessitatibus vel culpa provident quas nesciunt sunt aut cupiditate fugiat! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt rerum minima a possimus, amet perferendis, temporibus obcaecati pariatur. Reprehenderit magnam necessitatibus vel culpa provident quas nesciunt sunt aut cupiditate fugiat!
                              </p>
                              <a href="#!" class="font-weight-bold text-decoration-none">
                                Check it out <i class="fe fe-arrow-right ml-3"></i>
                              </a>
                            </div>
                          </div>

                        </div>

                        <div class="list-group-item">

                          <!-- Toggle -->
                          <a class="d-flex align-items-center text-reset text-decoration-none" data-toggle="collapse" href="#featuresTwo" role="button" aria-expanded="false" aria-controls="featuresTwo">
                            <div class="mr-auto">

                              <!-- Title -->
                              <p class="font-weight-bold mb-0">
                                Snacks, drinks, coffee, and more.
                              </p>

                              <!-- Text -->
                              <p class="font-size-sm text-muted mb-0">
                                Keep your engine going with free food and drinks.
                              </p>

                            </div>

                            <!-- Chevron -->
                            <span class="collapse-chevron text-muted ml-4">
                              <i class="fe fe-lg fe-chevron-down"></i>
                            </span>

                          </a> <!-- / .row -->

                          <!-- Collapse -->
                          <div class="collapse" id="featuresTwo" data-parent="#featuresAccordion">
                            <div class="py-5 py-md-6">
                              <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt rerum minima a possimus, amet perferendis, temporibus obcaecati pariatur. Reprehenderit magnam necessitatibus vel culpa provident quas nesciunt sunt aut cupiditate fugiat! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt rerum minima a possimus, amet perferendis, temporibus obcaecati pariatur. Reprehenderit magnam necessitatibus vel culpa provident quas nesciunt sunt aut cupiditate fugiat!
                              </p>
                              <a href="#!" class="font-weight-bold text-decoration-none">
                                Check it out <i class="fe fe-arrow-right ml-3"></i>
                              </a>
                            </div>
                          </div>

                        </div>
                        <div class="list-group-item">

                          <!-- Toggle -->
                          <a class="d-flex align-items-center text-reset text-decoration-none" data-toggle="collapse" href="#featuresThree" role="button" aria-expanded="false" aria-controls="featuresThree">
                            <div class="mr-auto">

                              <!-- Title -->
                              <p class="font-weight-bold mb-0">
                                On site tech support
                              </p>

                              <!-- Text -->
                              <p class="font-size-sm text-muted mb-0">
                                Connectivity, power, and IT issues solved in no time.
                              </p>

                            </div>

                            <!-- Chevron -->
                            <span class="collapse-chevron text-muted ml-4">
                              <i class="fe fe-lg fe-chevron-down"></i>
                            </span>

                          </a> <!-- / .row -->

                          <!-- Collapse -->
                          <div class="collapse" id="featuresThree" data-parent="#featuresAccordion">
                            <div class="py-5 py-md-6">
                              <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt rerum minima a possimus, amet perferendis, temporibus obcaecati pariatur. Reprehenderit magnam necessitatibus vel culpa provident quas nesciunt sunt aut cupiditate fugiat! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt rerum minima a possimus, amet perferendis, temporibus obcaecati pariatur. Reprehenderit magnam necessitatibus vel culpa provident quas nesciunt sunt aut cupiditate fugiat!
                              </p>
                              <a href="#!" class="font-weight-bold text-decoration-none">
                                Check it out <i class="fe fe-arrow-right ml-3"></i>
                              </a>
                            </div>
                          </div>

                        </div>
                      </div>

                    </div>
                  </div>

                </div>
              </div> <!-- / .row -->

            </section>

            <hr>

            <div class="section">

              <h3 class="font-weight-bold">
                Mentor Kelas
              </h3>

              <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto bd-highlight">
                  <div class="avatar avatar-xxl justify-content-center">
                    <img class="avatar-img rounded-circle" src="assets/img/avatars/avatar-1.jpg" alt="...">
                  </div>

                  <div class="d-flex bd-highlight justify-content-center">
                    <p class="mr-1">4.7</p>
                    <span class="fa fa-star checked mt-1 mb-0"></span>
                  </div>
                </div>

                <div class="ml-5 bd-highlight">
                  <h4 class="mb-0 ">
                    Cristananda Ratnady
                  </h4>

                  <p class="text-muted mb-1" style="font-size: 16px; font-style: italic;">
                    "Manusia terbaik adalah manusia yang bermanfaat bagi manusia lainnya"
                  </p>

                  <p style="font-size: 17px;">
                    Merupakan seorang pengajar lulusan Universitas Bensmart. Selama ini selalu memenangkan perlombaan.
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  </p>
                </div>
              </div>

            </div>

          </div>

        </div>

      </div>
    </div>
  </section>

</body>