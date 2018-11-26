<html>
<head>
    <style type="text/css">
    </style>
</head>
<body>
<table width="550" cellspacing="0" cellpadding="15" style="font-family:sans-serif border: none">
  <tr style="background-color: #fff">
    <td colspan="2" style="color: #375d81; font-size: 22px; font-weight: bolder">Message from Contact Form</td>
  <tr style="background-color:#abc8e2">
    <td>Name:</td>
    <td><?php echo $name; ?></td>
    </tr>
  <tr style="background-color:#abc8e2">
    <td>Email Address:</td>
    <td><?php echo $email; ?></td>
    </tr>
  <tr style="background-color:#abc8e2">
    <td>Message:</td>
    <td><?php echo $message; ?></td>
    </tr>
  <tr style="background-color: #fff; font-size: 14px">
    <td colspan="2">This message was sent from contact form.</td>
  </tr>
</table>
</body>
</html>