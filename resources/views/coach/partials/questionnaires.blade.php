<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill Out Your Coaching Preferences</title>
    <!-- Add your CSS links here -->
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fc;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="checkbox"],
        input[type="radio"] {
            margin-right: 10px;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Fill Out Your Coaching Preferences</h1>
        <form action="{{ route('user.questionnaires.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>1. What areas of personal development are you interested in?</label>
                <div>
                    <input type="checkbox" name="interests[personal_development][]" value="Self-awareness"> Self-awareness<br>
                    <input type="checkbox" name="interests[personal_development][]" value="Goal setting"> Goal setting<br>
                    <input type="checkbox" name="interests[personal_development][]" value="Productivity"> Productivity<br>
                    <input type="checkbox" name="interests[personal_development][]" value="Confidence building"> Confidence building<br>
                </div>
            </div>

            <div class="form-group">
                <label>2. What coaching techniques are you interested in exploring?</label>
                <div>
                    <input type="checkbox" name="interests[coaching_techniques][]" value="Visualization"> Visualization<br>
                    <input type="checkbox" name="interests[coaching_techniques][]" value="Goal mapping"> Goal mapping<br>
                    <input type="checkbox" name="interests[coaching_techniques][]" value="Journaling"> Journaling<br>
                    <input type="checkbox" name="interests[coaching_techniques][]" value="Affirmations"> Affirmations<br>
                </div>
            </div>

            <div class="form-group">
                <label>3. What coaching topics do you want to focus on?</label>
                <div>
                    <input type="radio" name="interests[coaching_topics]" value="Career advancement"> Career advancement<br>
                    <input type="radio" name="interests[coaching_topics]" value="Relationships"> Relationships<br>
                    <input type="radio" name="interests[coaching_topics]" value="Health and wellness"> Health and wellness<br>
                    <input type="radio" name="interests[coaching_topics]" value="Financial success"> Financial success<br>
                </div>
            </div>

            <div class="form-group">
                <label>4. What coaching format do you prefer?</label>
                <div>
                    <input type="radio" name="interests[coaching_format]" value="One-on-one"> One-on-one<br>
                    <input type="radio" name="interests[coaching_format]" value="Group sessions"> Group sessions<br>
                    <input type="radio" name="interests[coaching_format]" value="Online courses"> Online courses<br>
                    <input type="radio" name="interests[coaching_format]" value="Workshops/seminars"> Workshops/seminars<br>
                </div>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
