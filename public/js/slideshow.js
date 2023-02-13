

    var next = 0;

    slideAuto();

    function slideAuto(){

   
    var i; 

    var imagesContent = document.getElementsByClassName("images");

    for(i = 0; i<imagesContent.length; i++){
        imagesContent[i].style.display = "none";
    }

    next++;

    if(next > imagesContent.length){
            next = 1;
    }

    imagesContent[next-1].style.display = "block";

    setTimeout(slideAuto, 9000);

}


