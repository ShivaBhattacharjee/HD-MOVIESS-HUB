let scrollPercentage = () =>{
  let scrollProgress = document.getElementById("progress");
  let progressValue = document.getElementById("progress-value");
  let pos = document.documentElement.scrollTop;
  let calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  let scrollValue = Math.round(pos * 102/ calcHeight);
  scrollProgress.style.background = `conic-gradient(#e70634 ${scrollValue}%, #2b2f38 ${scrollValue}%)`;
}
window.onscroll = scrollPercentage;
window.onload = scrollPercentage;

$(document).ready(function() {
  $('#autoWidth,#autoWidth1').lightSlider({
      autoWidth:true,
      loop:true,
      onSliderLoad: function() {
          $('#autoWidth,#autowidth2').removeClass('cS-hidden');
      } 
  });  
});

