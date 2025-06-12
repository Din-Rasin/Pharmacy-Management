<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Pharmacy Management - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-color: #3dd28d;
            --dark-bg: #141414;
            --card-bg: rgba(34, 34, 34, 0.85);
            --text-light: #f8f9fa;
            --glow-color: rgba(40, 167, 69, 0.5);
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
            background: linear-gradient(-45deg, #141414, #1a1a2e, #16213e, #0f3460);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
            perspective: 1000px;
            color: var(--text-light);
        }

        /* Particle background */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        /* Floating 3D shapes */
        .shape {
            position: fixed;
            opacity: 0.1;
            animation: float 20s infinite ease-in-out, rotate 30s infinite linear;
            z-index: -1;
            pointer-events: none;
        }

        .shape-1 {
            width: 100px;
            height: 100px;
            background: #ff5e62;
            top: 20%;
            left: 10%;
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        }

        .shape-2 {
            width: 150px;
            height: 150px;
            background: #4facfe;
            bottom: 15%;
            right: 10%;
            border-radius: 50%;
        }

        .shape-3 {
            width: 80px;
            height: 80px;
            background: #a6ffcb;
            top: 60%;
            left: 30%;
            transform: rotate(45deg);
        }

        /* Card styling with enhanced 3D effects */
        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            transform-style: preserve-3d;
            padding: 20px;
        }

        .card {
            position: relative;
            width: 100%;
            max-width: 380px;
            height: auto;
            margin: 0 auto;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.6);
            transform-style: preserve-3d;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
            z-index: 10;
            background: transparent;
            border: none;
        }

        .card:hover {
            transform: translateY(-10px) rotateX(5deg);
            box-shadow: 0 30px 50px rgba(0, 0, 0, 0.8);
        }

        /* Animated gradient border */
        .card::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: linear-gradient(45deg, 
                #ff0000, #ff7300, #fffb00, #48ff00, 
                #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            background-size: 400%;
            z-index: -1;
            border-radius: 25px;
            animation: borderGlow 20s linear infinite;
            filter: blur(8px);
            opacity: 0.7;
        }

        /* Inner glow effect */
        .card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at center, 
                rgba(255,255,255,0.1) 0%, 
                rgba(255,255,255,0) 70%);
            z-index: -1;
            border-radius: 15px;
        }

        .card-inner {
            position: relative;
            padding: 30px;
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            z-index: 10;
            color: white;
            transform-style: preserve-3d;
        }

        /* Form elements */
        .form-control {
            background-color: rgba(51, 51, 51, 0.8);
            color: white;
            border: 1px solid #555;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: rgba(70, 70, 70, 0.8);
            box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
            border-color: var(--primary-color);
        }

        .btn-custom {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);
            color: white;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(40, 167, 69, 0.6);
            color: white;
        }

        /* Profile image with pulse animation */
        .profile {
            width: 100px;
            height: 100px;
            display: block;
            margin: 0 auto 20px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
            box-shadow: 0 0 20px var(--glow-color);
            animation: pulse 2s infinite alternate;
        }

        .logo-caption {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .logo-caption .tweak {
            color: var(--primary-color);
            font-weight: bold;
        }

        .logo-caption::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 3px;
        }

        /* Animations */
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes borderGlow {
            0% { background-position: 0 0; }
            50% { background-position: 400% 0; }
            100% { background-position: 0 0; }
        }

        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
            100% { transform: translateY(0) rotate(0deg); }
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 var(--glow-color); }
            70% { box-shadow: 0 0 0 15px rgba(40, 167, 69, 0); }
            100% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0); }
        }

        /* Floating text animation */
        .floating-text {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        /* Card footer links */
        .card-footer a {
            color: var(--text-light);
            transition: color 0.3s ease;
            text-decoration: none;
        }

        .card-footer a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }

        /* Error messages */
        #username_error, #password_error, #confirm_password_error {
            display: none;
            color: #ff6b6b !important;
            font-size: 0.85rem;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .card-inner {
                padding: 20px;
            }
            
            .profile {
                width: 80px;
                height: 80px;
            }
            
            .logo-caption {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="particles" id="particles"></div>
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>

    <div class="container">
        <!-- Login Form -->
        <div id="login-form" class="card-container">
            <div class="card">
                <div class="card-inner">
                    <form name="login-form" class="login-form" action="home.php" method="post" onsubmit="return validateCredentials();">
                        <div class="logo">
                            <img src="images/prof.jpg" class="profile"/>
                            <h1 class="logo-caption text-center"><span class="tweak">L</span>ogin</h1>
                        </div>
                        
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
                            </div>
                            <input name="username" type="text" class="form-control" placeholder="Username" onkeyup="validate();" required>
                        </div>
                        
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
                            </div>
                            <input name="password" type="password" class="form-control" placeholder="Password" onkeyup="validate();" required>
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-default btn-block btn-custom">Login</button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <a class="text-light" onclick="displayForgotPasswordForm();" style="cursor: pointer;">Forgot password?</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Forgot Password Form -->
        <div id="forgot-password-form" class="card-container" style="display: none;">
            <div class="card">
                <div class="card-inner">
                    <div name="login-form" class="login-form">
                        <div class="logo">
                            <img src="images/prof.jpg" class="profile"/>
                            <h1 class="logo-caption text-center"><span class="tweak">F</span>orgot <span class="tweak">P</span>assword</h1>
                        </div>

                        <div id="email-number-fields">
                            <p class="h6 text-center text-light mb-4">Enter email and contact number below to reset username and password</p>
                            
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope text-white"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control" placeholder="Enter email" required>
                            </div>
                            
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone text-white"></i></span>
                                </div>
                                <input id="contact_number" type="tel" class="form-control" placeholder="Enter contact number" onkeyup="validate();" required>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-default btn-block btn-custom" onclick="verifyEmailNumber();">Verify</button>
                            </div>
                        </div>

                        <div id="username-password-fields" style="display: none;">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
                                </div>
                                <input id="username" type="text" class="form-control" placeholder="Enter username" onblur="notNull(this.value, 'username_error');">
                            </div>
                            <code class="text-danger small font-weight-bold float-right mb-2" id="username_error"></code>
                            
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock text-white"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control" placeholder="Enter password" onkeyup="validatePassword();">
                            </div>
                            <code class="text-danger small font-weight-bold float-right mb-2" id="password_error"></code>
                            
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
                                </div>
                                <input id="confirm_password" type="password" class="form-control" placeholder="Confirm password" onkeyup="validatePassword();">
                            </div>
                            <code class="text-danger small font-weight-bold float-right mb-2" id="confirm_password_error"></code>
                            
                            <div class="form-group">
                                <button class="btn btn-default btn-block btn-custom" onclick="updateUsernamePassword();">Reset Password</button>
                            </div>
                        </div>
                        
                        <div class="text-center mt-3">
                            <a class="text-light" onclick="displayLoginForm();" style="cursor: pointer;">Login here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/index.js"></script>
    <script src="js/validateForm.js"></script>
    <script>
        // Create particle background
        document.addEventListener('DOMContentLoaded', function() {
            // Only create particles if the element exists
            const particlesContainer = document.getElementById('particles');
            if (particlesContainer) {
                const particleCount = Math.floor(window.innerWidth / 10); // Adjust based on screen size
                
                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.classList.add('particle');
                    
                    // Random properties
                    const size = Math.random() * 5 + 1;
                    const posX = Math.random() * window.innerWidth;
                    const posY = Math.random() * window.innerHeight;
                    const delay = Math.random() * 10;
                    const duration = Math.random() * 20 + 10;
                    const opacity = Math.random() * 0.5 + 0.1;
                    
                    // Apply styles
                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;
                    particle.style.left = `${posX}px`;
                    particle.style.top = `${posY}px`;
                    particle.style.animationDelay = `${delay}s`;
                    particle.style.animationDuration = `${duration}s`;
                    particle.style.opacity = opacity;
                    
                    // Add to DOM
                    particlesContainer.appendChild(particle);
                }
            }
            
            // Parallax effect for shapes
            let lastX = 0, lastY = 0;
            const parallaxSmoothing = 0.1;
            
            document.addEventListener('mousemove', (e) => {
                // Smooth the movement
                const targetX = e.clientX / window.innerWidth;
                const targetY = e.clientY / window.innerHeight;
                lastX = lastX + (targetX - lastX) * parallaxSmoothing;
                lastY = lastY + (targetY - lastY) * parallaxSmoothing;
                
                // Apply to shapes
                const shape1 = document.querySelector('.shape-1');
                const shape2 = document.querySelector('.shape-2');
                const shape3 = document.querySelector('.shape-3');
                
                if (shape1) {
                    shape1.style.transform = 
                        `translate(${lastX * 50}px, ${lastY * 50}px) rotate(${lastX * 360}deg)`;
                }
                
                if (shape2) {
                    shape2.style.transform = 
                        `translate(${lastX * -30}px, ${lastY * -30}px) rotate(${lastY * 360}deg)`;
                }
                
                if (shape3) {
                    shape3.style.transform = 
                        `translate(${lastX * 40}px, ${lastY * -40}px) rotate(${(lastX + lastY) * 360}deg)`;
                }
                
                // Card tilt effect
                const card = document.querySelector('.card');
                if (card) {
                    const cardRect = card.getBoundingClientRect();
                    const cardCenterX = cardRect.left + cardRect.width / 2;
                    const cardCenterY = cardRect.top + cardRect.height / 2;
                    const angleX = (e.clientY - cardCenterY) / 20;
                    const angleY = (cardCenterX - e.clientX) / 20;
                    
                    card.style.transform = `rotateX(${angleX}deg) rotateY(${angleY}deg)`;
                }
            });
            
            // Reset card position when mouse leaves
            const card = document.querySelector('.card');
            if (card) {
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'rotateX(0) rotateY(0)';
                });
            }
            
            // Form switching functionality
            window.displayForgotPasswordForm = function() {
                document.getElementById('login-form').style.display = 'none';
                document.getElementById('forgot-password-form').style.display = 'flex';
                document.getElementById('email-number-fields').style.display = 'block';
                document.getElementById('username-password-fields').style.display = 'none';
            };
            
            window.displayLoginForm = function() {
                document.getElementById('login-form').style.display = 'flex';
                document.getElementById('forgot-password-form').style.display = 'none';
            };
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            const particlesContainer = document.getElementById('particles');
            if (particlesContainer) {
                particlesContainer.innerHTML = ''; // Clear existing particles
                
                const particleCount = Math.floor(window.innerWidth / 10);
                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.classList.add('particle');
                    
                    const size = Math.random() * 5 + 1;
                    const posX = Math.random() * window.innerWidth;
                    const posY = Math.random() * window.innerHeight;
                    const delay = Math.random() * 10;
                    const duration = Math.random() * 20 + 10;
                    const opacity = Math.random() * 0.5 + 0.1;
                    
                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;
                    particle.style.left = `${posX}px`;
                    particle.style.top = `${posY}px`;
                    particle.style.animationDelay = `${delay}s`;
                    particle.style.animationDuration = `${duration}s`;
                    particle.style.opacity = opacity;
                    
                    particlesContainer.appendChild(particle);
                }
            }
        });
    </script>
</body>
</html>