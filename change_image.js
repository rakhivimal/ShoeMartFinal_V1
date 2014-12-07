var myImage = document.getElementById("image1");
var nextImage = document.getElementById("image2");
var imageArray = ["sale1.jpg","sale2.jpg","sale3.jpg","sale4.jpg"];
var nextimageArray = ["sale5.jpg","sale6.jpg","sale7.jpg","sale8.jpg"];
var imageIndex=0;
function changeImage(){
myImage.setAttribute("src",imageArray[imageIndex]);
imageIndex++;
if(imageIndex>=imageArray.length){
imageIndex=0;
}
}
function changenextImage(){
nextImage.setAttribute("src",nextimageArray[imageIndex]);
imageIndex++;
if(imageIndex>=nextimageArray.length){
imageIndex=0;
}
}
setInterval(changeImage,4000);
setInterval(changenextImage,5000);

