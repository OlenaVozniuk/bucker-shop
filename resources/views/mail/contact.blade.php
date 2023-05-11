<!DOCTYPE html>
<html>
<h2>You have a new contact request</h2>
<body>
<b>Name: {{ $name }}</b>
    <br>
    <b>Email: {{ $email }}</b>
    <br>
    <b>Message: {!! nl2br($text) !!} </b>
    <br>
    <p>Please, answer for this message</p>
</body>
</html>

