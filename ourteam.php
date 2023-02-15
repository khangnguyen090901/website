<?php
    include 'inc/header.php';
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Our Team</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Allura|Josefin+Sans');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

p a{
  color: blue;
}
.wrapper{
  margin-top: 50px;
}

.wrapper h1{
  font-family: 'Allura', cursive;
  font-size: 52px;
  margin-bottom: 60px;
  text-align: center;
}

.team{
  display: flex;
  justify-content: center;
  width: auto;
  text-align: center;
  flex-wrap: wrap;
}

.team .team_member{
  background: seagreen;
  margin: 5px;
  margin-bottom: 50px;
  width: 300px;
  padding: 50px;
  line-height: 20px;
  color: white;  
  position: relative;
}

.team .team_member h3{
  color: lightpink;
  font-size: 25px;
  margin-top: 50px;
  line-height: 1.1;
}

.team .team_member p.role{
  color: #ccc;
  margin: 12px 0;
  font-size: 14px;
  text-transform: uppercase;
}

.team .team_member .team_img{
  position: absolute;
  top: -50px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 100px; 
  border-radius: 50%;
}

.team .team_member .team_img img{
  width: 100px;
  height: 100px;
  padding: 5px;
}

</style>

    <div class="wrapper">
        <h1>Our Team</h1>
        <div class="team">
          <div class="team_member">
            <div class="team_img">
              <img src="images/ourteam/Khang.png" alt="Team_image">
            </div>
            <h3>Nguyễn Trường Khang</h3>
            <p class="role">BackEnd</p>
            <p>Lớp: 19BITV01</p>
            <p>Mssv: 1900007561</p>
            <p>FaceBook: <a href="https://www.facebook.com/profile.php?id=100035767489220" target="_blank">Khang Nguyễn</a></p>
          </div>
          <div class="team_member">
            <div class="team_img">
              <img src="images/ourteam/phu.png" alt="Team_image">
            </div>
            <h3>Tô Thanh Phú</h3>
            <p class="role">FrontEnd</p>
            <p>Lớp: 19BITV01</p>
            <p>Mssv: 1911548670</p>
            <p>FaceBook: <a href="https://www.facebook.com/profile.php?id=100009331399267" target="_blank">Phú Heo Quay</a></p>
          </div>
          <div class="team_member">
            <div class="team_img">
              <img src="images/ourteam/phuc.png" alt="Team_image">
            </div>
            <h3>Nguyễn Vũ Hoàng Phúc</h3>
            <p class="role">Support Team</p>
            <p>Lớp: 19BITV01</p>
            <p>Mssv: 1900006325</p>
            <p>FaceBook: <a href="https://www.facebook.com/Raiden592001/" target="_blank">Phúc Nguyễn</a></p>
          </div>
          <div class="team_member">
            <div class="team_img">
              <img src="images/ourteam/nghia.png" alt="Team_image">
            </div>
            <h3>Trần Trọng Nghĩa</h3>
            <p class="role">Support Team</p>
            <p>Lớp: 19BITV01</p>
            <p>Mssv: 1900008573</p>
            <p>FaceBook: <a href="https://www.facebook.com/trongnhia1009" target="_blank">Nghĩa Trần</a></p>
          </div>
        </div>
      </div>
</html>
<?php
    include 'inc/footer.php';
?>