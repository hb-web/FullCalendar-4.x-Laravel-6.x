<!DOCTYPE html>
<html>
<head>
    <title>Real Programmer</title>
</head>
<body>
    <h1><?php echo e($details['title']); ?></h1>
    <h3>Nom : <?php echo e($details['name']); ?></h3>
    <h3>Nom : <?php echo e($details['email']); ?></h3>
    <h3>Téléphone : <?php echo e($details['tel']); ?></h3>
    <h3>Sujet : <?php echo e($details['subject']); ?></h3>
    <p><?php echo e($details['body']); ?></p>
    <p>Cet e-mail a été envoyé via le formulaire de contact de (https://domaine.com)

    </p>
</body>
</html><?php /**PATH C:\Users\BADR\Desktop\FullCalendar-4.x-Laravel-6.x\resources\views/emails/sendmail.blade.php ENDPATH**/ ?>