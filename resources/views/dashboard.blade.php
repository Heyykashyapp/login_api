<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    width: 100%;
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
    <div class="container">
        <h2>Welcome to Dashboard</h2>
        <button id="logout">Logout</button>
    </div>

    <script>



        document.getElementById("logout").addEventListener("click", async function () {
            let token = localStorage.getItem("token");

            if (!token) {
                alert("No token found. Please login again.");
                return;
            }

            let response = await fetch("http://127.0.0.1:8000/api/logout", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ token })
            });

            let result = await response.json();
            if (result.status) {
                localStorage.removeItem("token");
                window.location.href = "{{route('login')}}";
            } else {
                alert(result.message);
            }
        });


    </script>
</body>
</html>
