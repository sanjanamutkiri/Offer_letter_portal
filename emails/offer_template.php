<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offer Letter</title>
</head>
<body>
    <h2>Offer Letter</h2>
    <p>Dear <?php echo $name; ?>,</p>
    <p>We are pleased to offer you the position of <?php echo $position; ?> at our company. The details of the offer are as follows:</p>
    <ul>
        <li>Salary: $<?php echo $salary; ?></li>
        <li>Start Date: <?php echo $start_date; ?></li>
    </ul>
    <p>We look forward to welcoming you to the team!</p>
</body>
</html>
