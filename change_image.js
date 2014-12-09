var myImage = document.getElementById("image1");
var nextImage = document.getElementById("image2");
var imageArray = ["assets/home/sale1.jpg","assets/home/sale2.jpg","assets/home/sale3.jpg","assets/home/sale4.jpg"];
var nextimageArray = ["assets/home/sale5.jpg","assets/home/sale6.jpg","assets/home/sale7.jpg","assets/home/sale8.jpg"];
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
