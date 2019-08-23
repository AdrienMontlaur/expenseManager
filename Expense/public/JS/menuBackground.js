let puceMenu=document.querySelectorAll(".puceMenu");
let hover="rgba(0,163,148,0.5)";
let unselected="#c6c2c2";
for (i=0;i<puceMenu.length;i++){
    elem=puceMenu[i];
    elem.addEventListener("mouseover",function(e){
        e.target.style.backgroundColor=hover;
    });
    elem.addEventListener("mouseout", function(e){
        e.target.style.backgroundColor=unselected;
    });
};
