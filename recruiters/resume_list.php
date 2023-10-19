<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Resumes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        header,
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: left;
        }

        main {
            padding: 20px;
        }

        ul {
            list-style: none;
        }

        li {
            display: flex;
            justify-content: space-between; /* Align items to the right */
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        li:last-child {
            border-bottom: none;
        }

        .resume {
            text-decoration: none;
            color: #007BFF;
            margin-left: 10px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">Your Logo</div>
    </header>

    <main>
        <center>
            <h1 style="font-size: 210%;">Student Resumes</h1>
        </center>
        <label for="sortDropdown" style="font-size: 100%;">Sort By:</label>
        <select id="sortDropdown" style="font-size: 100%;">
            <option value="name">Name (A-Z)</option>
            <option value="nameReverse">Name (Z-A)</option>
            <!-- Add more sorting options as needed -->
        </select>
        &ensp;
        <button id="sortButton" style="font-size: 80%;">Sort Resumes</button>
        <br>
        <br>
        <ul id="resumeList">
            <!-- PHP code for dynamic list of students -->
            <?php include 'resume.php'; ?>
        </ul>
    </main>

    <footer>
        <p>&copy; 2023 Your Company Name. All rights reserved.</p>
    </footer>

    <script>
        document.getElementById('sortButton').addEventListener('click', function () {
            var sortBy = document.getElementById('sortDropdown').value;
            var resumeList = document.getElementById('resumeList');
            var studentsArray = Array.from(resumeList.children);

            studentsArray.sort(function (a, b) {
                var nameA = a.querySelector('.studentName').textContent.toLowerCase();
                var nameB = b.querySelector('.studentName').textContent.toLowerCase();

                if (sortBy === 'name') {
                    return nameA.localeCompare(nameB);
                } else if (sortBy === 'nameReverse') {
                    return nameB.localeCompare(nameA);
                }

                // Add more cases for other sorting options here if needed

                return 0; // Default to no sorting if the selected option is not handled
            });

            while (resumeList.firstChild) {
                resumeList.removeChild(resumeList.firstChild);
            }

            studentsArray.forEach(function (student) {
                resumeList.appendChild(student);
            });
        });
    </script>

</body>

</html>
