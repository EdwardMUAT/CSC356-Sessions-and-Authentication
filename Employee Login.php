<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Login</title>
    <style>
        /* Basic reset and font */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Body and background styling */
        body {
            background-color: #1e1e2f;
            color: #f0f0f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Main container styling */
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        /* Heading and text styling */
        .login-container h2 {
            font-size: 1.8em;
            color: #ffd700;
            margin-bottom: 20px;
        }

        .login-container label {
            display: block;
            font-size: 1em;
            margin-top: 15px;
            color: #f0f0f5;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #333;
            color: #f0f0f5;
        }

        .login-container input:focus {
            border-color: #ffd700;
            outline: none;
        }

        /* Login button styling */
        .login-button {
            display: inline-block;
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background-color: #ff4500;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #e63946;
        }

        /* Optional informational text */
        .info-text {
            margin-top: 20px;
            font-size: 0.9em;
            color: #bbb;
        }

        /* Error message styling */
        .error-message {
            color: #e63946;
            background-color: #ffe6e6;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 0.9em;
            text-align: center;
        }

        /* Success message styling */
        .success-message {
            color: #2d6a4f;
            background-color: #e6ffe6;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 0.9em;
            text-align: center;
        }

        /* Info text styling */
        .info-text {
            font-size: 0.9em;
            color: #555;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Employee Login</h2>
        
        <?php
        session_start();
        
        $validUserId = "employee1";
        $validPassword = "securepassword";
        $message = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userIdInput = $_POST["userid"];
            $passwordInput = $_POST["password"];
            
            if ($userIdInput === $validUserId && $passwordInput === $validPassword) {
                $message = "<p class='success-message'>Login successful! Redirecting...</p>";
                header("refresh:1.5;url=intranet.php");
            } else {
                $message = "<p class='error-message'>Invalid User ID or Password. Please try again.</p>";
            }
        }
        ?>

        <?php echo $message; ?>
        
        <form action="login.php" method="post">
            <label for="userid">User ID</label>
            <input type="text" id="userid" name="userid" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="login-button">Login</button>
        </form>

        <p class="info-text">Please enter your User ID and password to access the intranet.</p>
    </div>
</body>
</html>
