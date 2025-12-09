<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
    </head>
<body>

    <h2>Contact Form<h2>

    <?php if(isset($_GET['success'])) : ?>
        <p style="color: green;">Email sent successfully!></p>
    <?php elseif(isset($_GET['error'])) : ?>
        <p style="color: red;">Failed to send email. Please try again.</p>
    <?php endif; ?>

    <form action="send_mail.php" method="post">
        <label>Name: </label><br>
        <input type="text" name="name" required><br><br>

        <label>Email: </label><br>
        <input type="email" name="email" required><br><br>

        <label>Message: </label><br>
        <textarea name="message" rows="5" required></textarea><br><br>

        <button type="submit">Send Message</button>
    </form>

</body>
</html>