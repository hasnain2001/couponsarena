<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy & Policy - Best Deals and Discounts | BudgetHeaven</title>
    <meta name="description" content="Find the best deals, discounts, and coupons on BudgetHeaven. Save money on your favorite products from top brands.">
    <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">
    <meta name="author" content="John Doe">
    <meta name="robots" content="index, follow">

    <link rel="canonical" href="https://budgetheaven.com/privacy-policy">
    <link rel="stylesheet" href="{{ asset('cssfile/styles.css') }}">
    <link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('front/assets/images/logo-01.png') }}" type="image/x-icon">



    <style>
        .fas {
            color: red;
        }

        .container {
            font-family: Arial, sans-serif;
            margin-top: 20px;
        }

        .list-group-item i {
            margin-right: 10px;
        }

        .h2 {
            margin-top: 30px;
        }

        .key-points {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <x-nav/>

    <div class="container">
        <h1 class="display-4 text-center mb-4">Privacy Policy</h1>
        <p class="text-center lead mb-5">Last updated: October 2023</p>

        <p>BudgetHeaven Privacy Policy outlines how we collect and manage your information when you utilize our services. If you disagree with our policies, we kindly ask you to refrain from using our services.</p>

        <h2 class="h2">Key Points:</h2>
        <ol class="list-group list-group-numbered key-points">
            <li class="list-group-item">
                <i class="fas fa-info-circle"></i>
                <strong>What Information Do We Collect?</strong> We gather personal information provided by you, such as names, phone numbers, email addresses, etc.
            </li>
            <li class="list-group-item">
                <i class="fas fa-shield-alt"></i>
                <strong>Sensitive Information:</strong> We do not process sensitive data.
            </li>
            <li class="list-group-item">
                <i class="fas fa-user-friends"></i>
                <strong>Third-Party Information:</strong> We do not receive information from third parties.
            </li>
            <li class="list-group-item">
                <i class="fas fa-cog"></i>
                <strong>How Do We Process Your Information?</strong> We process your data to manage accounts, ensure security, and fulfill legal obligations. Other processing requires your consent.
            </li>
            <li class="list-group-item">
                <i class="fas fa-share-alt"></i>
                <strong>Sharing Information:</strong> We may share data in specific cases, such as business transfers.
            </li>
            <li class="list-group-item">
                <i class="fas fa-lock"></i>
                <strong>Data Security:</strong> While we have security measures in place, no system is 100% secure.
            </li>
            <li class="list-group-item law">
                <i class="fas fa-gavel"></i>
                <strong>Privacy Rights:</strong> Depending on your location, you have specific privacy rights under the law.
            </li>
            <li class="list-group-item opt-out">
                <i class="fas fa-sign-out-alt"></i>
                <strong>Opting Out:</strong> You can withdraw consent or opt out of marketing communications.
            </li>
            <li class="list-group-item account">
                <i class="fas fa-user-edit"></i>
                <strong>Account Management:</strong> You can review, update, or delete your account information.
            </li>
            <li class="list-group-item cookie">
                <i class="fas fa-cookie-bite"></i>
                <strong>Cookies:</strong> We use cookies, and you can manage your preferences.
            </li>
            <li class="list-group-item dnt">
                <i class="fas fa-ban"></i>
                <strong>Do-Not-Track:</strong> We don't respond to DNT signals as no standard exists.
            </li>
            <li class="list-group-item california">
                <i class="fas fa-star-and-crescent"></i>
                <strong>California Residents:</strong> California residents have specific privacy rights.
            </li>
            <li class="list-group-item update">
                <i class="fas fa-sync-alt"></i>
                <strong>Updates:</strong> We may update our policy as required by law.
            </li>
            <li class="list-group-item contact">
                <i class="fas fa-envelope"></i>
                <strong>Contact Us:</strong> If you have questions, contact us at <a href="mailto:admin@budgetheaven.com">admin@budgetheaven.com</a>.
            </li>
            <li class="list-group-item access">
                <i class="fas fa-file-alt"></i>
                <strong>Data Subject Access Request:</strong> If you want to review, update, or delete your data, use our data subject access request form.
            </li>
        </ol>
    </div>

    <br><br><br><br><br>
    <x-footer/>


</body>

</html>
