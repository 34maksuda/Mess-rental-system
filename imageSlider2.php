
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides1 {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container1 {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev1, .next1 {
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
.next1 {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev1:hover, .next1:hover {
  background-color: gray;
}

/* Number text (1/3 etc) */
.numbertext1 {
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
img#seatImg1 {
  border: 1px solid #1c21c1bf;
}
p#PT1 {
    margin-left: 104px;
    color: blue;
    font-weight: bold;
}
</style>
</head>
<body>

<div class="slideshow-container1">
<?php
$orgArrSize1 = $arraySize1-1;
for($i=0; $i<$orgArrSize1;$i++){ ?>
  <div class="mySlides1">
  <div class="numbertext1"><?php echo $i+1; echo "/"; echo $orgArrSize1;?></div>
  <img id="seatImg1" src="roomPictures/<?php echo $roomIndvPic[$i+1]; ?>" style="width:100%;height: 350px">
</div>
<?php }
 ?>
 <p id="PT1">room images</p>
<a class="prev1" onclick="plusSlides1(-1)">&#10094;</a>
<a class="next1" onclick="plusSlides1(1)">&#10095;</a>
</div>
<br><script>
var slideIndex1 = 1;
showSlides1(slideIndex1);

function plusSlides1(n1) {
  showSlides1(slideIndex1 += n1);
}

function currentSlide1(n1) {
  showSlides1(slideIndex1 = n1);
}

function showSlides1(n1) {
  var i1;
  var slides1 = document.getElementsByClassName("mySlides1");
  if (n1 > slides1.length) {slideIndex1 = 1}    
  if (n1 < 1) {slideIndex1 = slides1.length}
  for (i1 = 0; i1 < slides1.length; i1++) {
      slides1[i1].style.display = "none";  
  }
  slides1[slideIndex1-1].style.display = "block";  
}
</script>

</body>
</html> 
