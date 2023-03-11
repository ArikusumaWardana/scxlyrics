
    <main class="body-login w-100 m-auto">
        <form action="<?= baseUrl ?>auth/registerProcess/" method="POST">
            <div class="title-login">
                <h1><i class='bx bxl-xing bx-flip-vertical me-2' ></i>Sign Up</h1>
            </div>
            <div class="name-field">
                <input type="text" name="name" placeholder="name...">
            </div>
            <div class="username-field">
                <input type="text" name="username" placeholder="username...">
            </div>
            <div class="email-field">
                <input type="email" name="email_user" placeholder="email...">
            </div>
            <div class="password-field">
                <input type="password" name="password" placeholder="password...">
                <div class="info-password">
                    <span class="text-secondary">Password at least 8 - 15 characters</span>
                </div>
            </div>
            
            
            <div class="button-field">
                <button type="submit">Sign Up</button>
            </div>
            <div class="text-register">
                <span>Already have account? <a href="<?= baseUrl ?>auth/login/">Login!</a></span>
            </div>
        </form>
    </main>
