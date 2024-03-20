# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

## Student

### Name: Sruthi Sridhar Bopparthi
### Email: bopparsr@mail.uc.edu

![Sruthi's Headshot](Images/Sruthi_Pic.jpeg)

## Repository Information
### Repository's URL: [https://github.com/SruthiAelay/waph-bopparsr.git](https://github.com/SruthiAelay/waph-bopparsr.git)
### This is a private repository which is used to store all the codes related to course Topics in Computer Systems. The structure of this repository is as mentioned below.

# Lab 4 - A Secure Login System with Session Authentication

## Lab's overview

In this lab, we focus on implementing and securing session management in PHP web applications. Our goals include deploying and testing sessiontest.php, understanding session handling processes through Wireshark, and identifying and mitigating session hijacking vulnerabilities. By completing this lab, we, as students, aim to gain practical experience in deploying session management, observing web traffic, and implementing secure authentication measures. The tasks involve revising the login system, simulating session hijacking attacks, and enhancing security with measures like HTTPS. Through hands-on exercises, we strengthen our understanding of PHP web application security, ensuring we can effectively protect against session hijacking and other potential vulnerabilities. The lab aims to provide us with valuable insights and practical skills in securing web applications.

Link to Lab4 code : [https://github.com/SruthiAelay/waph-bopparsr/tree/main/labs/lab4](https://github.com/SruthiAelay/waph-bopparsr/tree/main/labs/lab4)

## Task 1: Understanding Session Management in a PHP Web Application

### a) Deploy and test sessiontest.php

In this sub-task, we need to clone the course repository, make necessary revisions to the sessiontest.php file, deploy it to the web server, and then access it using different web browsers like Chrome and Firefox. I have tested in both the browsers and according to screenshots it shows that each browser has it own session while interacting with the web browsers.

![Sessiontest in Chrome ](Images/SessionChrome.png)

![Sessiontest in Firefox ](Images/SessionFirefox.png)

### b) Observe the Session-Handshaking using Wireshark

To perform the Wireshark sub-task, we began by downloading and installing Wireshark from the official website. After opening the application, we selected the network interface connecting our computer to the internet and initiated packet capturing. Prior to accessing sessiontest.php, we ensured the browser's cookies were cleared to maintain a clean session. Upon accessing the page, we stopped the packet capture in Wireshark. To isolate relevant packets, we applied a display filter focusing on HTTP requests and responses related to sessiontest.php. By analyzing these packets, we gained insights into the session handshaking process, identifying key information exchanged. We can observe how cookies were set and maintained.

![Http Request ](Images/WiresharkNoCookie.png)

![Http Request Set Cookie ](Images/WiresharkSetCookie.png)

![Http Request with Cookie ](Images/WiresharkCookie.png)

![Http Request with No Cookie ](Images/WiresharkNoSetCookie.png)

![Http 1st Request Response ](Images/WiresharkFirstReqRes.png)

![Http after 1st Request Response](Images/WiresharkAfterReqRes.png)

### c) Understanding Session Hijacking

Performing a session hijacking attack involves exploiting vulnerabilities in the session management of a web application. In this case, following the steps outlined in the lecture, we simulated a session hijacking attack on sessiontest.php. We intercepted the session cookie of a legitimate user by capturing session cookies and replicate session cookies. Once the session cookie was obtained, we used it to impersonate the legitimate user by injecting the captured session ID into another browser. By accessing sessiontest.php with the hijacked session, we demonstrated unauthorized access to the user's session, showcasing the potential risks associated with session hijacking.

![Copied session cookie into another browsers](Images/SessionCopied.png)

![Session is Hijacked](Images/SessionHijacked.png)

## Task 2: Insecure Session Authentication

### a) Revised Login System with Session Management

To implement session management for a login system, started by copying the content of the index.php file from either the lab3 or lab4 folder. Create a new file named logout.php to handle logout functionality. Revise the copied index.php file to integrate session management features. Deployed both files to web server and tested the login functionality by entering valid credentials. Additionally, tested the logout functionality by accessing logout.php to ensure the session is properly destroyed.

![Logged in with invalid Credentials](Images/InvalidCred.png)

![Redirected to Login Form](Images/RedirectToLogin.png)

![Successfull Login with valid Credentials](Images/ValidCred.png)

![Logout and Session Destroyed](Images/Logout.png)

### b) Session Hijacking Attacks

In the conducted session hijacking simulation, I logged in to the web application on one browser, manually copied the session ID, and pasted it into another browser. The process was documented with screenshots, illustrating the steps involved in the session hijacking attack. This hands-on exercise provided a practical understanding of the potential security risks associated with session management and emphasized the importance of implementing protective measures in web applications.

![Session is copied to another browser](Images/BeforeAttack.png)

![Session has been hijacked](Images/AfterAttack.png)

## Task 3: Securing Session and Session Authentication

### a) Data Protection and HTTPS Setup

I installed HTTPS on my web server, generated an SSL certificate, and viewed a PHP website via HTTPS. The screenshots show the details of the SSL certificate, which permits a secure connection between the client and the server. This guarantees data privacy by encrypting the information sent between the user's browser and the web server. An effective HTTPS configuration will improve the security of the web application.

Code:
```
openssl req -x509 -nodes -days 365 -newkey rsa:4096 -keyout waph.key -out waph.crt
```

![HTTPS Chrome Certificate](Images/ChromeCertificate.png)

![HTTPS Firefox Certificate](Images/FirefoxCertificate.png)

![HTTPS Login Form](Images/AccessLogin.png)

### b) Securing Session Against Session Hijacking Attacks - setting HttpOnly and Secure flags for cookies

To bolster the security of our sessions, we implemented crucial measures by setting the HttpOnly and Secure flags for session cookies. This step ensures that session cookies are marked as HttpOnly, preventing client-side scripts from accessing them, thus mitigating the risk of cross-site scripting (XSS) attacks. Additionally, the Secure flag was applied to indicate that the cookies should only be transmitted over secure, encrypted connections, providing an extra layer of protection against unauthorized interception. 

Code:

```
<?php
        $lifetime = 15 * 60;
        $path = "/";
        $domain = "bopparsr.waph.io";
        $secure = TRUE;
        $httponly = TRUE;
        session_set_cookie_params
($lifetime,$path,$domain,$secure,$httponly);
```

![Cookies are empty](Images/NoCookie.png)

![HttpOnly is set to true ennsuring no hijacking happens](Images/HttpOnlyTrue.png)

### c) Securing Session Against Session Hijacking Attacks - Defense In-Depth

In enhancing the security of our web application, I revised the index.php file to incorporate a new session variable that stores browser information following successful authentication. This additional layer of defense involves cross-verifying the information obtained from the user's browser with the stored session data. If discrepancies arise during this validation, indicating a potential session hijack, an alert is triggered, and the user is promptly redirected to the login page. This defense-in-depth strategy adds a proactive element to our session management, allowing us to detect and respond to any suspicious activities promptly. 

Code:
```
if($_SESSION["browser"] != $_SERVER["HTTP_USER_AGENT"])
{
    session_destroy();
    echo "<script>alert('Session hijacking attack is detected!');</script>";
    header("Refresh:0; url=from.php");
    die();
}
```

![Detection of Hijacking](Images/Hijack.png)









