var slideCount = 0;
var slideInfo = [{
    miniText: "Welcome to the",
    subMini: "Wits Division of",
    boldTitle: "Biomedical  Informatics",
    mainText: "A multifaceted team of doctors,  scientists,<br/>developers and researchers  dedicated to<br/>improving health care through technology<br/>and research."
},
    {
        miniText: "Biomedical  Informatics ",
        subMini: "Clinical Informatics",
        boldTitle: "Electronic Discharge",
        mainText: "The team  has development electronic<br/>health care systems for the Wits affiliated<br/>hospitals, Charlotte Maxate, Helen Joseph<br/>and Baragwanath."
    },
    {
        miniText: "Biomedical  Informatics ",
        subMini: "Research Informatics",
        boldTitle: "REDCap",
        mainText: "The faculty hosts a web-based research  data<br/>management tool called RedCap, which is quicker<br/>and more secure than paper-based or Excel<br/>capture sheet. "
    }
]

function Slider() {
    var timer = setInterval(nextSlide, 5000);
}

function nextSlide() {
    if (slideCount == 0) {
        $("#miniText").html(slideInfo[1].miniText);
        $("#subMini").html(slideInfo[1].subMini);
        $("#boldTitle").html(slideInfo[1].boldTitle);
        $("#mainText").html(slideInfo[1].mainText);
        $("#circle1").css("background","transparent");
        $("#circle2").css("background","#5C737F");
        slideCount += 1;
    } else if (slideCount == 1) {
        $("#miniText").html(slideInfo[2].miniText);
        $("#subMini").html(slideInfo[2].subMini);
        $("#boldTitle").html(slideInfo[2].boldTitle);
        $("#mainText").html(slideInfo[2].mainText);
        $("#circle2").css("background","transparent");
        $("#circle3").css("background","#5C737F");
        slideCount += 1;
    }else{
        $("#miniText").html(slideInfo[0].miniText);
        $("#subMini").html(slideInfo[0].subMini);
        $("#boldTitle").html(slideInfo[0].boldTitle);
        $("#mainText").html(slideInfo[0].mainText);
        $("#circle3").css("background","transparent");
        $("#circle1").css("background","#5C737F");
        slideCount = 0;
    }
}

