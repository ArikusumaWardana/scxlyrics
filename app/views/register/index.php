
    <main class="body-login w-100 m-auto">
        <form action="<?= url('auth/registerProcess/') ?>" method="POST">
            <div class="title-login">
                <h1><i class='bx bxl-xing bx-flip-vertical me-2' ></i>Sign Up</h1>
            </div>
            <?php Flasher::flash() ?>
            <div class="name-field">
                <input type="text" name="name" placeholder="masukan name..." minlength="50">
            </div>
            <div class="username-field">
                <input type="text" name="username" placeholder="masukan username..." minlength="50">
            </div>
            <div class="email-field">
                <input type="email" name="email_user" placeholder="masukan email..." minlength="50">
            </div>
            <div class="password-field">
                <input type="password" name="password" placeholder="masukan password..." minlength="8" maxlength="15">
                <div class="info-password">
                    <span class="text-secondary">Password at least 8 - 15 characters</span>
                </div>
            </div>
            
            
            <div class="button-field">
                <button type="submit">Sign Up</button>
            </div>
            <div class="text-register">
                <span>Already have account? <a href="<?= url('auth/login/') ?>">Login!</a></span>
            </div>
        </form>
    </main>
