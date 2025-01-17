<?php
require "navbar.php";

if (isset($_POST['profile_update_btn'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];

    $sql = "UPDATE `users` SET `fname`='$fname', `lname`='$lname', `email`='$email' ,`phone`='$phone' ,`country`='$country' WHERE `id`='$id'";
    $res = mysqli_query($con, $sql);
    if ($res) {
        echo '<script>window.location.href="account-settings.php"</script>';
    }
}
?>





<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
              Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-notifications.php"><i class="bx bx-bell me-1"></i>
              Notifications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-connections.php"><i class="bx bx-link-alt me-1"></i>
              Connections</a>
          </li>
        </ul>
        <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img src="<?php echo $row['image']; ?>" alt="user-avatar" class="d-block rounded" height="100" width="100"
                id="uploadedAvatar" />
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                  <span class="d-none d-sm-block">Upload new photo</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                </label>
                <button type="reset" class="btn btn-outline-secondary account-image-reset mb-4">
                  <i class="bx bx-reset d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Reset</span>
                </button>

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
            <form id="formAccountSettings" method="POST">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <input class="form-control" type="text" id="firstName" name="firstname" ;
                    value="<?php echo $row['fname']; ?>" autofocus />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input class="form-control" type="text" name="lastname" id="lastName"
                    value="<?php echo $row['lname']; ?>" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-mail</label>
                  <input class="form-control" type="text" id="email" name="email" value="<?php echo $row['email']; ?>"
                    placeholder="john.doe@example.com" />
                </div>
                <!-- <div class="mb-3 col-md-6">
                                    <label for="organization" class="form-label">Organization</label>
                                    <input type="text" class="form-control" id="organization" name="organization"
                                        value="ThemeSelection" />
                                </div> -->
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="phoneNumber">Phone Number</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"></span>
                    <input type="text" id="phoneNumber" class="form-control" placeholder="Enter Your Phone Number"
                      name="phone" value="<?php echo $row['phone']; ?>" />
                  </div>
                </div>
                <!-- <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Address" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="state" class="form-label">State</label>
                                    <input class="form-control" type="text" id="state" name="state"
                                        placeholder="California" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="zipCode" class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" id="zipCode" name="zipCode"
                                        placeholder="231465" maxlength="6" />
                                </div> -->
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="country">Country</label>
                  <select id="country" name="country" class="select2 form-select">
                    <option value="">Select</option>
                    <?php
                                        $countrysql = mysqli_query($con, "SELECT * FROM `country`");
                                        while ($countryrow = mysqli_fetch_assoc($countrysql)) {

                                            if ($row['country'] == $countryrow['id']) {
                                        ?>
                    <option value="<?php echo $countryrow['id']; ?>" selected><?php echo $countryrow['name']; ?>
                    </option>
                    <?php
                                            } else {
                                            ?>
                    <option value="<?php echo $countryrow['id']; ?>"><?php echo $countryrow['name']; ?>

                      <?php }
                                        } ?>



                  </select>
                </div>
                <!-- <div class="mb-3 col-md-6">
                                    <label for="language" class="form-label">Language</label>
                                    <select id="language" class="select2 form-select">
                                        <option value="">Select Language</option>
                                        <option value="en">English</option>
                                        <option value="fr">French</option>
                                        <option value="de">German</option>
                                        <option value="pt">Portuguese</option>
                                    </select>
                                </div> -->

                <!-- <div class="mb-3 col-md-6">
                                    <label for="currency" class="form-label">Currency</label>
                                    <select id="currency" class="select2 form-select">
                                        <option value="">Select Currency</option>
                                        <option value="usd">USD</option>
                                        <option value="euro">Euro</option>
                                        <option value="pound">Pound</option>
                                        <option value="bitcoin">Bitcoin</option>
                                    </select>
                                </div> -->
              </div>
              <div class="mt-2">
                <button type="submit" name="profile_update_btn" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
        <div class="card">
          <h5 class="card-header">Delete Account</h5>
          <div class="card-body">
            <div class="mb-3 col-12 mb-0">
              <div class="alert alert-warning">
                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?
                </h6>
                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.
                </p>
              </div>
            </div>
            <form id="formAccountDeactivation" onsubmit="return false">
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                <label class="form-check-label" for="accountActivation">I confirm my account
                  deactivation</label>
              </div>
              <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / Content -->

  <!-- Footer -->
  <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">
        ©
        <script>
        document.write(new Date().getFullYear());
        </script>
        , made with ❤️ by
        <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
      </div>
      <div>
        <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
        <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

        <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
          class="footer-link me-4">Documentation</a>

        <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
          class="footer-link me-4">Support</a>
      </div>
    </div>
  </footer>
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>


<!-- Core JS -->
<!-- build:js assetsvendor/js/core.js -->
<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/libs/popper/popper.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="assets/js/main.js"></script>

<!-- Page JS -->
<script src="assets/js/pages-account-settings-account.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>