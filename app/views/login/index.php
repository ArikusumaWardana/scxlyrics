
    
    <main class="body-login w-100 m-auto shadow-lg">
        <form action="<?= url('auth/authenticate') ?>" method="POST">
            <div class="title-login">
                <h1><i class='bx bxl-xing bx-flip-vertical me-2' ></i>Sign In</h1>
            </div>
            <?php Flasher::flash() ?>
            <div class="email-field">
                <input type="email" name="email" placeholder="Your email...">
            </div>
            <div class="password-field">
                <input type="password" name="password" placeholder="Your password...">
                <div class="forgot-password-link">
                    <span><a href="">Forgot Password ?</a></span>
                </div>
            </div>
            
            <div class="button-field">
                <button type="submit">Sign In</button>
            </div>
            <div class="text-register">
                <span>Don't have account? <a href="<?= url('auth/register/') ?>">Register!</a></span>
            </div>
        </form>
    </main>

