
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides2 {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container2 {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev2, .next2{
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next2 {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev2:hover, .next2:hover {
  background-color: gray;
}

/* Number text (1/3 etc) */
.numbertext2 {
  color: blue;
  font-weight: bold;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
img#seatImg2 {
  border: 1px solid #1c21c1bf;
}
p#PT2 {
    margin-left: 66px;
    color: blue;
    font-weight: bold;
}
</style>
</head>
<body>

<div class="slideshow-container2">
<?php
$orgArrSize2 = $arraySize2-1;
for($i=0; $i<$orgArrSize2;$i++){ ?>
  <div class="mySlides2">
  <div class="numbertext2"><?php echo $i+1; echo "/"; echo $orgArrSize2;?></div>
  <img id="seatImg2" src="roomPictures/<?php echo $indvBath[$i+1]; ?>" style="width:100%;height: 350px">
</div>
<?php }
 ?>
 <p id="PT2">common Bath images</p>
<a class="prev2" onclick="plusSlides2(-1)">&#10094;</a>
<a class="next2" onclick="plusSlides2(1)">&#10095;</a>
</div>
<br><script>
var slideIndex2 = 1;
showSlides2(slideIndex2);

function plusSlides2(n2) {
  showSlides2(slideIndex2 += n2);
}

function currentSlide2(n2) {
  showSlides2(slideIndex2 = n2);
}

function showSlides2(n2) {
  var i2;
  var slides2 = document.getElementsByClassName("mySlides2");
  if (n2 > slides2.length) {slideIndex2 = 1}    
  if (n2 < 1) {slideIndex2 = slides2.length}
  for (i2 = 0; i2 < slides2.length; i2++) {
      slides2[i2].style.display = "none";  
  }
  slides2[slideIndex2-1].style.display = "block";  
}
</script>

</body>
</html> 
