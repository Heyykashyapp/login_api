<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
}

input {
    width: 85%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background: #28a745;
    color: white;
    border: none;
    padding: 10px;
    width: 100%;
    cursor: pointer;
    border-radius: 5px;
}

button:hover {
    background: #218838;
}

    </style>
</head>
<body>
    <!-- <div class="container">
        <h2>User Login</h2>
        <form id="loginForm">
            <input type="email" id="email" placeholder="Email" required>
            <input type="password" id="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p id="message"></p>
        </form>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", async function(e) {
            e.preventDefault();
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;

            let response = await fetch("http://127.0.0.1:8000/api/login", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ email, password })
            });

            let result = await response.json();
            document.getElementById("message").textContent = result.message;

            if (result.status) {
                localStorage.setItem("token", result.token);
                window.location.href = "dashboard.html";
            }
        });
    </script> -->



    <div class="container">
        <h2>User Login</h2>
        <form id="loginForm">
            <input type="email" id="email" placeholder="Email" required>
            <input type="password" id="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p id="message"></p>
        </form>
    </div>
    <script>
        document.getElementById("loginForm").addEventListener("submit", async function(e) {
            e.preventDefault();
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;

            let response = await fetch("http://127.0.0.1:8000/api/login", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ email, password })
            });

            let result = await response.json();
            document.getElementById("message").textContent = result.message;

            if (result.status) {
                localStorage.setItem("token", result.token);
                window.location.href = "{{ route('dashboard') }}";
            }
        });
    </script>
</body>
</html>





