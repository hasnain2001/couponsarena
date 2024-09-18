<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>
    <link rel="shortcut icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">

    <meta name="author" content="John Doe">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Find the best deals, discounts, and coupons on BudgetHeaven. Save money on your favorite products from top brands.">
    <link rel="canonical" href="https://budgetheaven.com/terms-and-condition">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTTXfVdR3rO8tHts/6zOeXt5lrGO7fVpyHDlHRl9e35G2oYy5v2cygVzQXvH7Np6Tq+0Vs1bqA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7f8fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .contain {
            max-width: 800px;
            margin: 50px auto;
            padding: 25px;
            background-color: #fff;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            border-top: 4px solid #007bff;
            border-bottom: 4px solid #007bff;
        }

        h1 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            color: #007bff;
            text-align: center;
            font-weight: 700;
            position: relative;
        }

        h1:before {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -10px;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background-color: #007bff;
            border-radius: 5px;
        }

        h2 {
            font-size: 1.8rem;
            margin-top: 35px;
            margin-bottom: 20px;
            color: #0056b3;
            border-left: 4px solid #007bff;
            padding-left: 15px;
            position: relative;
        }

        h2:before {
            content: "\f0f6";
            font-family: "FontAwesome";
            position: absolute;
            left: -30px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            color: #007bff;
        }

        p,
        li {
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 15px;
            color: #555;
        }

        ul {
            padding-left: 25px;
            margin-top: 15px;
        }

        ul li {
            list-style-type: disc;
        }

        .divider {
            height: 1px;
            background-color: #e1e1e1;
            margin: 40px 0;
        }

        .contact-info ul {
            padding-left: 0;
            list-style-type: none;
        }

        .contact-info ul li {
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .contact-info ul li .fas {
            margin-right: 10px;
            color: #007bff;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 20px auto;
            }

            h1 {
                font-size: 2.3rem;
            }

            h2 {
                font-size: 1.6rem;
            }

            p,
            li {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <nav>
        @include('components.nav')
      </nav>
    <div class="contain">
        <h1 class="fw-bold">Terms and Conditions</h1>
        <p>Welcome to BudgetHeaven.</p>
        <p>These Terms & Conditions ("Terms") govern your use of the BudgetHeaven website (the "Website") and all related services provided by BudgetHeaven ("BudgetHeaven", "we", "us", or "our"). By accessing or using the Website, you agree to be bound by these Terms. If you do not agree to these Terms, please do not use the Website.</p>

        <div class="divider"></div>

        <h2>1. User Agreement</h2>
        <p>By using the Website, you agree to comply with these Terms and any additional terms that we may provide to you in connection with your use of specific features or services.</p>

        <h2>2. Use of the Website</h2>
        <p>You may use the Website for your personal, non-commercial purposes only. You may not use the Website for any illegal or unauthorized purpose. You agree to comply with all applicable laws, rules, and regulations.</p>

        <h2>3. Account Registration</h2>
        <p>In order to access certain features of the Website, you may be required to register for an account. When registering for an account, you agree to provide accurate, current, and complete information about yourself. You are solely responsible for maintaining the confidentiality of your account and password and for restricting access to your account. You agree to accept responsibility for all activities that occur under your account.</p>

        <h2>4. Content</h2>
        <p>You acknowledge that all content on the Website, including but not limited to text, images, graphics, logos, and software, is owned by BudgetHeaven or its licensors and is protected by copyright, trademark, and other intellectual property laws. You may not modify, reproduce, distribute, or create derivative works based on any content on the Website without the express written consent of BudgetHeaven.</p>

        <h2>5. User-Submitted Content</h2>
        <p>By submitting content to the Website, including but not limited to reviews, comments, and ratings, you grant BudgetHeaven a non-exclusive, royalty-free, perpetual, irrevocable, and fully sublicensable right to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, and display such content throughout the world in any media.</p>

        <h2>6. Links to Third-Party Websites</h2>
        <p>The Website may contain links to third-party websites or resources. You acknowledge and agree that BudgetHeaven is not responsible or liable for: (i) the availability or accuracy of such websites or resources; or (ii) the content, products, or services on or available from such websites or resources. Links to such websites or resources do not imply any endorsement by BudgetHeaven of such websites or resources or the content, products, or services available from such websites or resources. You acknowledge sole responsibility for and assume all risk arising from your use of any such websites or resources.</p>

        <h2>7. Termination</h2>
        <p>BudgetHeaven may terminate or suspend your access to the Website at any time, with or without cause, and with or without notice.</p>

        <h2>8. Limitation of Liability</h2>
        <p>In no event shall BudgetHeaven, its officers, directors, employees, or agents, be liable to you for any direct, indirect, incidental, special, punitive, or consequential damages whatsoever resulting from any (i) errors, mistakes, or inaccuracies of content; (ii) personal injury or property damage, of any nature whatsoever, resulting from your access to and use of the Website; (iii) any unauthorized access to or use of our secure servers and/or any and all personal information stored therein; (iv) any interruption or cessation of transmission to or from the Website; (v) any bugs, viruses, trojan horses, or the like, which may be transmitted to or through the Website by any third party; and/or (vi) any errors or omissions in any content or for any loss or damage of any kind incurred as a result of your use of any content posted, emailed, transmitted, or otherwise made available via the Website, whether based on warranty, contract, tort, or any other legal theory, and whether or not the company is advised of the possibility of such damages.</p>

        <h2>9. Indemnification</h2>
        <p>You agree to indemnify and hold harmless BudgetHeaven, its officers, directors, employees, and agents, from and against any claims, liabilities, damages, losses, and expenses, including without limitation reasonable legal and accounting fees, arising out of or in any way connected with your access to or use of the Website or your violation of these Terms.</p>

        <h2>10. Governing Law</h2>
        <p>These Terms shall be governed by and construed in accordance with the laws of the United States and the State of [Your State], without regard to its conflict of law principles.</p>

        <div class="divider"></div>

        <h2>Contact Information</h2>
        <p>If you have any questions about these Terms, please contact us at:</p>
        <div class="contact-info">
            <ul>
                <li><i class="fas fa-envelope"></i> Email:  contact@budgetheaven.com</li>
                <li><i class="fas fa-envelope"></i> Email:  thebudgetheaven@gmail.com</li>
                <li><i class="fas fa-phone"></i> Phone: +1 (123) 456-7890</li>
                <li><i class="fas fa-map-marker-alt"></i> Address: 986 Main Street, Babylon , USA</li>
            </ul>
        </div>
    </div>

 <x-footer/>

</body>

</html>
