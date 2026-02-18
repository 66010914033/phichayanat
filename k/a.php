<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>งาน k</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; }
        .btn-green { background-color: #28a745; color: white; padding: 15px 25px; border: none; cursor: pointer; border-radius: 5px; margin: 10px; }
        .btn-orange { background-color: #ffc107; color: black; padding: 15px 25px; border: none; cursor: pointer; border-radius: 5px; margin: 10px; }
        img { max-width: 300px; display: none; margin-top: 20px; border: 2px solid #ddd; }
    </style>
</head>
<body>
    <h1>งาน k</h1>
    <h3>66010914033</h3>
    <p>พิชญาณัฏฐ์ รินทร์วงค์</p>

    <button class="btn-green" onclick="showImg('myPic')"><img src="img/2.jpg"></button>
    <button class="btn-orange" onclick="showImg('teacherPic')"><img src="img/1.jpg"></button>

    <br>
    <img id="myPic" src="https://via.placeholder.com/300?text=My+Photo" alt="รูปตัวเอง">
    <img id="teacherPic" src="https://via.placeholder.com/300?text=Teacher+Photo" alt="รูปอาจารย์">

    <script>
        function showImg(id) {
            document.getElementById('myPic').style.display = 'none';
            document.getElementById('teacherPic').style.display = 'none';
            document.getElementById(id).style.display = 'inline-block';
        }
    </script>
</body>

</html>

