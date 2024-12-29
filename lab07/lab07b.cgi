#!/usr/bin/perl -wT
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print "Content-type: text/html\n\n";

print <<'HTML';
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation Result</title>
    <style>
        body {
            background-color: #fdedec;
            text-align: center;
        }

        li {color: red;}
        .error {
            color: red;
        }

        .success {
            color: green;
        }

        #info {
            background-color: #f5b7b1;
            border: solid 1px;
            padding: 5px;
        }

    </style>
</head>
<body>
    <h1>Registration Results</h1>
</body>
</html>
HTML

my $fname = param('fname');
my $lname = param('lname');
my $street = param('street');
my $city = param('city');
my $postalCode = param('postalCode');
my $province = param('province');
my $phoneNumber = param('phoneNumber');
my $email = param('email');
my $file = param('file');

my @errors;
my $message;

if ($phoneNumber !~ /^\d{10}$/) {
    push @errors, "Phone number must be exactly 10 digits";
} 
if ($postalCode !~ /^[A-Z]\d[A-Z] \d[A-Z]\d$/) {
    push @errors, "Postal Code should be in L0L 0L0 format";
}
if ($email !~ /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/) {
    push @errors, "Invalid Email";
}

if ($file) {
        $message = "<p><strong>*File was uploaded successfully</strong></p>";
    } else {
        $message = "<p><strong>*No file was uploaded</strong></p>";
    }
if (@errors) {
    print "<h3 class='error'>Registration Unsuccessful. Errors found</h3>";
    foreach $error (@errors) {
        print "<li>$error</li>";
    }
    print "<br>";
    print "<a href='https://www.cs.torontomu.ca/~h9ngo/lab07/lab07b.html'>Return to form</a>";

} else {
    print "<h3 class='success'>Registration Successful</h3>";
    print "<h4>Welcome $fname $lname! Here is your registration information:</h4>";
    print <<"Info";
        <div id="info">
            <p><strong>Name:</strong> $fname $lname</p>
            <p><strong>Address:</strong> $street, $city, $province, $postalCode</p>
            <p><strong>Phone Number:</strong> $phoneNumber</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>$message</strong></p>
        </div> 
Info

}