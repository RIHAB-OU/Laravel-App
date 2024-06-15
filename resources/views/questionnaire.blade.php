<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Coaching Questionnaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease-in-out;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #4CAF50;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Professional Coaching Questionnaire</h2>
        <form action="/submit_questionnaire" method="post">
            <!-- Personal Information -->
            <label for="nom">Last Name:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">First Name:</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <!-- Professional Information -->
            <label for="profession">Profession / Field of Activity:</label>
            <input type="text" id="profession" name="profession" required>

            <!-- Experience and Coaching Needs -->
            <label for="experience">Years of Experience in the Field:</label>
            <input type="number" id="experience" name="experience" min="0" max="100">

            <label for="objectifs">What are your main goals to achieve through coaching?</label>
            <textarea id="objectifs" name="objectifs" rows="4" cols="50" required></textarea>

            <label for="defis">What are the challenges or obstacles you are currently facing in your career?</label>
            <textarea id="defis" name="defis" rows="4" cols="50" required></textarea>

            <label for="attentes">What do you specifically expect from your coach?</label>
            <textarea id="attentes" name="attentes" rows="4" cols="50" required></textarea>

            <label for="autres">Are there any other information you would like to share with your coach?</label>
            <textarea id="autres" name="autres" rows="4" cols="50"></textarea>

            <!-- Submission Button -->
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
