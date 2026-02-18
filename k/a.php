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

   <button class="btn-green" onclick="showImg('myPic')">แสดงรูป 2</button>
<button class="btn-orange" onclick="showImg('teacherPic')">แสดงรูป 1</button>

<img id="myPic" src="img/2.jpg" style="display:none;">
<img id="teacherPic" src="img/1.jpg" style="display:none;">

<script>
function showImg(id) {
    document.getElementById("myPic").style.display = "none";
    document.getElementById("teacherPic").style.display = "none";
    document.getElementById(id).style.display = "block";
}
</script>

</body>

</html>


