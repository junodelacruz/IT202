<!DOCTYPE html>
<html>
    <head>
        <title>Simple Chat</title>
        <!-- Styles -->
        <link rel="stylesheet" href="css/simplechatstyles.css">

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="js/updatescript.js" defer></script>
        <script src="js/showscript.js" defer></script>
    </head>
    <body>
        <h1>Simple Chat</h1>
        <!-- List of Users -->
        <div id='userList'>
        <h2>Active Users</h2>
        <?php
            include("../perfectplumbingpros/connect.php");
            // list of users
            $usernameSQL = "SELECT `Name` FROM `Chat`";
            $usernameQuery = mysqli_query($conn, $usernameSQL);

            if (mysqli_num_rows($usernameQuery) > 0) {
                while ($row = mysqli_fetch_assoc($usernameQuery)) {
                    echo " " . $row['Name'] . " ";
                }
            }
            else {
                echo "Failed to fetch usernames.";
            }
        ?>
        </div>
        <!-- chatbox input (updatemessage.php) -->
        <div id="login">
        <h2>Login</h2>
            <label for="username">Username: </label>
            <input type="text" id="username" name="username"><br>

            <label for="password">Password: </label>
            <input type="text" id="password" name="password">
        </div>
        <div class="center">
            <div id="chatInput">
            <h2>Chatbox</h2>
                <!-- <input type="text" id="chatbox" name="chatbox"> -->
                <textarea id="chatbox" name="chatbox"></textarea>
                <!-- Password Check Result -->
                <p id="check"></p>
            </div>
        
            <!-- chatbox output (showmessage.php) -->
            <div id="chatOutput">
            <h2>Messages</h2>
                <label for="usernameCheck">Enter valid username: </label>
                <input type="text" id="usernameCheck" name="usernameCheck"><br>

                <button id="listen">Listen</button>
                <!-- Message Output -->
                <p id="output"></p>
            </div>
        </div>
        </body>
    </body>
</html>