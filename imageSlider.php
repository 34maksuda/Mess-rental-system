
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
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
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: gray;
}

/* Number text (1/3 etc) */
.numbertext {
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
img#seatImg {
    border: 1px solid #1c21c1bf;
}
p#PT {
    margin-left: 104px;
    color: blue;
    font-weight: bold;
}
</style>
</head>
<body>

<div class="slideshow-container">
<?php
$orgArrSize = $arraySize-1;
for($i=0; $i<$orgArrSize;$i++){ ?>
  <div class="mySlides">
  <div class="numbertext"><?php echo $i+1; echo "/"; echo $orgArrSize;?></div>
  <img id="seatImg" src="roomPictures/<?php echo $seatIndvPic[$i+1]; ?>" style="width:100%;height: 350px">
</div>
<?php }
 ?>
 <p id="PT">seat images</p>
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br><script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
}
</script>

</body>
</html> 
