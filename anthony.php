<?php include "./header.php"; ?>

<div class="ag-format-container">
    <div class="layout">
      <ul class="slider">
        <li>
          <img src="https://raw.githack.com/SochavaAG/example-mycode/master/pens/1_images/img-1098x549-15.jpg" alt="" />
        </li>
        <li>
          <img src="https://raw.githack.com/SochavaAG/example-mycode/master/pens/1_images/img-1098x549-5.jpg" alt="" />
        </li>
        <li>
          <img src="https://raw.githack.com/SochavaAG/example-mycode/master/pens/1_images/img-1098x549-1.jpg" alt="" />
        </li>
        <li>
          <img src="https://raw.githack.com/SochavaAG/example-mycode/master/pens/1_images/img-1098x549-10.jpg" alt="" />
        </li>
        <li>
          <img src="https://raw.githack.com/SochavaAG/example-mycode/master/pens/1_images/img-1098x549-4.jpg" alt="" />
        </li>
      </ul>
    </div>
  </div>


  <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
    <symbol id="ei-arrow-left-icon" viewBox="0 0 50 50">
      <path d="M25 42c-9.4 0-17-7.6-17-17S15.6 8 25 8s17 7.6 17 17-7.6 17-17 17zm0-32c-8.3 0-15 6.7-15 15s6.7 15 15 15 15-6.7 15-15-6.7-15-15-15z"></path>
      <path d="M25.3 34.7L15.6 25l9.7-9.7 1.4 1.4-8.3 8.3 8.3 8.3z"></path>
      <path d="M17 24h17v2H17z"></path>
    </symbol>

    <symbol id="ei-arrow-right-icon" viewBox="0 0 50 50">
      <path d="M25 42c-9.4 0-17-7.6-17-17S15.6 8 25 8s17 7.6 17 17-7.6 17-17 17zm0-32c-8.3 0-15 6.7-15 15s6.7 15 15 15 15-6.7 15-15-6.7-15-15-15z"></path>
      <path d="M24.7 34.7l-1.4-1.4 8.3-8.3-8.3-8.3 1.4-1.4 9.7 9.7z"></path>
      <path d="M16 24h17v2H16z"></path>
    </symbol>
  </svg>


  <style>
.ag-format-container {
  width: 1142px;
  margin: 0 auto;
}


ul {
  margin: 0;
  padding: 0;
}

.layout {
  width: 600px;
  margin: 10px auto;
  position: relative;
}
.layout a {
  color: #666;
}

.slide {
  display: none;
}
.slide li {
  list-style: none;
}
.slide.slick-initialized {
  display: block;
}

.slick-dots {
  margin-top: 5px;
  margin-left: -5px;
  margin-right: -5px;
  display: flex;
  justify-content: center;
}
.slick-dots li {
  display: inline-block;
  max-height: 56px;
  max-width: 112px;
  margin: 5px;
}
.slick-dots li img {
  height: auto;
  width: 100%;

  cursor: pointer;

  opacity: 0.5;
}
.slick-dots li.slick-active img {
  cursor: default;

  opacity: 1;
}

.slick-prev,
.slick-next {
  margin: -50px 0 0;

  z-index: 99;
  position: absolute;
  top: 50%;
}
.slick-prev {
  left: -50px;
}
.slick-next {
  right: -50px;
}

.icon {
  display: inline-block;
  height: 50px;
  width: 50px;
}
.icon__cnt {
  height: 100%;
  width: 100%;
}

@media only screen and (max-width: 767px) {
  .ag-format-container {
    width: 96%;
  }

}

@media only screen and (max-width: 639px) {

}

@media only screen and (max-width: 479px) {

}

@media (min-width: 768px) and (max-width: 979px) {
  .ag-format-container {
    width: 750px;
  }

}

@media (min-width: 980px) and (max-width: 1161px) {
  .ag-format-container {
    width: 960px;
  }

}

</style>



<script>
(function ($) {
  $(function () {


    $('.slider').slick({
      dots: true,
      prevArrow: '<a class="slick-prev slick-arrow" href="#" style=""><div class="icon icon--ei-arrow-left"><svg class="icon__cnt"><use xlink:href="#ei-arrow-left-icon"></use></svg></div></a>',
      nextArrow: '<a class="slick-next slick-arrow" href="#" style=""><div class="icon icon--ei-arrow-right"><svg class="icon__cnt"><use xlink:href="#ei-arrow-right-icon"></use></svg></div></a>',
      customPaging: function (slick, index) {
        var targetImage = slick.$slides.eq(index).find('img').attr('src');
        return '<img src=" ' + targetImage + ' "/>';
      }
    });


  });
})(jQuery);

</script>